@extends('front.layouts.app')
@section('title', '404')
@section('section')

<section class="markets-banner" style="background-image: url('https://demo91.co.in/laravel-only/ContentSaas/public/uploads/market/636e57321a96b22-11-11-02-07-46.png');">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="markets-banner-content">
                    <div class="market-badge">
                        <span>OOPS !</span>
                    </div>
                    <h1>404</h1>
                    <p>Looks like you are lost</p>
                    <a href="{{url('/')}}" class="button text-white">Goto Home</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection