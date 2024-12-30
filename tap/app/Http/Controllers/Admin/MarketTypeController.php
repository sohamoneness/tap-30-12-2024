<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Str;
use Session;
use DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\MarketType;
use App\Models\MarketTypesData;
use App\Models\MarketTypesCategory;
use App\Models\MarketTypesFaq;
use App\Models\MarketTypesBanner;
use App\Models\MarketTypesFooter;

class MarketTypeController extends BaseController
{
    public function index(Request $request)
    {
        $data = MarketType::orderBy('position', 'asc')->get();

        $this->setPageTitle('Market types', 'List of all Market types');
        return view('admin.market.type.index', compact('data'));
    }

    public function updateStatus(Request $request)
    {
        $type = MarketType::findOrFail($request->id);
        $type->status = $request->check_status;
        $type->save();

        return response()->json(array('message' => 'Market type status updated successfully'));
    }

    public function content(Request $request, $marketTypeId)
    {
        $marketType = MarketType::findOrFail($marketTypeId);

       

        if (!empty($marketType)) {
            $data = MarketTypesData::where('market_type_id', $marketType->id)->first();
            $cat = MarketTypesCategory::where('market_type_id', $marketType->id)->where('status', 1)->paginate(25);
            $faq = MarketTypesFaq::where('market_type_id', $marketType->id)->where('status', 1)->get();
            $banner = MarketTypesBanner::where('market_type_id', $marketType->id)->get();
            $footer =  MarketTypesFooter::where('market_type_id', $marketType->id)->first();

            //dd($footer);

            if (!empty($data)) {
                $this->setPageTitle('Market types - '.$marketType->title, $marketType->title.' content');
                return view('admin.market.type.content', compact('marketType', 'data', 'cat', 'faq', 'banner','footer'));
            } else {
                return view('front.error.404');
            }
        } else {
            return view('front.error.404');
        }
    }

    public function contentUpdate(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'id' => 'required',
            'tag' => 'required',
            'title' => 'required',
            'short_description' => 'required',
            'market_btn' => 'required',
            'market_btn_link' => 'required',
            'short_content_heading' => 'required',
            'short_content' => 'required',
        ]);

        $category = MarketTypesData::findOrFail($request->id);
        $category->title = $request->title;
        $category->tag = $request->tag;
        $category->short_description = $request->short_description;
        $category->market_btn = $request->market_btn;
        $category->market_btn_link = $request->market_btn_link;
        $category->short_content_heading = $request->short_content_heading;
        $category->short_content = $request->short_content;
        $category->short_content_btn = $request->short_content_btn;
        $category->short_content_btn_link = $request->short_content_btn_link;
        $category->sticky_content_heading = $request->sticky_content_heading;
        $category->sticky_content = $request->sticky_content_btn;
        $category->sticky_content_btn = $request->sticky_content_btn;
        $category->sticky_content_btn_link = $request->sticky_content_btn_link;
        $category->medium_content_heading = $request->medium_content_heading;
        $category->medium_content = $request->medium_content;
        $category->faq_heading = $request->faq_heading;
        $category->faq_short = $request->faq_short;
        $category->blog_heading = $request->blog_heading;

        if(!empty($request->image)) {
            $category->image = imageUpload($request->image, 'market-type');
        }
        if(!empty($request->faq_banner_image)) {
            $category->image = imageUpload($request->image, 'market-type-banner');
        }

        $category->save();

        if (!$category) {
            return $this->responseRedirectBack('Error occurred while updating Market type.', 'error', true, true);
        }
        return $this->responseRedirectBack('Market type has been updated successfully', 'success', false, false);
    }

    public function footerUpdate(Request $request)
    {
        // dd($request->all());

        $this->validate($request, [
            'title'      =>  'nullable',
        ]);
        $data = MarketTypesFooter::findOrFail($request->id);
        $data->title = !empty($request->title) ? $request->title : '';
        $data->short_desc = !empty($request->short_desc) ? $request->short_desc : '';
        $data->btn_text = !empty($request->btn_text) ? $request->btn_text : '';
        $data->btn_link = !empty($request->btn_link) ? $request->btn_link : '';
        $data->btn_desc = !empty($request->btn_desc) ? $request->btn_desc : '';
        // image
        if(!empty($request['footer_logo'])){
            // image, folder name only
            $data->footer_logo = imageUpload($request['footer_logo'], 'footer');
        }
        if(!empty($request['footer_background'])){
            // image, folder name only
            $data->footer_background= imageUpload($request['footer_background'], 'footer');
        }
        $data->footer_tag = !empty($request->footer_tag) ? $request->footer_tag : '';
        $data->save();

        if (!$data) {
            return $this->responseRedirectBack('Error occurred while updating Market type.', 'error', true, true);
        }
        return $this->responseRedirectBack('Market type has been updated successfully', 'success', false, false);
    }

    public function deleteCategory(Request $request, $id)
    {
        // dd($id);
        MarketTypesCategory::where('id', $id)->delete();
        return $this->responseRedirectBack('Record deleted successfully', 'success', false, false);
    }

    public function deleteBanner(Request $request, $id)
    {
        MarketTypesBanner::where('id', $id)->delete();
        return $this->responseRedirectBack('Record deleted successfully', 'success', false, false);
    }

    public function deleteFaq(Request $request, $id)
    {
        MarketTypesFaq::where('id', $id)->delete();
        return $this->responseRedirectBack('Record deleted successfully', 'success', false, false);
    }















    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Market market', 'Create Market market');
        return view('admin.market.market.create');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required',

        ]);
        $params = $request->except('_token');

        $market = $this->MarketRepository->createMarket($params);

        if (!$market) {
            return $this->responseRedirectBack('Error occurred while creating Market market.', 'error', true, true);
        }
        return $this->responseRedirect('admin.market.index', 'Market market has been created successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $targetmarket = $this->MarketRepository->findMarketById($id);

        $this->setPageTitle('Market market', 'Edit Market market : ' . $targetmarket->title);
        return view('admin.market.market.edit', compact('targetmarket'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title'      =>  'required|max:191',

        ]);
        $params = $request->except('_token');
        $market = $this->MarketRepository->updateMarket($params);

        if (!$market) {
            return $this->responseRedirectBack('Error occurred while updating Market market.', 'error', true, true);
        }
        return $this->responseRedirectBack('Market market has been updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $market = $this->MarketRepository->deleteMarket($id);

        if (!$market) {
            return $this->responseRedirectBack('Error occurred while deleting Market market.', 'error', true, true);
        }
        return $this->responseRedirect('admin.market.index', 'Market market has been deleted successfully', 'success', false, false);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function details($id)
    {
        $categories = $this->MarketRepository->detailsMarket($id);
        $market = $categories[0];

        $this->setPageTitle('Market market Details', 'Market market Details : ' . $market->title);
        return view('admin.market.market.details', compact('market'));
    }
}

