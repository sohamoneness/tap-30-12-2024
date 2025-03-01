<?php
// use App\Models\Notification;

use App\Models\ArticleCategory;
use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseReview;
use App\Models\Currency;
use App\Models\Deal;
use App\Models\Order;
use App\Models\JobUser;
use App\Models\OrderProduct;
use App\Models\PlansAndPricing;
use App\Models\NotInterestedJob;
use App\Models\ReportJob;
use App\Models\PlansWithPrice;
use App\Models\ProjectTask;
use App\Models\SaveTopic;
use App\Models\Topic;
use App\Models\User;
use App\Models\Client;
use App\Models\Project;
use App\Models\Activity;
use App\Models\ProjectNote;
use App\Models\EventUser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Stripe\Plan;
use App\Models\ApplyJob;

use App\Models\NotInterestJob;

if (!function_exists('sidebar_open')) {
    function sidebar_open($routes = []) {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'active' : '';
    }
}

if (!function_exists('randomGenerator')) {
    function randomGenerator() {
        return uniqid().''.date('y-m-d-h-i-s');
    }
}

if (!function_exists('imageUpload')) {
    function imageUpload($image, $folder = 'image') {
        $imageName = randomGenerator();
        $imageExtension = $image->getClientOriginalExtension();
        $uploadPath = 'uploads/'.$folder.'/';

        $image->move(public_path($uploadPath), $imageName.'.'.$imageExtension);
        $imagePath = $uploadPath.$imageName.'.'.$imageExtension;
        return $imagePath;
    }
}

if (!function_exists('jobTagsHtml')) {
    function jobTagsHtml($job_id) {
        $tags = \App\Models\JobTag::where('job_id', $job_id)->orderby('title')->get();

        if (count($tags) > 0) {
            $content = '
            <div class="content-mid">
                <ul class="list-unstyled p-0 m-0">';

                foreach($tags as $tag) {
                    $content .= '<li>'.ucwords($tag->title).'</li>';
                }
                    // @foreach ($tag as $tagKey => $tagVal)
                    //     <li>{{ ucwords($tagVal->title) }} </li>
                    // @endforeach
                $content .= '</ul>
            </div>';

            return $content;
        } else {
            return false;
        }
    }
}
//portfolio tag
if (!function_exists('portfolioTagsHtml')) {
    function portfolioTagsHtml($id) {
        $tag = \App\Models\Portfolio::where('id', $id)->orderby('title')->first();
        //dd($tag);
        if (!empty($tag->tags)) {
            $content = '
            <div class="content-mid">
                <ul class="list-unstyled p-0 m-0">';

                foreach(explode(',', $tag->tags) as $tagKey => $tagVal) {
                    $content .= '<li>'.ucwords($tagVal).'</li>';
                }
                
                $content .= '</ul>
            </div>';

            return $content;
        } else {
            return false;
        }
    }
}
if (!function_exists('imageResizeAndSave')) {
    function imageResizeAndSave($imageUrl, $type = 'categories', $filename)
    {
        if (!empty($imageUrl)) {

            //save 60x60 image
            \Storage::disk('public')->makeDirectory($type.'/60x60');
            $path60X60     = storage_path('app/public/'.$type.'/60x60/'.$filename);
            $canvas = \Image::canvas(60, 60);
            $image = \Image::make($imageUrl)->resize(60, 60,
                    function($constraint) {
                        $constraint->aspectRatio();
                    });
            $canvas->insert($image, 'center');
            $canvas->save($path60X60, 70);

            //save 350X350 image
            \Storage::disk('public')->makeDirectory($type.'/350x350');
            $path350X350     = storage_path('app/public/'.$type.'/350x350/'.$filename);
            $canvas = \Image::canvas(350, 350);
            $image = \Image::make($imageUrl)->resize(350, 350,
                    function($constraint) {
                        $constraint->aspectRatio();
                    });
            $canvas->insert($image, 'center');
            $canvas->save($path350X350, 75);

            return $filename;
        } else { return false; }
    }
}

if (!function_exists('languageKnown')) {
    function languageKnown($lang_id) {
        $chk = \App\Models\UserLanguage::where('user_id', auth()->guard()->user()->id)->where('language_id', $lang_id)->first();

        if (!empty($chk)) {
            return true;
        } else {
            return false;
        }
    }
}

if (!function_exists('userSocialMediaLink')) {
    function userSocialMediaLink($socialMediaId) {
        $chk = \App\Models\UserSocialMedia::select('link')->where('user_id', auth()->guard()->user()->id)->where('social_media_id', $socialMediaId)->first();

        if (!empty($chk)) {
            return $chk->link;
        } else {
            return false;
        }
    }
}

if (!function_exists('slugGenerate')) {
    function slugGenerate($title, $table) {
        $slug = Str::slug($title, '-');
        $slugExistCount = DB::table($table)->where('title', $title)->count();
        if ($slugExistCount > 0) $slug = $slug . '-' . ($slugExistCount + 1);
        return $slug;
    }
}

/*
function sendNotification($sender, $receiver, $type, $route, $title, $body='')
{
    $noti = new Notification();
    $noti->sender = $sender;
    $noti->receiver = $receiver;
    $noti->type = $type;
    $noti->route = $route;
    $noti->title = $title;
    $noti->description = $body;
    $noti->read_flag = 0;
    $noti->save();
}
*/

function countTotalHours($courseid)
{
    $totalhrs = 0;
    $lessons = App\Models\CourseLesson::where('course_id', $courseid)->get();
    foreach($lessons as $l){
        $eachtopic = App\Models\LessonTopic::where('lesson_id', $l->lesson_id)->get();
        foreach ($eachtopic as $key => $value) {
            $top = App\Models\Topic::find($value->topic_id);
            $totalhrs += $top->video_length;
        }
    }
    return $totalhrs . ' hours';
}

function totalLessonsAndTopics($courseid)
{
    $lessons= App\Models\CourseLesson::where('course_id', $courseid)->with('lesson')->get();
    $all_topics = [];
    $total_downloadable_contents = 0;
    $topic_count = 0;
    $each_lesson_length = [];
    foreach ($lessons as $l) {
        $topic = App\Models\LessonTopic::where('lesson_id', $l->lesson_id)->with('topic')->get();
        array_push($all_topics, $topic);
        $topic_count += count($topic);
        foreach($topic as $t){
            if($t->topic->video_downloadable == 1){
                $total_downloadable_contents += 1;
            }
        }
    }
    $data['lesson_count'] = count($lessons);
    $data['lessons'] = $lessons;
    $data['topic_count'] = $topic_count;
    $data['topics'] = $all_topics;
    $data['total_downloadable_contents'] = $total_downloadable_contents;

    return (object)$data;
}
//task comment count

function totalComments($taskid)
{
    $comment= App\Models\TaskComment::where('task_id', $taskid)->with('task')->get();
    $all_topics = [];
    $data['comment_count'] = count($comment);
    return (object)$data;
}
function taskComments($taskid)
{
    $comment= App\Models\TaskComment::where('task_id', $taskid)->with('task')->get();
    $all_topics = [];
    $data['comment_count'] = count($comment);
    $data['comments'] = $comment;
    return (object)$data;

}
function getProductSlug($id)
{
    return Course::find($id);
}

function getSubscriptionDetails($id)
{
    return PlansAndPricing::find($id);
}

function getDealDetails($id)
{
    return Deal::find($id);
}

function FetchIfOrderContainsCourse($order_id)
{
    $order_content = OrderProduct::where('order_id',$order_id)->where('type',1)->get();
    if(count($order_content) > 0)
        return $order_content;
    else
        return false;
}

function CheckIfUserBoughtTheCourse($courseid, $user_id){
    $orders = Order::where('user_id', $user_id)->with('orderProducts')->get();
    $my_courses = [];
    foreach ($orders as $o){
        foreach($o->orderProducts as $op){
            if($op->type == 1){
                array_push($my_courses, $op->course_id);
            }
        }
    }

    if(in_array($courseid, $my_courses))
        return true;
    else
        return false;

}

