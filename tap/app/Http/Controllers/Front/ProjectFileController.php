<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\ProjectFile;
use App\Models\Project;
use App\Models\Activity;
class ProjectFileController extends Controller
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
            
            $file = ProjectFile::where('project_id', $data->id)->latest('id');

            if(!empty($request->keyword))
                $file = $file->where('file_extension','like','%'.$request->keyword.'%');

            $file = $file->paginate(15);

            return view('front.project.file.index', compact('data','file'));
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
        $projectFile = new ProjectFile();
        $projectFile->project_id = $projectDetail->id;
        $projectFile->user_id = auth()->guard('web')->user()->id;
        $image = $request->file;
        $imageName = $image->getClientOriginalName();
        $imageSize = $request->file('file')->getSize();
        $projectFile->file_extension = $imageName;
        $projectFile->file_size = number_format($imageSize/1024,1);
        if (!empty($request->file)) {
            $projectFile->file = imageUpload($request->file, 'project-file');
        } else {
            $projectFile->file = '';
        }

        
        $projectFile->save();
        $activity = new Activity();
        $activity->user_id = auth()->guard('web')->user()->id;
        $activity->project_id = $projectDetail->id;
        $activity->type = 'file';
        $activity->file_id = $projectFile->id;
        $activity->date = date('Y-m-d');
        $activity->time = date('H:i:s');
        $activity->save();
        return redirect()->back()->with('success', 'Files added successfully');
    }

    

    public function delete(Request $request, $id)
    {
        ProjectFile::where('id', $id)->delete();
        return redirect()->back()->with('success', 'File removed successfully');
    }
}
