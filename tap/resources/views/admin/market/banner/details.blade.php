@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
            <p></p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-sm-8">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table">
                                <tbody>
                                   <tr>
                                      <td width="15%" class="text-right text-uppercase">Banner Heading</td>
                                      <td>{{ $banner->content_heading ?? ''}}</td>
                                   </tr>
                                   <tr>
                                      <td width="15%" class="text-right text-uppercase">Banner Content</td>
                                      <td>{!! $banner->content ?? '' !!}</td>
                                   </tr>
                                   <tr>
                                    <td width="15%" class="text-right text-uppercase">Banner Button</td>
                                    <td>{!! $banner->content_btn ?? '' !!}</td>
                                 </tr>
                                 <tr>
                                    <td width="15%" class="text-right text-uppercase">Banner Button Link</td>
                                    <td>{!! $banner->content_btn_link ?? '' !!}</td>
                                 </tr>

                                 <tr>
                                    <td width="15%" class="text-right text-uppercase">Banner Image</td>
                                    <td><img src="{{ asset($banner->image) }}" width="150" height="150"></td>
                                 </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection
