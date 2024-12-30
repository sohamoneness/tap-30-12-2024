<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\ProjectNote;
use App\Models\Project;
class ProjectNoteController extends Controller
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
            
            $note = ProjectNote::where('project_id', $data->id)->where('deleted_at', null)->latest('id');

            if(!empty($request->keyword))
                $note = $note->where('title','like','%'.$request->keyword.'%');

            $note = $note->paginate(15);

            return view('front.project.note.index', compact('data','note'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    public function store(Request $request)
    {
     // dd($request);
        $request->validate([
            'project_id' => 'required',
            'title' => 'required|string|min:2|max:255',
           
        ]);
        $projectDetail=Project::where('id','=', $request->project_id)->first();
        $project = new ProjectNote();
        $project->project_id = $request->project_id;
        $project->user_id = auth()->guard('web')->user()->id;
        $project->title = $request->title;
        $project->description = $request->description;
        if (!empty($request->file)) {
            $project->file = imageUpload($request->file, 'project-note');
        } else {
            $project->file = '';
        }

        
        $project->save();

        return redirect()->back()->with('success', 'Note added successfully');
    }

    public function update(Request $request,$id)
    {
     // dd($request);
        $request->validate([
            'project_id' => 'required',
            'title' => 'required|string|min:2|max:255',
           
        ]);
        $projectDetail=Project::where('id','=', $request->project_id)->first();
        $project = ProjectNote::findOrFail($id);
        $project->title = $request->title;
        $project->description = $request->description;
        if (!empty($request->file)) {
            $project->file = imageUpload($request->file, 'project-note');
        } else {
            $project->file = '';
        }

        
        $project->save();

        return redirect()->back()->with('success', 'Note updated successfully');
    }

    public function delete(Request $request, $id)
    {
        ProjectNote::where('id', $id)->where('user_id', auth()->guard('web')->user()->id)->delete();
        return redirect()->back()->with('success', 'Note removed successfully');
    }
}
