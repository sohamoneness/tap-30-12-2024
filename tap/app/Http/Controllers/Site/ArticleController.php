<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;
use App\Models\Article;
use App\Models\ArticlePage;
use App\Models\ArticleContent;
class ArticleController extends Controller
{
    public function index(Request $request)
    {
        $cat=ArticleCategory::where('status',1)->orderby('title')->get();
        if($request->category){
            if($request->category=='all'){
                $blogs=Article::where('status',1)->orderby('id','desc')->paginate(24);
            }else{

                $cat_id = ArticleCategory::where('slug',$request->category)->first()->id;
                $blogs=Article::where('status',1)->where('article_category_id','like','%'.$cat_id.'%')->orderby('id','desc')->paginate(12);
            }
        }else{
           // $blogs=Article::where('status',1)->where('article_category_id','like','%'.$cat[0]->id.'%')->orderby('id','desc')->paginate(12);
           $blogs=Article::where('status',1)->orderby('id','desc')->paginate(24);
        }
        $article_page_content = ArticlePage::all()[0];
        return view('site.blog.index',compact('cat','blogs','article_page_content'));
    }

    public function details(Request $request,$slug)
    {
        $cat=ArticleCategory::where('status',1)->orderby('title')->get();
        $blogs=Article::where('slug',$slug)->orderby('title')->get();
        $blog=$blogs[0];
         $content=ArticleContent::where('blog_id',$blog->id)->get();
        $latestblogs=Article::where('slug','!=',$slug)->orderby('title')->get();
        return view('site.blog.details',compact('cat','blog','latestblogs','content'));
    }
}