function CheckIfUserBoughtTheSubscription($courseid, $user_id){
    $orders = Order::where('user_id', $user_id)->with('orderProducts')->get();
    $my_courses = [];
    foreach ($orders as $o){
        foreach($o->orderProducts as $op){
            if($op->type == 4){
                array_push($my_courses, $op->course_id);
            }
        }
    }

    if(in_array($courseid, $my_courses)){
        return true;
    }
    else
        return false;

}

function CheckIfUserBoughtAnySubscription()
{
    if(Auth::guard('web')->user()->subscription_id == null){
        return ['status'=>false, 'label_status' => 'danger',  'message' => 'No subscription purchased', 'data'=> array()];
    } else {

        $checkPlan = \App\Models\PlansWithPrice::where('id', Auth::guard('web')->user()->plan_with_price_id)->first();

        if(empty($checkPlan->duration)){

            return ['status'=>false, 'label_status' => 'warning', 'message' => 'Free susbscription. Please upgrade for more features', 'data'=> array()];

        } else {
            $checkUserSubscription = \App\Models\UserSubscription::where('user_id', Auth::guard('web')->user()->id)->where('end_date', '>=', date('Y-m-d'))->orderBy('id','desc')->first();

            if(!empty($checkUserSubscription)){
                return ['status'=>true, 'label_status' => 'success', 'message' => 'Your subscription is ongoing', 'data'=> array(                    
                    'plan_id' => $checkUserSubscription->plan_with_price->plan_id,
                    'plan_with_price_id' => $checkUserSubscription->plan_with_price_id,
                    'end_date' => $checkUserSubscription->end_date
                )];
            } else {
                return ['status'=>false, 'label_status' => 'danger',  'message' => 'Your susbcription is expired. Please renew again', 'data'=> array()];
            }
        }

        
    }
}

function CheckIfContentIsUnderSubscription($content_id, $content_table)
{
    if(!empty(Auth::guard('web')->user()->subscription_id)){
        $planprice = PlansWithPrice::where('plan_id', Auth::guard('web')->user()->subscription_id)->first()->price;
        $plans_ids = PlansWithPrice::where('price','<=',$planprice)->groupBy('plan_id')->get('plan_id');
        $plan_ids_arr = [];
        foreach($plans_ids as $item){
            array_push($plan_ids_arr,$item->plan_id);
        }
        $content = DB::table($content_table)->where('id',$content_id)->whereIn('subscription_status',$plan_ids_arr)->get();
    }else{
        $plan = PlansAndPricing::where('name','like','%free%')->first()->id;
        $content = DB::table($content_table)->where('id',$content_id)->where('subscription_status',$plan)->get();
    }

    if(count($content) > 0){
        return true;
    }else{
        return false;
    }
}

function CheckIfUserBoughtTheDeal($courseid, $user_id){
    $orders = Order::where('user_id', $user_id)->with('orderProducts')->get();
    $my_courses = [];
    foreach ($orders as $o){
        foreach($o->orderProducts as $op){
            if($op->type == 5){
                array_push($my_courses, $op->course_id);
            }
        }
    }

    if(in_array($courseid, $my_courses)){
        return true;
    }
    else
        return false;

}

function getChargesLimits()
{
    return DB::table('charges_limit')->get();
}


function getCureencyList()
{
    return Currency::all();
}

function CompletedTasks($project_id)
{
    return count(ProjectTask::where('project_id',$project_id)->where('deleted_at',null)->where('status','like','%completed%')->get());
}

function getIceboxTasks($project_id)
{
    return count(ProjectTask::where('project_id',$project_id)->where('deleted_at',null)->where('status','like','%icebox%')->get());
}

function getTodoTasks($project_id)
{
    return count(ProjectTask::where('project_id',$project_id)->where('deleted_at',null)->where('status','like','%to-do%')->get());
}

function getInProgressTasks($project_id)
{
    return count(ProjectTask::where('project_id',$project_id)->where('deleted_at',null)->where('status','like','%in-progress%')->get());
}

function getClientreviewedTasks($project_id)
{
    return count(ProjectTask::where('project_id',$project_id)->where('deleted_at',null)->where('status','like','%client-review%')->get());
}

function getInApprovedTasks($project_id)
{
    return count(ProjectTask::where('project_id',$project_id)->where('deleted_at',null)->where('status','like','%approved%')->get());
}

function getInSpareTasks($project_id)
{
    return count(ProjectTask::where('project_id',$project_id)->where('deleted_at',null)->where('status','like','%spare%')->get());
}

function getMyClients($user_id)
{
    return count(Client::where('user_id',$user_id)->get());
}

function getTotalTasks($user_id)
{
    return count(ProjectTask::where('created_by',$user_id)->where('deleted_at',null)->get());
}

function getPendingTasksCount($user_id)
{
    return count(ProjectTask::where('created_by',$user_id)->where('deleted_at',null)->where('status','like','%icebox%')->orWhere('status','like','%in-progress%')->orWhere('status','like','%client-review%')->get());
}

function getCompletedTasksCount($user_id)
{
    return count(ProjectTask::where('created_by',$user_id)->where('deleted_at',null)->where('status','like','%completed%')->orWhere('status','like','%to-do%')->get());
}

function getApprovedTasksCount($user_id)
{
    return count(ProjectTask::where('created_by',$user_id)->where('deleted_at',null)->where('status','like','%approved%')->orWhere('status','like','%to-do%')->get());
}


function CategoryNames($category_string)
{
    $category = explode(',',$category_string);
    $category_arr = [];
    foreach ($category as $key => $value) {
        array_push($category_arr,ArticleCategory::find($value)->title);
    }
    return $category_arr;
}

function completedTopicPerCourse($courseid){
    $user_id = Auth::guard('web')->user()->id;
    $data = [];
    $data['total_topic'] = SaveTopic::where('user_id',$user_id)->where('course_id',$courseid)->count();
    $data['total_viewed_topic'] = SaveTopic::where('user_id',$user_id)->where('course_id',$courseid)->where('is_view',1)->count();
    return (object)$data;
}

function completedTopicPerLesson($courseid, $lesson_id){
    $user_id = Auth::guard('web')->user()->id;
    return SaveTopic::where('user_id',$user_id)->where('course_id',$courseid)->where('lesson_id',$lesson_id)->where('is_view',1)->count();
}


function getPrevVideoTopic($id)
{
    $savetopic = SaveTopic::find($id);
    $user_id = $savetopic->user_id;
    $course_id = $savetopic->course_id;

    $prev_row = SaveTopic::where('id','<',$id)->where('user_id',$user_id)->where('course_id',$course_id)->orderBy('id','DESC')->get();
    if(count($prev_row)>0){
        return $prev_row[0];
    }else{
        return false;
    }
}
function getNextVideoTopic($id)
{
    $savetopic = SaveTopic::find($id);
    $user_id = $savetopic->user_id;
    $course_id = $savetopic->course_id;

    $prev_row = SaveTopic::where('id','>',$id)->where('user_id',$user_id)->where('course_id',$course_id)->orderBy('id','ASC')->get();
    if(count($prev_row)>0){
        return $prev_row[0];
    }else{
        return false;
    }
}

function getCountervideotopic($courseid){
    $user_id = Auth::guard('web')->user()->id;
    if(SaveTopic::where('user_id',$user_id)->where('course_id',$courseid)->count() > 0){
        $data = SaveTopic::where('user_id',$user_id)->where('course_id',$courseid)->where('counter',1)->first(); 
        $last_topic = SaveTopic::where('user_id',$user_id)->where('course_id',$courseid)->orderBy('id','DESC')->first()->id;
        if($data->id == $last_topic){
            if(count(SaveTopic::where('id' ,$data->id)->where('is_view',1)->get()) <= 0){
                SaveTopic::where('id' ,$data->id)->update(['is_view'=>1]);
            }
        }
        return $data;
    }
    else{
        $data = SaveTopic::where('course_id',$courseid)->where('counter',1)->first(); 
        return $data;
    }
        
}

