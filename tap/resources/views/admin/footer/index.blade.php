@extends('admin.app')
@section('title')
    {{ $pageTitle }}
@endsection
@section('content')
    <div class="app-title">
        <div class="row w-100">
            <div class="col-md-6">
                <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
                <p></p>
            </div>
            <div class="col-md-6 text-right">
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="row align-items-center justify-content-between">
                <div class="col">
                </div>
            </div>

            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover custom-data-table-style table-striped">
                        <thead>
                            <tr>
                                <th> Footer Logo </th>
                                <th> Title </th>
                                <th> Short Description </th>                            
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $item)
                                <tr>
                                    <td>
                                        @if ($item->footer_logo != '')
                                            <img style="width: 150px;height: 100px;"
                                                src="{{ asset($item->footer_logo) }}">
                                        @endif
                                    </td>
                                    <td>{!! $item->title !!}</td>
                                    <td>{{ $item->short_desc }}</td>

                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.footer.content.edit', $item['id']) }}"
                                                class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('admin.footer.content.details', $item['id']) }}"
                                                class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection