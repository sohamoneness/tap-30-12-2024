@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
<style>
    .simplebox {
    padding: 8px;
    margin: 10px;
    background: #eee;
    border-radius: 8px;
    border: 1px solid #ddd;
    box-shadow: 0 1px 1px #fff inset, 0 -1px 0px #ccc inset;
}
.simplebox-title, .simplebox-content {
    box-shadow: 0 1px 1px #ddd inset;
    border: 1px solid #cccccc;
    border-radius: 5px;
    background: #fff;
}
.simplebox-title {
    margin: 0 0 8px;
    padding: 5px 8px;
}
.simplebox-content {
    padding: 0 8px;
}
</style>
@section('content')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>

    @include('admin.partials.flash')

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <span class="top-form-btn">
                    <a class="btn btn-secondary" href="{{ route('admin.article.edit',$request->blog_id) }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
                </span>
                <h3 class="tile-title">{{ $subTitle }}</h3>

                <form action="{{ route('admin.article.content.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                        <input type="hidden" name="id" value="{{ $targetarticle->id }}">    
                        <div class="tile-body">
                            <div class="form-group">
                                <label class="control-label" for="title">Article Title <span class="m-l-5 text-danger"> *</span></label>
                                 <input class="form-control @error('title') is-invalid @enderror" type="text" name="title" id="title" value="{{ old('title', $targetarticle->title) }}"/>
                                 @error('title') {{ $message }} @enderror
                            </div>


                            <div class="form-group">
                                <label class="control-label" for="content">Content <span class="m-l-5 text-danger"> *</span></label>
                                <textarea class="form-control ckeditor" rows="4" name="content" id="editor1">{{ old('content', $targetarticle->content) }}</textarea>
                                @error('content') {{ $message }} @enderror
                            </div>
                          
                        <div class="form-group">
                            <label class="control-label" for="type"> Type </label>
                            <select class="form-control" name="type">
                                    <option value="select" disabled>Select</option>
                                    <option value="1" {{ ($targetarticle->type=='1') ? 'selected' : '' }}>Content</option>
                                    <option value="2" {{ ($targetarticle->type=='2') ? 'selected' : '' }}>Key factor</option>
                                    <option value="3" {{ ($targetarticle->type=='3') ? 'selected' : '' }}>Case study</option>
                            </select>
                            @error('type') <p class="small text-danger">{{ $message }}</p> @enderror
                        </div>
                    
                        </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update Article</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.article.edit',$request->blog_id) }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
                    </div>
                </form>
                <br>
                
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
    
   
   
    @if (session('csv'))
        <script>
            swal("Success!", "{{ session('csv') }}", "success");
        </script>
    @endif

   
    {{-- <script src="{{ asset('backend/ckeditor5-36.0.1-dundmb20fh0i/build/ckeditor.js') }}"></script>
    <script src="{{ asset('backend/simplebutton_1.0.2/simplebutton/plugin.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/4.21.0/standard-all/ckeditor.js"></script>
    {{-- <script>
        CKEDITOR.plugins.addExternal('simplebox', 'https://ckeditor.com/docs/ckeditor4/4.21.0/examples/assets/plugins/simplebox/', 'plugin.js');

        const watchdog = new CKSource.EditorWatchdog();
        window.watchdog = watchdog;
        
        watchdog.setCreator( ( element, config ) => {
    
           // config.extraPlugins = 'simplebutton';
           // config.allowedContent = true;
             
            return CKSource.Editor
                .create( element, config )
                .then( editor => {
                    return editor;
                } )
        });
        watchdog.setDestructor( editor => {
            return editor.destroy();
        });
    
        watchdog.on( 'error', handleError );
        watchdog
            .create( document.querySelector( '.ckeditor' ), {
                licenseKey: '',
            } )
            .catch( handleError );
    
        function handleError( error ) {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: dundmb20fh0i-hqryd5mcylgl' );
            console.error( error );
        }
    </script> --}}
     <script>
        CKEDITOR.plugins.addExternal('simplebox', 'https://ckeditor.com/docs/ckeditor4/4.21.0/examples/assets/plugins/simplebox/', 'plugin.js');
    
        CKEDITOR.replace('editor1', {
    
          // Add the Simple Box plugin.
          extraPlugins: 'simplebox',
        
          // Besides editor's main stylesheet load also simplebox styles.
          // In the usual case they can be added to the main stylesheet.
          contentsCss: [
            'http://cdn.ckeditor.com/4.21.0/full-all/contents.css',
            'https://ckeditor.com/docs/ckeditor4/4.21.0/examples/assets/plugins/simplebox/styles/contents.css'
          ],
    
          // Set height to make more content visible.
          height: 500,
          removeButtons: 'PasteFromWord'
        });
       
      </script>
@endpush
