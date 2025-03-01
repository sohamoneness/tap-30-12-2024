<?php

namespace App\Http\Controllers\Front\Portfolio;

use App\Http\Controllers\Controller;
use App\Contracts\EducationContract;
use Illuminate\Http\Request;
use App\Models\Employment;
use App\Http\Controllers\BaseController;
use App\Models\Education;
use Illuminate\Support\Str;
use Session;
use DB;
use Illuminate\Support\Facades\Session as FacadesSession;

class EducationController extends BaseController
{
     /**
     * @var EducationContract
     */
    protected $EducationRepository;


    /**
     * EducationController constructor.
     * @param EducationContract $EducationRepository
     */
    public function __construct(EducationContract $EducationRepository)
    {
        $this->EducationRepository = $EducationRepository;
    }
    public function index(Request $request)
    {
        $this->setPageTitle('Education', ' Education');
        $data = (object)[];
        $user_id = auth()->guard('web')->user()->id;
        $data->educations = Education::where('user_id', $user_id)->orderBy('position')->get();
       // $category=ArticleCategory::orderby('title')->get();
        return view('front.portfolio.education.index',compact('data'));
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Education', 'Create Education');
        return view('front.portfolio.education.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'degree' => 'required',
            'college_name' => 'required|string|min:1',
            'year_from' => 'required',
            'position' => 'required',
        ]);
        $params = $request->except('_token');

        $education = $this->EducationRepository->createEducation($params);

        if (!$education) {
            return $this->responseRedirectBack('Error occurred while creating Education.', 'error', true, true);
        }
        return redirect()->back()->with('success', 'Education has been created successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $education = $this->EducationRepository->findEducationById($id);

        $this->setPageTitle('Education', 'Edit Education : ' . $education->occupation);
        return view('front.portfolio.education.edit', compact('education'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'degree' => 'required',
            'college_name' => 'required|string|min:1',
            'year_from' => 'required',
            'position' => 'required',
        ]);
        $params = $request->except('_token');
        $education = $this->EducationRepository->updateEducation($params);

        if (!$education) {
            return $this->responseRedirectBack('Error occurred while updating Education.', 'error', true, true);
        }
        // return $this->responseRedirectBack('Education has been updated successfully', 'success', false, false);
        return redirect()->back()->with('success', 'Education has been updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $education = $this->EducationRepository->deleteEducation($id);

        if (!$education) {
            return $this->responseRedirectBack('Error occurred while deleting Education.', 'error', true, true);
        }
        return redirect()->back()->with('success','Education has been deleted successfully', 'success', false, false);
    }
}
