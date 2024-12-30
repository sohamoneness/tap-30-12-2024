<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\ProjectFeedback;
use App\Models\Project;
use App\Models\Activity;
class ProjectFeedbackController extends Controller
{
    
    public function __construct()
	{
	    $this->middleware(function ($request, $next) {
	    
	    if(Auth::user()){
		$user_type = Auth::user()->type;
		if($user_type == 1){
		  //dd($user_type);
		  return $next($request);
		}else{
		    $url = route('front.user.login');
            return redirect($url);
		}
	      }else{
	        $url = route('front.user.login');
            return redirect($url);
	      }
	    });
	}
    public function index(Request $request,$slug)
    {
        if (!empty(auth()->guard()->user()->id)) {
            
            $data = Project::where('slug', $slug)->first();
            
            $feedback = ProjectFeedback::where('project_id', $data->id)->latest('id');

            $feedback = $feedback->get();
            return view('front.project.feedback.index', compact('data','feedback'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    public function store(Request $request)
    {
     // dd($request);
        $request->validate([
            'project_id' => 'required',
           
        ]);
        $projectDetail=Project::where('id','=', $request->project_id)->first();
        $projectFile = new ProjectFeedback();
        $projectFile->project_id = $projectDetail->id;
        $projectFile->user_id = auth()->guard('web')->user()->id;
        $projectFile->comment = $request->comment;
        if (!empty($request->file)) {
            $projectFile->file = imageUpload($request->file, 'project-file');
        } else {
            $projectFile->file = '';
        }

        
        $projectFile->save();
        $activity = new Activity();
        $activity->user_id = auth()->guard('web')->user()->id;
        $activity->project_id = $projectDetail->id;
        $activity->type = 'feedback';
        $activity->feedback_id = $projectFile->id;
        $activity->date = date('Y-m-d');
        $activity->time = date('H:i:s');
        $activity->save();
        return redirect()->back()->with('success', 'Feedback added successfully');
    }

}
