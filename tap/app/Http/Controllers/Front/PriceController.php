<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Currency;
use App\Models\PlansPage;
use App\Models\PlansPriceCategory;
use App\Models\PlansPriceFaq;
use App\Models\PlansWithPrice;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Current;

class PriceController extends Controller
{
    public function index(Request $request)
    {

        $currencies = Currency::orderBy('currency','DESC')->get();
        $plans_with_price = PlansWithPrice::where('currency_id',$currencies[0]->id)->orderBy('price')->with('planDet','currencyDet')->get();
        
        if(!empty($request->currency_id)){
            $currency = Currency::findOrFail($request->currency_id);
            $plans_with_price = PlansWithPrice::where('currency_id',$request->currency_id)->orderBy('price')->with('planDet','currencyDet')->get();
        }

        $plan_page = PlansPage::all()[0];

        // dd($plans_with_price);

        $plan_page_faq = PlansPriceFaq::groupBy('header_id')->where('status',1)->get();

        return view('front.price.index',compact('plans_with_price','currencies','plan_page','plan_page_faq'));
    }
}
