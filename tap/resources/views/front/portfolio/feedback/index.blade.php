@extends('front.layouts.appprofile')

@section('title', 'Manage Portfolio')
@section('section')
<section class="edit-sec">
    <div class="container-fluid">
        {{-- <div class="row">
            <div class="col-12 text-center top-heading">
                <h2>Manage Portfolio</h2>
            </div>
        </div> --}}
        <div class="row">
            <div class="col-12">
                <div class="edit-sec-top d-flex align-items-center">
                    <h2>Portfolio Management</h2>
                    <a href="{{ route('front.portfolio.index', auth()->guard('web')->user()->slug) }}" class="add-btn-edit d-inline-block ms-auto" target="_blank">
                        <!-- <i class="fa-solid fa-eye"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M0.666992 8.00001C0.666992 8.00001 3.33366 2.66667 8.00033 2.66667C12.667 2.66667 15.3337 8.00001 15.3337 8.00001C15.3337 8.00001 12.667 13.3333 8.00033 13.3333C3.33366 13.3333 0.666992 8.00001 0.666992 8.00001Z" stroke="#95C800" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="#95C800" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        View Public Portfolio 
                    </a>
                    <a href="{{ route('front.portfolio.feedback.create') }}" class="add-btn-edit d-inline-block">
                        <!-- <i class="fa-solid fa-edit"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Create
                    </a>
                </div>
                
            </div>
            <div class="col-12">
                <div class="table-responsive table-tabs portfolio-tabs">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th class="table-tab" onclick="location.href='{{ route('front.user.portfolio.index')}}'">Basic Details</th>
                                {{-- <th class="table-tab" data-tab-table="portfolio">Portfolio</th> --}}
                                <th class="table-tab " onclick="location.href='{{ route('front.portfolio.portfolio.index')}}'">Portfolio</th>
                                <th class="table-tab " onclick="location.href='{{ route('front.portfolio.expertise.index')}}'">Specialities</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.work-experience.index')}}'">Employment History</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.client.index')}}'">Clients</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.education.index')}}'">Education</th>
                                <th class="table-tab active" onclick="location.href='{{ route('front.portfolio.feedback.index')}}'">Feedback </th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.testimonial.index')}}'">Testimonials</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.certification.index')}}'">Certification </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="table-responsive table-content">
                    <table class="table table-hovered table-striped">
                        <tbody class="tbody-content tbody-content-edit" id="speciality" style="display:block;">
                            
                            @if (count($data->feedback) > 0)
                            <tr>
                                <td>
                                    <div class="row g-3 mt-1">
                                    @foreach($data->feedback as $key=> $item)
                                        <div class="col-12 col-lg-6 col-md-12">
                                            <div class="edit-card">
                                                <div class="action">
                                                    <a href="{{ route('front.portfolio.feedback.edit', $item->id) }}"><i class="fa-solid fa-pen edit table-icon"></i></a>

                                                    <a href="{{ route('front.portfolio.feedback.delete', $item->id) }}" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                                </div>
                                                <div class="date">
                                                    <span>{{ date('j M, Y', strtotime($item->date_from)) }}</span>
                                                </div>
                                                <div class="edit-heading">
                                                    <h4>{{ $item->title }}</h4>
                                                    <h4>  {!! RatingHtml($item->rating) !!}
                                                    </h4>
                                                    <h4>  {{$item->review_person}}
                                                    </h4>
                                                    <p>{{ $item->review }}</p>
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
