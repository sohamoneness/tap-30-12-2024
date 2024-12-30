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
                                      <td width="15%" class="text-right text-uppercase">Title</td>
                                      <td>{{ $data->title ?? ''}}</td>
                                   </tr>
                                   <tr>
                                    <td width="15%" class="text-right text-uppercase">Category</td>
                                    <td>{{ $data->category->title ?? ''}}</td>
                                 </tr>
                                 <tr>
                                    <td width="15%" class="text-right text-uppercase">Subcategory</td>
                                    <td>{{ $data->subcategory->title ?? ''}}</td>
                                 </tr>
                                   <tr>
                                        <td width="15%" class="text-right text-uppercase">Description</td>
                                        <td>{!! $data->description ?? ''!!}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="text-right text-uppercase">Feature</td>
                                        <td>{!! $data->feature ?? ''!!}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="text-right text-uppercase">Pros</td>
                                        <td>{!! $data->pros ?? ''!!}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="text-right text-uppercase">Cons</td>
                                        <td>{!! $data->cons ?? ''!!}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="text-right text-uppercase">Price</td>
                                        <td>{!! $data->price ?? ''!!}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="text-right text-uppercase">Website Link</td>
                                        <td>{!! $data->link ?? ''!!}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="text-right text-uppercase">Affiliate Programme
                                        </td>
                                        <td>{!! $data->affiliate_programme ?? ''!!}</td>
                                    </tr>
                                    <tr>
                                        <td width="15%" class="text-right text-uppercase">Affiliate Programme Link/ Revenue</td>
                                        <td>{!! $data->affiliate_programme_link ?? ''!!}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><br>
            <a href="{{ route('admin.tools.AreaOfInterest.index') }}" class="btn btn-primary mb-2"><i class="fa fa-times"></i> Back</a>
        </div>
@endsection
