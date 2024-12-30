<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Market;
use App\Models\MarketBanner;
use App\Models\MarketCategory;
use App\Models\MarketFaq;
use App\Models\MarketType;
use App\Models\MarketTypesData;
use App\Models\MarketTypesCategory;
use App\Models\MarketTypesFaq;
use App\Models\MarketTypesBanner;
use Illuminate\Http\Request;
use App\Models\MarketTypesFooter;

class MarketController extends Controller
{
    public function index(Request $request)
    {
        $cat=MarketCategory::where('status',1)->get();
        $market=Market::all();
        $faq=MarketFaq::all();
        $banner=MarketBanner::all();
        return view('front.market.index',compact('cat','market','faq','banner'));
    }

    public function detail(Request $request, $marketTypeSlug)
    {
        $marketType = MarketType::where('slug', $marketTypeSlug)->first();

        if (!empty($marketType)) {
            $data = MarketTypesData::where('market_type_id', $marketType->id)->first();
            $cat = MarketTypesCategory::where('market_type_id', $marketType->id)->where('status', 1)->get();
            $faq = MarketTypesFaq::where('market_type_id', $marketType->id)->where('status', 1)->get();
            $banner = MarketTypesBanner::where('market_type_id', $marketType->id)->get();
            $footer =  MarketTypesFooter::where('market_type_id', $marketType->id)->get();

            //dd($footer);

            if (!empty($data)) {
                return view('front.market.detail', compact('marketType', 'data', 'cat', 'faq', 'banner','footer'));
            } else {
                return view('front.error.404');
            }
        } else {
            return view('front.error.404');
        }
    }
}
