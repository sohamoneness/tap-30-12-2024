@extends('site.layouts.app2')
@section('title', 'Homepage')
@section('section')
<section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>{{$feature->title}}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{!! URL::to('v2/features') !!}">Features</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{$feature->title}}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <section class="feature_wrap" style="padding-bottom: 0px;">
        <div class="container">
            <div class="row align-items-center flex-sm-row-reverse">
                <div class="col-sm-12">
                    <div class="title_area pe-0 pe-sm-5">
                        <h3>{{$feature->sub_title}}</h3>
                        <p>{{$feature->brief_description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <div class="row align-items-center flex-sm-row-reverse"> -->
    
    @forelse($details as $keyDet => $data )
    @php
        $keyDet = $keyDet+1;
    @endphp

    @forelse($data as $key => $item)

    @php
        $reverserow_class = "";
        $key = $key+1;
        if($key %2 != 0){
            $reverserow_class = "flex-sm-row-reverse";
        }
    @endphp

    

    <section class="feature_wrap">
        <div class="container">
            <div class="row align-items-center {{$reverserow_class}}">
                <div class="col-sm-6">
                    <figure>
                        @if(!empty($details[0]->image))
                        <img src="{{ url($details[0]->image)}}">
                        @else
                        <img src="{{ asset('site/images/Copy-Writer 1.png')}}">
                        @endif
                    </figure>
                </div>
                <div class="col-sm-6">
                    <div class="title_area pe-0 pe-sm-5">
                        <h5 class="text-theme">{{$item['title']}}</h5>
                        <h2>{{$item['sub_title']}}</h2>
                        <p>{!! $item['description'] !!}</p>
                        <a href="#" class="theme_btn">{{$item['button_name']}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

   

    @empty

    @endforelse

    @if($keyDet != count($details))

    <section class="pt-0">
        <div class="container">
            <div class="calltoaction_section">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <div class="title_area">
                            <h2>{{$feature->news_letter_section_title}}</h2>
                            <p>{{$feature->news_letter_section_sub_title}}</p>
                            <a href="#" class="theme_btn white large">{{$feature->news_letter_section_button_name}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    
    @empty

    @endforelse
    
   
    
    
    <section class="faq_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <div class="title_area text-center">
                        <h2>{{$feature->faq_section_title}}</h2>
                        <p>{{$feature->faq_section_sub_title}}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    @foreach($faqs as $key => $faq)
                    <div class="accordian_box @if($key==0){{"active"}}@endif">
                        <h5><span>0{{ $key+1 }}.</span> {{$faq->question}}</h5>
                        <div class="accordian_content">
                            {{$faq->answer}}
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="cat_section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-6 text-center">
            <div class="title_area">
              <h5 class="text-white">{{$feature->join_cummunity_section_title}}</h5>
              <h2 class="text-white">{{$feature->join_cummunity_section_sub_title}}</h2>
              <p>{{$feature->join_cummunity_section_brief_description}}</p>
              <div class="d-block">
                <a href="#" class="theme_btn">{{$feature->join_cummunity_section_button_name}}</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>    
@endsection