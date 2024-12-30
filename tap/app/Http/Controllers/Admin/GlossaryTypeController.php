<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\GlossaryType;
use Illuminate\Http\Request;
use DB;

class GlossaryTypeController extends BaseController
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){

        $glossaryTypes = GlossaryType::orderBy('id','desc')->get();

        $this->setPageTitle('Glossary Types', 'List of all glossary types');
        return view('admin.glossarytype.index', compact('glossaryTypes'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Glossary Type', 'Create Glossary Type');
        return view('admin.glossarytype.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'     =>  'required',
        ]);

        $params = $request->except('_token');
        $collection = collect($params);

        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['title']));

        $glossaryType = new GlossaryType;
        $glossaryType->title = $collection['title'];
        $glossaryType->slug = $slug;
        $glossaryType->meta_title = $collection['meta_title'];
        $glossaryType->meta_keywords = $collection['meta_keywords'];
        $glossaryType->meta_description = $collection['meta_description'];
        $glossaryType->status = 1;

        $glossaryType->save();

        if (!$glossaryType) {
            return $this->responseRedirectBack('Error occurred while creating Glossary Type.', 'error', true, true);
        }
        return $this->responseRedirect('admin.glossarytype.index', 'Glossary Type added successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $glossaryType = GlossaryType::findOrFail($id);
        
        $this->setPageTitle('Glossary Type', 'Edit Glossary Type : '.$glossaryType->title);
        return view('admin.glossarytype.edit', compact('glossaryType'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'     =>  'required',
            
        ]);

        $params = $request->except('_token');
        $collection = collect($params);

        $slug = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $collection['title']));

        $glossaryType = GlossaryType::findOrFail($collection['id']);
        $glossaryType->title = $collection['title'];
        $glossaryType->slug = $slug;
        $glossaryType->meta_title = $collection['meta_title'];
        $glossaryType->meta_keywords = $collection['meta_keywords'];
        $glossaryType->meta_description = $collection['meta_description'];

        $glossaryType->save();

        if (!$glossaryType) {
            return $this->responseRedirectBack('Error occurred while updating glossary type.', 'error', true, true);
        }
        return $this->responseRedirectBack('Glossary Type has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $response = GlossaryType::find($id)->delete();

        if (!$response) {
            return $this->responseRedirectBack('Error occurred while deleting data.', 'error', true, true);
        }
        return $this->responseRedirect('admin.glossarytype.index', 'Glossary Type has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $id = $request->id;
        $glossaryType =  GlossaryType::findOrFail($id);

        $glossaryType->status = $request->check_status;
        $status = $glossaryType->save();

        if ($status) {
            return response()->json(array('message'=>'Status has been successfully updated'));
        }
    }
}
