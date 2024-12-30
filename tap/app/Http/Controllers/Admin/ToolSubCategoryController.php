<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Auth;
use Session;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ToolSubCategory;
use App\Models\ToolAreaofInterestCategory;
class ToolSubCategoryController extends BaseController
{
    public function index(Request $request){
        if (!empty($request->term)) {
        $data = ToolSubCategory::where([['title', 'LIKE', '%' . $request->term . '%']])->paginate(25);
        } else {
        $data= ToolSubCategory::paginate(25);
        }
        $this->setPageTitle('SubCategory', 'SubCategory');
        return view('admin.tool.subcat.index',compact('data'));
    }
    public function create(Request $request){
        $categories = ToolAreaofInterestCategory::where('status',1)->get();
        $this->setPageTitle('SubCategory', 'SubCategory');
        return view('admin.tool.subcat.create',compact('categories'));
    }
    public function store(Request $request)
    {
       //dd($request->all());
        $this->validate($request, [
            'title'      =>  'required',

        ]);
        $data = new ToolSubCategory;
        $data->title = !empty($request->title) ? $request->title : '';
        $data->slug = slugGenerate($request['title'], 'tool_areaof_interest_categories');
        $data->save();
        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating SubCategory.', 'error', true, true);
        }
        return $this->responseRedirectBack('SubCategory has been updated successfully', 'success', false, false);
    }
     /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $data= ToolSubCategory::findOrfail($id);
        $categories = ToolAreaofInterestCategory::where('status',1)->get();
        $this->setPageTitle('SubCategory', 'Edit SubCategory : ');
        return view('admin.tool.subcat.edit', compact('data','categories'));
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

        ]);

        $data = ToolSubCategory::findOrFail($request->id);
        $data->title = !empty($request->title) ? $request->title : '';
        if($data->title != $request['title']) {
        $data->slug = slugGenerate($request['title'], 'tool_areaof_interest_categories');
        }
        $data->save();
        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating SubCategory.', 'error', true, true);
        }
        return $this->responseRedirectBack('SubCategory has been updated successfully', 'success', false, false);
    }
     /**
     * @param $id
     * @return bool|mixed
     */
    public function delete(Request $request,$id)
    {
        $data = ToolSubCategory::findOrFail($id);
        $data->delete();
        if (!$data) {
        return $this->responseRedirectBack('Error occurred while deleting SubCategory.', 'error', true, true);
        }
        return $this->responseRedirectBack('SubCategory has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateStatus(Request $request){
        $data = ToolSubCategory::findOrFail($request->id);
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
        $home= ToolSubCategory::where('id',$id)->get();
        $data = $home[0];
        $this->setPageTitle('SubCategory Details', 'SubCategory Details : ' . $data->title);
        return view('admin.tool.subcat.details', compact('data'));
    }
}
