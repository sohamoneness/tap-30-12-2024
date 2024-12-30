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



    @if(count($details)>0)

    <section class="feature_wrap">

        <div class="container">

            <div class="row align-items-center flex-sm-row-reverse">

                <div class="col-sm-6">

                    <figure>

                        <img src="{{ asset('site/images/Copy-Writer 1.png')}}">

                    </figure>

                </div>

                <div class="col-sm-6">

                    <div class="title_area pe-0 pe-sm-5">

                        <h5 class="text-theme">{{$details[0]->title}}</h5>

                        <h2>{{$details[0]->sub_title}}</h2>

                        <p>{!!$details[0]->description!!}</p>

                        <a href="#" class="theme_btn">{{$details[0]->button_name}}</a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @endif



    @if(count($details)>=1)

    <section class="feature_wrap pt-0">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-sm-6">

                    <figure>

                        <img src="{{ asset('site/images/image 1.png')}}">

                    </figure>

                </div>

                <div class="col-sm-6">

                    <div class="title_area ps-0 ps-sm-5">

                        <h5 class="text-theme">{{$details[1]->title}}</h5>

                        <h2>{{$details[1]->sub_title}}</h2>

                        <p>{!!$details[1]->description!!}</p>

                        <a href="#" class="theme_btn">{{$details[1]->button_name}}</a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @endif



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



    @if(count($details)>=2)

    <section class="feature_wrap pt-0">

        <div class="container">

            <div class="row align-items-center flex-sm-row-reverse">

                <div class="col-sm-6">

                    <figure>

                        <img src="{{ asset('site/images/image 1.png')}}">

                    </figure>

                </div>

                <div class="col-sm-6">

                    <div class="title_area pe-0 pe-sm-5">

                        <h5 class="text-theme">{{$details[2]->title}}</h5>

                        <h2>{{$details[2]->sub_title}}</h2>

                        <p>{!!$details[2]->description!!}</p>

                        <a href="#" class="theme_btn">{{$details[2]->button_name}}</a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @endif



    @if(count($details)>=3)

    <section class="feature_wrap pt-0">

        <div class="container">

            <div class="row align-items-center">

                <div class="col-sm-6">

                    <figure>

                        <img src="{{ asset('site/images/image 1.png')}}">

                    </figure>

                </div>

                <div class="col-sm-6">

                    <div class="title_area ps-0 ps-sm-5">

                        <h5 class="text-theme">{{$details[3]->title}}</h5>

                        <h2>{{$details[3]->sub_title}}</h2>

                        <p>{!!$details[3]->description!!}</p>

                        <a href="#" class="theme_btn">{{$details[3]->button_name}}</a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @endif



    @if(count($details)>=4)

    <section class="feature_wrap pt-0">

        <div class="container">

            <div class="row align-items-center flex-sm-row-reverse">

                <div class="col-sm-6">

                    <figure>

                        <img src="{{ asset('site/images/image 1.png')}}">

                    </figure>

                </div>

                <div class="col-sm-6">

                    <div class="title_area pe-0 pe-sm-5">

                        <h5 class="text-theme">{{$details[4]->title}}</h5>

                        <h2>{{$details[4]->sub_title}}</h2>

                        <p>{!!$details[4]->description!!}</p>

                        <a href="#" class="theme_btn">{{$details[4]->button_name}}</a>

                    </div>

                </div>

            </div>

        </div>

    </section>

    @endif

    

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

    <!--<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>-->

    <!--<script src="js/bootstrap.bundle.min.js"></script>-->

    <!--<script>-->

    <!--    $(document).ready(function(){-->

    <!--        $('.accordian_box:first').addClass('active');-->

    <!--        $('.accordian_box').click(function(){-->

    <!--            if(!$(this).hasClass('active')) {-->

    <!--                $('.accordian_box.active').removeClass('active');-->

    <!--                $(this).addClass('active');-->

    <!--            } else {-->

    <!--                $(this).removeClass('active');-->

    <!--            }-->

                //$(this).toggleClass('active');

                //$('.accordian_box').not($(this).parent().next()).removeClass('active');;

    <!--        });-->

    <!--    });-->

    <!--</script>-->

@endsection