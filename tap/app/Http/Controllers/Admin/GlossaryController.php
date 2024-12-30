<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\GlossaryType;
use App\Models\Glossary;
use App\Models\GlossaryScenario;
use Illuminate\Http\Request;
use DB;

class GlossaryController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $glossaries = Glossary::with('type')->orderBy('id','desc')->get();

        $this->setPageTitle('Glossary', 'List of all Glossary');
        return view('admin.glossary.index', compact('glossaries'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $glossaryTypes = GlossaryType::orderBy('id','desc')->get();

        $this->setPageTitle('Glossary', 'Create Glossary');
        return view('admin.glossary.create',compact('glossaryTypes'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'term'     =>  'required',
        ]);

        $params = $request->except('_token');
        $collection = collect($params);

        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['term']));

        $glossary = new Glossary;
        $glossary->type_id = $collection['type_id'];
        $glossary->term = $collection['term'];
        $glossary->definition = $collection['definition'];
        $glossary->description = $collection['description'];
        $glossary->frequency_of_use = $collection['frequency_of_use'];
        $glossary->frequency_description = $collection['frequency_description'];
        $glossary->importance_of_term = $collection['importance_of_term'];
        $glossary->importance_description = $collection['importance_description'];
        $glossary->slug = $slug;
        $glossary->meta_title = $collection['meta_title'];
        $glossary->meta_keywords = $collection['meta_keywords'];
        $glossary->meta_description = $collection['meta_description'];
        $glossary->status = 1;

        $glossary->save();

        $glossary_id = $glossary->id;

        if(count($params['scenario'])>0){
            for($i=0;$i<count($params['scenario']);$i++){
                if($params['scenario'][$i]!=''){
                    $glossaryScenario = new GlossaryScenario;
                    $glossaryScenario->glossary_id = $glossary_id;
                    $glossaryScenario->scenario = $params['scenario'][$i];
                    $glossaryScenario->explanation = $params['explanation'][$i];

                    $glossaryScenario->save();
                }
            }
        }

        if (!$glossary) {
            return $this->responseRedirectBack('Error occurred while creating Glossary.', 'error', true, true);
        }
        return $this->responseRedirect('admin.glossary.index', 'Glossary added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $glossary = Glossary::findOrFail($id);
        $glossaryTypes = GlossaryType::orderBy('id','desc')->get();
        $glossaryScenarios = GlossaryScenario::where('glossary_id',$id)->get();
        
        $this->setPageTitle('Glossary', 'Edit Glossary : '.$glossary->title);
        return view('admin.glossary.edit', compact('glossary','glossaryTypes','glossaryScenarios'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'term'     =>  'required',
            
        ]);

        $params = $request->except('_token');
        $collection = collect($params);

        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['term']));

        $glossary = Glossary::findOrFail($collection['id']);
        $glossary->type_id = $collection['type_id'];
        $glossary->term = $collection['term'];
        $glossary->definition = $collection['definition'];
        $glossary->description = $collection['description'];
        $glossary->slug = $slug;
        $glossary->meta_title = $collection['meta_title'];
        $glossary->meta_keywords = $collection['meta_keywords'];
        $glossary->meta_description = $collection['meta_description'];
        $glossary->frequency_of_use = $collection['frequency_of_use'];
        $glossary->frequency_description = $collection['frequency_description'];
        $glossary->importance_of_term = $collection['importance_of_term'];
        $glossary->importance_description = $collection['importance_description'];

        $glossary->save();
        
        $glossary_id = $glossary->id;

        if(count($params['scenario'])>0){
            DB::statement("delete from glossary_scenarios where glossary_id=$glossary_id");
            for($i=0;$i<count($params['scenario']);$i++){
                if($params['scenario'][$i]!=''){
                    $glossaryScenario = new GlossaryScenario;
                    $glossaryScenario->glossary_id = $glossary_id;
                    $glossaryScenario->scenario = $params['scenario'][$i];
                    $glossaryScenario->explanation = $params['explanation'][$i];

                    $glossaryScenario->save();
                }
            }
        }

        if (!$glossary) {
            return $this->responseRedirectBack('Error occurred while updating Glossary.', 'error', true, true);
        }
        return $this->responseRedirectBack('Glossary has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = Glossary::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting data.', 'error', true, true);
        }
        return $this->responseRedirect('admin.glossary.index', 'Glossary has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $glossaryType =  Glossary::findOrFail($id);

        $glossaryType->status = $request->check_status;
        $status = $glossaryType->save();

        if ($status) {
            return response()->json(array('message'=>'Status has been successfully updated'));
        }
    }

    public function details($id)
    {
        $glossary = Glossary::findOrFail($id);
        $faqs = FAQ::where('category_id',$id)->get();

        $this->setPageTitle('Glossary', 'Glossary Details : '.$glossary->title);
        return view('admin.glossary.details', compact('glossary','faqs'));
    }
}
