<?php
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FaqCategory;
use App\Models\Faq;
use App\Models\FaqRelatedCategory;

class FaqsController extends Controller
{

    /*
    ** FAQ Category List Pages
    ** GET
    */

	public function index(Request $request) {

        $search = !empty($request->search)?$request->search:'';

        $categories = FaqCategory::orderBy('id','desc');
        if(!empty($search)){
            $categories = $categories->where('title', 'LIKE', '%'.$search.'%');
        }
        $categories = $categories->get();
        return view('site.faqs.index',compact('categories', 'search'));
    }

    /*
    ** FAQ Category List Pages
    ** GET
    */

    public function details($id){
        $categories = FaqCategory::orderBy('id','desc')->get();
        $data = Faq::where('category_id', $id)->orderBy('id', 'desc')->get();

        $rel_cat_arr = array();
        $cat_id1 = FaqRelatedCategory::where('cat_id1', $id)->get()->toArray();
        if(!empty($cat_id1)){
            foreach($cat_id1 as $cat){
                if($cat['cat_id1'] == $id){
                    $rel_cat_arr[] = $cat['cat_id2'];
                }
            }
        }
        $cat_id2 = FaqRelatedCategory::where('cat_id2', $id)->get()->toArray();
        if(!empty($cat_id2)){
            foreach($cat_id2 as $cat){
                if($cat['cat_id2'] == $id){
                    $rel_cat_arr[] = $cat['cat_id1'];
                }
            }
        }

        $related_category = FaqCategory::whereIn('id', $rel_cat_arr)->orderBy('id', 'desc')->get();
        
        
        // dd($related_category);
        return view('site.faqs.details', compact('data','categories','id','related_category'));
    }

}

?>