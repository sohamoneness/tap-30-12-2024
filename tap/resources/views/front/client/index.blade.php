@extends('front.layouts.appprofile')
@section('title', 'Project')

@section('section')

      <div class="project-content">
        <div class="project-content-header">
          <div class="heading row1">
            <h3>Clients</h3>
            <div class="cta-panel">
              <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="btnn export-btn">
                <!-- <i class="fa-solid fa-file-csv"></i>  -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M6.66663 14.1667L9.99996 17.5L13.3333 14.1667" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M10 10V17.5" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M17.3999 15.075C18.1244 14.5655 18.6677 13.8385 18.951 12.9993C19.2343 12.1601 19.2428 11.2525 18.9753 10.4082C18.7078 9.56387 18.1782 8.82675 17.4633 8.30381C16.7485 7.78087 15.8856 7.49931 14.9999 7.5H13.9499C13.6993 6.52323 13.2304 5.61604 12.5784 4.84674C11.9264 4.07743 11.1084 3.46606 10.186 3.05863C9.2635 2.65121 8.26065 2.45836 7.25288 2.4946C6.24512 2.53084 5.25871 2.79523 4.36791 3.26786C3.47711 3.74049 2.70513 4.40905 2.1101 5.2232C1.51507 6.03735 1.11249 6.97588 0.932662 7.96813C0.752836 8.96038 0.800453 9.9805 1.07193 10.9517C1.3434 11.9229 1.83166 12.8198 2.49994 13.575" stroke="black" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Export
              </a>
               <form action="">
              <div class="search">
               
                <input type="search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Search" />
                <button type="submit">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            
              </div>
              </form>
              <a href="{{ route('front.client.create') }}" class="add-project btnn">
                <!-- <i class="fa-solid fa-circle-plus"></i> -->
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <path d="M10 4.16666V15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M4.16663 10H15.8333" stroke="#95C800" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
                Create new client
              </a>
            </div>
          </div>
          <!-- <div class="pro-content-header-left">
            <h3 class="mb-0">Projects:</h3>
            <ul class="list-unstyled p-0 m-0">
              <li><a href="" class="active">list</a></li>
              <li><a href="">Kanban</a></li>
            </ul>
          </div> -->
          <!-- <div class="header-btns py-3">
            <a href="" class="kanban-btn btnn">kanban board</a>
            <a href="{{ route('front.client.create') }}" class="add-project btnn"
              ><i class="fa-solid fa-circle-plus"></i> create new client</a
            >
          </div> -->
        </div>

        <div class="project-content-body">
          {{--<div class="project-content-body-top">
            <div class="project-content-body-top-left">
              <span> Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </span>
            </div>
            <div class="project-content-body-top-right">
              <div class="export">
                <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="btnn export-btn"
                  ><i class="fa-solid fa-file-csv"></i> export as CSV</a
                >
              </div>
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
                  <input type="search" name="keyword" value="{{request()->input('keyword')}}" placeholder="Search" />
                  <button type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                  </button>
                </div>
              </form>
            </div>
          </div>--}}

          <div class="project-content-body-content">
            <div class="table-responsive">
              <table class="table mb-0">
                <thead>
                  <tr>
                  <th>SR</th>
                                <th>Name</th>
                                <th>Email</th>
                                <!--<th>Phone Number</th>-->
                                <th>Company Name</th>
                                <th>Website</th>
                               
                                <th>Action</th>
                  </tr>
                </thead>

                
                <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td width="230" style="font-weight: 600;">
                                    {{ $item->client_name }}
                                </td>
                                <td>
                                    <p class="text-muted"><small>{{ $item->email_id }}</small></p>
                                </td>
                                <!--<td>-->
                                <!--    {{ $item->phone_number }}-->
                                <!--</td>-->
                                <td class="text-center">
                                    {{ $item->company_name }}
                                </td>
                                <td class="text-center">
                                    {{ $item->link }}
                                </td>

                      
                              
                                <td class="text-center">
                                    <div class="action-panel">
                                      <a href="{{ route('front.client.detail', $item->id) }}" class="badge"> 
                                        <!-- <i class="fas fa-eye"></i>  -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M0.666626 8.00001C0.666626 8.00001 3.33329 2.66667 7.99996 2.66667C12.6666 2.66667 15.3333 8.00001 15.3333 8.00001C15.3333 8.00001 12.6666 13.3333 7.99996 13.3333C3.33329 13.3333 0.666626 8.00001 0.666626 8.00001Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8 10C9.10457 10 10 9.10457 10 8C10 6.89543 9.10457 6 8 6C6.89543 6 6 6.89543 6 8C6 9.10457 6.89543 10 8 10Z" stroke="black" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                      </a>
                                      <a href="{{ route('front.client.edit', $item->id) }}" class="badge"> 
                                        <!-- <i class="fas fa-edit"></i> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16" fill="none">
                                            <path d="M8 13.3333H14" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M11 2.33333C11.2652 2.06811 11.6249 1.91911 12 1.91911C12.1857 1.91911 12.3696 1.95569 12.5412 2.02676C12.7128 2.09783 12.8687 2.202 13 2.33333C13.1313 2.46465 13.2355 2.62055 13.3066 2.79213C13.3776 2.96371 13.4142 3.14761 13.4142 3.33333C13.4142 3.51904 13.3776 3.70294 13.3066 3.87452C13.2355 4.0461 13.1313 4.202 13 4.33333L4.66667 12.6667L2 13.3333L2.66667 10.6667L11 2.33333Z" stroke="#1B6ECB" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg>
                                      </a>
                                      <a href="{{ route('front.client.delete', $item->id) }}" class="badge" onclick="return confirm('Are you sure?')"> 
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


