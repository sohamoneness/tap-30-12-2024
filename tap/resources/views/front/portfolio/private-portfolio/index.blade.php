@extends('front.layouts.appprofile')

@section('title', 'Manage Private Articles')
@section('section')
<section class="edit-sec">
    <div class="container">
        <div class="row mt-0">
            <div class="col-12 mt-3 mb-3 text-end">
                <!-- <a href="{{ route('front.portfolio.index', auth()->guard('web')->user()->slug) }}" class="add-btn-edit d-inline-block" target="_blank">View Private Portfolio <i class="fa-solid fa-eye"></i></a> -->
            </div>
            <div class="col-12">
                <div class="table-responsive table-tabs">
                    <table class="table">
                        <thead>
                            <tr>

                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="table-responsive table-content">
                    <table class="table table-hovered table-striped">
                        <tbody class="tbody-content tbody-content-edit" id="portfolio" style="display:block;">
                            <tr>
                                <td>
                                    <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <a href="{{ route('front.portfolio.private-articles.create') }}" class="add-btn-edit d-inline-block">Create <i class="fa-solid fa-plus-circle"></i></a>
                                             <a href="{{ route('front.portfolio.private-articles.request-list') }}" class="add-btn-edit d-inline-block">View Request List </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @if (count($data->portfolios) > 0)
                                <tr>
                                    <td>
                                        <div class="row mt-1">
                                        @foreach($data->portfolios as $key => $item)
                                            <div class="col-12 col-lg-6 col-md-12" style="height:100%;">
                                                <div class="card userPortfolio mb-4">
                                                    <div class="market-research-content">
                                                        <img src="{{ asset($item->image) }}" id="articleImage" class="img-fluid " alt="" height="50">
                                                        <div class="action">
                                                            <a href="{{ route('front.portfolio.private-articles.edit', $item->id) }}"><i class="fa-solid fa-pen edit table-icon"></i></a>

                                                            <a href="{{ route('front.portfolio.private-articles.delete', $item->id) }}" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                                        </div>
                                                        <div class="edit-card">
                                                            <div class="market-research-date">
                                                                <div class="market-research-badge">
                                                                    <span>{{ $item->category }}</span>
                                                                </div>
                                                                <h6>{{ date('j M, Y', strtotime($item->created_at)) }}</h6>
                                                            </div>
                                                            <div class="edit-heading">
                                                                <h4>{{ $item->title }}</h4>
                                                                <p> {!! portfolioTagsHtml($item->id) !!}</p>
                                                                <p>{{ substr($item->short_desc,0,100) }} @if(strlen($item->short_desc)>100)<small class="text-underline text-primary text-lowercase showMore" style="cursor: pointer">more...</small>@endif</p>
                                                                <p style="display: none;">{{ $item->short_desc }} @if(strlen($item->short_desc)>100)<small class="text-underline text-primary text-lowercase showLess" style="cursor: pointer">less</small>@endif</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </td>
                                </tr>
                            @else
                                <tr class="d-flex justify-content-center">
                                    <td>
                                        <div class="row">
                                            <div class="col-md-12 text-center">
                                                <p class="text-muted">No data found</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script src="{{ asset('frontend/dist/owl.carousel.min.js') }}"></script>

     <script>
        $('.showMore').click(function(){
            $(this).parent().hide();
            $(this).parent().next().show();
        })    
        $('.showLess').click(function(){
            $(this).parent().hide();
            $(this).parent().prev().show();
        })    
    </script>
@endsection