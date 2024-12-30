@extends('front.layouts.appprofile')
@section('title', 'Blog Category')

@section('section')

      <div class="project-content">
        <div class="project-content-header">
          <div class="heading row1">
            <h3>Blogger</h3>
            <div class="cta-panel">
              <form action="">
                <div class="search">
                  <input type="text" placeholder="Search" />
                  <button type="submit">
                    <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                      <path d="M20.4499 19.7425L16.5434 15.8365C17.7447 14.4745 18.4063 12.7201 18.4034 10.904C18.4034 8.90049 17.6234 7.01699 16.2069 5.60049C14.7904 4.18399 12.9069 3.40399 10.9039 3.40399C8.90094 3.40399 7.01694 4.18399 5.59994 5.59999C4.18294 7.01599 3.40344 8.89999 3.40344 10.9035C3.40344 12.907 4.18344 14.79 5.59994 16.2065C7.01644 17.623 8.89994 18.4035 10.9034 18.4035C12.7384 18.4035 14.4684 17.742 15.8359 16.543L19.7419 20.449C19.7883 20.4956 19.8433 20.5326 19.904 20.5578C19.9647 20.583 20.0297 20.596 20.0954 20.596C20.1611 20.596 20.2262 20.583 20.2869 20.5578C20.3475 20.5326 20.4026 20.4956 20.4489 20.449C20.5427 20.3552 20.5953 20.2281 20.5953 20.0955C20.5953 19.9629 20.5427 19.8358 20.4489 19.742L20.4499 19.7425ZM6.30694 15.5C5.07944 14.272 4.40344 12.64 4.40344 10.904C4.40344 9.16799 5.07944 7.53549 6.30694 6.30749C7.53494 5.07999 9.16694 4.40399 10.9034 4.40399C12.6399 4.40399 14.2719 5.07999 15.4999 6.30749C16.7274 7.53549 17.4039 9.16749 17.4039 10.904C17.4039 12.6405 16.7274 14.272 15.4999 15.5C14.2719 16.7275 12.6399 17.404 10.9039 17.404C9.16794 17.404 7.53444 16.7275 6.30694 15.5Z" fill="#262626"/>
                    </svg>
                  </button>
                </div>
              </form>
              <a href="{{ url('user/pitch/blogger/create') }}" class="add-project btnn">
                <!-- <i class="fa-solid fa-circle-plus"></i>  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                  <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Create
              </a>
            </div>
          </div>
          {{--<div class="pro-content-header-left">
            <!-- <h3 class="mb-0">Projects:</h3>
            <ul class="list-unstyled p-0 m-0">
              <li><a href="" class="active">list</a></li>
              <li><a href="">Kanban</a></li>
            </ul> -->
          </div>
          <div class="header-btns py-3">
            <!-- <a href="" class="kanban-btn btnn">kanban board</a> -->
            <a href="{{ route('front.user.pitch.blog.category.create') }}" class="add-project btnn"
              ><i class="fa-solid fa-circle-plus"></i> create</a
            >
          </div>--}}
        </div>

        <div class="project-content-body">
          <div class="">
            {{--<div class="project-content-body-top-left">
              <span> Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </span>
            </div>
            <div class="project-content-body-top-right">
              <!-- <div class="export">
                <a href="" class="btnn export-btn"
                  ><i class="fa-solid fa-file-csv"></i> export as esv</a
                >
              </div> -->
              <form action="">
                <!-- <div class="select">
                  <select name="" id="">
                    <option value="">all</option>
                    <option value="">icebox</option>
                    <option value="">todo</option>
                    <option value="">in progress</option>
                  </select>
                </div> -->
                <div class="search">
                  <input type="text" placeholder="Search" />
                  <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>--}}

          <div class="project-content-body-content w-100">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                  <tr>
                    <th>SR</th>
                    <th>Website Name</th>
                    <th>Website Description</th>
                    <th>Category</th>
                    <th>Domain authority</th>
                    <th>Alexa Rank</th>
                    <th>Link</th>
                    <th>Email Address</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td width="230" style="font-weight: 600;">
                                    {{ $item->website_name }}
                                </td>
                                <td>
                                    <p class="text-muted"><small>@if($item->website_description != ''){{ substr($item->website_description,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                    <p class="text-muted"><small>@if($item->categorypitch->title != ''){{ substr($item->categorypitch->title,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                    <p class="text-muted"><small>@if($item->domain_authority != ''){{ substr($item->domain_authority,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                    <p class="text-muted"><small>@if($item->alexa_rank != ''){{ substr($item->alexa_rank,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                    <p class="text-muted"><small>@if($item->link != ''){{ substr($item->link,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                    <p class="text-muted"><small>@if($item->email_address != ''){{ substr($item->email_address,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                  <div class="action-panel">
                                    <a href="{{ url('user/pitch/blogger/detail', $item->id) }}" class="badge"> 
                                      <!-- <i class="fas fa-eye"></i>  -->
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M0.666626 8.00001C0.666626 8.00001 3.33329 2.66667 7.99996 2.66667C12.6666 2.66667 15.3333 8.00001 15.3333 8.00001C15.3333 8.00001 12.6666 13.3333 7.99996 13.3333C3.33329 13.3333 0.666626 8.00001 0.666626 8.00001Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                    </a>
                                    <a href="{{ url('user/pitch/blogger/edit', $item->id) }}" class="badge"> 
                                      <!-- <i class="fas fa-edit"></i> -->
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M8 13.3333H14" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M11 2.33333C11.2652 2.06811 11.6249 1.91911 12 1.91911C12.1857 1.91911 12.3696 1.95569 12.5412 2.02676C12.7128 2.09783 12.8687 2.202 13 2.33333C13.1313 2.46465 13.2355 2.62055 13.3066 2.79213C13.3776 2.96371 13.4142 3.14761 13.4142 3.33333C13.4142 3.51904 13.3776 3.70294 13.3066 3.87452C13.2355 4.0461 13.1313 4.202 13 4.33333L4.66667 12.6667L2 13.3333L2.66667 10.6667L11 2.33333Z" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                    </a>
                                    <a href="{{ url('user/pitch/blogger/delete', $item->id) }}" class="badge" onclick="return confirm('Are you sure?')"> 
                                      <!-- <i class="fas fa-trash"></i>  -->
                                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                        <path d="M2 4H3.33333H14" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.6667 3.99999V13.3333C12.6667 13.6869 12.5262 14.0261 12.2762 14.2761C12.0261 14.5262 11.687 14.6667 11.3334 14.6667H4.66671C4.31309 14.6667 3.97395 14.5262 3.7239 14.2761C3.47385 14.0261 3.33337 13.6869 3.33337 13.3333V3.99999M5.33337 3.99999V2.66666C5.33337 2.31304 5.47385 1.9739 5.7239 1.72385C5.97395 1.4738 6.31309 1.33333 6.66671 1.33333H9.33337C9.687 1.33333 10.0261 1.4738 10.2762 1.72385C10.5262 1.9739 10.6667 2.31304 10.6667 2.66666V3.99999" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M6.66663 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.33337 7.33333V11.3333" stroke="#DD0000" stroke-linecap="round" stroke-linejoin="round"/>
                                      </svg>
                                    </a>
                                  </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="100%" class="text-center text-muted">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
              </table>
            </div>
          </div>

          @if (count($data) > 0)
                <div class="pagination-custom">
                    {{ $data->appends($_GET)->links() }}
                </div>
                @endif
        </div>
      </div>
      </div>


@endsection

