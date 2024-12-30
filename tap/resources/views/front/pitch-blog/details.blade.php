@extends('front.layouts.appprofile')
@section('title', ' Blog')
@section('section')
    <section class="edit-sec edit-basic-detail">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.user.pitch.blog.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 col-md-12 mb-3 mb-lg-0">
                    <div class="course-details-left">
                        <div class="theiaStickySidebar">
                            <div class="course-details-left-content">
                                <div class="course-details-main-info">
                                    <h2>{{ $data->title ?? '' }}</h2>
                                    <p class="badge tag-badge">{{ $data->category->title ?? '' }}</p>
                                    <p> <b>Website Name :</b>{{ $data->website_name ?? '' }}</p>
                                    <p><b>Website Description :</b>{{ $data->website_description ?? '' }}</p>
                                    <p><b>Website URL :</b>{{ $data->website_url ?? '' }}</p>
                                    <p><b>Email :</b>{{ $data->email ?? '' }}</p>
                                    <p><b>Contact :</b>{{ $data->contact_form ?? '' }}</p>
                                    <p><b>SEMRush Ranking :</b>{{ $data->semrush_ranking ?? '' }}</p>
                                    <p><b>Domain Authority :</b>{{ $data->domain_authority ?? '' }}</p>
                                    @if(!empty($data->image))
                                    <p><b>Image :</b> <img src="{{ asset($data->image) }}" width="180px" height="100px" style="border-radius:50%"></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
    
