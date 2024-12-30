<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\FaqCategory;
use App\Models\Faq;
use App\Models\FaqRelatedCategory;
use Illuminate\Http\Request;
use DB;

class FaqController extends BaseController
{
	/**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $categories = FaqCategory::orderBy('id','desc')->get();
        $this->setPageTitle('FAQ', 'List of all faq categories');
        return view('admin.faq.index', compact('categories'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $all_available_categories = FaqCategory::orderBy('id', 'desc')->get();
        $this->setPageTitle('FAQ Category', 'Create FAQ Category');
        return view('admin.faq.create', compact('all_available_categories'));
    }
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $params = $request->except('_token');
        $collection = collect($params);
        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['title']));
        $faqCategory = new FaqCategory;
        $faqCategory->title = $collection['title'];
        $faqCategory->slug = $slug;
        $faqCategory->description = $collection['description'];
        $faqCategory->meta_title = $collection['meta_title'];
        $faqCategory->meta_keywords = $collection['meta_keywords'];
        $faqCategory->meta_description = $collection['meta_description'];
        $faqCategory->status = 1;
        $faqCategory->save();
        $category_id = $faqCategory->id;
        if(count($params['faq_questions'])>0){
            for($i=0;$i<count($params['faq_questions']);$i++){
                if($params['faq_questions'][$i]!=''){
                    $faq = new Faq;
                    $faq->category_id = $category_id;
                    $faq->question = $params['faq_questions'][$i];
                    $faq->answer = $params['faq_answers'][$i];
                    $faq->save();
                }
            }
        }

        $rel_cat_ids = !empty($params['rel_cat_ids'])?$params['rel_cat_ids']:array();

        if(!empty($rel_cat_ids)){
            foreach($rel_cat_ids as $item){
                FaqRelatedCategory::insert([
                    'cat_id1' => $category_id,
                    'cat_id2' => $item
                ]);
            }
        }

        if (!$faqCategory) {
            return $this->responseRedirectBack('Error occurred while creating Distributor.', 'error', true, true);
        }
        return $this->responseRedirect('admin.faq.index', 'Distributor added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $faqCategory = FaqCategory::findOrFail($id);
        $faqs = FAQ::where('category_id',$id)->get();
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
        $all_available_categories = FaqCategory::where('id', '!=', $id)->orderBy('id', 'desc')->get();

        $this->setPageTitle('FAQ Category', 'Edit FAQ Category : '.$faqCategory->title);
        return view('admin.faq.edit', compact('faqCategory','faqs','all_available_categories','rel_cat_arr'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $params = $request->except('_token');
        $id = $params['id'];

        $prev_rel_cat_arr = array();
        $cat_id1 = FaqRelatedCategory::where('cat_id1', $id)->get()->toArray();
        if(!empty($cat_id1)){
            foreach($cat_id1 as $cat){
                if($cat['cat_id1'] == $id){
                    $prev_rel_cat_arr[] = $cat['cat_id2'];
                }
            }
        }
        $cat_id2 = FaqRelatedCategory::where('cat_id2', $id)->get()->toArray();
        if(!empty($cat_id2)){
            foreach($cat_id2 as $cat){
                if($cat['cat_id2'] == $id){
                    $prev_rel_cat_arr[] = $cat['cat_id1'];
                }
            }
        }

        // dd($prev_rel_cat_arr);

        
        
        $rel_cat_ids = !empty($params['rel_cat_ids'])?$params['rel_cat_ids']:array();
        
            if(!empty($rel_cat_ids)){
                if(!empty($prev_rel_cat_arr)){
                    $deletablecatids = array_diff($prev_rel_cat_arr,$rel_cat_ids);
                    $addablecatids = array_diff($rel_cat_ids,$prev_rel_cat_arr);
                    FaqRelatedCategory::where(function($c1) use($id,$deletablecatids){
                        $c1->whereIn('cat_id1', $deletablecatids)->where('cat_id2', $id);
                    })->orWhere(function($c2) use ($id,$deletablecatids){
                        $c2->whereIn('cat_id2', $deletablecatids)->where('cat_id1', $id);
                    })->delete();
                    if(!empty($addablecatids)){
                        foreach($addablecatids as $item){
                            FaqRelatedCategory::insert([
                                'cat_id1' => $id,
                                'cat_id2' => $item
                            ]);
                        }
                    }

                } else {
                    
                    FaqRelatedCategory::where(function($c1) use($id){
                        $c1->where('cat_id1', $id)->orWhere('cat_id2', $id);
                    })->delete();

                }

                foreach($rel_cat_ids as $item){
                    FaqRelatedCategory::insert([
                        'cat_id1' => $id,
                        'cat_id2' => $item
                    ]);
                }

                
            
            

            }  else {
                FaqRelatedCategory::where(function($c1) use($id){
                    $c1->where('cat_id1', $id)->orWhere('cat_id2', $id);
                })->delete();
            }
        
        // if(!empty($rel_cat_ids)){
        //     foreach($rel_cat_ids as $cat){
        //         $checkExistsRel = FaqRelatedCategory::where(function($c1) use($cat,$id){
        //             $c1->where('cat_id1', $cat)->where('cat_id2', $id);
        //         })->orWhere(function($c2) use ($cat,$id){
        //             $c2->where('cat_id2', $cat)->where('cat_id1', $id);
        //         })->first();
        //         // $checkExistsRel = FaqRelatedCategory::where('cat_id1', $cat)->orWhere('cat_id2', $cat)->first();
        //         if(!empty($checkExistsRel)){
        //             echo $cat.'<br/>';
        //         } else {
        //             echo 'Deletable ids:- '.'<br/>';
        //             echo $cat.'<br/>';
        //         }
        //     }
        // }
        // dd($params);
        $collection = collect($params);
        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['title']));
        $faqCategory = FaqCategory::findOrFail($collection['id']);
        $faqCategory->title = $collection['title'];
        $faqCategory->slug = $slug;
        $faqCategory->description = $collection['description'];
        $faqCategory->meta_title = $collection['meta_title'];
        $faqCategory->meta_keywords = $collection['meta_keywords'];
        $faqCategory->meta_description = $collection['meta_description'];
        $faqCategory->save();

        $category_id = $faqCategory->id;
        if(count($params['faq_questions'])>0){
            DB::statement("delete from faqs where category_id='$category_id'");
            for($i=0;$i<count($params['faq_questions']);$i++){
                if($params['faq_questions'][$i]!=''){
                    $faq = new Faq;
                    $faq->category_id = $category_id;
                    $faq->question = $params['faq_questions'][$i];
                    $faq->answer = $params['faq_answers'][$i];
                    $faq->save();
                }
            }
        }

        

        if (!$faqCategory){
            return $this->responseRedirectBack('Error occurred while updating faq categories.', 'error', true, true);
        }
        return $this->responseRedirectBack('FAQ categories has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = FaqCategory::find($id)->delete();
        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting data.', 'error', true, true);
        }
        return $this->responseRedirect('admin.faq.index', 'Distributor deleted successfully' ,'success',false, false);
    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){
        $id = $request->id;
        $FaqCategory =  FaqCategory::findOrFail($id);
        $FaqCategory->status = $request->check_status;
        $status = $FaqCategory->save();
        if ($status) {
            return response()->json(array('message'=>'Status has been successfully updated'));
        }
    }

    public function details($id)
    {
        $faqCategory = FaqCategory::findOrFail($id);
        $faqs = FAQ::where('category_id',$id)->get();
        $this->setPageTitle('FAQ Category', 'FAQ Category Details : '.$faqCategory->title);
        return view('admin.faq.details', compact('faqCategory','faqs'));
    }

}

