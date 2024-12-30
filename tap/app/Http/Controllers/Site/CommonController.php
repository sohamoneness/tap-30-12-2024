<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Currency;
use App\Models\PlansPage;
use App\Models\PlansPriceCategory;
use App\Models\PlansPriceFaq;
use App\Models\PlansWithPrice;
use App\Models\MarketTypesCategory;
use App\Models\MarketTypesFaq;
use App\Models\MarketTypesFooter;
use App\Models\MarketTypesBanner;
use App\Models\MarketTypesData;

class CommonController extends Controller
{

    public function index() 
    {
        $blogs=Article::where('status',1)->orderby('id','desc')->paginate(12);
        return view('site.index',compact('blogs'));
    }

    public function bloggers()
    {
        $categories = MarketTypesCategory::where('market_type_id', 1)->orderBy('id', 'desc')->get();
        $faqs = MarketTypesFaq::where('market_type_id', 1)->orderBy('id', 'desc')->get();
        $footer = MarketTypesFooter::where('market_type_id', 1)->first();
        $banners = MarketTypesBanner::where('market_type_id', 1)->orderBy('id', 'desc')->get();
        $data = MarketTypesData::where('market_type_id', 1)->first();
        return view('site.bloggers', compact('categories','faqs','footer','banners','data'));
    }

    public function employers()
    {
        $categories = MarketTypesCategory::where('market_type_id', 2)->orderBy('id', 'desc')->get();
        $faqs = MarketTypesFaq::where('market_type_id', 2)->orderBy('id', 'desc')->get();
        $footer = MarketTypesFooter::where('market_type_id', 2)->first();
        $banners = MarketTypesBanner::where('market_type_id', 2)->orderBy('id', 'desc')->get();
        $data = MarketTypesData::where('market_type_id', 2)->first();
        return view('site.employers', compact('categories','faqs','footer','banners','data'));
    }

    public function freelancer()
    {
        $categories = MarketTypesCategory::where('market_type_id', 3)->orderBy('id', 'desc')->get();
        $faqs = MarketTypesFaq::where('market_type_id', 3)->orderBy('id', 'desc')->get();
        $footer = MarketTypesFooter::where('market_type_id', 3)->first();
        $banners = MarketTypesBanner::where('market_type_id', 3)->orderBy('id', 'desc')->get();
        $data = MarketTypesData::where('market_type_id', 3)->first();
        return view('site.freelancer', compact('categories','faqs','footer','banners','data'));
    }

    public function publishers()
    {
        $categories = MarketTypesCategory::where('market_type_id', 4)->orderBy('id', 'desc')->get();
        $faqs = MarketTypesFaq::where('market_type_id', 4)->orderBy('id', 'desc')->get();
        $footer = MarketTypesFooter::where('market_type_id', 4)->first();
        $banners = MarketTypesBanner::where('market_type_id', 4)->orderBy('id', 'desc')->get();
        $data = MarketTypesData::where('market_type_id', 4)->first();
        return view('site.publishers', compact('categories','faqs','footer','banners','data'));
    }

    public function in_house_copywriter()
    {
        return view('site.in_house_copywriter');
    }



    public function knowledge_centre(){

        $blogs=Article::where('status',1)->orderby('id','desc')->paginate(2);

        

        return view('site.knowledge_centre',compact('blogs'));

    }

    

    public function pricing()
    {   
        $currencies = Currency::orderBy('currency','DESC')->get();

        $plans_with_price = PlansWithPrice::where('currency_id',$currencies[0]->id)->orderBy('price')->with('planDet','currencyDet')->get();

        

        if(!empty($request->currency)){

            $cid = Currency::where('slug',$request->currency)->first()->id;

            $plans_with_price = PlansWithPrice::where('currency_id',$cid)->orderBy('price')->with('planDet','currencyDet')->get();

        }



        $plan_page = PlansPage::all()[0];



        $plan_page_faq = PlansPriceFaq::groupBy('header_id')->where('status',1)->get();

        return view('site.pricing',compact('plans_with_price','currencies','plan_page','plan_page_faq'));

    }

    public function contact(){
        // die('contact');
        return view('site.contact');

    }

    public function savecontact(Request $request) {

        
        $request->validate([
            'first_name' => 'required|max:50',
            'last_name' => 'max:50',
            'email' => 'required|email|max:50',
            'ph_number' => 'required|max:12',
            'message' => 'required|max:500'
        ],[
            'first_name.required' => 'Please give first name',
            'first_name.max' => 'Please maintain your name within 50 letters',
            'last_name.required' => 'Please maintain your name within 50 letters',
            'email.required' => 'Please give email address',
            'email.max' => 'Please maintain your email within 50 letters',
            'email.email' => 'Invalid email address',
            'ph_number.required' => 'Please give phone number',
            'ph_number.max' => 'Phone number allowed maximum 12 digits',
            'message.required' => 'Please enter some message',
            'message.max' => 'Please maintain message within 500 characters',
        ]);

        \Session::flash('message', 'Submitted successfully !!!');
        return redirect()->route('sitenew.contact');
        
    }

}