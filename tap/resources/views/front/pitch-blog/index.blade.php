@extends('front.layouts.appprofile')
@section('title', ' Blog')

@section('section')
<style>
    .dashboard-featured-flex {
       display: flex;
       align-items: center;
       justify-content: space-between;
    }
 </style>
    <div class="dashboard-content">
        <div class="row">
            <div class="col-12 col-lg-3 col-md-3 mt-3">
                <div class="jobs-filter-content">
                    <form action="{{ route('front.user.pitch.blog.index') }}">
                        <div class="jobs-filter-heading">
                            <h6>filter</h6>
                            <!-- <a href="{{ url()->current() }}">
                                <span class="clear-filter"><small>Clear filter</small></span>
                            </a> -->
                        </div>
                        <div class="jobs-filter-keywords">
                            {{-- <h4>keywords</h4> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M20.45 19.7426L16.5435 15.8366C17.7448 14.4745 18.4064 12.7201 18.4035 10.9041C18.4035 8.90055 17.6235 7.01705 16.207 5.60055C14.7905 4.18405 12.907 3.40405 10.904 3.40405C8.901 3.40405 7.017 4.18405 5.6 5.60005C4.183 7.01605 3.4035 8.90005 3.4035 10.9036C3.4035 12.9071 4.1835 14.7901 5.6 16.2066C7.0165 17.6231 8.9 18.4036 10.9035 18.4036C12.7385 18.4036 14.4685 17.7421 15.836 16.5431L19.742 20.4491C19.7883 20.4956 19.8434 20.5326 19.9041 20.5579C19.9647 20.5831 20.0298 20.5961 20.0955 20.5961C20.1612 20.5961 20.2263 20.5831 20.2869 20.5579C20.3476 20.5326 20.4027 20.4956 20.449 20.4491C20.5427 20.3553 20.5954 20.2281 20.5954 20.0956C20.5954 19.963 20.5427 19.8358 20.449 19.7421L20.45 19.7426ZM6.307 15.5001C5.0795 14.2721 4.4035 12.6401 4.4035 10.9041C4.4035 9.16805 5.0795 7.53555 6.307 6.30755C7.535 5.08005 9.167 4.40405 10.9035 4.40405C12.64 4.40405 14.272 5.08005 15.5 6.30755C16.7275 7.53555 17.404 9.16755 17.404 10.9041C17.404 12.6406 16.7275 14.2721 15.5 15.5001C14.272 16.7276 12.64 17.4041 10.904 17.4041C9.168 17.4041 7.5345 16.7276 6.307 15.5001Z" fill="#262626"/>
                            </svg>
                            <input type="text" name="keyword" placeholder="Search" class="form-control" value="{{ request()->input('keyword') }}" />
                        </div>
                        <div class="jobs-filter-checkbox jobs-filter-employment">
                            <h4>Category</h4>

                            <div class="checkbox-content">
                                <select class="form-control" name="cat_id" >
                                    <option value="" hidden selected>Select</option>
                                    @foreach ($cat as $index => $item)
                                        <option value="{{ $item->id }}">{{ $item->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="job-filter-save">
                            <input type="hidden" name="filter" value="on">
                            <button type="submit" class="btn button">Search</button>


                            {{-- <div class="view-saved-filter-main">
                                <h6>Saved filters</h6>
                                <span>No filters</span>
                                <div class="view-saved-filter-content"></div>
                            </div> --}}
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-lg-9 col-md-9">
                <div class="dashboard-featured mt-3">
                    <div class="dashboard-featured-flex">
                        <!-- <div class="top-info">
                            @if (!request()->input('filter'))
                                <span>Showing all blogs</span>
                            @else
                                @if ($data->count() > 0)
                                    <span>Results found.</span>
                                @else
                                    <span>No Results found. Please try again with a different filter.</span>
                                @endif
                            @endif
                        </div> -->
                        <a href="{{route('front.user.pitch.blog.create')}}" class="btn-add-blog ms-auto" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                                <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Add Blog
                        </a>
                    </div>
                    <div class="row mt-2 g-2">
                        @foreach ($data as $obj)
                            <div class="col-12 col-lg-6 col-md-12">
                                <div class="recommended-writers-content">                                        
                                    <div class="content-top">
                                        <div class="content-top-info">
                                            <h4>{{ $obj->title }}</h4>
                                            <p>{{ $obj->website_name }}</p>
                                            <p class="small text-muted mt-3 short-desc">{!! $obj->website_description !!}</p>
                                            <p>{{ $obj->email }}</p>
                                            <p class="badge tag-badge">{{ $obj->category->title }}</p>
                                            {{-- <p>
                                                {!! $data->description !!}
                                            </p> --}}
                                        </div>
                                        <div class="featured-jobs-badge wishlish">
                                            <button class="btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <li class="nav-item">
                                                    <a href="{{ route('front.user.pitch.blog.detail', $obj->slug) }}" class="badge"> 
                                                        <!-- <i class="fas fa-eye"></i> -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M0.666626 8.00001C0.666626 8.00001 3.33329 2.66667 7.99996 2.66667C12.6666 2.66667 15.3333 8.00001 15.3333 8.00001C15.3333 8.00001 12.6666 13.3333 7.99996 13.3333C3.33329 13.3333 0.666626 8.00001 0.666626 8.00001Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a> 
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('front.user.pitch.blog.edit', $obj->id) }}" class="badge"> 
                                                        <!-- <i class="fas fa-edit"></i> -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M8 13.3333H14" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M11 2.33333C11.2652 2.06811 11.6249 1.91911 12 1.91911C12.1857 1.91911 12.3696 1.95569 12.5412 2.02676C12.7128 2.09783 12.8687 2.202 13 2.33333C13.1313 2.46465 13.2355 2.62055 13.3066 2.79213C13.3776 2.96371 13.4142 3.14761 13.4142 3.33333C13.4142 3.51904 13.3776 3.70294 13.3066 3.87452C13.2355 4.0461 13.1313 4.202 13 4.33333L4.66667 12.6667L2 13.3333L2.66667 10.6667L11 2.33333Z" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="{{ route('front.user.pitch.blog.delete', $obj->id) }}" class="badge" onclick="return confirm('Are you sure?')"> 
                                                        <!-- <i class="fas fa-trash"></i>  -->
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                                            <path d="M2 4H3.33333H14" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M12.6667 3.99999V13.3333C12.6667 13.6869 12.5262 14.0261 12.2762 14.2761C12.0261 14.5262 11.687 14.6667 11.3334 14.6667H4.66671C4.31309 14.6667 3.97395 14.5262 3.7239 14.2761C3.47385 14.0261 3.33337 13.6869 3.33337 13.3333V3.99999M5.33337 3.99999V2.66666C5.33337 2.31304 5.47385 1.9739 5.7239 1.72385C5.97395 1.4738 6.31309 1.33333 6.66671 1.33333H9.33337C9.687 1.33333 10.0261 1.4738 10.2762 1.72385C10.5262 1.9739 10.6667 2.31304 10.6667 2.66666V3.99999" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M6.66663 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                            <path d="M9.33337 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                                        </svg>
                                                    </a>
                                                </li>
                                                {{-- <li>
                                                    <div class="toggle-button-cover margin-auto">
                                                        <div class="button-cover">
                                                            <div class="button-togglr b2" id="button-11">
                                                              <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-blog_id="{{ $obj['id'] }}" {{ $obj['status'] == 1 ? 'checked' : '' }}>
                                                              <div class="knobs"><span>Pending</span></div>
                                                              <div class="layer"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- <div class="line"></div> -->

                                    <!-- <div class="content-btm">
                                    </div> -->
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="row justify-content-end mt-4">
                        <div class="col-12 text-end pagination-custom">
                            {{ $data->appends($_GET)->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
      $('input[id="toggle-status-block"]').change(function() {
            var blog_status_id = $(this).data('blog_status_id');
            console.log(blog_status_id);
            var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
            var check_status = 0;
          if($(this).is(":checked")){
              check_status = 1;
          }else{
            check_status = 0;
          }
          $.ajax({
                type:'POST',
                dataType:'JSON',
                url:"{{route('front.user.pitch.blog.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:blog_status_id, check_status:check_status},
                success:function(response)
                {
                  swal("Success!", response.message, "success");
                },
                error: function(response)
                {

                  swal("Error!", response.message, "error");
                }
              });
        });

    </script>
@endsection
