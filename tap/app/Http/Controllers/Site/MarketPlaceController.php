<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\MarketPlaceFaq;
use App\Models\MarketPlacePage;
use App\Models\User;
use App\Models\UserSocialMedia;
use App\Models\UserLanguage;
use App\Models\SocialMedia;
use App\Models\UserSpeciality;
use App\Models\Portfolio;
use App\Models\Employment;
use App\Models\Client;
use App\Models\Education;
use App\Models\Testimonial;
use App\Models\Certificate;
use App\Models\Language;
use App\Feedback;
use App\Models\PrivatePortfolio;
use Illuminate\Http\Request;

class MarketPlaceController extends Controller
{
    public function index(Request $request)
    {
        $writers = User::where('type',1)->where('is_deleted',0);
        $countries = User::where('type',1)->where('is_deleted',0)->distinct('country')->pluck('country', 'country');
        $occupations = User::where('type',1)->where('is_deleted',0)->distinct('occupation')->pluck('occupation', 'occupation');
        $languages = Language::orderBy('name')->get();

        $master_categories = [];
        $all_writers = User::where('type',1)->get();
        foreach ($all_writers as $key => $value) {
            foreach (explode(', ',$value->categories) as $key => $data) {
                if(!in_array($data,$master_categories)){
                    array_push($master_categories, $data);
                }
            }
            
        }

        // $master_categories = sort($master_categories);

        // dd($countries);

        if(!empty($request->category)){
            $writers = $writers->where('categories','like','%'.$request->category.'%');
        }

        if(!empty($request->name)){
            $writers = $writers->where('first_name','like','%'.$request->name.'%');
        }
        if(!empty($request->country)){
            $writers = $writers->where('country', $request->country);
        }
        if(!empty($request->language)){
            $language_id = $request->language;
            $user_languages = UserLanguage::where('language_id', $language_id)->pluck('user_id')->toArray();
            // dd($user_languages);
            if(!empty($user_languages)){
                $writers = $writers->whereIn('id', $user_languages);
            }
            
        }
        if(!empty($request->occupation)){
            $writers = $writers->where('occupation', $request->occupation);
        }
        
        $writers = $writers->paginate(9);

        $marketplacefaq = MarketPlaceFaq::groupBy('header_id')->where('status',1)->get();

        $marketplace_page_content = MarketPlacePage::all()[0];

        $recomended_writers = User::where('type',1)->where('is_deleted',0)->where('is_recomended',1)->paginate(9);

        return view('site.marketplace.index',compact('writers', 'master_categories', 'countries', 'languages', 'occupations', 'all_writers', 'marketplacefaq','marketplace_page_content', 'recomended_writers'));
    }
    
    public function details(Request $request, $slug)
    {
        $data = (object)[];
        $data->user = User::where('slug', $slug)->first();
        $data->socialMedias = UserSocialMedia::where('user_id', $data->user->id)->with('socialMediaDetails')->get();
        $data->languages = UserLanguage::where('user_id', $data->user->id)->with('languageDetails')->get();
        $data->specialities = UserSpeciality::where('user_id', $data->user->id)->with('specialityDetails')->get();
        $data->portfolios = Portfolio::where('user_id', $data->user->id)->get();
        $data->employments = Employment::where('user_id', $data->user->id)->get();
        $data->clients = Client::where('user_id', $data->user->id)->get();
        $data->educations = Education::where('user_id', $data->user->id)->orderBy('position')->get();
        $data->testimonials = Testimonial::where('user_id', $data->user->id)->get();
        $data->certificates = Certificate::where('user_id', $data->user->id)->get();
        $data->feedback = Feedback::where('user_id', $data->user->id)->get();
         $data->private_article = PrivatePortfolio::where('user_id', $data->user->id)->get();

        //dd($data->certificates);

        return view('site.marketplace.details', compact('data'));
    }
}
