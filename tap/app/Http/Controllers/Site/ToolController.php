<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ToolAreaofInterest;
use App\Models\ToolAreaofInterestCategory;
use App\Models\Tool;
use App\Models\ToolArticle;
use App\Models\ToolSubCategory;
use App\Models\ToolBenefit;
use App\Models\ToolHowToUse;
use App\Models\ToolUseCase;
use App\Models\ToolIntegrationCompatibility;
use App\Models\ToolPlan;

class ToolController extends Controller
{
	public function index(Request $request)
    {
        $data = (object)[];
        $data->content = Tool::all();
        // $data->subcategories = ToolSubCategory::where('status', 1)->orderBy('title')->get();
        $featured = ToolAreaofInterest::where('status',1)->orderBy('id','ASC')->get()->take(3);
        $recommended = ToolAreaofInterest::where('is_recommended',1)->orderBy('id','ASC')->get()->take(3);        
        $subcategories = ToolSubCategory::where('status', 1)->orderBy('title')->get();

        return view('site.tools.index',compact('data','featured','recommended','subcategories'));
    }

    public function detail(Request $request, $slug)
    {
        $tool = ToolAreaofInterest::where('slug', $slug)->first();
        // dd($tool);
        $benefits = ToolBenefit::where('tool_id', $tool->id)->orderBy('id', 'desc')->get();
        $howtouse = ToolHowToUse::where('tool_id', $tool->id)->orderBy('id', 'desc')->get();
        $usecase = ToolUseCase::where('tool_id', $tool->id)->orderBy('id', 'desc')->get();
        $integration_compatibilities = ToolIntegrationCompatibility::where('tool_id', $tool->id)->orderBy('id', 'desc')->get();
        $plans = ToolPlan::where('tool_id', $tool->id)->get();
        return view('site.tools.details', compact('tool','benefits','howtouse','usecase','integration_compatibilities','plans'));
    }

    /*public function detail(Request $request, $slug)
    {
        $tool = ToolAreaofInterest::where('slug', $slug)->first();
        $articles = ToolArticle::where('tool_id', $tool->id)->get();

        return view('front.feature.details', compact('tool', 'articles'));
    }*/

}