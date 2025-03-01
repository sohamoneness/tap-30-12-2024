<?php
namespace App\Repositories;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Models\Order;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CheckoutContract;
use App\Models\OrderProduct;
use App\Models\CourseLesson;
use App\Models\LessonTopic;
use App\Models\SaveTopic;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use DB;
use Illuminate\Support\Facades\Auth;
/**
 * Class CheckoutRepository
 *
 * @package \App\Repositories
 */
class CheckoutRepository extends BaseRepository implements CheckoutContract
{
    use UploadAble;

    /**
     * BlogCategoryRepository constructor.
     * @param Order $model
     */
    public function __construct(Order $model)
    {
        parent::__construct($model);
        $this->model = $model;
        $this->ip = $_SERVER['REMOTE_ADDR'];
    }
    public function viewCart()
    {
        $data = Cart::where('ip', $this->ip)->get();
        return $data;
    }
    public function create(array $data)
    {
        //dd($data);
        $collectedData = collect($data);

        try {
            // 1 order
            $order_no = "CSP".mt_rand();


            $newEntry = new Order();
            $newEntry->order_no = $order_no;
            $newEntry->user_id = Auth::guard('web')->user()->id ?? 0;
            $newEntry->ip = $this->ip;
            $newEntry->email = $collectedData['email'];
            $newEntry->mobile = $collectedData['mobile'];
            $newEntry->fname = $collectedData['fname'];
            $newEntry->lname = $collectedData['lname'];
           
            $cartData = Cart::where('ip', $this->ip)->get();
            $subtotal = 0;

            foreach($cartData as $cartValue) {

                $newOrderProduct = new OrderProduct();
                $newOrderProduct->order_id = $order_no;
                $newOrderProduct->course_id = $cartValue->course_id;
                $newOrderProduct->price = $cartValue->price;
                $newOrderProduct->type = ($cartValue->purchase_type == 'subscription') ? '4' : ($cartValue->purchase_type == 'deal' ? '5' : '1');
                $newOrderProduct->save();

                $subtotal += ($cartValue->price * $cartValue->qty);

                if($cartValue->purchase_type == 'subscription'){
                    User::where('id', Auth::guard('web')->user()->id)->update(['subscription_id'=>$cartValue->course_id]);
                }

                if($cartValue->purchase_type == 'course'){
                    $courselesson=CourseLesson::where('course_id',$cartValue->course_id)->get();
                    foreach($courselesson as $ckey => $cl){
                        $lessonTopic=LessonTopic::where('lesson_id',$cl->lesson_id)->get();
                        foreach($lessonTopic as $lkey =>  $lt){
                            $SaveTopic = new SaveTopic();
                            $SaveTopic->user_id = Auth::guard('web')->user()->id;
                            $SaveTopic->course_id = $cartValue->course_id;
                            $SaveTopic->lesson_id = $cl->lesson_id;
                            $SaveTopic->topic_id = $lt->topic_id;
                            $SaveTopic->is_view = 0;
                            if($ckey == 0 && $lkey == 0){
                                $SaveTopic->counter = 1;
                            }else{
                                $SaveTopic->counter = 0;
                            }
                            $SaveTopic->save();
                        }
                    }
                }
            } 
          

            $newEntry->amount = $subtotal;
            $newEntry->shipping_charges = 0;
            $newEntry->tax_amount = 0;
            $total = (int) $subtotal;
            $newEntry->final_amount = $total;
            $newEntry->save();


            // Remove cart data
            $emptyCart = Cart::where('ip', $this->ip)->delete();

            return $order_no;
        } catch (\Throwable $th) {
             throw $th;
             dd($th);
            DB::rollback();
            return false;
        }
    }
}


