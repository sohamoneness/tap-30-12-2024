@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div class="row w-100">
            <div class="col-md-6">
                <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
                <p></p>
            </div>
            <div class="col-md-6 text-right">
                <a href="{{ route('admin.article.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                <a href="#csvUploadModal" data-toggle="modal" class="btn btn-primary "><i class="fa fa-cloud-upload"></i> CSV Upload</a>
                <a href="{{ route('admin.article.data.csv.export') }}" class="btn btn-primary "><i class="fa fa-cloud-download"></i> CSV Export</a>
            </div>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="px-3 py-3 bg-white border border-danger w-100">
                <form action="{{ route('admin.article.index') }}">
              <div class="row">
                  <div class="col-md-4">
                    <select class="form-control" name="article_category_id">
                        <option value="" hidden selected>Select Categoy...</option>
                        @foreach ($articlecat as $index => $item)
                            <option value="{{ $item->id }}">{{ $item->title }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="col-md-4">
                    <select class="form-control form-control" name="article_sub_category_id" disabled>
                        <option value="" hidden selected>None</option>
                        <option value="" selected disabled>Select Category first</option>
                    </select>
                </div>
                  <div class="col-md-4">
                      <input type="search" name="keyword" id="keyword" class="form-control" placeholder="Keyword.." value="{{app('request')->input('keyword')}}" autocomplete="off">
                  </div>
              </div>
              <div class="mt-3 text-right">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i>Search </button>
                  <a type="button" href="{{ url()->current() }}" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Remove filter">
                    <i class="fa fa-times"></i>
                  </a>
              </div>
              </form>
          </div>
            <div class="row align-items-center justify-content-between">
                <div class="col">
                    <ul class="text-right mt-3">
                        <p class="font-weight : bold">Total Articles <span class="count">({{$article->total()}})</span></p>
                    </ul>
                </div>
            </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        <table class="table table-hover custom-data-table-style table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-center"><i class="fi fi-br-picture"></i> Image</th>
                                    <th> Title </th>
                                    {{-- <th> Description </th> --}}
                                    <th> Primary Category </th>
                                    <th> Secondary Category </th>
                                    <th> Status </th>
                                    <th> Featured </th>
                                    <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($article as $key => $blog)
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>
                                                @if($blog->image!='')
                                                <img style="width: 100px;height: 100px;" src="{{asset($blog->image)}}">
                                                @endif
                                            </td>

                                            <td>{{ $blog->title }}</td>
                                            {{-- <td>@php
                                                $desc = strip_tags($blog['content']);
                                                $length = strlen($desc);
                                                if($length>50)
                                                {
                                                    $desc = substr($desc,0,50)."...";
                                                }else{
                                                    $desc = substr($desc,0,50);
                                                }
                                               @endphp
                                                 {!! $desc !!}</td> --}}
                                            <td> 
                                                @php
                                                    $cat = $blog->article_category_id ?? '';
                                                    //dd($cat);
                                                    $displayCategoryName = '';
                                                    foreach(explode(',', $cat) as $catKey => $catVal) {
                                                       //
                                                        $catDetails = DB::table('article_categories')->where('id', $catVal)->first();
                                                        //dd($catDetails);
                                                        if($catDetails == ''){
                                                        $displayCategoryName .=  '';}
                                                        else{
                                                        $displayCategoryName .= $catDetails->title.' , ' ?? '';

                                                        //dd($displayCategoryName);
                                                        }
                                                    }

                                                @endphp
                                                {{substr($displayCategoryName, 0, -2) ?? '' }}
                                            </td>

                                                <td>{{ $blog->subcategory ? $blog->subcategory->title : '' }}</td>
                                                <td class="text-center">
                                                    <div class="toggle-button-cover margin-auto">
                                                        <div class="button-cover">
                                                            <div class="button-togglr b2" id="button-11">
                                                              <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-blog_id="{{ $blog['id'] }}" {{ $blog['status'] == 1 ? 'checked' : '' }}>
                                                              <div class="knobs"><span>Pending</span></div>
                                                              <div class="layer"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="toggle-button-cover margin-auto">
                                                        <div class="button-cover">
                                                            <div class="button-togglr b2" id="button-11">
                                                                <input id="toggle-status-block" type="checkbox" name="blog_status" class="checkbox" data-blog_status_id="{{ $blog['id'] }}" {{ $blog['blog_status'] == 1 ? 'checked' : '' }}>
                                                                <div class="knobs"><span>Inactive</span></div>
                                                                <div class="layer"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group" role="group" aria-label="Second group">
                                                        <a href="{{ route('admin.article.edit', $blog['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('admin.article.details', $blog['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a>
                                                        <a href="#" data-id="{{$blog['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn"><i class="fa fa-trash"></i></a>
                                                    </div>
                                                </td>
                                        </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $article->links() !!}
                    </div>
                </div>
            </div>
         </div>
     </div>
 </div>
    <div class="modal fade" id="csvUploadModal" data-backdrop="static">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    Import CSV data
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('admin.article.data.csv.store')}}" enctype="multipart/form-data" id="fileCsvUploadForm">
                        @csrf
                        <input type="file" name="file" class="form-control" accept=".csv">
                        <br>
                        <p class="small">Please select csv file</p>
                        <button type="submit" class="btn btn-sm btn-primary" id="csvImportBtn">Import <i class="fas fa-upload"></i></button>
                         <p><a href="{{URL::to('/')}}/admin/csvexample/article.csv" target="_blank">
                            <i class="fa fa-download"></i>Download Example File</a></p>
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable({"ordering": false});</script>
     {{-- New Add --}}
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
            window.location.href = "management/"+id+"/delete";
            } else {
              swal("Cancelled", "Record is safe", "error");
            }
        });
    });
    </script>
    <script type="text/javascript">
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
                url:"{{route('admin.article.updateStatus')}}",
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
    <script type="text/javascript">
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
                url:"{{route('admin.articleStatus.updateStatus')}}",
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

		$('select[name="article_category_id"]').on('change', (event) => {
			var value = $('select[name="article_category_id"]').val();

			$.ajax({
				url: '{{url("/")}}/api/subcategory/'+value,
                method: 'GET',
                success: function(result) {
					var content = '';
					var slectTag = 'select[name="article_sub_category_id"]';
					var displayCollection = (result.data.cat_name == "all") ? "All Subcategory" : " Select ";

					content += '<option value="" selected>'+displayCollection+'</option>';
					$.each(result.data.subcategory, (key, value) => {
						content += '<option value="'+value.subcategory_id+'">'+value.subcategory_title+'</option>';
					});
					$(slectTag).html(content).attr('disabled', false);
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

