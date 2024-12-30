@extends('site.layouts.app2')
@section('title', 'Homepage')
@section('section')
<section class="page_header m-0">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>{{$glossary->term}}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2/glossary') !!}">Glossary</a></li>
                        @php $key1 = strtolower(preg_replace("/[^a-zA-Z0-9]+/", "-", $glossary->type->title)) @endphp
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2/glossary-category/'.$glossary->type->id.'/'.$key1) !!}">{{$glossary->type->title}}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$glossary->term}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="glossary_section">
    <div class="container glossary_content">
      <p>{!!$glossary->definition!!}</p>
      <div class="pb-3 pb-sm-5"></div>
      <h4>Detailed Explanation</h4>
      {!!$glossary->description!!}

    </div>
</section>

<section class="usage_section">
  <div class="container">
    <h4>Usage Examples</h4>

    @foreach($glossary->scenarios as $scenario)
    <div class="scenario_block">
      <p><strong>Scenario 1:</strong> {!!$scenario->scenario!!}</p>
      <p><strong>Explanation:</strong> {!!$scenario->explanation!!}</p>
    </div>
    @endforeach
    
  </div>
</section>

<section class="glossaryterms_content">
  <div class="container">
    <h4>Ranking the Glossary Term:</h4>

    <div class="row g-2 g-sm-5">
      <div class="col-sm-6">
        <div class="terms_block">
          <p><strong>Frequency of Use: {!!$glossary->frequency_of_use!!}</strong> <br/>
            {!!$glossary->frequency_description!!}</p>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="terms_block black">
          <p><strong>Importance of Term: {!!$glossary->importance_of_term!!}</strong> <br/>
            {!!$glossary->importance_description!!}</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="usage_section">
  <div class="container">
    <h4>Other Related Terminology</h4>

    <ul class="terminology_list">
      <li><a href="#">Keyword Stuffing</a></li>
      <li><a href="#">On-page SEO</a></li>
      <li><a href="#">Search Engine Algorithm</a></li>
      <li><a href="#">Organic Ranking</a></li>
      <li><a href="#">Content Optimization</a></li>
      <li><a href="#">LSI (Latent Semantic Indexing) Keywords</a></li>
      <li><a href="#">SERP (Search Engine Results Page)</a></li>
      <li><a href="#">Meta Description</a></li>
      <li><a href="#">Alt Text</a></li>
      <li><a href="#">Anchor Text</a></li>
    </ul>
  </div>
</section>


<section class="cat_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 text-center">
        <div class="title_area">
          <h5 class="text-white">There’s never been a better time to start writing.</h5>
          <h2 class="text-white">JOIN THE <span>COMMUNITY</span></h2>
          <p>Our community welcomes writers from all walks of life - if you’re ready to learn, you’re in the right place.</p>
          <div class="d-block">
            <a href="#" class="theme_btn">Subscribe Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection