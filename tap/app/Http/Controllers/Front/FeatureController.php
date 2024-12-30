<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToolAreaofInterest;
use App\Models\ToolAreaofInterestCategory;
use App\Models\Tool;
class FeatureController extends Controller
{
    public function index(Request $request)
    {
        $data = (object)[];
        $data->content = Tool::all();
        $data->interestCategory = ToolAreaofInterestCategory::where('status', 1)->get();
        if (!empty($request->keyword)){
        $interest = ToolAreaofInterest::where([['title', 'LIKE', '%' . $request->keyword . '%']])->paginate(12);
        } else {
        $interest = ToolAreaofInterest::where('status',1)->paginate(12);
        }
       // dd($interest);
        return view('front.feature.index',compact('data','interest'));
    }
    public function detail(Request $request,$slug)
    {
        $tool = ToolAreaofInterest::where('slug', $slug)->first();
       // dd($interest);
        return view('front.feature.details',compact('tool'));
    }
}