function getCartCount()
{
    $data = Cart::where('ip', $_SERVER['REMOTE_ADDR'])->get()->count();
        
    if(Auth::guard('web')->check()){
        $data = Cart::where('ip', $_SERVER['REMOTE_ADDR'])->orWhere('user_id',Auth::guard('web')->user()->id)->get()->count();
    }
        // coupon code usage check
    return $data;
}

function getTopicDetail($topic_id)
{
    return Topic::find($topic_id);
}

function getUserDet($user_id)
{
    return User::find($user_id);
}

function getAllReviewsTopicWise($topic_id)
{
    return CourseReview::where('topic_id',$topic_id)->orderBy('id','DESC')->paginate(10);
}

function getAllReviewsCourseWise($course_id)
{
    return CourseReview::where('course_id',$course_id)->orderBy('id','DESC')->paginate(10);
}

function getReviewDetails($course_id)
{
    $all_review = CourseReview::where('course_id',$course_id);
    
    $data = [];
    $data['total_reviews'] = $all_review->count();
    $data['total_person_reviewed'] = $all_review->groupBy('user_id')->get()->count();
    $data['average_star_count'] = $all_review->avg('rating');

    return $data;
}

function getViewedStatus($course_id,$lesson_id,$topic_id)
{
    $user_id = Auth::guard('web')->user()->id;
    $savetopic = SaveTopic::where('user_id',$user_id)->where('course_id',$course_id)->where('lesson_id',$lesson_id)->where('topic_id',$topic_id)->first();
    return $savetopic;
}

function getTopicVideo($topic_id){
    return Topic::find($topic_id)->video;
}

// show saved jobs only
if(!function_exists('savedJobs')) {
    function savedJobs($job_id) {
        $jobUser = JobUser::where('user_id', auth()->guard('web')->user()->id)
        ->where('job_id', $job_id)
        ->first();

        if (!empty($jobUser)) {
            return true;
        } else {
            return false;
        }
    }
}

//not interest job

if(!function_exists('interestJobs')) {
    function interestJobs($job_id) {
        $jobUser = NotInterestedJob::where('user_id', auth()->guard('web')->user()->id)
        ->where('job_id', $job_id)
        ->first();

        if (!empty($jobUser)) {
            return true;
        } else {
            return false;
        }
    }
}
//report job
if(!function_exists('reportJobs')) {
    function reportJobs($job_id) {
        $jobUser = ReportJob::where('user_id', auth()->guard('web')->user()->id)
        ->where('job_id', $job_id)
        ->first();

        if (!empty($jobUser)) {
            return true;
        } else {
            return false;
        }
    }
}
// do not remove - used in portfolio feedback
// if(!function_exists('RatingHtml')) {
function RatingHtml($rating = null) {
    // return $rating;
    if ($rating == 0) {
        $resp = '<span>No ratings</span>';
    } elseif ($rating == 1) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small>
            <i class="fa-solid fa-star "></i>
            <i class="fa-regular fa-star "></i>
            <i class="fa-regular fa-star "></i>
            <i class="fa-regular fa-star "></i>
            <i class="fa-regular fa-star "></i>
        </div>
        ';
    } elseif ($rating > 1 && $rating < 2) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small>
            <i class="fa fa-star checked"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
        </div>
        ';
    } elseif ($rating == 2) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
        </div>
        ';
    } elseif ($rating > 2 && $rating < 3) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fas fa-star-half-alt"></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
        </div>
        ';
    } elseif ($rating == 3) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small>
            <i class="fa-solid fa-star "></i>
            <i class="fa-solid fa-star "></i>
            <i class="fa-solid fa-star "></i>
            <i class="fa-regular fa-star"></i>
            <i class="fa-regular fa-star"></i>
        </div>
        ';
    } elseif ($rating > 3 && $rating < 4) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small>
            <i class="fa-solid fa-star "></i>
            <i class="fa-solid fa-star "></i>
            <i class="fa-solid fa-star "></i>
            <i class="fa fa-star-half-alt "></i>
            <i class="fa-regular fa-star "></i>
        </div>
        ';
    } elseif ($rating == 4) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small> 
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa-regular fa-star"></i>
        </div>
        ';
    } elseif ($rating > 4 && $rating < 5) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star-half-alt"></i>
            
        </div>
        ';
    } elseif ($rating == 5) {
        $resp = '
        <div class="rating-list-stars d-flex">
            <small>'. round($rating,1) .'</small> 
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
            <i class="fa fa-star checked"></i>
        </div>
        ';
    } else {
        $resp = false;
    }

    return $resp;
}
//average rating

