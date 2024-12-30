@extends('front.layouts.appprofile')
@section('title', 'Advertisement')

@section('section')
<section class="edit-sec ">
    <div class="container">
        <div class="row my-3 justify-content-between">
            <div class="col-md-12 text-end mb-4">
                <a href="{{ route('front.advertisement.create') }}" class="add-btn-edit d-inline-block" style="padding: 6px 12px;">Create new Advertisement <i class="fa-solid fa-plus ps-1"></i></a>
            </div>
            <div class="col-md-3">
                <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p>
            </div>
            <div class="col-md-9">
                <form action="" method="GET">
                    <div  class="d-flex align-items-center justify-content-end">
                        <input type="search" name="keyword" value="{{request()->input('keyword')}}" class="form-control w-25 ms-2" placeholder="Search by title">
                        <select name="search_status" class="form-control w-25 ms-2">
                            <option value="" selected>All</option>
                            @foreach ($status as $s)
                                <option value="{{ $s->id }}" {{request()->input('search_status') == $s->id ? 'selected' : ''}}>{{ $s->title }}</option>
                            @endforeach
                        </select>
                        <div class="btn-group export__search ms-2">
                            <button class="btn btn-success btn-search"><i class="fa fa-search"></i></button>
                            <a href="{{route('front.advertisement.index')}}" class="btn btn-danger btn-search"><i class="fa fa-times"></i></a>
                            {{-- <a href="{{request()->fullUrlWithQuery(['export' => 'true'])}}" class="btn btn-search bg-success">
                                Export as csv 
                                <i class="fas fa-download ms-2"></i>
                            </a> --}}
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
                                <th>Title</th>
                                <th>Description</th>
                                <th>Primary Keyword</th>
                                <th>Category</th>
                                <th>Deadline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($data as $index => $item)
                            <tr>
                                <td>{{ $index + $data->firstItem() }}</td>
                                <td width="230">
                                    <h3>{{ $item->title }}</h3>
                                </td>
                                <td>
                                    <p class="text-muted"><small>@if($item->short_desc != ''){{ substr($item->short_desc,0,10) }}...@endif</small></p>
                                </td>
                                <td>
                                    {{$item->primary_keyword}}
                                </td>
                                <td width="155px">
                                    {{$item->advertisement_category->title}}
                                </td>
                                <td class="text-center">
                                    {{ date('Y-m-d', strtotime($item->deadline)) }}
                                </td>
                                <td width="155px">
                                    {{-- <span class="badge text-success" data-toggle="tooltip" title="{{ $item->statusDetail->icon ?? ''}}">{!! $item->statusDetail->icon ?? ''.' '.ucwords($item->status) !!}</span> --}}
                                    <select onchange="changeProjectAndTaskStatus(`{{route('front.advertisement.updateStatus')}}`,this,'{{$item->id}}')" name="status" id="status" data-original="{{$item->status}}" class="form-control">
                                        <option value="" selected disabled>Change Status</option>
                                        <option value="1" {{$item->status == '1' ? 'selected' : ''}}>Active</option>
                                        <option value="0" {{$item->status == '0' ? 'selected' : ''}}>In-active</option>
                                    </select>
                                    <div class="input-group mb-3 spare_input{{$item->id}}" style="display: none;">
                                        <input type="text" name="spare{{$item->id}}" class="form-control" placeholder="Name...">
                                        <button class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-check"></i></button>
                                        <span class="btn btn-outline-secondary text-sm" type="button" id="button-addon2"><i class="fa fa-times"></i></span>
                                    </div>
                                </td>
                                <td class="text-center" width="120">
                                    {{-- <a href="{{ route('front.advertisement.detail', $item->slug) }}" class="badge bg-dark"> <i class="fas fa-eye"></i> </a> --}}

                                    <a href="{{ route('front.advertisement.edit', $item->id) }}" class="badge bg-dark"> <i class="fas fa-edit"></i></a>

                                    <a href="{{ route('front.advertisement.delete', $item->id) }}" class="badge bg-danger" onclick="return confirm('Are you sure?')"> <i class="fas fa-trash"></i> </a>
                                    <a href="{{ route('front.advertisement.proposal.show', $item->id) }}" class="badge bg-dark"> Proposal </a>
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
</section>

@endsection

