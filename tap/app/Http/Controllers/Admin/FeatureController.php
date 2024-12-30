<?php



namespace App\Http\Controllers\Admin;



use App\Http\Controllers\BaseController;

use App\Http\Controllers\Controller;

use App\Models\Feature;

use App\Models\FeatureFaq;

use App\Models\FeatureDetail;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\File; 

use DB;



class FeatureController extends BaseController

{

	/**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function index(){



        $features = Feature::orderBy('id','desc')->get();



        $this->setPageTitle('Feature', 'List of all features');

        return view('admin.feature.index', compact('features'));

    }



    /**

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function create()

    {

        $this->setPageTitle('Feature', 'Create Feature');

        return view('admin.feature.create');

    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     * Arnab 24/6/2024
     */

    public function store(Request $request)  {

        $request->validate([
            'title' =>  'required',
            'detail.*.title' => 'required',
            'detail.*.sub_title' => 'required',
            'detail.*.description' => 'required',
            'detail.*.image' => 'required',
            'detail.*.button_name' => 'required',
            'detail.*.button_link' => 'required',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',
        ],[
            'title.required' => 'Title is required',
            'detail.*.title.required' => 'Title is required',
            'detail.*.sub_title.required' => 'Sub Title is required',
            'detail.*.description.required' => 'Description is required',
            'detail.*.image.required' => 'Image is required',
            'detail.*.button_name.required' => 'Button Name is required',
            'detail.*.button_link.required' => 'Button Link is required',
            'faq.*.question.required' => 'Question is required',
            'faq.*.answer.required' => 'Answer is required',
        ]);

        $params = $request->except('_token');
        // dd($params);
        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $params['title']));
        $feature = new Feature;

        $feature->title = $params['title'];
        $feature->slug = $slug;
        $feature->sub_title = $params['sub_title'];
        $feature->brief_description = $params['brief_description'];
        $feature->news_letter_section_title = $params['news_letter_section_title'];
        $feature->news_letter_section_sub_title = $params['news_letter_section_sub_title'];
        $feature->news_letter_section_button_name = $params['news_letter_section_button_name'];
        $feature->join_cummunity_section_title = $params['join_cummunity_section_title'];
        $feature->join_cummunity_section_sub_title = $params['join_cummunity_section_sub_title'];
        $feature->join_cummunity_section_brief_description = $params['join_cummunity_section_brief_description'];
        $feature->join_cummunity_section_button_name = $params['join_cummunity_section_button_name'];
        $feature->faq_section_title = $params['faq_section_title'];
        $feature->faq_section_sub_title = $params['faq_section_sub_title'];
        $feature->status = 1;
        $feature->save();
        $feature_id = $feature->id;

        $detail = $params['detail'];
        if(!empty($detail)){
            foreach($detail as $det){
                $featureDetail = new FeatureDetail;
                $featureDetail->feature_id = $feature_id;
                $featureDetail->title = $det['title'];
                $featureDetail->sub_title = $det['sub_title'];
                $featureDetail->description = $det['description'];
                $featureDetail->button_name = $det['button_name'];
                $featureDetail->button_link = $det['button_link'];
                /* Image Upload */
                $featureDetail->image = imageUpload($det['image'], 'features');
                /* ++++++++++++ */
                $featureDetail->save();
            }
        }

        $faq = $params['faq'];
        if(!empty($faq)){
            foreach($faq as $f){
                $featureFaq = new FeatureFaq;
                $featureFaq->feature_id = $feature_id;
                $featureFaq->question = $f['question'];
                $featureFaq->answer = $f['answer'];
                $featureFaq->save();
            }
        }

        return $this->responseRedirect('admin.feature.index', 'feature has been added successfully' ,'success',false, false);
    
    }
 

    public function store_old(Request $request)

    {

        $this->validate($request, [

            'title'     =>  'required',

        ]);



        $params = $request->except('_token');

        $collection = collect($params);



        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['title']));



        $feature = new Feature;

        $feature->title = $collection['title'];

        $feature->slug = $slug;

        $feature->sub_title = $collection['sub_title'];

        $feature->brief_description = $collection['brief_description'];

        $feature->news_letter_section_title = $collection['news_letter_section_title'];

        $feature->news_letter_section_sub_title = $collection['news_letter_section_sub_title'];

        $feature->news_letter_section_button_name = $collection['news_letter_section_button_name'];

        $feature->join_cummunity_section_title = $collection['join_cummunity_section_title'];

        $feature->join_cummunity_section_sub_title = $collection['join_cummunity_section_sub_title'];

        $feature->join_cummunity_section_brief_description = $collection['join_cummunity_section_brief_description'];

        $feature->join_cummunity_section_button_name = $collection['join_cummunity_section_button_name'];

        $feature->faq_section_title = $collection['faq_section_title'];

        $feature->faq_section_sub_title = $collection['faq_section_sub_title'];

        $feature->status = 1;



        $feature->save();



        $feature_id = $feature->id;



        if(count($params['feature_faq_questions'])>0){

            for($i=0;$i<count($params['feature_faq_questions']);$i++){

                if($params['feature_faq_questions'][$i]!=''){

                    $faq = new FeatureFaq;

                    $faq->feature_id = $feature_id;

                    $faq->question = $params['feature_faq_questions'][$i];

                    $faq->answer = $params['feature_faq_answers'][$i];



                    $faq->save();

                }

            }

        }



        if(count($params['feature_details_title'])>0){

            for($i=0;$i<count($params['feature_details_title']);$i++){

                if($params['feature_details_title'][$i]!=''){

                    $detail = new FeatureDetail;

                    $detail->feature_id = $feature_id;

                    $detail->title = $params['feature_details_title'][$i];

                    $detail->sub_title = $params['feature_details_sub_title'][$i];

                    $detail->description = $params['feature_details_description'][$i];

                    $detail->button_name = $params['feature_details_button_name'][$i];

                    $detail->button_link = $params['feature_details_button_link'][$i];



                    $detail->save();

                }

            }

        }



        if (!$feature) {

            return $this->responseRedirectBack('Error occurred while creating feature.', 'error', true, true);

        }

        return $this->responseRedirect('admin.feature.index', 'feature has been added successfully' ,'success',false, false);

    }


    /**

     * @param $id

     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

     */

    public function edit($id)

    {

        $feature = Feature::findOrFail($id);

        $faqs = FeatureFaq::where('feature_id',$id)->get();

        $details = FeatureDetail::where('feature_id',$id)->get();



        $this->setPageTitle('Feature', 'Edit Feature : '.$feature->title);

        return view('admin.feature.edit', compact('feature','faqs','details'));

    }



    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */

    /**
     * @param Request $request
     * Edit 
     * Arnab 25/6/2024
     */

    public function update(Request $request)
    {
        $request->validate([
            'title' =>  'required',
            'detail.*.title' => 'required',
            'detail.*.sub_title' => 'required',
            'detail.*.description' => 'required',
            'detail.*.button_name' => 'required',
            'detail.*.button_link' => 'required',
            'faq.*.question' => 'required',
            'faq.*.answer' => 'required',
        ],[
            'title.required' => 'Title is required',
            'detail.*.title.required' => 'Title is required',
            'detail.*.sub_title.required' => 'Sub Title is required',
            'detail.*.description.required' => 'Description is required',
            'detail.*.image.required' => 'Image is required',
            'detail.*.button_name.required' => 'Button Name is required',
            'detail.*.button_link.required' => 'Button Link is required',
            'faq.*.question.required' => 'Question is required',
            'faq.*.answer.required' => 'Answer is required',
        ]);

        $params = $request->except('_token');
        // dd($params);
        $feature_id = $params['id'];
        $feature = Feature::findOrFail($feature_id);
        $feature->sub_title = $params['sub_title'];
        $feature->brief_description = $params['brief_description'];
        $feature->news_letter_section_title = $params['news_letter_section_title'];
        $feature->news_letter_section_sub_title = $params['news_letter_section_sub_title'];
        $feature->news_letter_section_button_name = $params['news_letter_section_button_name'];
        $feature->join_cummunity_section_title = $params['join_cummunity_section_title'];
        $feature->join_cummunity_section_sub_title = $params['join_cummunity_section_sub_title'];
        $feature->join_cummunity_section_brief_description = $params['join_cummunity_section_brief_description'];
        $feature->join_cummunity_section_button_name = $params['join_cummunity_section_button_name'];
        $feature->faq_section_title = $params['faq_section_title'];
        $feature->faq_section_sub_title = $params['faq_section_sub_title'];
        $feature->save();

        $newDetailIds = array();

        $detail = $params['detail'];
        foreach($detail as $det) {
            $newDetailIds[] = $det['feature_details_id'];     
        }

        $existingDetail = FeatureDetail::where('feature_id', $feature_id)->get()->toArray();
        foreach($existingDetail as $exDet){
            if(!in_array($exDet['id'], $newDetailIds)){
                /* Unlink Image */
                if (File::exists($exDet['image'])) {
                    unlink($exDet['image']);
                } 
                FeatureDetail::where('id', $exDet['id'])->delete();
            }
        }

        // dd($detail);

        foreach($detail as $det){
            if(!empty($det['feature_details_id'])){
                $featureDetailOld = FeatureDetail::where('feature_id', $feature_id)->where('id', $det['feature_details_id'])->first();
                $newImage = $featureDetailOld->image;
                if(!empty($det['image'])){                    
                    if (File::exists($featureDetailOld->image)) {
                        unlink($featureDetailOld->image);
                        
                    }  
                    
                    $newImage = imageUpload($det['image'], 'features');
                } 
                // dd($det['description']);

                $featureData = FeatureDetail::findOrFail($det['feature_details_id']);
                // dd($featureData);
                $featureData->title = $det['title'];
                $featureData->sub_title = $det['sub_title'];
                $featureData->description = $det['description'];
                $featureData->button_name = $det['button_name'];
                $featureData->button_link = $det['button_link'];
                $featureData->image = $newImage;
                $featureData->save();
                


            } else {
                $featureDetailNew = new FeatureDetail;
                $featureDetailNew->feature_id = $feature_id;
                $featureDetailNew->title = $det['title'];
                $featureDetailNew->sub_title = $det['sub_title'];
                $featureDetailNew->description = $det['description'];
                $featureDetailNew->button_name = $det['button_name'];
                $featureDetailNew->button_link = $det['button_link'];
                /* Image Upload */
                if(!empty($det['image'])){
                    $featureDetailNew->image = imageUpload($det['image'], 'features');
                }                
                /* ++++++++++++ */
                $featureDetailNew->save();
            }
        }

        $newFaqIds = array();
        $faq = $params['faq'];
        if(!empty($faq)){
            foreach($faq as $f){
                $newFaqIds[] = $f['feature_faq_id'];                             
            }
        } 
        $existingFaq = FeatureFaq::where('feature_id', $feature_id)->get()->toArray();
        foreach($existingFaq as $exFaq){
            if(!in_array($exFaq['id'], $newFaqIds)){
                FeatureFaq::where('id', $exFaq['id'])->delete();
            }
        }

        if(!empty($faq)){
            foreach($faq as $f){
                if(!empty($f['feature_faq_id'])){                    
                    FeatureFaq::where('id', $f['feature_faq_id'])->update([
                        'question' => $f['question'],
                        'answer' => $f['answer']
                    ]);    
                } else {
                    $featureFaqNew = new FeatureFaq;
                    $featureFaqNew->feature_id = $feature_id;
                    $featureFaqNew->question = $f['question'];
                    $featureFaqNew->answer = $f['answer'];
                    $featureFaqNew->save();
                }   
            }
        }
         
        return $this->responseRedirectBack('feature has been updated successfully' ,'success',false, false);
 
    }


    public function update_old(Request $request)

    {

        $this->validate($request, [

            'title'     =>  'required',

            

        ]);



        $params = $request->except('_token');

        $collection = collect($params);



        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['title']));



        $feature = Feature::findOrFail($collection['id']);

        $feature->title = $collection['title'];

        $feature->slug = $slug;

        $feature->sub_title = $collection['sub_title'];

        $feature->brief_description = $collection['brief_description'];

        $feature->news_letter_section_title = $collection['news_letter_section_title'];

        $feature->news_letter_section_sub_title = $collection['news_letter_section_sub_title'];

        $feature->news_letter_section_button_name = $collection['news_letter_section_button_name'];

        $feature->join_cummunity_section_title = $collection['join_cummunity_section_title'];

        $feature->join_cummunity_section_sub_title = $collection['join_cummunity_section_sub_title'];

        $feature->join_cummunity_section_brief_description = $collection['join_cummunity_section_brief_description'];

        $feature->join_cummunity_section_button_name = $collection['join_cummunity_section_button_name'];

        $feature->faq_section_title = $collection['faq_section_title'];

        $feature->faq_section_sub_title = $collection['faq_section_sub_title'];

        $feature->status = 1;



        $feature->save();



        $feature_id = $feature->id;



        if(count($params['feature_faq_questions'])>0){

            DB::statement("delete from feature_faqs where feature_id='$feature_id'");

            for($i=0;$i<count($params['feature_faq_questions']);$i++){

                if($params['feature_faq_questions'][$i]!=''){

                    $faq = new FeatureFaq;

                    $faq->feature_id = $feature_id;

                    $faq->question = $params['feature_faq_questions'][$i];

                    $faq->answer = $params['feature_faq_answers'][$i];



                    $faq->save();

                }

            }

        }



        if(count($params['feature_details_title'])>0){

            DB::statement("delete from feature_details where feature_id='$feature_id'");

            for($i=0;$i<count($params['feature_details_title']);$i++){

                if($params['feature_details_title'][$i]!=''){

                    $detail = new FeatureDetail;

                    $detail->feature_id = $feature_id;

                    $detail->title = $params['feature_details_title'][$i];

                    $detail->sub_title = $params['feature_details_sub_title'][$i];

                    $detail->description = $params['feature_details_description'][$i];

                    $detail->button_name = $params['feature_details_button_name'][$i];

                    $detail->button_link = $params['feature_details_button_link'][$i];



                    $detail->save();

                }

            }

        }

        if (!$feature) {

            return $this->responseRedirectBack('Error occurred while updating feature.', 'error', true, true);

        }

        return $this->responseRedirectBack('feature has been updated successfully' ,'success',false, false);

    }



    /**

     * @param $id

     * @return \Illuminate\Http\RedirectResponse

     */

    public function delete($id)

    {

        $response = Feature::find($id)->delete();



        if (!$response) {

            return $this->responseRedirectBack('Error occurred while deleting data.', 'error', true, true);

        }

        return $this->responseRedirect('admin.feature.index', 'Feature deleted successfully' ,'success',false, false);

    }



    /**

     * @param Request $request

     * @return \Illuminate\Http\RedirectResponse

     * @throws \Illuminate\Validation\ValidationException

     */

    public function updateStatus(Request $request){



        $id = $request->id;

        $feature =  Feature::findOrFail($id);



        $feature->status = $request->check_status;

        $status = $feature->save();



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

