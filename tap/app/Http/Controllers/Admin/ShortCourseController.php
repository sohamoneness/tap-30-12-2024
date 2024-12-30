<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Contracts\BlogCategoryContract;
use Illuminate\Http\Request;
use App\Models\ShortCourse;
use App\Models\ShortCourseModule;
use App\Models\ShortCourseTest;
use App\Models\ShortCourseExercise;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Session;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ArticleExport;
use DB;

class ShortCourseController extends BaseController
{

    public function __construct()
    {
        
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function index()
    {
        $courses = ShortCourse::where('title','!=','')->get();

        $this->setPageTitle('Short Courses', 'List of all short courses');
        return view('admin.short_courses.index', compact('courses'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Short Course', 'Create Short Course');
        return view('admin.short_courses.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',

        ]);

        $params = $request->except('_token');
        $collection = collect($params);

        $shortCourse = new ShortCourse;
        $shortCourse->title = $collection['title'];
        $shortCourse->introduction = $collection['introduction'];
        $shortCourse->key_learnings = $collection['key_learnings'];
        $shortCourse->hours_to_complete = $collection['hours_to_complete'];
        $shortCourse->status = 1;

        if(!empty($params['image'])){
            $profile_image = $collection['image'];
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("Blogs/",$imageName);
            $uploadedImage = $imageName;
            $shortCourse->image = $uploadedImage;
        }

        $shortCourse->save();

        $short_course_id = $shortCourse->id;

        if(count($params['short_course_module_names'])>0){
            for($i=0;$i<count($params['short_course_module_names']);$i++){
                $shortCourseModule = new ShortCourseModule;
                $shortCourseModule->short_course_id = $short_course_id;
                $shortCourseModule->module = $params['short_course_module_names'][$i];
                $shortCourseModule->description = $params['short_course_module_descriptions'][$i];
                $shortCourseModule->resources = $params['short_course_module_resources'][$i];

                $shortCourseModule->save();
            }
        }

        if(count($params['short_course_test_names'])>0){
            for($i=0;$i<count($params['short_course_test_names']);$i++){
                $shortCourseTest = new ShortCourseTest;
                $shortCourseTest->short_course_id = $short_course_id;
                $shortCourseTest->title = $params['short_course_test_names'][$i];
                $shortCourseTest->description = $params['short_course_test_descriptions'][$i];

                $shortCourseTest->save();
            }
        }

        if(count($params['short_course_exercise_names'])>0){
            for($i=0;$i<count($params['short_course_exercise_names']);$i++){
                $shortCourseExercise = new ShortCourseExercise;
                $shortCourseExercise->short_course_id = $short_course_id;
                $shortCourseExercise->title = $params['short_course_exercise_names'][$i];
                $shortCourseExercise->description = $params['short_course_exercise_descriptions'][$i];

                $shortCourseExercise->save();
            }
        }

        if (!$shortCourse) {
            return $this->responseRedirectBack('Error occurred while creating short course.', 'error', true, true);
        }
        return $this->responseRedirect('admin.short_courses.index', 'Short course has been created successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetCourse = shortCourse::find($id);
        $this->setPageTitle('Short Course', 'Edit Short Course : '.$targetCourse->title);
        return view('admin.short_courses.edit', compact('targetCourse'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',

        ]);
        $params = $request->except('_token');
        $collection = collect($params);

        $shortCourse = ShortCourse::find($params['id']);
        $shortCourse->title = $collection['title'];
        $shortCourse->introduction = $collection['introduction'];
        $shortCourse->key_learnings = $collection['key_learnings'];
        $shortCourse->hours_to_complete = $collection['hours_to_complete'];
        if(!empty($params['image'])) {
            $profile_image = $collection['image'] ?? '';
            $imageName = time().".".$profile_image->getClientOriginalName();
            $profile_image->move("Blogs/",$imageName);
            $uploadedImage = $imageName;
            $shortCourse->image = $uploadedImage;
        }
        $shortCourse->save();

        $short_course_id = $params['id'];

        if(count($params['short_course_module_names'])>0){
            DB::statement("delete from short_course_modules where short_course_id='$short_course_id'");
            for($i=0;$i<count($params['short_course_module_names']);$i++){
                $shortCourseModule = new ShortCourseModule;
                $shortCourseModule->short_course_id = $short_course_id;
                $shortCourseModule->module = $params['short_course_module_names'][$i];
                $shortCourseModule->description = $params['short_course_module_descriptions'][$i];
                $shortCourseModule->resources = $params['short_course_module_resources'][$i];

                $shortCourseModule->save();
            }
        }

        if(count($params['short_course_test_names'])>0){
            DB::statement("delete from short_course_tests where short_course_id='$short_course_id'");
            for($i=0;$i<count($params['short_course_test_names']);$i++){
                $shortCourseTest = new ShortCourseTest;
                $shortCourseTest->short_course_id = $short_course_id;
                $shortCourseTest->title = $params['short_course_test_names'][$i];
                $shortCourseTest->description = $params['short_course_test_descriptions'][$i];

                $shortCourseTest->save();
            }
        }

        if(count($params['short_course_exercise_names'])>0){
            DB::statement("delete from short_course_exercises where short_course_id='$short_course_id'");
            for($i=0;$i<count($params['short_course_exercise_names']);$i++){
                $shortCourseExercise = new ShortCourseExercise;
                $shortCourseExercise->short_course_id = $short_course_id;
                $shortCourseExercise->title = $params['short_course_exercise_names'][$i];
                $shortCourseExercise->description = $params['short_course_exercise_descriptions'][$i];

                $shortCourseExercise->save();
            }
        }

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating category.', 'error', true, true);
        }
        return $this->responseRedirectBack('Category has been updated successfully' ,'success',false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = $this->BlogCategoryRepository->deleteCategory($id);

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while deleting category.', 'error', true, true);
        }
        return $this->responseRedirect('admin.category.index', 'Category has been deleted successfully' ,'success',false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function updateStatus(Request $request){

        $params = $request->except('_token');

        $category = $this->BlogCategoryRepository->updateCategoryStatus($params);

        if ($category) {
            return response()->json(array('message'=>'Category status has been successfully updated'));
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $categories = $this->BlogCategoryRepository->detailsCategory($id);
        $category = $categories[0];
        $this->setPageTitle('Category', 'Category Details : '.$category->title);
        return view('admin.category.details', compact('category'));
    }
}