<!-- <section class="edit-sec ">
    <div class="container">
        <div class="row my-3 align-items-center justify-content-between">
            <div class="col-md-12 text-end mb-4">
                <a href="{{ route('front.client.create') }}" class="add-btn-edit d-inline-block" style="padding: 6px 12px;">Create new Client <i class="fa-solid fa-plus ps-1"></i></a>
            </div>
            <div class="col-md-3">
                <p class="display__text">Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records</p>
            </div>
            <div class="col-md-9">
                <form action="" method="GET">
                    <div  class="input__large d-flex align-items-center justify-content-end">
                        <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="form-control w-25 ms-2" placeholder="Search by title">
                        
                        <div class="btn-group export__search ms-2">
                            <button class="btn btn-success btn-search"><i class="fa fa-search"></i></button>
                            <a href="{{route('front.client.index')}}" class="btn btn-danger btn-search mx-sm-2"><i class="fa fa-times"></i></a>
                            <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="add-btn-edit d-inline-block">
                                Export as csv 
                                <i class="fas fa-download ms-2"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row mt-0">
            <div class="col-12">
                <div class="table-responsive table-tabs">
                    <table class="table projectTable">
                        <thead>
                            <tr>
                                <th>SR</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Company Name</th>
                                <th>Website</th>
                               
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td width="230">
                                    <h3>{{ $item->client_name }}</h3>
                                </td>
                                <td>
                                    <p class="text-muted"><small>{{ $item->email_id }}</small></p>
                                </td>
                                <td>
                                    {{ $item->phone_number }}
                                </td>
                                <td class="text-center">
                                    {{ $item->company_name }}
                                </td>
                                <td class="text-center">
                                    {{ $item->link }}
                                </td>

                      
                              
                                <td class="text-center" width="120">
                                    <a href="{{ route('front.client.detail', $item->id) }}" class="badge bg-dark"> <i class="fas fa-eye"></i> </a>

                                    <a href="{{ route('front.client.edit', $item->id) }}" class="badge bg-dark"> <i class="fas fa-edit"></i></a>

                                    <a href="{{ route('front.client.delete', $item->id) }}" class="badge bg-danger" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i> </a>
                                    
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

                @if (count($data) > 0)
                <div class="pagination-custom">
                    {{ $data->appends($_GET)->links() }}
                </div>
                @endif
            </div>
        </div>
    </div>
</section> -->

@endsection