//after purchase course count user

function totalUser($courseid)
{
    $order= App\Models\OrderProduct::where('course_id', $courseid)->with('order')->get();
   // dd($order);
   $user_count=0;
    foreach ($order as $l) {
        $users = App\Models\order::where('order_no', $l->order_id)->with('users')->get();
        $user_count += count($users);
        
    }
    $data['user_count'] = $user_count;
    return (object)$data;
}

//lesson wise topic count

function totalTopics($lesson_id)
{
    $lessons= App\Models\LessonTopic::where('lesson_id', $lesson_id)->with('topic')->get();
    //dd($lessons);
    $all_topics = [];
    $topic_count = 0;
    $each_lesson_length = [];
    foreach ($lessons as $l) {
        $topic = App\Models\Topic::where('id', $l->topic_id)->get();
       
        $topic_count += count($topic);
        //dd($topic_count);
    }
    $data['topic_count'] = $topic_count;
   
    return (object)$data;
}
function countTotalTopicHours($lessonid)
{
    $totalhrs = 0;
    $lessons = App\Models\LessonTopic::where('lesson_id', $lessonid)->get();
    //dd($lessons);
    foreach($lessons as $l){
        //$eachtopic = App\Models\Topic::where('id', $l->topic_id)->get();
            $top = App\Models\Topic::find($l->topic_id);
            $totalhrs += $top->video_length;
       
    }
    return $totalhrs . ' hours';
}

function CountTotalReview($courseid){
    $totalreview = 0;
    $review = App\Models\CourseReview::where('course_id', $courseid)->get();
    //dd($lessons);
    $data['review_count'] = count($review);
    $data['rating_count'] = count($review);
    if( $data['review_count'] == '')
    {
        $data = '<span></span>';
    }
    else{

    }
    return (object)$data;
   
}
//total job applicant count
function CountJobapplicant($job_id)
{
    return ApplyJob::where('job_id',$job_id)->with('job')->count();
}
//total job save count
function CountJobsave($job_id)
{
    return JobUser::where('job_id',$job_id)->with('job')->count();
}
//total job not interest count
function CountJobinterest($job_id)
{
    return NotInterestedJob::where('job_id',$job_id)->with('job')->count();
}
//total job report count
function CountJobreport($job_id)
{
    return ReportJob::where('job_id',$job_id)->with('job')->count();
}

function getMyProjects($user_id){
    $projects = Project::with('taskDetail')->with('clientDetails')->where('created_by', $user_id)->latest('id')->where('deleted_at', null)->get();
    return $projects;
}

function getActivies($user_id){
    $activity = Activity::where('user_id',$user_id)->with('file')->get();

    return $activity;
}

function getClients($user_id){
    $clients = Client::with('projects')->where('user_id',$user_id)->get();

    return $clients;
}

function getProjectNote($user_id){
    //$clients = ProjectNote::where('user_id',$user_id)->with('file')->get();
    $notes = DB::select("select * from project_notes where user_id='$user_id'");

    return $notes;
}

function getMyEvents($user_id){
    $events = EventUser::where('user_id',$user_id)->with('event')->get();

    return $events;
}