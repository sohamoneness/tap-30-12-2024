<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Project;
use App\Models\ProjectStatus;
use App\Models\ProjectTask;
use App\Models\ProjectTaskCommercial;
use App\Models\TaskComment;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Activity;
// use Auth;
// Auth
class ProjectTaskController extends Controller
{
  public function index(Request $request)
    {
        if (!empty(auth()->guard()->user()->id)) {

            $projects = Project::where('created_by', auth()->guard()->user()->id)->latest('id')->where('deleted_at', null)->get();
            $tasks = ProjectTask::where('deleted_at', null)->where('created_by', auth()->guard('web')->user()->id)->with('projectDetail')->latest('id');

            if(!empty($request->search_status))
                $tasks = $tasks->where('status','=',$request->search_status);
                
            if(!empty($request->keyword))
                $tasks = $tasks->where('title','like','%'.$request->keyword.'%');

            if(!empty($request->search_project))
                $tasks = $tasks->where('project_id','=',$request->search_project);

            if(!empty($request->export)){
                $tasks = $tasks->get()->toArray();
                $this->csvProjectTaskExport($tasks,'Tasks List');
            }


            
            $tasks = $tasks->paginate(15);

           // dd($tasks);

            $status = ProjectStatus::orderBy('position', 'asc')->get();
        
            return view('front.project-task.list', compact( 'tasks', 'status','projects'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

   public function taskCreate(Request $request)
    {
        $projects = Project::where('created_by', auth()->guard()->user()->id)->latest('id')->where('deleted_at', null)->get();
        $status = ProjectStatus::orderBy('position', 'asc')->paginate(15);
        $client = Client::where('user_id',auth()->guard('web')->user()->id)->orderBy('client_name')->get();
        return view('front.project-task.task_create', compact('status', 'client','projects'));
    }
    public function save(Request $request)
    {
     // dd($request);
        $request->validate([
            'project_id' => 'required',
            'title' => 'required|string|min:2|max:255',
            'short_desc' => 'nullable|string|min:2',
            'points' => 'required',
            'deadline' => 'required|date|after_or_equal:today',
            'label' => 'required|string|min:2',
           'recurring' => 'required',
            'document' => 'nullable|mimes:jpeg,jpg,png,gif',
            'external_links' => 'nullable|array'
        ]);
        $projectDetail=Project::where('id','=', $request->project_id)->first();
        $project = new ProjectTask();
        $project->project_id = $request->project_id;
        $project->position = 1;
        $project->title = $request->title;
        $project->slug = slugGenerate($request->title, 'project_tasks');
        $project->short_desc = $request->short_desc;
        $project->deadline = $request->deadline;
        $project->label = $request->label;
        $project->status = 'icebox';
        $project->points = $request->points;
        $project->recurring = $request->recurring;
        $project->recurring_duration = $request->recurring_duration ?? '';
        $project->client_id = $projectDetail->client_id ?? '';
        if (!empty($request->document)) {
            $project->document = imageUpload($request->document, 'project-task-document');
        } else {
            $project->document = '';
        }

        if (!empty($request->external_links)) {
            $links = '';
            foreach($request->external_links as $ext_link) {
                if (!empty($ext_link)) {
                    $links .= $ext_link.', ';
                }
            }

            $project->external_links = substr($links, 0, -2);
        } else {
            $project->external_links = '';
        }

        // $project->status = $request->status;
        $project->created_by = auth()->guard('web')->user()->id;

        //dd($project);
        $project->save();
        $activity = new Activity();
        $activity->project_id = $projectDetail->id;
        $activity->user_id = auth()->guard('web')->user()->id;
        $activity->type = 'task';
        $activity->task_id = $project->id;
        $activity->date = date('Y-m-d');
        $activity->time = date('H:i:s');
        $activity->save();
        return redirect()->route('front.project.task.index')->with('success', 'Task added successfully');
    }
    public function kanbanBoard(Request $request,$projectId)
    {
        //dd($projectId);
        $status = ProjectStatus::orderBy('position', 'asc')->get();
        $project = Project::where('id', $projectId)->first();
        
        $today = date('Y-m-d');
        $yesterday =  date('Y-m-d', strtotime($today. ' -1 day'));
        $tomorrow = date('Y-m-d 23:59:59', strtotime($today. ' +1 day'));
        $seventhday =  date('Y-m-d', strtotime($today. ' +7 day'));
        $fiftenthday =    date('Y-m-d', strtotime($today. ' +15 day'));
        $deadline = array("Expired"=>$yesterday, "Today"=>$today, "Tomorow"=>$tomorrow, "In 7 Days"=>$seventhday,"In 15 Days"=>$fiftenthday);
        $data = array();
        $today_start = date('Y-m-d 00:00:00');
        $today_end = date('Y-m-d 23:59:59');
        foreach($status as $stat){
           $data[$stat->slug] = ProjectTask::where('project_id', $projectId)->where('created_by', auth()->guard()->user()->id)->where('status',$stat->slug)->where('deleted_at', null)->get();
           if(!empty($request->search_deadline)){
            if($request->search_deadline == $yesterday){
                $data[$stat->slug]= $data[$stat->slug]->where('deadline','<',$request->search_deadline);
            }
            if($request->search_deadline == $today){
                $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today_start, $today_end]);
            }
            if($request->search_deadline == $tomorrow){
                $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today, $request->search_deadline]);
            }
            if($request->search_deadline == $seventhday){
                $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today, $request->search_deadline]);
            }
            if($request->search_deadline == $fiftenthday){
                $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today, $request->search_deadline]);
            }
         }
        if(!empty($request->keyword))
        $data[$stat->slug]= $data[$stat->slug]->where('title','like','%'.$request->keyword.'%');
        
        
        }

        $status = ProjectStatus::orderBy('position', 'asc')->get();
        //dd($data);
        return view('front.project-task.kanban',compact('data','project','deadline','status'));
    }
    public function kanbanBoardTaskAll(Request $request)
    {
        $data = array();
        $status = ProjectStatus::orderBy('position', 'asc')->get();
        $today = date('Y-m-d');
        $yesterday =  date('Y-m-d', strtotime($today. ' -1 day'));
        $tomorrow = date('Y-m-d 23:59:59', strtotime($today. ' +1 day'));
        $seventhday =  date('Y-m-d', strtotime($today. ' +7 day'));
        $fiftenthday =    date('Y-m-d', strtotime($today. ' +15 day'));
        $deadline = array("Expired"=>$yesterday, "Today"=>$today, "Tomorow"=>$tomorrow, "In 7 Days"=>$seventhday,"In 15 Days"=>$fiftenthday);

        $projects = Project::where('created_by', auth()->guard()->user()->id)->latest('id')->where('deleted_at', null)->get();

        $today_start = date('Y-m-d 00:00:00');
        $today_end = date('Y-m-d 23:59:59');

            foreach($status as $stat){
                $data[$stat->slug] = ProjectTask::where('created_by', auth()->guard()->user()->id)
                            ->where('status',$stat->slug)->where('deleted_at', null);

                if(!empty($request->search_deadline)){
                    if($request->search_deadline == $yesterday){
                        $data[$stat->slug]= $data[$stat->slug]->where('deadline','<',$request->search_deadline);
                    }
                    if($request->search_deadline == $today){
                        $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today_start, $today_end]);
                    }
                    if($request->search_deadline == $tomorrow){
                        $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today, $request->search_deadline]);
                    }
                    if($request->search_deadline == $seventhday){
                        $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today, $request->search_deadline]);
                    }
                    if($request->search_deadline == $fiftenthday){
                        $data[$stat->slug]= $data[$stat->slug]->whereBetween('deadline', [$today, $request->search_deadline]);
                    }
                }
                if(!empty($request->keyword))
                $data[$stat->slug]= $data[$stat->slug]->where('title','like','%'.$request->keyword.'%');

                if(!empty($request->search_project))
                $data[$stat->slug]= $data[$stat->slug]->where('project_id','=',$request->search_project);

                $data[$stat->slug] = $data[$stat->slug]->get();
            }
      
       
    //dd($data);
            $status = ProjectStatus::orderBy('position', 'asc')->get();

        return view('front.project-task.kanban-all',compact('data','deadline','projects','status'));
    }
    public function create(Request $request, $projectId)
    {
        $project = Project::findOrFail($projectId);
        $status = ProjectStatus::orderBy('position', 'asc')->paginate(15);
        $client = Client::where('user_id',auth()->guard('web')->user()->id)->orderBy('client_name')->get();
        return view('front.project-task.create', compact('status', 'project','client'));
    }

    public function detail(Request $request, $slug)
    {
        $item = ProjectTask::where('slug', $slug)->where('created_by', auth()->guard('web')->user()->id)->first();
        // $tasks = ProjectTask::where('project_id', $data->id)->get();

        return view('front.project-task.detail', compact('item'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
       // dd($request->project_id);
        $project = Project::findOrFail($request->project_id);
        $request->validate([
            'project_id' => 'nullable|integer|min:1',
            'project_slug' => 'nullable|string|min:2|max:255',
            'title' => 'required|string|min:2|max:255',
            'short_desc' => 'nullable|string|min:2',
            'deadline' => 'required|date',
            'label' => 'required|string|min:2',
            'recurring' => 'required',
            'document' => 'nullable|mimes:jpeg,jpg,png,gif,docx,doc,pdf',
            'external_links' => 'nullable'
        ]);
        $projectDetail=Project::where('slug','=', $request->project_slug)->first();
        $project = new ProjectTask();
        $project->project_id = $request->project_id;
        $project->position = 1;
        $project->title = $request->title;
        $project->slug = slugGenerate($request->title, 'project_tasks');
        $project->short_desc = $request->short_desc;
        $project->deadline = $request->deadline;
        $project->label = $request->label;
        $project->points = $request->points;
        $project->recurring = $request->recurring;
        $project->recurring_duration = $request->recurring_duration ?? '';
        $project->client_id = $projectDetail->client_id ?? '';
        if (!empty($request->document)) {
            $project->document = imageUpload($request->document, 'project-task-document');
        } else {
            $project->document = '';
        }

        if (!empty($request->external_links)) {
            $links = '';
            foreach($request->external_links as $ext_link) {
                if (!empty($ext_link)) {
                    $links .= $ext_link.', ';
                }
            }

            $project->external_links = substr($links, 0, -2);
        } else {
            $project->external_links = '';
        }

        // $project->status = $request->status;
        $project->created_by = auth()->guard('web')->user()->id;
        $project->save();
        $activity = new Activity();
        $activity->user_id = auth()->guard('web')->user()->id;
        $activity->project_id = $projectDetail->id;
        $activity->type = 'task';
        $activity->task_id = $project->id;
        $activity->date = date('Y-m-d');
        $activity->time = date('H:i:s');
        $activity->save();
        return redirect()->route('front.project.detail', $request->project_slug)->with('success', 'Task added successfully');
    }

    public function delete(Request $request, $id)
    {
        ProjectTask::where('id', $id)->where('created_by', auth()->guard('web')->user()->id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('success', 'Task removed successfully');
    }

    public function edit(Request $request, $id)
    {
        $data = ProjectTask::findOrFail($id);
        $status = ProjectStatus::where('created_by',null)->orWhere('created_by',Auth::guard('web')->user()->id)->orderBy('position', 'asc')->get();
        $client = Client::where('user_id',auth()->guard('web')->user()->id)->orderBy('client_name')->get();
        return view('front.project-task.edit', compact('data', 'status','client'));
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());

        $request->validate([
            //'project_slug' => 'required|string|min:2|max:255',
            'title' => 'required|string|min:2|max:255',
            'short_desc' => 'nullable|string|min:2',
            // 'status' => 'required|string|min:2',
            // 'deadline' => 'required|date|after_or_equal:today|before_or_equal:',
            'deadline' => 'required|date',
            'label' => 'required|string|min:2',
            'recurring' => 'required',
            'document' => 'nullable|mimes:jpeg,jpg,png,gif,docx,doc,pdf',
            'external_links' => 'nullable'
        ]);

        // dd('here');

        $projectDetail=Project::where('slug','=', $request->project_slug)->first();
        $project = ProjectTask::findOrFail($id);
        /*
        $project->title = $request->title;
        $project->slug = slugGenerate($request->title, 'projects');
        $project->short_desc = $request->short_desc ?? '';

        if (!empty($request->document)) {
            $project->document = imageUpload($request->document, 'project-document');
        } else {
            $project->document = '';
        }

        if (!empty($request->status)) {
            $project->status = $request->status;
        }
        */
        $project->title = $request->title;
        $project->slug = slugGenerate($request->title, 'project_tasks');
        $project->short_desc = $request->short_desc;
        $project->deadline = date('Y-m-d', strtotime($request->deadline));
        $project->label = $request->label;
        $project->recurring = $request->recurring;
        $project->recurring_duration = $request->recurring_duration ?? '';
        $project->client_id = $projectDetail->client_id ?? '';
        if (!empty($request->document)) {
            $project->document = imageUpload($request->document, 'project-task-document');
        }

        if (!empty($request->external_links)) {
            $links = '';
            foreach($request->external_links as $ext_link) {
                if (!empty($ext_link)) {
                    $links .= $ext_link.', ';
                }
            }

            $project->external_links = substr($links, 0, -2);
        } else {
            $project->external_links = '';
        }

        // $project->status = $request->status;
        $project->save();

        return redirect()->route('front.project.detail', $request->project_slug)->with('success', 'Task updated successfully');
    }

    //task comment add
    public function updateComment(Request $request, $id)
    {
         //dd($request->all());
        $request->validate([
            'comment' => 'required',
            'doc' => 'nullable|mimes:jpeg,jpg,png,gif',
        ]);
        $project = new TaskComment();
        $project->comment = $request->comment ?? '';
        $project->user_id = Auth::guard('web')->user()->id;
        $project->task_id = $request->task_id;
        if (!empty($request->doc)) {
            $project->doc = imageUpload($request->doc, 'project-task-document');
        } else {
            $project->doc = '';
        }
        $project->save();
        
        return redirect()->back()->with('success', 'Task comment updated successfully!');
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            // 'status' => 'required|string|min:2|max:255',
           // 'title' => 'required',

        ]);
        if($request->spare){
            $status_slug = slugGenerate($request->status,'project_statuses');
            ProjectStatus::insert([
                'title' => $request->status,
                'slug' => $status_slug,
                'icon' => '<i class="fas fa-check"></i>',
                'short_desc' => 'New Status Added by user!',
                'created_by' => Auth::guard('web')->user()->id,
            ]);
            $request->status = $status_slug;
        }

        $update = ProjectTask::where('id',$request->id)->update(['status' => $request->status]);
        if($update){
            return response()->json(array('message' => 'Task status has been successfully updated'));
        }else{
            return redirect()->back()->with('failure','Error occoured!');
        }
    }
    public function updateCommercial(Request $request)
    {
        $project_commercial = ProjectTaskCommercial::where('project_task_id',$request->id)->get();
        if(count($project_commercial) > 0){
            ProjectTaskCommercial::where('project_task_id',$request->id)->update([
                'charges_limit'=>$request->charges,
                'currency_id'=>$request->currency,
                'count'=>$request->count,
                'total_count'=>$request->total_count,
            ]);
            return response()->json(array('message' => 'Project Task commercial updated!'));
        }else{
            ProjectTaskCommercial::insert([
                'project_task_id'=>$request->id,
                'charges_limit'=>$request->charges,
                'currency_id'=>$request->currency,
                'count'=>$request->count,
                'total_count'=>$request->total_count,
            ]);
            return response()->json(array('message' => 'Project Task commercial submitted!'));
        }
    }

     //show commercial invoice

     public function invoice(Request $request, $id)
     {
         $data = ProjectTaskCommercial::where('project_task_id', $id)->first();

         return view('front.project-task.invoice', compact('data'));
     }

}
