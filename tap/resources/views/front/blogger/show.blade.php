@extends('front.layouts.app')
@section('title',' Freelancers Marketplace')

@section('section')
<style>
    .recommended-products-top img {
        max-height: none !important;
        height: 50px;
        width: 50px;
        border-radius: 50%;
        object-fit: cover;
    }
    .banner-input form {
        padding: 18px;
    }
    .banner-input form select {
        flex: 3;
        padding-right:30px!important;
    }
    .banner-input form .input {
        flex: 5;
        padding-left: 23px;
        border-color: #ddd!important;
    }
    .freelance-market-banner-content .market-badge {
  max-width: 293px;
}
.market-badge {

  padding: 10px 28px;
} 
  .page_header {
    padding: 60px 0;
    display: block;
    background: #EAF4CC;
    margin-bottom: 60px;
}
.page_header h2 {
    color: #000;
    font-size: 48px;
    font-style: normal;
    font-weight: 700;
    line-height: normal;
    margin-bottom: 24px;
    margin-top: 60px;
}
.page_header p {
    color: #000;
    text-align: center;
    font-size: 20px;
    font-style: normal;
    font-weight: 400;
    line-height: 32px;
}
.page_header .breadcrumb {
    margin: 0;
    justify-content: center;
}
.page_header .breadcrumb-item a {
    color: #000;
}
</style>
<section class="page_header m-0">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <h2>Blogger </h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blogger</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>


<section class="recommended-writers">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12 text-center text-lg-start">
                <div class="recommended-writers-left">
                    <h6>Blogger </h6>
                   <span>{{ count($blogger_user) }} blogger(s) found!</span>
                </div>
            </div>
           
           
        </div>

        <div class="row mt-4">
            @forelse ($blogger_user as $data)
                <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4">
                    <div class="recommended-writers-content">
                        <div class="content-top">
                            @if($data->image)
                            <img src="{{ asset($data->image)}}" height="60px" width="60px" class="rounded" alt="">
                            @else
                                <img src="{{ asset('images/user.webp')}}" height="60px" width="60px" class="rounded" alt="">
                            </a>
                            @endif
                            <div class="content-top-info">
                                <h4>{{$data->first_name . ' ' . $data->last_name}}</h4>
                                <span>{{$data->occupation}}</span>
                            </div>
                        </div>
                        <div class="line"></div>

                        <div class="content-btm">
                            <a href="{{route('front.user_blogger.detail', $data->id)}}">
                                get started now
                                <img src="{{ asset('frontend/img/arrow-right-freelance.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <h3><i class="text-success">Sorry No Such Writer found!</i></h3>
            @endforelse
            <div class="text"></div>
            {{-- <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4">
                <div class="recommended-writers-content">
                    <div class="content-top">
                        <img src="{{ asset('frontend/img/writer2.png')}}" alt="">
                        <div class="content-top-info">
                            <h4>Mindy Johnson</h4>
                            <span>Writer/Novelist
                            </span>
                        </div>
                    </div>

                    <div class="content-mid">
                        <ul class="list-unstyled p-0 m-0">
                            <li>Copywriting</li>
                            <li>Social media</li>
                            <li>+ 10 more</li>
                        </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                        <a href="">
                            get started now
                            <img src="{{ asset('frontend/img/arrow-right-freelance.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4">
                <div class="recommended-writers-content">
                    <div class="content-top">
                        <img src="{{ asset('frontend/img/writer3.png')}}" alt="">
                        <div class="content-top-info">
                            <h4>Kylie Jefferson</h4>
                            <span>Professional Copywriter

                            </span>
                        </div>
                    </div>

                    <div class="content-mid">
                        <ul class="list-unstyled p-0 m-0">
                            <li>Copywriting</li>
                            <li>Social media</li>
                            <li>+ 10 more</li>
                        </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                        <a href="">
                            get started now
                            <img src="{{ asset('frontend/img/arrow-right-freelance.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4">
                <div class="recommended-writers-content">
                    <div class="content-top">
                        <img src="{{ asset('frontend/img/writer4.png')}}" alt="">
                        <div class="content-top-info">
                            <h4>Lindsay Day</h4>
                            <span>Education and curriculum
                                writer


                            </span>
                        </div>
                    </div>

                    <div class="content-mid">
                        <ul class="list-unstyled p-0 m-0">
                            <li>Copywriting</li>
                            <li>Social media</li>
                            <li>+ 10 more</li>
                        </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                        <a href="">
                            get started now
                            <img src="{{ asset('frontend/img/arrow-right-freelance.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4 mb-4">
                <div class="recommended-writers-content">
                    <div class="content-top">
                        <img src="{{ asset('frontend/img/writer5.png')}}" alt="">
                        <div class="content-top-info">
                            <h4>Samuel Powers</h4>
                            <span>Education and curriculum
                                writer



                            </span>
                        </div>
                    </div>

                    <div class="content-mid">
                        <ul class="list-unstyled p-0 m-0">
                            <li>Copywriting</li>
                            <li>Social media</li>
                            <li>+ 10 more</li>
                        </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                        <a href="">
                            get started now
                            <img src="{{ asset('frontend/img/arrow-right-freelance.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12 mb-lg-4 mb-md-4">
                <div class="recommended-writers-content">
                    <div class="content-top">
                        <img src="{{ asset('frontend/img/writer6.png')}}" alt="">
                        <div class="content-top-info">
                            <h4>Ashton Porter</h4>
                            <span>Education and curriculum
                                writer




                            </span>
                        </div>
                    </div>

                    <div class="content-mid">
                        <ul class="list-unstyled p-0 m-0">
                            <li>Copywriting</li>
                            <li>Social media</li>
                            <li>+ 10 more</li>
                        </ul>
                    </div>

                    <div class="line"></div>

                    <div class="content-btm">
                        <a href="">
                            get started now
                            <img src="{{ asset('frontend/img/arrow-right-freelance.png')}}" alt="">
                        </a>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</section>




@endsection

@section('script')
<script>
    function showMore(id) {
        $('#showMoreContent_'+id).removeClass('d-none');
        $('#showLessContent_'+id).addClass('d-none');
    }
</script>
@endsection
