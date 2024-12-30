@extends('front.layouts.appprofile')
@section('title', 'Manage Portfolio')

@section('section')
<section class="edit-sec">
    <div class="container-fluid">
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
                    <a href="{{ route('front.user.portfolio.edit') }}" class="add-btn-edit d-inline-block">
                        <!-- <i class="fa-solid fa-edit"></i> -->
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                            <path d="M8 13.3333H14" stroke="#95C800" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M11 2.33333C11.2652 2.06811 11.6249 1.91911 12 1.91911C12.1857 1.91911 12.3696 1.95569 12.5412 2.02676C12.7128 2.09783 12.8687 2.202 13 2.33333C13.1313 2.46465 13.2355 2.62055 13.3066 2.79213C13.3776 2.96371 13.4142 3.14761 13.4142 3.33333C13.4142 3.51904 13.3776 3.70294 13.3066 3.87452C13.2355 4.0461 13.1313 4.202 13 4.33333L4.66667 12.6667L2 13.3333L2.66667 10.6667L11 2.33333Z" stroke="#95C800" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        Edit 
                    </a>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive table-tabs portfolio-tabs">
                    <table class="table m-0">
                        <thead>
                            <tr>
                                <th class="table-tab active" data-tab-table="basic-details">Basic Details</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.portfolio.index')}}'">Portfolio</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.expertise.index')}}'">Specialities</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.work-experience.index')}}'">Employment History</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.client.index')}}'">Clients</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.education.index')}}'">Education</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.feedback.index')}}'">Feedback </th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.testimonial.index')}}'">Testimonials</th>
                                <th class="table-tab" onclick="location.href='{{ route('front.portfolio.certification.index')}}'">Certification </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="table-responsive table-content">
                    <table class="table table-hovered table-striped">
                        <tbody class="tbody-content active tbody-content-edit" id="basic-details">
                            <tr>
                                <td>Image</td>
                                @if(auth()->guard('web')->user()->image)
                                    <td><img src="{{ asset(auth()->guard('web')->user()->image) }}" alt="" height="100"></td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr>
                                <td>Intro Video</td>
                                @if(auth()->guard('web')->user()->intro_video)
                                    <td><video src="{{ asset(auth()->guard('web')->user()->intro_video) }}" controls alt="" height="100"></video></td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr>
                                <td>Banner Image</td>
                                @if(auth()->guard('web')->user()->banner_image)
                                    <td> <img src="{{ asset(auth()->guard('web')->user()->banner_image) }}" id="articleImage" class="img-fluid" alt="" width="100" height="100"></td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr>
                                <td>Color Scheme</td>
                                <td><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="{{ auth()->guard('web')->user()->color_scheme }}" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-circle"><circle cx="12" cy="12" r="10"></circle></svg><span class="quote-author"></span>
                                </td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Name</td>
                                <td>{{ auth()->guard('web')->user()->first_name.' '.auth()->guard('web')->user()->last_name }}</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>Headline</td>
                                @if(auth()->guard('web')->user()->occupation)
                                    <td>{{ auth()->guard('web')->user()->occupation }}</td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr>
                                <td>Description</td>
                                @if(auth()->guard('web')->user()->short_desc)
                                    <td>{{ auth()->guard('web')->user()->short_desc }}</td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                                {{-- <td>{{ auth()->guard('web')->user()->short_desc	 }}</td> --}}
                            </tr>
                            <tr>
                                <td>Country</td>
                                @if(auth()->guard('web')->user()->country)
                                    <td><span class="country-name">{{ auth()->guard('web')->user()->country }}</span></td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr class="portfolio-social">
                                <td>Language</td>
                                @if (count($data->languages) > 0)
                                    <td>
                                        @foreach ($data->languages as $language)
                                            {!! $language->languageDetails ? $language->languageDetails->name : '' !!}
                                        @endforeach
                                    </td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr class="portfolio-social">
                                <td>Social media profiles</td>
                                @if (count($data->languages) > 0)
                                    <td>
                                        @foreach ($data->socialMedias as $socialMedia)
                                            <a href="{{ $socialMedia->link }}" target="_blank">
                                                {!! $socialMedia->socialMediaDetails ? $socialMedia->socialMediaDetails->icon : '' !!}
                                            </a>
                                        @endforeach
                                    </td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr>
                                <td>Favorite Quote</td>
                                @if(auth()->guard('web')->user()->quote)
                                    <td><span class="quote-author">{{ auth()->guard('web')->user()->quote }}</span>
                                        <p class="quote-desc">{!! auth()->guard('web')->user()->quote_by !!}</p>
                                    </td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                <td></td>
                            </tr>
                            <tr>
                                <td>Worked For</td>
                                @if(auth()->guard('web')->user()->worked_for)
                                    <td>{{ auth()->guard('web')->user()->worked_for }}</td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                {{-- <td>{{ auth()->guard('web')->user()->worked_for }}</td> --}}
                                <td></td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                @if(auth()->guard('web')->user()->categories)
                                    <td>{{ auth()->guard('web')->user()->categories }}</td>
                                @else
                                    <td class="text-muted"><small>No data found</small></td>
                                @endif
                                {{-- <td>{{ auth()->guard('web')->user()->categories }}</td> --}}
                                <td></td>
                            </tr>
                        </tbody>
                        <tbody class="tbody-content tbody-content-edit" id="portfolio">
                            <tr>
                                <td>
                                    <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <a href="{{ route('front.portfolio.portfolio.create') }}" class="add-btn-edit d-inline-block">Add <i class="fa-solid fa-plus-circle"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row g-3 mt-1">
                                    @foreach($data->portfolios as $key => $item)
                                        <div class="col-12 col-lg-6 col-md-12">
                                            <div class="edit-card">
                                                <div class="action">
                                                    <a href="{{ route('front.portfolio.portfolio.edit', $item->id) }}"><i class="fa-solid fa-pen edit table-icon"></i></a>

                                                    <a href="{{ route('front.portfolio.portfolio.delete', $item->id) }}" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                                </div>
                                                <img src="{{ asset($item->image) }}" id="articleImage" class="img-fluid mb-3" alt="" height="50">
                                                <div class="date">
                                                    <span>{{ date('j F Y, g:i a', strtotime($item->created_at)) }}</span>
                                                </div>
                                                <div class="edit-heading">
                                                    <h4>{{ $item->title }}</h4>
                                                    <p>Category: <span class="text-dark">{{ $item->category }}</span></p>
                                                    <p>{{ $item->tags }}</p>
                                                    <p>{{ $item->short_desc }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td></td>
                                <td></td>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('front.portfolio.portfolio.create') }}" class="btn btn-primary"  title="Create">Create</a>
                                    </div>
                                </td>
                            </tr>
                            @foreach($data->portfolios as $key=> $item)
                                <tr>
                                    <td>Category</td>
                                    <td>{{ $item->category }}</td>
                                    <td rowspan="4">
                                        <div class="action">
                                            <a href="{{ route('front.portfolio.portfolio.edit', $item->id) }}" title="Edit Profile"><i class="fa-solid fa-pen edit table-icon"></i></a>
                                            <a href="{{ route('front.portfolio.portfolio.delete', $item->id) }}" title="Delete"><i class="fa-solid fa-trash-can trash table-icon"></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Title</td>

                                    <td>{{ $item->title }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Tags</td>

                                    <td>{{ $item->tags }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Short Description</td>

                                    <td>{{ $item->short_desc }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Long Description</td>

                                    <td>{{ $item->long_desc }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Url</td>

                                    <td>{{ $item->link }}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td class="border-bottom">Image</td>

                                    <td class="border-bottom">
                                        @if($item->image)
                                        <td> <img src="{{ asset('uploads/portfolio/'.$item->image) }}" id="articleImage" class="img-fluid" alt="">
                                        </td>
                                        @else
                                        <td></td>
                                        @endif</td>
                                </tr>
                            @endforeach --}}
                        </tbody>



                        <tbody class="tbody-content tbody-content-edit" id="speciality">
                            <tr>
                                <td>
                                    <div class="row mt-2">
                                        <div class="col-12 text-end">
                                            <a href="{{ route('front.portfolio.expertise.create') }}" class="add-btn-edit d-inline-block">Add <i class="fa-solid fa-plus-circle"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="row g-3 mt-1">
                                    @foreach($data->specialities as $key=> $item)
                                        <div class="col-12 col-lg-6 col-md-12">
                                            <div class="edit-card">
                                                <div class="action">
                                                    <a href="{{ route('front.portfolio.expertise.edit', $item->id) }}"><i class="fa-solid fa-pen edit table-icon"></i></a>

                                                    <a href="{{ route('front.portfolio.expertise.delete', $item->id) }}" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                                </div>
                                                <div class="date">
                                                    <span>{{ date('j F Y, g:i a', strtotime($item->created_at)) }}</span>
                                                </div>
                                                <div class="edit-heading">
                                                    <h4>{{ $item->specialityDetails->name }}</h4>
                                                    <p>{{ $item->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>
                            </tr>
                        </tbody>



                        <tbody class="tbody-content tbody-content-edit" id="employment-history">
                            <tr>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('front.portfolio.work-experience.create') }}" class="add-btn-edit d-inline-block"  title="Create">Create <i class="fa-solid fa-plus-circle"></i></a>
                                    </div>
                                    @foreach($data->employments as $key=> $item)
                                        <div class="employmentBox">
                                            <div class="action">
                                                <a href="{{ route('front.portfolio.work-experience.edit', $item->id) }}" title="Edit Profile"><i class="fa-solid fa-pen edit table-icon"></i></a>
                                                <a href="{{ route('front.portfolio.work-experience.delete', $item->id) }}" title="Delete" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <label>Designation</label>
                                                    <p>{{ $item->occupation }}</p>
                                                </div>
                                                <div class="col-3">
                                                    <label>Company Name</label>
                                                    <p>{{ $item->company_title }}</p>
                                                </div>
                                                <div class="col-3">
                                                    <label>Duration</label>
                                                    <p>{{ $item->year_from.' - '.$item->year_to }}</p>
                                                </div>
                                                <div class="col-3">
                                                    <label>Contact</label>
                                                    <p>{{ $item->phone_number }}</p>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-3">
                                                    <label>Email</label>
                                                    <p>{{ $item->email_id }}</p>
                                                </div>
                                                <div class="col-3">
                                                    <label>Owner Name</label>
                                                    <p>{{ $item->owner_name }}</p>
                                                </div>
                                                <div class="col-3">
                                                    <label>Manager Name</label>
                                                    <p>{{ $item->manager_name }}</p>
                                                </div>
                                                <div class="col-3">
                                                    <label>Url</label>
                                                    <p>{{ $item->link }}</p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <div class="box">
                                                        <h4>Short Description</h4>
                                                        <p>{{ $item->short_desc }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="box">
                                                        <h4>Long Description</h4>
                                                        <p>{{ $item->short_desc }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>



                        <tbody class="tbody-content tbody-content-edit" id="client">
                            <tr>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('front.portfolio.client.create') }}" class="add-btn-edit d-inline-block"  title="Create">Create <i class="fa-solid fa-plus-circle"></i></a>
                                    </div>
                                    @foreach($data->clients as $key=> $item)
                                        <div class="employmentBox">
                                            <div class="action">
                                                <a href="{{ route('front.portfolio.client.edit', $item->id) }}" title="Edit Profile"><i class="fa-solid fa-pen edit table-icon"></i></a>
                                                <a href="{{ route('front.portfolio.client.delete', $item->id) }}" title="Delete" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 mb-3">
                                                @if($item->image)
                                                <img src="{{ asset('uploads/client/'.$item->image) }}" id="articleImage" class="img-fluid" alt="" width="100" height="100">
                                                @else
                                                <span></span>
                                                @endif
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Client Name</label>
                                                    <p>{{ $item->client_name }}</p>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-3 mb-3">
                                                    <label>Designation</label>
                                                    <p>{{ $item->occupation }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Email</label>
                                                    <p>{{ $item->email_id }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Contact</label>
                                                    <p>{{ $item->phone_number }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Url</label>
                                                    <p>{{ $item->link }}</p>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-12">
                                                    <div class="box">
                                                        <h4>Short Description</h4>
                                                        <p>{{ $item->short_desc }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-12">
                                                    <div class="box">
                                                        <h4>Long Description</h4>
                                                        <p>{{ $item->long_desc }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>



                        <tbody class="tbody-content tbody-content-edit" id="education">
                            <tr>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('front.portfolio.education.create') }}" class="add-btn-edit d-inline-block"  title="Create">Create <i class="fa-solid fa-plus-circle"></i></a>
                                    </div>
                                    @foreach($data->educations as $key=> $item)
                                    <div class="employmentBox">
                                        <div class="action">
                                            <a href="{{ route('front.portfolio.education.edit', $item->id) }}" title="Edit Profile"><i class="fa-solid fa-pen edit table-icon"></i></a>
                                            <a href="{{ route('front.portfolio.education.delete', $item->id) }}" title="Delete" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                        </div>
                                        <div class="row">
                                            <div class="col-4 mb-3">
                                                <label>Degree</label>
                                                <p>{{ $item->degree }}</p>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label>Institution Name</label>
                                                <p>{{ $item->college_name }}</p>
                                            </div>
                                            <div class="col-4 mb-3">
                                                <label>
                                                    Duration
                                                </label>
                                                <p>{{ $item->year_from.' - '.$item->year_to }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label>Percentage</label>
                                                <p>{{ $item->score }}</p>
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label>Url</label>
                                                <p>{{ $item->link }}</p>
                                            </div>

                                            <div class="col-lg-6 col-12 mb-3">
                                                <label>Short Description</label>
                                                <p>{{ $item->short_desc }}</p>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-3">
                                                <label>Long Description</label>
                                                <p>{{ $item->long_desc }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                </td>
                            </tr>
                        </tbody>



                        <tbody class="tbody-content tbody-content-edit" id="testimonial">
                            <tr>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('front.portfolio.testimonial.create') }}" class="add-btn-edit d-inline-block"  title="Create">Create <i class="fa-solid fa-plus-circle"></i></a>
                                    </div>
                                    @foreach($data->testimonials as $key=> $item)
                                    <div class="employmentBox">
                                        <div class="action">
                                            <a href="{{ route('front.portfolio.testimonial.edit', $item->id) }}" title="Edit Profile"><i class="fa-solid fa-pen edit table-icon"></i></a>
                                            <a href="{{ route('front.portfolio.testimonial.delete', $item->id) }}" title="Delete" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                        </div>

                                        <div class="row">
                                            <div class="col-6 mb-3">
                                                <label>Image</label>
                                                {{-- @if($item->file) --}}
                                                <img src="{{ asset($item->image) }}" id="articleImage" class="img-fluid" alt="" style="height: 100px">
                                                {{-- @else
                                                <span></span>
                                                @endif --}}
                                            </div>
                                            <div class="col-6 mb-3">
                                                <label>Client Name</label>
                                                <p>{{ $item->client_name }}</p>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <label>Designation</label>
                                                <p>{{ $item->occupation }}</p>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <label>Contact</label>
                                                <p>{{ $item->phone_number }}</p>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <label>Email</label>
                                                <p>{{ $item->email_id }}</p>
                                            </div>
                                            <div class="col-3 mb-3">
                                                <label>Url</label>
                                                <p>{{ $item->link }}</p>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-3">
                                                <label>Short Description</label>
                                                <p>{{ $item->short_desc }}</p>
                                            </div>
                                            <div class="col-lg-6 col-12 mb-3">
                                                <label>Long Description</label>
                                                <p>{{ $item->long_desc }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                        <tbody class="tbody-content tbody-content-edit" id="certificate">
                            <tr>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('front.portfolio.certification.create') }}" class="add-btn-edit d-inline-block"  title="Create">Create <i class="fa-solid fa-plus-circle"></i></a>
                                    </div>
                                    @foreach($data->certificates as $key=> $item)
                                        <div class="employmentBox">
                                            <div class="action">
                                                <a href="{{ route('front.portfolio.certification.edit', $item->id) }}" title="Edit Profile"><i class="fa-solid fa-pen edit table-icon"></i></a>
                                                <a href="{{ route('front.portfolio.certification.delete', $item->id) }}" title="Delete" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 mb-3">
                                                    <label>Title</label>
                                                    <p>{{ $item->certificate_title }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Type</label>
                                                    <p>{{ $item->certificate_type }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Url</label>
                                                    <p>{{ $item->link }}</p>
                                                </div>
                                                <div class="col-12 mb-3">
                                                    <label>Certificate</label>
                                                    @if($item->file)
                                                    <img src="{{ asset('uploads/certificate/'.$item->file) }}" id="articleImage" class="img-fluid" alt="">
                                                    @else
                                                    <span></span>
                                                    @endif
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label>Short Description</label>
                                                    <p>{{ $item->short_desc }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label>Long Description</label>
                                                    <p>{{ $item->long_desc }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>
                        <tbody class="tbody-content tbody-content-edit" id="feedback">
                            <tr>
                                <td>
                                    <div class="action">
                                        <a type="button" href="{{ route('front.portfolio.feedback.create') }}" class="add-btn-edit d-inline-block"  title="Create">Create <i class="fa-solid fa-plus-circle"></i></a>
                                    </div>
                                    @foreach($data->feedback as $key=> $item)
                                        <div class="employmentBox">
                                            <div class="action">
                                                <a href="{{ route('front.portfolio.feedback.edit', $item->id) }}" title="Edit Profile"><i class="fa-solid fa-pen edit table-icon"></i></a>
                                                <a href="{{ route('front.portfolio.feedback.delete', $item->id) }}" title="Delete" onclick="return confirm('Are you sure ?')"><i class="fa-solid fa-trash-can trash table-icon"></i></a>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 mb-3">
                                                    <label>Start Date</label>
                                                    <p>{{ $item->date_from }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>End Date</label>
                                                    <p>{{ $item->date_to }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Title</label>
                                                    <p>{{ $item->title }}</p>
                                                </div>
                                                <div class="col-3 mb-3">
                                                    <label>Rating</label>
                                                    <p>{{ $item->rating }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label>Review</label>
                                                    <p>{{ $item->review }}</p>
                                                </div>
                                                <div class="col-6 mb-3">
                                                    <label>Description</label>
                                                    <p>{{ $item->description }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
