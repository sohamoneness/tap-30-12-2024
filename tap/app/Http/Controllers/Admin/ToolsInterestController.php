<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Auth;
use Session;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ToolAreaofInterest;
use App\Models\ToolAreaofInterestCategory;
use App\Models\ToolSubCategory;
use App\Models\ToolBenefit;
use App\Models\ToolHowToUse;
use App\Models\ToolUseCase;
use App\Models\ToolIntegrationCompatibility;
use App\Models\ToolPlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File; 
use Carbon\Carbon;
use Illuminate\Support\Facades\Session as FacadesSession;
class ToolsInterestController extends BaseController
{
    public function index(Request $request){
        if (!empty($request->term)) {
            $data = ToolAreaofInterest::where([['title', 'LIKE', '%' . $request->term . '%']])->paginate(25);
        } else {
            $data= ToolAreaofInterest::paginate(25);
        }
        $this->setPageTitle('Tools', 'Tools');
        return view('admin.tool.interest.index',compact('data'));
    }
    public function create(Request $request){
        $categories = ToolAreaofInterestCategory::where('status',1)->get();
        $subcategories = ToolSubCategory::all();
        $this->setPageTitle('Tools', 'Tools');
        return view('admin.tool.interest.create',compact('categories','subcategories'));
    }
    public function store(Request $request)
    {
       //dd($request->all());
        $this->validate($request, [
            'title'      =>  'required',
            'benefits.*.title' => 'required|max:120',
            'benefits.*.description' => 'required|max:500',
            'usecases.*.title' => 'required|max:120',
            'usecases.*.description' => 'required|max:500',
            'usecases.*.url' => 'required',
            'howtouses.*.title' => 'required|max:120',
            'howtouses.*.description' => 'required|max:500',
            'integration_compatibilities.*.title' => 'required|max:120',
            'integration_compatibilities.*.description' => 'required|max:500',
            'plans.*.title' => 'required|max:50',
            'plans.*.short_description' => 'required',
            'plans.*.long_description' => 'nullable',
            'plans.*.link' => 'required',
            'plans.*.amount' => 'required',
        ],[
            'benefits.*.title.required' => 'Title is required',
            'benefits.*.title.max' => 'Title is maximum 120 characters',
            'benefits.*.description.required' => 'Description is required',
            'benefits.*.description.max' => 'Description is maximum 500 characters',
            'usecases.*.title.required' => 'Title is required',
            'usecases.*.title.max' => 'Title is maximum 120 characters',
            'usecases.*.description.required' => 'Description is required',
            'usecases.*.description.max' => 'Description is maximum 500 characters',
            'usecases.*.url.required' => 'Url is required',
            'howtouses.*.title.required' => 'Title is required',
            'howtouses.*.title.max' => 'Title is maximum 120 characters',
            'howtouses.*.description.required' => 'Description is required',
            'howtouses.*.description.max' => 'Description is maximum 500 characters',
            'integration_compatibilities.*.title.required' => 'Title is required',
            'integration_compatibilities.*.title.max' => 'Title max 120 characters',
            'integration_compatibilities.*.description.required' => 'Description is required',
            'integration_compatibilities.*.description.max' => 'Description max 500 characters',
        ]);
        $data = new ToolAreaofInterest;
        $data->title = !empty($request->title) ? $request->title : '';
        $data->cat_id = !empty($request->cat_id) ? $request->cat_id : '';
        $data->slug = slugGenerate($request['title'], 'tool_areaof_interests');
        $data->description = !empty($request->description) ? $request->description : '';
        if(!empty($request['image'])){
            // image, folder name only
            $data->image = imageUpload($request['image'], 'areaofinterest');
        }
        $data->save();

        $params = $request->except('_token');
        $tool_id = $data->id;
        
        DB::beginTransaction();
        try {
            // ++++++++++++++++ Save Benefits... +++++++++++++++ //
            
            $benefits = $params['benefits'];            
            foreach($benefits as $benefit){                
                $toolBenefitNew = new ToolBenefit;
                $toolBenefitNew->tool_id = $tool_id;
                $toolBenefitNew->title = $benefit['title'];
                $toolBenefitNew->description = $benefit['description'];                
                $toolBenefitNew->save();                
            }

            // ++++++++++++++++ Save Use Cases... +++++++++++++++ //
            
            $usecases = $params['usecases'];            
            foreach($usecases as $usecase){                
                $toolUseCaseNew = new ToolUseCase;
                $toolUseCaseNew->tool_id = $tool_id;
                $toolUseCaseNew->title = $usecase['title'];
                $toolUseCaseNew->description = $usecase['description'];                
                $toolUseCaseNew->url = $usecase['url'];                
                $toolUseCaseNew->save();                
            }

            // ++++++++++++++++ Save How To Use +++++++++++++++ //

            $howtouses = $params['howtouses'];            
            foreach($howtouses as $howtouse){                
                $howtouseNew = new ToolHowToUse;
                $howtouseNew->tool_id = $tool_id;
                $howtouseNew->title = $howtouse['title'];
                $howtouseNew->description = $howtouse['description'];
                /* Image Upload */
                if(!empty($howtouse['icon'])){
                    $howtouseNew->icon = imageUpload($howtouse['icon'], 'tools');
                }                
                /* ++++++++++++ */
                $howtouseNew->save();                
            }

            // ++++++++++++++++ Save Integration Compatibilities ... +++++++++++++++ //
            
            $integration_compatibilities = $params['integration_compatibilities'];            
            foreach($integration_compatibilities as $compatibility){                
                $toolCompatibilityNew = new ToolIntegrationCompatibility;
                $toolCompatibilityNew->tool_id = $tool_id;
                $toolCompatibilityNew->title = $compatibility['title'];
                $toolCompatibilityNew->description = $compatibility['description'];    
                // dd($toolCompatibilityNew);
                $toolCompatibilityNew->save();                
            }


            // ++++++++++++++++ Save Plans... +++++++++++++++ //
            
            $plans = $params['plans'];            
            foreach($plans as $plan){                
                $toolPlanNew = new ToolPlan;
                $toolPlanNew->tool_id = $tool_id;
                $toolPlanNew->title = $plan['title'];
                $toolPlanNew->short_description = $plan['short_description'];
                $toolPlanNew->long_description = $plan['long_description'];
                $toolPlanNew->amount = $plan['amount'];
                $toolPlanNew->link = $plan['link'];               
                $toolPlanNew->save();                
            }

            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }




        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating Tools.', 'error', true, true);
        }
        return $this->responseRedirectBack('Tools has been updated successfully', 'success', false, false);
    }
     /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data= ToolAreaofInterest::findOrfail($id);
        $categories = ToolAreaofInterestCategory::where('status',1)->get();
        $subcategories = ToolSubCategory::all();

        $benefits = ToolBenefit::where('tool_id', $id)->get();
        $howtouses = ToolHowToUse::where('tool_id', $id)->get();
        $usecases = ToolUseCase::where('tool_id', $id)->get();
        $integration_compatibilities = ToolIntegrationCompatibility::where('tool_id', $id)->get();
        $plans = ToolPlan::where('tool_id', $id)->get();

        // dd($usecases);

        $this->setPageTitle('Tools', 'Edit Tools : ');
        return view('admin.tool.interest.edit', compact('data','categories','subcategories','benefits','howtouses','usecases','integration_compatibilities','plans'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
       //dd($request->all());
        $this->validate($request, [
            'title'      =>  'required',
            'benefits.*.title' => 'required|max:120',
            'benefits.*.description' => 'required|max:500',
            'usecases.*.title' => 'required|max:120',
            'usecases.*.description' => 'required|max:500',
            'usecases.*.url' => 'required',
            'howtouses.*.title' => 'required|max:120',
            'howtouses.*.description' => 'required|max:500',
            'integration_compatibilities.*.title' => 'required|max:120',
            'plans.*.title' => 'required|max:50',
            'plans.*.short_description' => 'required',
            'plans.*.long_description' => 'nullable',
            'plans.*.link' => 'required',
            'plans.*.amount' => 'required',
            
        ],[
            'benefits.*.title.required' => 'Title is required',
            'benefits.*.title.max' => 'Title is maximum 120 characters',
            'benefits.*.description.required' => 'Description is required',
            'benefits.*.description.max' => 'Description is maximum 500 characters',
            'usecases.*.title.required' => 'Title is required',
            'usecases.*.title.max' => 'Title is maximum 120 characters',
            'usecases.*.description.required' => 'Description is required',
            'usecases.*.description.max' => 'Description is maximum 500 characters',
            'usecases.*.url.required' => 'Url is required',
            'howtouses.*.title.required' => 'Title is required',
            'howtouses.*.title.max' => 'Title is maximum 120 characters',
            'howtouses.*.description.required' => 'Description is required',
            'howtouses.*.description.max' => 'Description is maximum 500 characters',
            'integration_compatibilities.*.title.required' => 'Title is required',
            'integration_compatibilities.*.title.max' => 'Title max 120 characters',
        ]);

        $data = ToolAreaofInterest::findOrFail($request->id);
        $data->title = !empty($request->title) ? $request->title : '';
        $data->cat_id = !empty($request->cat_id) ? $request->cat_id : '';
        if($data->title != $request['title']) {
        $data->slug = slugGenerate($request['title'], 'tool_areaof_interests');
        }
        $data->description = !empty($request->description) ? $request->description : '';
        if(!empty($request['image'])){
            // image, folder name only
            $data->image = imageUpload($request['image'], 'areaofinterest');
        }
        $data->save();
        $tool_id = $request->id;

        $params = $request->except('_token');
        
        DB::beginTransaction();
        try {
            // ++++++++++++++++ Save Benefits... +++++++++++++++ //
            $tool_benefit_ids = array();
            $benefits = $params['benefits'];
            foreach($benefits as $benefit) {
                $tool_benefit_ids[] = $benefit['tool_benefit_id'];     
            }
            $existingBenefit = ToolBenefit::where('tool_id', $tool_id)->get()->toArray();
            foreach($existingBenefit as $exBen){
                if(!in_array($exBen['id'], $tool_benefit_ids)){                
                    ToolBenefit::where('id', $exBen['id'])->delete();
                }
            }
            // dd($detail);
            foreach($benefits as $benefit){
                if(!empty($benefit['tool_benefit_id'])){
                    
                    $toolBenefitData = ToolBenefit::findOrFail($benefit['tool_benefit_id']);
                    
                    $toolBenefitData->title = $benefit['title'];
                    $toolBenefitData->description = $benefit['description'];
                    // dd($toolBenefitData);
                    $toolBenefitData->save();

                } else {
                    $toolBenefitNew = new ToolBenefit;
                    $toolBenefitNew->tool_id = $tool_id;
                    $toolBenefitNew->title = $benefit['title'];
                    $toolBenefitNew->description = $benefit['description'];                
                    $toolBenefitNew->save();
                }
            }

            // ++++++++++++++++ Save Use Cases... +++++++++++++++ //
            $tool_usecase_ids = array();
            $usecases = $params['usecases'];
            foreach($usecases as $usecase) {
                $tool_usecase_ids[] = $usecase['tool_usecase_id'];     
            }
            $existingUseCases = ToolUseCase::where('tool_id', $tool_id)->get()->toArray();
            foreach($existingUseCases as $exUseCs){
                if(!in_array($exUseCs['id'], $tool_usecase_ids)){                
                    ToolUseCase::where('id', $exUseCs['id'])->delete();
                }
            }
            foreach($usecases as $usecase){
                if(!empty($usecase['tool_usecase_id'])){
                                     
                    $toolUseCaseData = ToolUseCase::findOrFail($usecase['tool_usecase_id']);
                    $toolUseCaseData->title = $usecase['title'];
                    $toolUseCaseData->description = $usecase['description'];
                    $toolUseCaseData->url = $usecase['url'];
                    $toolUseCaseData->save();
                } else {
                    $toolUseCaseNew = new ToolUseCase;
                    $toolUseCaseNew->tool_id = $tool_id;
                    $toolUseCaseNew->title = $usecase['title'];
                    $toolUseCaseNew->description = $usecase['description'];                
                    $toolUseCaseNew->url = $usecase['url'];                
                    $toolUseCaseNew->save();
                }
            }

            // ++++++++++++++++ Save How To Use +++++++++++++++ //

            $tool_howtouse_ids = array();
            $howtouses = $params['howtouses'];
            // dd($howtouses);
            foreach($howtouses as $howtouse) {
                $tool_howtouse_ids[] = $howtouse['tool_howtouse_id'];     
            }
            $existingHowtouses = ToolHowToUse::where('tool_id', $tool_id)->get()->toArray();
            foreach($existingHowtouses as $exHowtouse){
                if(!in_array($exHowtouse['id'], $tool_howtouse_ids)){    
                    /* Unlink icon */
                    if (File::exists($exHowtouse['icon'])) {
                        unlink($exHowtouse['icon']);
                    }             
                    ToolHowToUse::where('id', $exHowtouse['id'])->delete();
                }
            }
            foreach($howtouses as $howtouse){
                if(!empty($howtouse['tool_howtouse_id'])){
                    $howtouseOld = ToolHowToUse::where('tool_id', $tool_id)->where('id', $howtouse['tool_howtouse_id'])->first();  
                    $newIcon = $howtouseOld->icon;
                    if(!empty($howtouse['icon'])){                    
                        if (File::exists($howtouseOld->icon)) {
                            unlink($howtouseOld->icon);                            
                        }                        
                        $newIcon = imageUpload($howtouse['icon'], 'tools');
                    } 
                    $howtouseData = ToolHowToUse::findOrFail($howtouse['tool_howtouse_id']);
                    // dd($howtouseData);
                    $howtouseData->title = $howtouse['title'];
                    $howtouseData->description = $howtouse['description'];
                    $howtouseData->icon = $newIcon;
                    $howtouseData->save();
                } else {
                    $howtouseNew = new ToolHowToUse;
                    $howtouseNew->tool_id = $tool_id;
                    $howtouseNew->title = $howtouse['title'];
                    $howtouseNew->description = $howtouse['description'];
                    /* Image Upload */
                    if(!empty($howtouse['icon'])){
                        $howtouseNew->icon = imageUpload($howtouse['icon'], 'tools');
                    }                
                    /* ++++++++++++ */
                    $howtouseNew->save();
                }
            }

            // ++++++++++++++++ Save Integration Compatibilities ... +++++++++++++++ //
            $tool_com_ids = array();
            $integration_compatibilities = $params['integration_compatibilities'];
            // dd($integration_compatibilities);
            foreach($integration_compatibilities as $compatibility) {
                $tool_com_ids[] = $compatibility['tool_compatibility_id'];     
            }
            $existingComp = ToolIntegrationCompatibility::where('tool_id', $tool_id)->get()->toArray();
            foreach($existingComp as $exCom){
                if(!in_array($exCom['id'], $tool_com_ids)){                
                    ToolIntegrationCompatibility::where('id', $exCom['id'])->delete();
                }
            }
            // dd($detail);
            foreach($integration_compatibilities as $compatibility){
                if(!empty($compatibility['tool_compatibility_id'])){
                    
                    $toolCompatibilityData = ToolIntegrationCompatibility::findOrFail($compatibility['tool_compatibility_id']);
                    $toolCompatibilityData->title = $compatibility['title'];
                    $toolCompatibilityData->description = $compatibility['description'];
                    $toolCompatibilityData->save();
                } else {
                    // dd('hi');
                    $toolCompatibilityNew = new ToolIntegrationCompatibility;
                    $toolCompatibilityNew->tool_id = $tool_id;
                    $toolCompatibilityNew->title = $compatibility['title'];
                    $toolCompatibilityNew->description = $compatibility['description'];    
                    // dd($toolCompatibilityNew);
                    $toolCompatibilityNew->save();
                }
            }

            // ++++++++++++++++ Save Plans... +++++++++++++++ //
            $tool_plan_ids = array();
            $plans = $params['plans'];
            // dd($plans);
            foreach($plans as $plan) {
                $tool_plan_ids[] = $plan['tool_plan_id'];     
            }
            $existingBenefit = ToolPlan::where('tool_id', $tool_id)->get()->toArray();
            foreach($existingBenefit as $exBen){
                if(!in_array($exBen['id'], $tool_plan_ids)){                
                    ToolPlan::where('id', $exBen['id'])->delete();
                }
            }
            // dd($detail);
            foreach($plans as $plan){
                if(!empty($plan['tool_plan_id'])){
                    
                    $toolPlanData = ToolPlan::findOrFail($plan['tool_plan_id']);
                    
                    $toolPlanData->title = $plan['title'];
                    $toolPlanData->short_description = $plan['short_description'];
                    $toolPlanData->long_description = $plan['long_description'];
                    $toolPlanData->amount = $plan['amount'];
                    $toolPlanData->link = $plan['link'];
                    $toolPlanData->save();

                } else {
                    $toolPlanNew = new ToolPlan;
                    $toolPlanNew->tool_id = $tool_id;
                    $toolPlanNew->title = $plan['title'];
                    $toolPlanNew->short_description = $plan['short_description'];
                    $toolPlanNew->long_description = $plan['long_description'];
                    $toolPlanNew->amount = $plan['amount'];
                    $toolPlanNew->link = $plan['link'];               
                    $toolPlanNew->save();
                }
            }




            DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
        }





        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating Tools.', 'error', true, true);
        }
        return $this->responseRedirectBack('Tools has been updated successfully', 'success', false, false);
    }
     /**
     * @param $id
     * @return bool|mixed
     */
    public function delete(Request $request,$id)
    {
        $data = ToolAreaofInterest::findOrFail($id);
        $data->delete();
        if (!$data) {
        return $this->responseRedirectBack('Error occurred while deleting Tools.', 'error', true, true);
        }
        return $this->responseRedirectBack('Tools has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateStatus(Request $request){
        $data = ToolAreaofInterest::findOrFail($request->id);
        $collection = collect($request)->except('_token');
        $data->status = $request['check_status'];
        $data->save();

        return $data;
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function details($id)
    {
        $home= ToolAreaofInterest::where('id',$id)->get();
        $data = $home[0];
        $this->setPageTitle('Tools Details', 'Tools Details : ' . $data->title);
        return view('admin.tool.interest.details', compact('data'));
    }

    public function csvStore(Request $request)
    {
        if (!empty($request->file)) {
            // if ($request->input('submit') != null ) {
            $file = $request->file('file');
            // File Details
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();

            // Valid File Extensions
            $valid_extension = array("csv");
            // 50MB in Bytes
            $maxFileSize = 50097152;
            // Check file extension
            if (in_array(strtolower($extension), $valid_extension)) {
                // Check file size
                if ($fileSize <= $maxFileSize) {
                    // File upload location
                    $location = 'admin/uploads/csv';
                    // Upload file
                    $file->move($location, $filename);
                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);
                    // Reading file
                    $file = fopen($filepath, "r");
                    $importData_arr = array();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 10000, ",")) !== FALSE) {
                        $num = count($filedata);
                        // Skip first row
                        if ($i == 0) {
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);

                    // echo '<pre>';print_r($importData_arr);exit();

                    // Insert into database



                    foreach ($importData_arr as $importData) {

                        $commaSeperatedCats = '';
                        $commaSeperatedSubCats = '';

                            $catExistCheck = ToolAreaofInterestCategory::where('title', $importData[0])->first();
                            if ($catExistCheck) {
                                $insertDirCatId = $catExistCheck->id;
                                $commaSeperatedCats = $insertDirCatId;
                            } else {
                                $dirCat = new ToolAreaofInterestCategory();
                                $dirCat->title = $importData[0];
                                $dirCat->slug = null;
                                $dirCat->save();
                                $insertDirCatId = $dirCat->id;

                                $commaSeperatedCats= $insertDirCatId;
                            }
                            $subcatExistCheck = ToolSubCategory::where('title', $importData[1])->first();
                            if ($subcatExistCheck) {
                                $insertDirSubCatId = $subcatExistCheck->id;
                                $commaSeperatedSubCats = $insertDirSubCatId;
                            } else {
                                $dirSubCat = new ToolSubCategory();
                                $dirSubCat->title = $importData[1];
                                $dirSubCat->slug = null;
                                $dirSubCat->save();
                                $insertDirSubCatId = $dirSubCat->id;

                                $commaSeperatedSubCats= $insertDirSubCatId;
                            }
                            $count = 0;
                            $count = $total = 0;
                            $successArr = $failureArr = [];



                        if (!empty($importData[2])) {
                            // dd($importData[0]);
                            $titleArr = explode(',', $importData[2]);

                            // echo '<pre>';print_r($titleArr);exit();

                            foreach ($titleArr as $titleKey => $titleValue) {
                                // slug generate
                                $slug = Str::slug($titleValue, '-');
                                $slugExistCount = DB::table('tool_areaof_interests')->where('title', $titleValue)->count();
                                if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);

                                $insertData = array(
                                    "cat_id" => isset($commaSeperatedCats) ? $commaSeperatedCats : null,
                                    "sub_cat_id" => isset($commaSeperatedSubCats) ? $commaSeperatedSubCats : null,
                                    "title" => $titleValue,
                                    "description" => isset($importData[3]) ? $importData[3] : null,
                                    "feature" => isset($importData[4]) ? $importData[4] : null,
                                    "pros" => isset($importData[5]) ? $importData[5] : null,
                                    "cons" => isset($importData[6]) ? $importData[6] : null,
                                    "price" => isset($importData[7]) ? $importData[7] : null,
                                    "link" => isset($importData[8]) ? $importData[8] : null,
                                    "affiliate_programme" => isset($importData[9]) ? $importData[9] : null,
                                    "affiliate_programme_link" => isset($importData[10]) ? $importData[10] : null,
                                    "slug" => $slug,
                                    "status" => 1,
                                    "created_at" => Carbon::now(),
                                    "updated_at"=> now(),

                                );

                                $resp =ToolAreaofInterest::insertData($insertData, $count,$successArr,$failureArr);
                                $count = $resp['count'];
                                $successArr = $resp['successArr'];
                                $failureArr = $resp['failureArr'];
                                $total++;
                            }
                        }
                    }
                    //Session::flash('message', 'Import Successful.');
                        if($count==0){
                            FacadesSession::flash('csv', 'Already Uploaded. ');
                        }
                        else{
                             FacadesSession::flash('csv', 'Import Successful. '.$count.' Data Uploaded');
                        }
                } else {
                    FacadesSession::flash('message', 'File too large. File must be less than 50MB.');
                }
            } else {
                FacadesSession::flash('message', 'Invalid File Extension. supported extensions are ' . implode(', ', $valid_extension));
            }
        } else {
            FacadesSession::flash('message', 'No file found.');
        }
        return redirect()->route('admin.tools.AreaOfInterest.index');
    }
    // csv export

    public function export()
    {
        return Excel::download(new ToolExport, 'tool.xlsx');
    }
}
