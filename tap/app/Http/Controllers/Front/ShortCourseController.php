<?php

namespace App\Http\Controllers\Front;

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
        $courses = ShortCourse::where('status','1')->get();

        $this->setPageTitle('Short Courses', 'List of all short courses');
        return view('front.short_courses.index', compact('courses'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $course = ShortCourse::find($id);
        $modules = ShortCourseModule::where('short_course_id',$id)->get();
        $tests = ShortCourseTest::where('short_course_id',$id)->get();
        $exercises = ShortCourseExercise::where('short_course_id',$id)->get();
        
        $this->setPageTitle('course', 'course Details');
        return view('front.short_courses.details', compact('course','modules','tests','exercises'));
    }
}

