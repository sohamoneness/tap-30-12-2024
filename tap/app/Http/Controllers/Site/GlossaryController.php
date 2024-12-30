<?php

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GlossaryType;
use App\Models\Glossary;
use App\Models\GlossaryScenario;

class GlossaryController extends Controller
{
    public function index() {
        $keyword = (isset($_GET['keyword']) && $_GET['keyword']!='')?$_GET['keyword']:'';

        if($keyword==''){
            $glossaries = Glossary::with('type')->orderBy('id','desc')->get();
        }else{
            $glossaries = Glossary::with('type')->where('term','like',$keyword.'%')->orderBy('id','desc')->get();
        }
        
        $glossaryTypes = GlossaryType::orderBy('id','desc')->get();

        return view('site.glossary.index',compact('glossaries','glossaryTypes'));
    }

    public function category($id,$slug) {
        $keyword = (isset($_GET['keyword']) && $_GET['keyword']!='')?$_GET['keyword']:'';

        if($keyword==''){
            $glossaries = Glossary::with('type')->where('type_id',$id)->orderBy('id','desc')->get();
        }else{
            $glossaries = Glossary::with('type')->where('type_id',$id)->where('term','like',$keyword.'%')->orderBy('id','desc')->get();
        }
        
        $glossaryType = GlossaryType::find($id);

        return view('site.glossary.category',compact('glossaries','glossaryType'));
    }

    public function details($slug) {
        $glossaries = Glossary::with('type')->with('scenarios')->where('slug',$slug)->orderBy('id','desc')->get();
        $glossary = $glossaries[0];

        return view('site.glossary.details',compact('glossary'));
    }
}