<?php
namespace App\Repositories;
use Illuminate\Support\Str;
use App\Models\Cart;
use App\Traits\UploadAble;
use Illuminate\Http\UploadedFile;
use App\Contracts\CartContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\elementType;

/**
 * Class ArticleCategoryRepository
 *
 * @package \App\Repositories
 */
class CartRepository  implements CartContract
{
    use UploadAble;

    /**
     * BlogCategoryRepository constructor.
     * @param Cart $model
     */
    public function __construct()
    {
    	$this->ip = $_SERVER['REMOTE_ADDR'];
        
    }


    public function addToCart(array $data)
    {
        $collectedData = collect($data);

            $cartExist = [];

            if($collectedData['purchase_type'] != 'subscription'){
                if(Auth::guard('web')->check()){
                    $cartExist = Cart::where('user_id' , Auth::guard('web')->user()->id)->where('purchase_type',$collectedData['purchase_type'])->where('course_id',$collectedData['course_id'])->where('course_name',$collectedData['course_name'])->get();
                }else{
                    $cartExist = Cart::where('ip',$this->ip)->where('purchase_type',$collectedData['purchase_type'])->where('course_id',$collectedData['course_id'])->where('course_name',$collectedData['course_name'])->get();
                }
            }
            
            if($collectedData['purchase_type'] == 'subscription'){
                if(Auth::guard('web')->check()){
                    $cartExist = Cart::where('user_id' , Auth::guard('web')->user()->id)->where('purchase_type',$collectedData['purchase_type'])->get();
                }else{
                    $cartExist = Cart::where('ip',$this->ip)->where('purchase_type',$collectedData['purchase_type'])->get();
                }
            }

            if(count($cartExist) <= 0){

                $newEntry = new Cart;
            
                if (Auth::guard('web')->user()) {
                    $newEntry->user_id = Auth::guard('web')->user()->id;
                }
                
                $newEntry->course_id = $collectedData['course_id'];
                $newEntry->course_name = $collectedData['course_name'];
                $newEntry->course_image = $collectedData['course_image'];
                $newEntry->course_slug = $collectedData['course_slug'];
                $newEntry->author_name = $collectedData['author_name'];
                $newEntry->price = $collectedData['price'];
                $newEntry->purchase_type = $collectedData['purchase_type'] ?? 'course';
                $newEntry->ip = $this->ip;
                $newEntry->save();
            }
            else return false;

			/* $cartData = Cart::where('ip', $this->ip)->sum('qty');
            return $cartData; */
        
		$cartData = Cart::where('ip', $this->ip)->sum('qty');
		return $cartData;
    }

    public function viewByIp()
    {
        $data = Cart::where('ip', $this->ip)->get();
        
        if(Auth::guard('web')->check()){
            $data = Cart::where('ip', $this->ip)->orWhere('user_id',Auth::guard('web')->user()->id)->get();
        }
            // coupon code usage check
        return $data;
    }


    /**
     * @param $id
     * @return bool|mixed
     */
    public function delete(int $id)
    {
        $data = Cart::destroy($id);
        return $data;
    }


   
}
