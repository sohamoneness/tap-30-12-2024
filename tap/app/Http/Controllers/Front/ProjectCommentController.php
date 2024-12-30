<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\ProjectComment;
use App\Models\Project;
use App\Models\Activity;
class ProjectCommentController extends Controller
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
            
            $comment = ProjectComment::where('project_id', $data->id)->latest('id');

            $comment = $comment->get();

            return view('front.project.comment.index', compact('data','comment'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    public function store(Request $request)
    {
      //dd($request->all());
        $request->validate([
            'project_id' => 'required',
           
        ]);
        ///$projectDetail=Project::where('id','=', $request->project_id)->first();
        $projectComment = new ProjectComment();
        $projectComment->project_id = $request->project_id;
        $projectComment->user_id = auth()->guard('web')->user()->id;
        $projectComment->comment = $request->comment;
        if (!empty($request->file)) {
            $projectComment->file = imageUpload($request->file, 'project-comment');
        } else {
            $projectComment->file = '';
        }

        
        $projectComment->save();
        $activity = new Activity();
        $activity->user_id = auth()->guard('web')->user()->id;
        $activity->project_id = $request->project_id;
        $activity->type = 'comment';
        $activity->comment_id = $projectComment->id;
        $activity->date = date('Y-m-d');
        $activity->time = date('H:i:s');
        $activity->save();
        return redirect()->back()->with('success', 'Comment added successfully');
    }

    
}
