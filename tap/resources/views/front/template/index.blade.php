@extends('front.layouts.appprofile')
@section('title', 'Template')

@section('section')
    <div class="dashboard-content">
        <div class="row">
            <div class="col-12 col-lg-3 col-md-3 mt-3">
                <div class="jobs-filter-content">
                    <form action="{{ route('front.template.index') }}">
                        <div class="jobs-filter-heading">
                            <h6>filter</h6>
                            <!-- <a href="{{ url()->current() }}">
                                <span class="clear-filter"><small>Clear filter</small></span>
                            </a> -->
                        </div>
                        <div class="jobs-filter-keywords">
                            {{-- <h4>Keywords</h4> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.45 19.7426L16.5435 15.8366C17.7448 14.4745 18.4064 12.7201 18.4035 10.9041C18.4035 8.90055 17.6235 7.01705 16.207 5.60055C14.7905 4.18405 12.907 3.40405 10.904 3.40405C8.901 3.40405 7.017 4.18405 5.6 5.60005C4.183 7.01605 3.4035 8.90005 3.4035 10.9036C3.4035 12.9071 4.1835 14.7901 5.6 16.2066C7.0165 17.6231 8.9 18.4036 10.9035 18.4036C12.7385 18.4036 14.4685 17.7421 15.836 16.5431L19.742 20.4491C19.7883 20.4956 19.8434 20.5326 19.9041 20.5579C19.9647 20.5831 20.0298 20.5961 20.0955 20.5961C20.1612 20.5961 20.2263 20.5831 20.2869 20.5579C20.3476 20.5326 20.4027 20.4956 20.449 20.4491C20.5427 20.3553 20.5954 20.2281 20.5954 20.0956C20.5954 19.963 20.5427 19.8358 20.449 19.7421L20.45 19.7426ZM6.307 15.5001C5.0795 14.2721 4.4035 12.6401 4.4035 10.9041C4.4035 9.16805 5.0795 7.53555 6.307 6.30755C7.535 5.08005 9.167 4.40405 10.9035 4.40405C12.64 4.40405 14.272 5.08005 15.5 6.30755C16.7275 7.53555 17.404 9.16755 17.404 10.9041C17.404 12.6406 16.7275 14.2721 15.5 15.5001C14.272 16.7276 12.64 17.4041 10.904 17.4041C9.168 17.4041 7.5345 16.7276 6.307 15.5001Z" fill="#262626"/>
                            </svg>
                            <input type="text" name="keyword" placeholder="Search" class="form-control" value="{{ request()->input('keyword') }}" />
                        </div>
                        <div class="jobs-filter-checkbox jobs-filter-employment">
                            <h4>Category</h4>
                            <div class="filterSearchBox">
                                <div class="row">
                                    <div
                                        class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                        <div class="select-floating-admin">
                                            <select class="form-control" name="cat_id">
                                                <option value="" hidden selected>Select Category...</option>
                                                @foreach ($category as $index => $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ request()->input('cat_id') == $item->id ? 'selected' : '' }}>
                                                        {{ucwords($item->title) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobs-filter-checkbox jobs-filter-employment">
                            <h4>Sub Category</h4>
                            <div class="filterSearchBox">
                                <div class="row">
                                    <div
                                        class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                        <div class="select-floating-admin">
                                            <select class=" form-control" name="sub_cat_id">
                                                <option value="" hidden selected>Select Subcategory...</option>
                                                @foreach ($subcategory as $index => $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ request()->input('sub_cat_id') == $item->id ? 'selected' : '' }}>
                                                        {{ucwords($item->title) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="jobs-filter-checkbox jobs-filter-employment">
                            <h4>Format</h4>
                            <div class="filterSearchBox">
                                <div class="row">
                                    <div
                                        class="mb-sm-0 col col-lg fcontrol position-relative filter_selectWrap filter_selectWrap2">
                                        <div class="select-floating-admin">
                                            <select class=" form-control" name="type">
                                                <option value="" hidden selected>Select</option>
                                                @foreach ($type as $index => $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ request()->input('type') == $item->title ? 'selected' : '' }}>
                                                        {{($item->title) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="job-filter-save">
                            <input type="hidden" name="filter" value="on">
                            <button type="submit" class="btn button">Search</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-9 col-md-9">
                <div class="dashboard-featured mt-3">

                    <!-- <div class="top-info">
                        @if (!request()->input('filter'))
                            <span>Showing all templates</span>
                        @else
                            @if ($template->count() > 0)
                                <span>Results found.</span>
                            @else
                                <span>No Results found. Please try again with a different filter.</span>
                            @endif
                        @endif
                    </div> -->

                    <div class="row">
                        @foreach ($template as $data)
                            <div class="col-12 col-lg-6 col-md-12 mb-4">
                                <div class="recommended-writers-content">
                                    {{-- <div class="featured-jobs-badge">
                                        <span>featured</span>
                                    </div> --}}
                                    <div class="content-top">
                                        <div class="content-top-info">
                                            <h4>{{ ucwords($data->title) }}</h4>

                                            @if(!empty($data->file))
                                                <a href="{{ asset($data->file) }}" target="_blank" class="temp-img">
                                                    <figure>
                                                        <img src="{{asset($data->image)}}" alt="" class="w-100">
                                                    </figure>
                                                </a>
                                            @endif

                                            <div class="bottom-tags">
                                                <span class="badge">{{ ucwords($data->categoryDetails->title) }}</span>
                                                <span class="badge">{{ ucwords($data->subcategory->title) }}</span>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="line"></div> --}}
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-12 text-end pagination-custom">
                            {{ $template->appends($_GET)->links() }}
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
