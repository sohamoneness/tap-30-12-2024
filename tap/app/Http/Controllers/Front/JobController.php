<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ApplyJob;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;
use App\Models\ReportJob;
use App\Models\JobUser;
use App\Models\JobTag;
use App\Contracts\JobContract;
use App\Models\NotInterestedJob;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\JobSaveSearch;
use Illuminate\Support\Facades\Auth;
use Redirect;
class JobController extends Controller {

    protected $JobRepository;

    public function __construct(JobContract $JobRepository)
    {
        $this->JobRepository = $JobRepository;
        $this->middleware(function ($request, $next) {
	    if(Auth::user()){;
		  return $next($request);
		}else{
		           $url = route('front.user.login');
                         return redirect($url);
		}
	    });
    }

   public function index(Request $request)
    {
        $user_id = auth()->guard('web')->user()->id;
        DB::enableQueryLog();
        if (!empty($request->filter)) {
            $keyword = $request->keyword;
            $key = $request->key;
            $employment_type = $request->employment_type;
            $salary = $request->salary;
            $address = $request->address;
           // $payment = $request->payment;
            $min_price = $request->min_price;
            $max_price = $request->max_price;
            $source = $request->source;
            $featured = $request->featured_flag;
            $beginner_friendly = $request->beginner_friendly;

            // save job
            if(!empty($keyword)) {
                // check if keyword already exist
                $keywordChk = JobSaveSearch::where('user_id', $user_id)->where('keyword', $keyword)->first();

                if (empty($keywordChk)) {
                    $job = new JobSaveSearch();
                    $job->user_id = $user_id;
                    $job->keyword = $keyword;
                    $job->save();
                }
            }
            
            // DB::enableQueryLog();

            $job = Job::where('status', 1)
            ->when($keyword, function ($query, $keyword) {
                return $query->where('title', 'like', '%'.$keyword.'%');
            })
            ->when($key, function ($query, $key) {
                return $query->where('title', 'like', '%'.$key.'%');
            })
            ->when($address, function ($query, $address) {
                return $query->where('location', 'like', '%'.$address.'%')->orWhere('address', 'like', '%'.$address.'%')->orWhere('city', 'like', '%'.$address.'%')->orWhere('state', 'like', '%'.$address.'%')->orWhere('country', 'like', '%'.$address.'%');


            })
            ->when($salary, function($query, $salary) {
                return $query->where('salary', $salary);
            })
            // ->when($payment, function($query, $payment) {
            //     $payment = explode("-",$payment);
            //     $min_salary = $payment[0];
            //     $max_salary =  $payment[1];
            //     return $query->where('payment', '>=',  $min_salary)->where('payment', '<=',  $max_salary);
            // })

            ->when($min_price, function($query, $min_price) {
                return $query->where('payment','>=', (int) $min_price);
            })

            ->when($max_price, function($query, $max_price) {
                return $query->where('payment','<=', (int) $max_price);
            })

            ->when($source, function($query, $source) {
                return $query->where('source', $source);
            })
            ->when($featured, function($query, $featured) {
                return $query->where('featured_flag', $featured);
            })
            ->when($beginner_friendly, function($query, $beginner_friendly) {
                return $query->where('beginner_friendly', $beginner_friendly);
            })
            ->when($employment_type, function($query, $employment_type) {
                if (count($employment_type) > 1) {
                    foreach($employment_type as $key => $employment) {
                        if ($key == 0) {
                            $queryUpdt = $query->where('employment_type', $employment);
                        } else {
                            $queryUpdt = $query->orWhere('employment_type', $employment);
                        }
                    }
                    return $queryUpdt;
                } else {
                    return $query->where('employment_type', $employment_type[0]);
                }
            })
            ->latest('id')
            ->paginate(10);
             //dd(DB::getQueryLog());
            
            /*
            if (!empty($request->keyword)) {
                $searchCount= JobSaveSearch::where('user_id',auth()->guard('web')->user()->id)->count();
                if($searchCount== 5){
                //return redirect()->route('front.job.index')->with('failure', 'You can save upto 5 keyword');
                }else{
                $job = new JobSaveSearch();
                $job->user_id = auth()->guard('web')->user() ? auth()->guard('web')->user()->id : 0;
                $job->keyword = $request->keyword ?? '';
                $job->save();
                // return redirect()->route('front.job.index')->with('success', 'search saved successfully');
                }
            }
            */
        } else {
            $job = Job::where('status', 1)->orWhere('featured_flag', 1)->latest('id')->paginate(10);
        }
        $category = JobCategory::where('status',1)->orderby('title')->get();
        $tag = JobTag::orderby('title')->get();
        $saveItem= JobSaveSearch::where('user_id',auth()->guard('web')->user()->id)->orderby('id','desc')->take(5)->get();
        return view('front.job.index',compact('job','category','tag','saveItem'));
    }



