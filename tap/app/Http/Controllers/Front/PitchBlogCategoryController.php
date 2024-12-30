<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\PitchBlogCategory;
use Illuminate\Support\Facades\Auth;
class PitchBlogCategoryController extends Controller
{
    public function index(Request $request)
    {
        if (!empty(auth()->guard()->user()->id)) {
            $data = PitchBlogCategory::where('created_by', auth()->guard()->user()->id)->latest('id')->paginate(18);
            if(!empty($request->keyword)){
                $data = PitchBlogCategory::where('title','like','%'.$request->keyword.'%')->paginate(18);
            }
            return view('front.pitch-blog-category.index', compact('data'));
        } else {
            return redirect()->route('front.user.login');
        }
    }

    public function create(Request $request)
    {
        return view('front.pitch-blog-category.create');
    }

    public function detail(Request $request, $slug)
    {
        $data = PitchBlogCategory::where('slug', $slug)->where('created_by', auth()->guard('web')->user()->id)->first();
       
        return view('front.pitch-blog-category.detail', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'status' => 'required|string|min:2|max:255',
            'title' => 'required|string|min:2|max:255',
            'description' => 'nullable|string|min:2',
        ]);

        $data = new PitchBlogCategory();
        $data->title = $request->title;
        $data->slug = slugGenerate($request->title, 'pitch_blog_categories');
        $data->description = $request->description ?? '';
        $data->created_by = auth()->guard('web')->user()->id;
        $data->save();

        return redirect()->route('front.user.pitch.blog.category.index')->with('success', 'Blog category created successfully');
    }

    public function delete(Request $request, $id)
    {
        PitchBlogCategory::where('id', $id)->where('created_by', auth()->guard('web')->user()->id)->delete();
        return redirect()->back()->with('success', 'Blog category removed successfully');
    }

    public function edit(Request $request, $id)
    {
        $data = PitchBlogCategory::findOrFail($id);
        return view('front.pitch-blog-category.edit', compact('data','request'));
    }

    public function update(Request $request)
    {
        //dd($request->all());
         $request->validate([
            'title' => 'required|string|min:2|max:255',
            'description' => 'nullable|string|min:2',
        ]);

        $data = PitchBlogCategory::findOrFail($request->id);
        $data->title = $request->title;
        if($data->title != $request['title']) {
        $data->slug = slugGenerate($request->title, 'pitch_blog_categories');
        }
        $data->description = $request->description ?? '';
        $data->created_by = auth()->guard('web')->user()->id;
        $data->save();
        return redirect()->back()->with('success', 'Blog category updated successfully');
        

    }
}
