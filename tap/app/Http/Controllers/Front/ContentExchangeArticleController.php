<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Advertisement;
use App\Models\PitchChannel;
use App\Models\PitchMessage;
use App\Models\AdvertisementCategory;
use App\Models\ProjectStatus;
use App\Models\ProjectTask;
use App\Models\Project;
use App\Models\ContentAdvertisementProposal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ContentExchangeArticleController extends Controller
{
    public function index(Request $request)
    {
        if (!empty(auth()->guard()->user()->id)) {
            //echo auth()->guard()->user()->id; die;
            $data = Advertisement::where('created_by', auth()->guard()->user()->id)->latest('id')->with('advertisement_category')->where('deleted_at', null);
          
            if(!empty($request->search_status))
                $data = $data->where('article_category_id','=',$request->search_status);
            
            if(!empty($request->keyword))
                $data = $data->where('title','like','%'.$request->keyword.'%');

            if(!empty($request->export)){
                $data = $data->get()->toArray();
                $this->csvProjectExport($data);
            }
            
            $data = $data->paginate(15);

            //dd($data);

            $status = AdvertisementCategory::orderBy('id', 'asc')->get();
            return view('front.advertisement.index', compact('data','status'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    public function show(Request $request)
    {
        if (!empty(auth()->guard()->user()->id)) {
            //echo auth()->guard()->user()->id; die;
             DB::enableQueryLog();
            $data = Advertisement::where('status', 1)->with('advertisement_category')->where('deleted_at', null);
          
            if(!empty($request->search_status))
                $data = $data->where('article_category_id','=',$request->search_status);
            
            if(!empty($request->keyword))
                $data = $data->where('title','like','%'.$request->keyword.'%');
                
              // echo $request->min_price;
                // echo '<br>'. $request->max_price;
               

            if(!empty($request->min_price) || !empty($request->max_price))
                $data = $data->where('budget_amount','>=', $request->min_price)->where('budget_amount','<=', $request->max_price);
                
           

            $data = $data->paginate(15);
            
           // dd(DB::getQueryLog());

           //dd($data);

            $status = AdvertisementCategory::orderBy('id', 'asc')->get();
            return view('front.advertisement.show', compact('data','status'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    public function create(Request $request)
    {
        $status = AdvertisementCategory::orderBy('id', 'asc')->get();
        return view('front.advertisement.create', compact('status'));
    }

    public function detail(Request $request, $slug)
    {
        // $data = Project::where('slug', $slug)->first();
        $data = Project::where('slug', $slug)->where('created_by', auth()->guard('web')->user()->id)->first();
        $tasks = ProjectTask::where('project_id', $data->id)->where('deleted_at', null)->latest('id');

        if(!empty($request->search_status))
            $tasks = $tasks->where('article_category_id','=',$request->search_status);
            
        if(!empty($request->keyword))
            $tasks = $tasks->where('title','like','%'.$request->keyword.'%');

        if(!empty($request->export)){
            $tasks = $tasks->get()->toArray();
            $this->csvProjectTaskExport($tasks, $data->title);
        }
        
        $tasks = $tasks->paginate(15);

        $status = ProjectStatus::orderBy('position', 'asc')->get();
       
        return view('front.advertisement.detail', compact('data', 'tasks', 'status'));
    }

    public function detailPage(Request $request, $slug)
    {

        $data = Advertisement::where('slug', $slug)->with('advertisement_category')->first();
        $status = AdvertisementCategory::orderBy('id', 'asc')->get();
        if (auth()->guard('web')->user()->id) {
            $jobApplied = ContentAdvertisementProposal::where('job_id', $data->id)->where('user_id', auth()->guard('web')->user()->id)->first();
        }
        //dd($data);
       
        return view('front.advertisement.details-page', compact('data','status','jobApplied'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'status' => 'required|string|min:2|max:255',
            'title' => 'required|string|min:2|max:255',
            'short_desc' => 'nullable|string|min:2',
            'deadline' => 'required|date|after_or_equal:today',
        ]);

        // dd($request->all());

        $project = new Advertisement();
        $project->title = $request->title;
        $project->slug = slugGenerate($request->title, 'projects');
        $project->short_desc = $request->short_desc ?? '';
        $project->article_category_id = $request->article_category_id ?? '';
        

        // if (!empty($request->document)) {
        //     $project->document = imageUpload($request->document, 'project-document');
        // } else {
        //     $project->document = '';
        // }
        $project->words_required = $request->words_required ?? '';
        $project->max_writers = $request->max_writers ?? '';
        $project->budget = $request->budget ?? '';
        $project->budget_amount = $request->budget_amount ?? '';
        $project->primary_keyword = $request->primary_keyword ?? '';
        $project->secondary_keyword = $request->secondary_keyword ?? '';

        $project->writer_type = $request->writer_type ?? '';

        $project->writer_link = $request->writer_link ?? '';

        $project->client_name = $request->client_name ?? '';
        $project->client_website = $request->client_website ?? '';
        $project->client_stats = $request->client_stats ?? '';
        $project->domain_authority = $request->domain_authority ?? '';

        $project->status = 1;
        $project->created_by = auth()->guard('web')->user()->id;
        $project->deadline = $request->deadline;

        $project->save();

        return redirect()->route('front.advertisement.index')->with('success', 'Advertisement created successfully');
    }

    public function delete(Request $request, $id)
    {
        Advertisement::where('id', $id)->where('created_by', auth()->guard('web')->user()->id)->update([
            'deleted_at' => date('Y-m-d H:i:s')
        ]);
        return redirect()->back()->with('success', 'Advertisement removed successfully');
    }

    public function edit(Request $request, $id)
    {
        $data = Advertisement::findOrFail($id);
        $status = AdvertisementCategory::orderBy('id', 'asc')->get();

        return view('front.advertisement.edit', compact('data', 'status'));
    }

    public function update(Request $request, $id)
    {
         //dd($request->all());

         $request->validate([
            // 'status' => 'required|string|min:2|max:255',
            'title' => 'required|string|min:2|max:255',
            'short_desc' => 'nullable|string|min:2',
            'deadline' => 'required|date|after_or_equal:today',
        ]);

        $project = Advertisement::findOrFail($id);

        $project->title = $request->title;
        $project->slug = slugGenerate($request->title, 'projects');
        $project->short_desc = $request->short_desc ?? '';
        $project->article_category_id = $request->article_category_id ?? '';
        

        // if (!empty($request->document)) {
        //     $project->document = imageUpload($request->document, 'project-document');
        // } else {
        //     $project->document = '';
        // }
        $project->words_required = $request->words_required ?? '';
        $project->max_writers = $request->max_writers ?? '';
        $project->budget = $request->budget ?? '';
        $project->budget_amount = $request->budget_amount ?? '';
        $project->primary_keyword = $request->primary_keyword ?? '';
        $project->secondary_keyword = $request->secondary_keyword ?? '';

        $project->writer_type = $request->writer_type ?? '';

        $project->writer_link = $request->writer_link ?? '';

        $project->client_name = $request->client_name ?? '';
        $project->client_website = $request->client_website ?? '';
        $project->client_stats = $request->client_stats ?? '';
        $project->domain_authority = $request->domain_authority ?? '';

        $project->status = 1;
        $project->created_by = auth()->guard('web')->user()->id;
        $project->deadline = $request->deadline;
 

        $project->save();
     
        return redirect()->back()->with('success', 'Advertisement updated successfully');
    }

    public function updateStatus(Request $request)
    {
       
        $update = Advertisement::where('id',$request->id)->update(['status' => $request->status]);
        if($update){
            return response()->json(array('message' => 'Advertisement status has been successfully updated'));
        }else{
            return response()->json(array('message' => 'Error occoured!'));
        }
    }

    public function updateCommercial(Request $request)
    {
        $project_commercial = ProjectCommercial::where('project_id',$request->id)->get();
        if(count($project_commercial) > 0){
            ProjectCommercial::where('project_id',$request->id)->update([
                'charges_limit'=>$request->charges,
                'currency_id'=>$request->currency,
                'count'=>$request->count,
                'total_count'=>$request->total_count,
            ]);
            return response()->json(array('message' => 'Project commercial updated!'));
        }else{
            ProjectCommercial::insert([
                'project_id'=>$request->id,
                'charges_limit'=>$request->charges,
                'currency_id'=>$request->currency,
                'count'=>$request->count,
                'total_count'=>$request->total_count,
            ]);
            return response()->json(array('message' => 'Project commercial submitted!'));
        }
    }
    public function csvProjectExport($data)
    {
        if (count($data) > 0) {
            $delimiter = ","; 
            $filename = "Projects-". Auth::guard('web')->user()->first_name .'-'. Auth::guard('web')->user()->last_name  ."-".date('Y-m-d').".csv"; 

            // Create a file pointer 
            $f = fopen('php://memory', 'w'); 

            // Set column headers 
            $fields = array('SR', 'TITLE', 'STATUS', 'DESCRIPTION', 'START DATE'); 
            fputcsv($f, $fields, $delimiter); 

            $count = 1;

            foreach($data as $row) {
                $datetime = date('j F, Y h:i A', strtotime($row['created_at']));

                $lineData = array(
                    $count,
                    $row['title'],
                    $row['status'],
                    $row['short_desc'],
                    $datetime
                );

                fputcsv($f, $lineData, $delimiter);

                $count++;
            }

            // Move back to beginning of file
            fseek($f, 0);

            // Set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');

            //output all remaining data on a file pointer
            fpassthru($f);
            exit;
        }
    }

    public function csvProjectTaskExport($data,$project_name)
    {
        if (count($data) > 0) {
            $delimiter = ","; 
            $filename = "Project-" . $project_name . '-' . Auth::guard('web')->user()->first_name .'-'. Auth::guard('web')->user()->last_name  ."-".date('Y-m-d').".csv"; 

            // Create a file pointer 
            $f = fopen('php://memory', 'w'); 

            // Set column headers 
            $fields = array('SR','TITLE','STATUS','DESCRIPTION','START DATE','DEADLINE','LABEL','RECURRING','STATUS'); 
            fputcsv($f, $fields, $delimiter); 

            $count = 1;

            foreach($data as $row) {
                $datetime = date('j F, Y h:i A', strtotime($row['created_at']));
                $deadline = date('j F, Y h:i A', strtotime($row['deadline']));

                $lineData = array(
                    $count,
                    $row['title'],
                    $row['status'],
                    $row['short_desc'],
                    $datetime,
                    $deadline,
                    $row['label'],
                    $row['recurring'] == 1 ? 'Yes' : 'No',
                    $row['status'],
                );

                fputcsv($f, $lineData, $delimiter);

                $count++;
            }

            // Move back to beginning of file
            fseek($f, 0);

            // Set headers to download file rather than displayed
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="' . $filename . '";');

            //output all remaining data on a file pointer
            fpassthru($f);
            exit;
        }
    }
    //for writer proposal save
    public function proposalStore(Request $request)
    {
        $request->validate([
            'cover' => 'required|string',
        ]);

        $project = new ContentAdvertisementProposal();
        $project->job_id = $request->job_id;
        $project->cover = $request->cover ?? '';
        $project->status = 2;
        $project->user_id = auth()->guard('web')->user()->id;
        $project->save();

        return redirect()->back()->with('success', 'Proposal updated successfully');
    }
    //for show writer proposal
    public function proposalshow(Request $request,$id)
    {
        if (!empty(auth()->guard()->user()->id)) {
            $data = ContentAdvertisementProposal::where('job_id', $id)->paginate(25);
            $content=Advertisement::where('id',$id)->first();
            return view('front.advertisement.proposal-show', compact('data','content'));
        } else {
            return redirect()->route('front.user.login');
        }
    }
   //for status change of writer proposal
    public function proposalupdateStatus(Request $request)
    {
       
        $update = ContentAdvertisementProposal::where('id',$request->id)->update(['status' => $request->status]);
        if($update){
            return response()->json(array('message' => 'Proposal status has been successfully updated'));
        }else{
            return response()->json(array('message' => 'Error occoured!'));
        }
    }
    //showing details of writer proposal
    public function proposaldetails(Request $request,$id)
    {
        if (!empty(auth()->guard()->user()->id)) {
            $data = ContentAdvertisementProposal::where('id', $id)->first();
            return view('front.advertisement.detail', compact('data'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    //showing details of writer approval proposal
    public function proposalapprovalShow(Request $request)
    {
        if (!empty(auth()->guard()->user()->id)) {
            $data = ContentAdvertisementProposal::where('user_id', auth()->guard()->user()->id)->paginate(25);
            
            return view('front.advertisement.approval-detail', compact('data'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

     //for project save
     public function projectStore(Request $request)
     {
         $request->validate([
             'title' => 'required|string|min:2|max:255',
         ]);
 
         $projectCheck=ContentAdvertisementProposal::where('job_id',$request->job_id)->where('user_id', auth()->guard('web')->user()->id)->first();
         $project = new Project();
         $project->title = $request->title;
         $project->slug = slugGenerate($request->title, 'projects');
         $project->short_desc = $request->short_desc ?? '';
         $project->client_id = $request->client_id ?? '';
         $project->status = 'icebox';
         $project->created_by = auth()->guard('web')->user()->id;
         $project->deadline = $request->deadline;
         $project->save();
         $status = ContentAdvertisementProposal::findOrFail($projectCheck->id);
         $status->is_project = 1;
         $status->save();
         if($project)
         return redirect()->back()->with('success', 'Project added successfully');
         else
         return redirect()->back()->with('failure', 'Something happend');
     }

          //for message channel save
    public function channelStore(Request $request)
          {
              $request->validate([
                  'job_id' => 'required',
              ]);
            $projectCheck = Advertisement::where('id',$request->job_id)->first();

            $channelCheck =  PitchChannel::where('project_id',$request->job_id)->where('initiated_by',auth()->guard('web')->user()->id)->orWhere('initiated_with',auth()->guard('web')->user()->id)->get()->count();
            if($channelCheck == 0){
                $project = new PitchChannel();
                $project->project_id = $request->job_id;
                $project->name = $projectCheck->title;
                $project->initiated_by = auth()->guard('web')->user()->id;
                $project->initiated_with = $projectCheck->created_by;
                $project->save();
            }else{
                      $project = PitchChannel::where('project_id',$request->job_id)->where('initiated_by',auth()->guard('web')->user()->id)->orWhere('initiated_with',auth()->guard('web')->user()->id)->first();
            }
            $message = PitchMessage::where('channel_id',$project->id)->get();
              if($project)
              return response()->json(array('project' => $project->id,'message'=>$message));
              else
              return redirect()->back()->with('failure', 'Something happend');
          }
          //for message channel save
          public function channelStorePublisher(Request $request)
          {
              $request->validate([
                  'job_id' => 'required',
              ]);
            $projectCheck = Advertisement::where('id',$request->job_id)->first();

            $channelCheck =  PitchChannel::where('project_id',$request->job_id)->where('initiated_by',$request->initiated_by)->orWhere('initiated_with',$request->initiated_by)->get()->count();

           

            if($channelCheck == 0){
                $project = new PitchChannel();
                $project->project_id = $request->job_id;
                $project->name = $projectCheck->title;
                $project->initiated_by = auth()->guard('web')->user()->id;
                $project->initiated_with = $request->initiated_by;
                $project->save();
            }else{
                      $project =  PitchChannel::where('project_id',$request->job_id)->where('initiated_by',$request->initiated_by)->orWhere('initiated_with',$request->initiated_by)->first();
            }
            $message = PitchMessage::where('channel_id',$project->id)->get();
              if($project)
              return response()->json(array('project' => $project->id,'message'=>$message));
              else
              return redirect()->back()->with('failure', 'Something happend');
          }
//for message channel save
    public function messageStore(Request $request)
    {
        $request->validate([
            'channel_id' => 'required',
        ]);
        //dd($request->msg);

        $channelCheck =  PitchChannel::where('id',$request->channel_id)->first();

          $project = new PitchMessage();
          $project->channel_id = $request->channel_id;
          $project->sender_id = auth()->guard('web')->user()->id;
          $project->receiver_id = $channelCheck->initiated_with;
          $project->message = $request->msg;
          $project->is_read = 1;
          $project->save();

      //dd($project);
        if($project)
        return response()->json(array('msg' => $project->message));
        else
        return redirect()->back()->with('failure', 'Something happend');
    }

}