    public function details(Request $request,$slug)
    {
        $job = Job::where('slug',$slug)->get();
        $category = JobCategory::where('status',1)->orderby('title')->get();
        $tag = JobTag::orderby('title')->get();
        // check if job is already applied
        if (auth()->guard('web')->user()->id) {
            $jobApplied = ApplyJob::where('job_id', $job[0]->id)->where('user_id', auth()->guard('web')->user()->id)->first();
        }
        return view('front.job.details',compact('job', 'category', 'tag', 'jobApplied'));
    }
    //**  save job     **//
    public function store(Request $request){
	    // check if collection already exists
        if(auth()->guard('user')->check()) {
           $collectionExistsCheck = JobUser::where('job_id', $request->id)->where('user_id', auth()->guard('web')->user()->id)->first();
        } else {
           $collectionExistsCheck = JobUser::where('job_id', $request->id)->first();
        }
        if($collectionExistsCheck != null) {
            // if found
            $data = JobUser::destroy($collectionExistsCheck->id);
            return response()->json(['status' => 200, 'type' => 'remove', 'message' => 'Job removed from savelist']);
        } else {
            // if not found
            $data = new JobUser();
            $data->user_id = auth()->guard('web')->user() ? auth()->guard('web')->user()->id : 0;
            $data->job_id = $request->id;
            $data->save();
            return response()->json(['status' => 200, 'type' => 'add', 'message' => 'Job saved']);
        }
	}
    //** Job Apply **//
  public function jobapply(Request $request){
        // dd($request->all());

        $request->validate([
            'job_id' => 'required|integer|min:1',
            'name' => 'required|string|min:2|max:255',
            'email' => 'required|email|min:2|max:255',
            'mobile' => 'required|integer',
            // 'cv' => 'required'
        ]);

        $params = $request->except('_token');
        $data = $this->JobRepository->applyjob($params);
        $response = Job::where('id', '=', $request->job_id)->first();
        $data['company_website'] = $response['company_website'];  

        if ($data) {
            $url = $data['company_website']; 
            //return Redirect::away($url);
           // return redirect()->back()->with('success', 'Successfully Applied for this Job');
           return response()->json(array('success' => 'Successfully Applied for this Job', 'url'=>$url));
        } else {
            return redirect()->back()->with('failure', 'Something happened');
        }
    }
    /* job interest*/
    public function jobinterest(Request $request,$id){
	    // check if collection already exists
        if(auth()->guard('user')->check()) {
           $collectionExistsCheck = NotInterestedJob::where('job_id', $id)->where('user_id', auth()->guard('web')->user()->id)->first();
        } else {
           $collectionExistsCheck = NotInterestedJob::where('job_id', $id)->first();
        }
        if($collectionExistsCheck != null) {
            // if found
            $data = NotInterestedJob::destroy($collectionExistsCheck->id);
            return response()->json(['status' => 200, 'type' => 'remove', 'message' => 'Job removed from savelist']);
        } else {
            // if not found
            $data = new NotInterestedJob();
            $data->user_id = auth()->guard('web')->user() ? auth()->guard('web')->user()->id : 0;
            $data->job_id = $id;
            $data->status = 1;
            $data->save();
            
            return redirect()->back()->with('success','Thank you for your feedback');
        }
	}
       /* report job */
    public function jobreport(Request $request){
	    // check if collection already exists
        if(auth()->guard('user')->check()) {
           $collectionExistsCheck = ReportJob::where('job_id', $request->id)->where('user_id', auth()->guard('web')->user()->id)->first();
        } else {
           $collectionExistsCheck = ReportJob::where('job_id', $request->id)->first();
        }
        if($collectionExistsCheck != null) {
            // if found
            $data = ReportJob::destroy($collectionExistsCheck->id);
            return response()->json(['status' => 200, 'type' => 'remove', 'message' => 'Job removed']);
        } else {
            // if not found
            $data = new ReportJob();
            $data->user_id = auth()->guard('web')->user() ? auth()->guard('web')->user()->id : 0;
            $data->job_id = $request->job_id;
            $data->comment = $request->comment;
            $data->save();
            return redirect()->back()->with('success','Thank you for your feedback');
        }
    }
    //save job search result
    public function saveSearch(Request $request)
    {
        $searchCount= JobSaveSearch::where('user_id',auth()->guard('web')->user()->id)->count();
        if($searchCount== 5){
        return redirect()->route('front.job.index')->with('failure', 'You can save upto 5 keyword');
        }else{
        $job = new JobSaveSearch();
        $job->user_id = auth()->guard('web')->user() ? auth()->guard('web')->user()->id : 0;
        $job->keyword = $request->keyword ?? '';
        $job->save();
        return redirect()->route('front.job.index')->with('success', 'search saved successfully');
        }
    }
   public function savedSearch(Request $request)
    {
        $search= JobSaveSearch::where('user_id',auth()->guard('web')->user()->id)->orderby('id','desc')->get();
       // dd($search);
        return view('front.job.saved-search',compact('search'));
        
    }

}
