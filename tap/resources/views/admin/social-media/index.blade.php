@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection

@section('content')
    <div class="app-title">
        <div class="row w-100 mx-0">
            <div class="col-md-6">
                <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
                <p></p>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('admin.socialmedia.master.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Create New</a>
                {{-- <a href="#csvUploadModal" data-toggle="modal" class="btn btn-primary "><i class="fa fa-cloud-upload"></i> CSV Upload</a> --}}
                {{-- <a href="{{ route('admin.course.data.csv.export') }}" class="btn btn-primary "><i class="fa fa-cloud-download"></i> CSV Export</a> --}}
            </div>
        </div>
    </div>

    @include('admin.partials.flash')

    <div class="row">
        <div class="col-md-12">
            <div class="row mx-0 align-items-center justify-content-between">
                <div class="col">
                    <p class="text-muted">Total Number of Records ({{$social_media->total()}})</p>
                </div>
                <div class="col-auto">
                    <form action="">
                        <div class="row g-3 align-items-center">
                            <div class="col-auto">
                                <input type="search" name="term" id="term" class="form-control" placeholder="Search here.." value="{{app('request')->input('term')}}" autocomplete="off">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tile">
                <div class="tile-body">

                    <table class="table table-hover custom-data-table-style table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title </th>
                                <th>Icon</th>
                                <th> Status </th>
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($social_media as $key => $data)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td><span>
                                        {!! $data->icon !!}
                                    </span></td>
                                    <td class="text-center">
                                        <div class="toggle-button-cover margin-auto">
                                            <div class="button-cover">
                                                <div class="button-togglr b2" id="button-11">
                                                    <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-blog_id="{{ $data['id'] }}" {{ $data['status'] == 1 ? 'checked' : '' }}>
                                                    <div class="knobs"><span>Pending</span></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.socialmedia.master.edit', $data['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a>
                                            <a href="javascipt:void(0)" data-id="{{$data['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $social_media->links() !!}
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="modal fade" id="csvUploadModal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Import CSV data
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.course.data.csv.store')}}" enctype="multipart/form-data" id="fileCsvUploadForm">
                        @csrf
                        <input type="file" name="file" class="form-control" accept=".csv">
                        <br>
                        <p class="small">Please select csv file</p>
                        <button type="submit" class="btn btn-sm btn-primary" id="csvImportBtn">Import <i class="fas fa-upload"></i></button>
                         <p><a href="{{URL::to('/')}}/admin/csvexample/example.csv" target="_blank">
                            <i class="fa fa-download"></i>Download Example File</a></p>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>

    <script type="text/javascript">
        $('.sa-remove').on("click",function(){
            var id = $(this).data('id');
            swal({
            title: "Are you sure?",
            text: "Your will not be able to recover the record!",
            type: "warning",
            showCancelButton: true,
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false
            },
            function(isConfirm){
            if (isConfirm) {
                    window.location.href += '/' + id + "/delete";
                } else {
                    swal("Cancelled", "Not deleted!", "error");
                }
            });
        });

        $('input[id="toggle-block"]').change(function() {
            var blog_id = $(this).data('blog_id');
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
                url:"{{route('admin.socialmedia.master.updateStatus')}}",
                data:{ _token: CSRF_TOKEN, id:blog_id, check_status:check_status},
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
    @if (session('csv'))
        <script>
            swal("Success!", "{{ session('csv') }}", "success");
        </script>
    @endif
@endpush
