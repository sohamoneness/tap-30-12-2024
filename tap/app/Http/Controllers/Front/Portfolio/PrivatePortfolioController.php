<?php

namespace App\Http\Controllers\Front\Portfolio;
use App\Http\Controllers\Controller;
use App\Contracts\PortfolioContract;
use Illuminate\Http\Request;
use App\Models\PrivatePortfolio;
use App\Http\Controllers\BaseController;
use App\Models\ArticleCategory;
use Illuminate\Support\Str;
use Session;
use DB;
use Illuminate\Support\Facades\Session as FacadesSession;
use App\Models\PublisherRequestedArticle;
use App\Models\User;
class PrivatePortfolioController extends BaseController
{
     /**
     * @var PortfolioContract
     */
    protected $PortfolioRepository;


    /**
     * PrivatePortfolioController constructor.
     * @param PortfolioContract $PortfolioRepository
     */
    public function __construct(PortfolioContract $PortfolioRepository)
    {
        $this->PortfolioRepository = $PortfolioRepository;
    }
    public function index(Request $request)
    {
        //dd("1");
        $this->setPageTitle('Private Portfolio', 'Create Private Portfolio');
        $data = (object)[];
        $user_id = auth()->guard('web')->user()->id;
        $data->portfolios = PrivatePortfolio::where('user_id', $user_id)->get();
        //dd($data->portfolios);
        $category=ArticleCategory::orderby('title')->get();
        return view('front.portfolio.private-portfolio.index',compact('category','data'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->setPageTitle('Portfolio', 'Create Portfolio');
        $category=ArticleCategory::orderby('title')->get();
        return view('front.portfolio.private-portfolio.create',compact('category'));
    }

    public function detail(Request $request, $slug)
    {
        // $data = Project::where('slug', $slug)->first();
        $data = PrivatePortfolio::where('slug', $slug)->first();
        
        return view('front.portfolio.private-portfolio.details', compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        //dd($request->all());

        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'short_desc' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,gif|required'
        ]);
        $params = $request->except('_token');

      

        $portfolio = $this->PortfolioRepository->createPrivateArticle($params);

        if (!$portfolio) {
            return $this->responseRedirectBack('Error occurred while creating Private Article.', 'error', true, true);
        }
        return redirect()->back()->with('success', 'Private Article has been created successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        //dd("here");
        $portfolio = PrivatePortfolio::where('id', $id)->first();
        $category=ArticleCategory::orderby('title')->get();
        $this->setPageTitle('Private Article', 'Private Article : ' . $portfolio->title);
        return view('front.portfolio.private-portfolio.edit', compact('portfolio','category'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'category' => 'required',
            'short_desc' => 'required',
        ]);
        $params = $request->except('_token');
        $portfolio = $this->PortfolioRepository->updatePrivateArticle($params);

        if (!$portfolio) {
            return $this->responseRedirectBack('Error occurred while updating Private Article.', 'error', true, true);
        }
        // return $this->responseRedirectBack('Portfolio has been updated successfully', 'success', false, false);
        return redirect()->back()->with('success', 'Private Article has been updated successfully', 'success', false, false);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        //$portfolio = $this->PortfolioRepository->deletePortfolio($id);

        $portfolio = PrivatePortfolio::findOrFail($id);
        $portfolio->delete();

        if (!$portfolio) {
            return $this->responseRedirectBack('Error occurred while deleting Private Article.', 'error', true, true);
        }
        return redirect()->back()->with('success','Private Article has been deleted successfully', 'success', false, false);
    }
public function request(Request $request)
    {
       // dd($request->article_id);
        $collection = collect($request);
        $if_exist = PublisherRequestedArticle::where('publisher_id', $collection['publisher_id'])->where('article_id', $collection['article_id'])->count();
        if($if_exist == 1){
            return response()->json(array('failure' => 'You allready requested for the Article'));
        }else{
            $portfolio = new PublisherRequestedArticle();
            $portfolio->publisher_id = $collection['publisher_id'] ?? '';
            $portfolio->article_id = $collection['article_id'] ?? '';
            $portfolio->publish_date = $collection['publish_date'] ?? '';
            $portfolio->under_auther_bio = $collection['under_auther_bio'] ?? '';
            $portfolio->comment = $collection['comment'] ?? ''; 
            $portfolio->status = 0;
            $portfolio->save();
    
            if($portfolio){
                return response()->json(array('success' => 'Successfully Requested for this Article'));
            }else{
                return response()->json(array('failure' => 'Something wrong happened'));
            }
        }
    }
public function requestList(Request $request)
    {
          $writer_id = auth()->guard('web')->user()->id;
          $articles =  PrivatePortfolio::where('user_id', $writer_id)->get();
          $u_articles = array();
          foreach($articles as $article){
            $u_articles[] = $article->id;
          }
          $requested_articles  = PublisherRequestedArticle::whereIn('article_id', $u_articles)->get();

          $final_array = array();

          foreach($requested_articles as $key=>$requested_article){
            $articles =  PrivatePortfolio::where('id', $requested_article->article_id)->first(); 
            $final_array[$key]['article_name'] =  $articles->title;
            $user =  User::where('id', $requested_article->publisher_id)->first(); 
            $final_array[$key]['id'] =  $requested_article->id;
            $final_array[$key]['publisher_name'] =  $user->first_name. " ".$user->last_name;
            $final_array[$key]['status'] =  $requested_article->status;
            $final_array[$key]['comment'] =  $requested_article->comment;
            $final_array[$key]['under_auther_bio'] =  $requested_article->under_auther_bio;
            $final_array[$key]['publish_date'] =  $requested_article->publish_date;
          }
          return view('front.portfolio.private-portfolio.show', compact('final_array'));
         


    }
    
    public function updateStatus(Request $request)
    {
       
        $update = PublisherRequestedArticle::where('id',$request->id)->update(['status' => $request->status]);
        if($update){
            return response()->json(array('message' => 'Request Article status has been successfully updated'));
        }else{
            return response()->json(array('message' => 'Error occoured!'));
        }
    }
}
