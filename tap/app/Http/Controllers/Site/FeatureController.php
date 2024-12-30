<?php



namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\Feature;

use App\Models\FeatureFaq;

use App\Models\FeatureDetail;



class FeatureController extends Controller

{

	public function index() {
        $features1 = Feature::with('details')->where('status','1')->take(4)->get();
        $features = Feature::with('details')->where('status','1')->get();
        return view('site.feature.index', compact('features','features1'));
    }



    public function details($slug){
        $features = Feature::where('slug',$slug)->get();
        $feature = $features[0];
        $id = $feature->id;
        $faqs = FeatureFaq::where('feature_id',$id)->get();
        /* Old */
        // $details = FeatureDetail::where('feature_id',$id)->get();
        /* New */
        $details = FeatureDetail::where('feature_id',$id)->get()->toArray();
        $details = array_chunk($details,2);
        // dd($details);

        return view('site.feature.details', compact('feature','faqs','details'));

    }

}

?>