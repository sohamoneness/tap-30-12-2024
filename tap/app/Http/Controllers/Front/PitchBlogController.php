<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PitchBlog;
use App\Models\PitchBlogCategory;
use App\Models\PitchBlogSubCategory;
use Illuminate\Support\Facades\Auth;

class PitchBlogController extends Controller
{
    public function index(Request $request)
    {
        if (!empty(auth()->guard()->user()->id)) {
            $data = PitchBlog::where('created_by', auth()->guard()->user()->id)->latest('id');
            if(!empty($request->cat_id))
                $data = $data->where('cat_id','=',$request->cat_id);
            
            if(!empty($request->keyword))
                $data = $data->where('title','like','%'.$request->keyword.'%');

            $data = $data->paginate(18);
            $cat=PitchBlogCategory::where('created_by', auth()->guard('web')->user()->id)->orderBy('title')->get();
            return view('front.pitch-blog.index', compact('data','cat'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    public function create(Request $request)
    {
        $data = PitchBlogCategory::where('created_by', auth()->guard('web')->user()->id)->orderBy('title')->get();
        return view('front.pitch-blog.create', compact('data'));
    }

    public function detail(Request $request, $slug)
    {
        // $data = Project::where('slug', $slug)->first();
        $data = PitchBlog::where('slug', $slug)->where('created_by', auth()->guard('web')->user()->id)->first();
        
        return view('front.pitch-blog.details', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'status' => 'required|string|min:2|max:255',
            'title' => 'required|string|min:2|max:255',
        ]);

        $data = new PitchBlog();
        $data->title = $request->title;
        $data->slug = slugGenerate($request->title, 'pitch_blogs');
        $data->cat_id = $request->cat_id ?? '';
        $data->website_name = $request->website_name ?? '';
        $data->website_description = $request->website_description ?? '';
        $data->website_url = $request->website_url ?? '';
        $data->email = $request->email ?? '';
        $data->contact_form = $request->contact_form ?? '';
        $data->semrush_ranking = $request->semrush_ranking ?? '';
        $data->domain_authority = $request->domain_authority ?? '';
        if (!empty($request->image)) {
            $data->image = imageUpload($request->image, 'pitch_blogs');
        } else {
            $data->image = '';
        }
        $data->created_by = auth()->guard('web')->user()->id;
        $data->save();

        return redirect()->route('front.user.pitch.blog.index')->with('success', 'Blog created successfully');
    }

    public function delete(Request $request, $id)
    {
        PitchBlog::where('id', $id)->where('created_by', auth()->guard('web')->user()->id)->delete();
        return redirect()->back()->with('success', 'Blog removed successfully');
    }

    public function edit(Request $request, $id)
    {
        $data = PitchBlog::findOrFail($id);
        $cat=PitchBlogCategory::where('created_by', auth()->guard('web')->user()->id)->orderBy('title')->get();

        return view('front.pitch-blog.edit', compact('data', 'cat'));
    }

    public function update(Request $request)
    {

         $request->validate([
            'title' => 'nullable|string|min:2|max:255',
        ]);

        $data = PitchBlog::findOrFail($request->id);
        $data->title = $request->title;
        $data->slug = slugGenerate($request->title, 'pitch_blogs');
        $data->cat_id = $request->cat_id ?? '';
        $data->website_name = $request->website_name ?? '';
        $data->website_description = $request->website_description ?? '';
        $data->website_url = $request->website_url ?? '';
        $data->email = $request->email ?? '';
        $data->contact_form = $request->contact_form ?? '';
        $data->semrush_ranking = $request->semrush_ranking ?? '';
        $data->domain_authority = $request->domain_authority ?? '';
        if (!empty($request->image)) {
            $data->image = imageUpload($request->image, 'pitch_blogs');
        } 
        $data->created_by = auth()->guard('web')->user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Blog updated successfully');
    }

    public function updateStatus(Request $request)
    {
        $status = PitchBlog::where('id',$request->id)->update(['status' => $request->status]);
        if($status){
            return response()->json(array('message' => 'Blog status has been successfully updated'));
        }else{
            return response()->json(array('message' => 'Error occoured!'));
        }
    }

}
