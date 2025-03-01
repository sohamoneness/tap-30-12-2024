<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Support;
use App\Models\SupportFaq;
use App\Models\SupportFaqCategory;
use App\Models\SupportWidget;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        $support=Support::all();
        if(!empty($request->keyword)){
          $search_string = $request->keyword; 
          $supportWidget = SupportWidget::where('title', 'like', '%' . $search_string . '%')->where('status',1)->get(); 
        }else{
           $supportWidget=SupportWidget::where('status',1)->get();
        }
        $faqCat=SupportFaqCategory::orderby('title')->get();
        $faq=SupportFaq::all();
        return view('front.support.index',compact('support','supportWidget','faqCat','faq'));
    }
}
