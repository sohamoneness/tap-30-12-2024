@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection

@section('content')
    <style>
        .tile-title {
            text-align: center;
            margin-bottom: 30px !important;
            font-size: 30px !important;
        }
    </style>

    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>

    @include('admin.partials.flash')

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <form action="{{ route('admin.market.type.content.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="tag">Tag <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('tag') is-invalid @enderror" type="text" name="tag"
                                id="tag" value="{{ old('tag', $data->tag) }}" />
                            @error('tag')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" value="{{ old('title', $data->title) }}" />
                            @error('title')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="short_description">Short Description <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('short_description') is-invalid @enderror" type="text"
                                name="short_description" id="short_description">
                                {{ old('short_description', $data->short_description) }}</textarea>
                            @error('short_description')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="market_btn">Button <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('market_btn') is-invalid @enderror" type="text"
                                name="market_btn" id="market_btn"
                                value="{{ old('market_btn', $data->market_btn) }}" />
                            @error('market_btn')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="market_btn_link">Button Link <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('market_btn_link') is-invalid @enderror" type="text"
                                name="market_btn_link" id="market_btn_link"
                                value="{{ old('market_btn_link', $data->market_btn_link) }}" />
                            @error('market_btn_link')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($data->image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset($data->image) }}" id="blogImage"
                                                class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label"> Image</label>
                                    <input class="form-control @error('image') is-invalid @enderror" type="file"
                                        id="image" name="image" />
                                    @error('image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="short_content_heading">Short Content Heading <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('short_content_heading') is-invalid @enderror" type="text"
                                name="short_content_heading" id="short_content_heading"
                                value="{{ old('short_content_heading', $data->short_content_heading) }}" />
                            @error('short_content_heading')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="short_content">Short Content<span> (max 500
                                    characters)</span></label>
                            <textarea type="text" class="form-control" rows="4" name="short_content" id="short_content">{{ old('short_content', $data->short_content) }}</textarea>
                            @error('short_content')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="short_content_btn">Short Content Button <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('short_content_btn') is-invalid @enderror" type="text"
                                name="short_content_btn" id="short_content_btn"
                                value="{{ old('short_content_btn', $data->short_content_btn) }}" />
                            @error('short_content_btn')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="short_content_btn_link">Short Content Button Link <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('short_content_btn_link') is-invalid @enderror"
                                type="text" name="short_content_btn_link" id="short_content_btn_link"
                                value="{{ old('short_content_btn_link', $data->short_content_btn_link) }}" />
                            @error('short_content_btn_link')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sticky_content_heading">Sticky Content Heading <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sticky_content_heading') is-invalid @enderror"
                                type="text" name="sticky_content_heading" id="sticky_content_heading"
                                value="{{ old('sticky_content_heading', $data->sticky_content_heading) }}" />
                            @error('sticky_content_heading')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sticky_content">Sticky Content<span> (max 500
                                    characters)</span></label>
                            <textarea type="text" class="form-control" rows="4" name="sticky_content" id="sticky_content">{{ old('sticky_content', $data->sticky_content) }}</textarea>
                            @error('sticky_content')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sticky_content_btn">Sticky Content Button <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sticky_content_btn') is-invalid @enderror" type="text"
                                name="sticky_content_btn" id="sticky_content_btn"
                                value="{{ old('sticky_content_btn', $data->sticky_content_btn) }}" />
                            @error('sticky_content_btn')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="sticky_content_btn_link">Sticky Content Button Link <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('sticky_content_btn_link') is-invalid @enderror"
                                type="text" name="sticky_content_btn_link" id="sticky_content_btn_link"
                                value="{{ old('sticky_content_btn_link', $data->sticky_content_btn_link) }}" />
                            @error('sticky_content_btn_link')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="medium_content_heading">Middle Section Content Heading <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('medium_content_heading') is-invalid @enderror"
                                type="text" name="medium_content_heading" id="medium_content_heading"
                                value="{{ old('medium_content_heading', $data->medium_content_heading) }}" />
                            @error('medium_content_heading')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="medium_content">Middle Section Content<span> (max 500
                                    characters)</span></label>
                            <textarea type="text" class="form-control" rows="4" name="medium_content" id="medium_content">{{ old('medium_content', $data->medium_content) }}</textarea>
                            @error('medium_content')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="faq_heading">Faq Content Heading <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('faq_heading') is-invalid @enderror" type="text"
                                name="faq_heading" id="faq_heading"
                                value="{{ old('faq_heading', $data->faq_heading) }}" />
                            @error('faq_heading')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="faq_short">Faq Short Content<span> (max 500
                                    characters)</span></label>
                            <textarea type="text" class="form-control" rows="4" name="faq_short" id="faq_short">{{ old('faq_short', $data->faq_short) }}</textarea>
                            @error('faq_short')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="blog_heading">Blog Content Heading <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('blog_heading') is-invalid @enderror" type="text"
                                name="blog_heading" id="blog_heading"
                                value="{{ old('blog_heading', $data->blog_heading) }}" />
                            @error('blog_heading')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($data->faq_banner_image != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset($data->faq_banner_image) }}"
                                                id="blogImage" class="img-fluid" alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label"> Image</label>
                                    <input class="form-control @error('faq_banner_image') is-invalid @enderror"
                                        type="file" id="faq_banner_image" name="faq_banner_image" />
                                    @error('faq_banner_image')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tile-footer">
                        <input type="hidden" name="id" value="{{$data->id}}">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.market.type.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{$marketType->title}} Category</h3>
                <div class="tile-body">
                    <a href="{{ route('admin.market.category.create', ['marketType' => $marketType->id]) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                    <br><br>
                    <table class="table table-hover custom-data-table-style table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><i class="fi fi-br-picture"></i>Category Image</th>
                                <th> Title </th>
                                {{-- <th> Status </th> --}}
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($cat as $key => $category)
                                <tr>
                                    <td>{{ ($cat->firstItem()) + $key }}</td>
                                    <td>
                                        @if($category->image!='')
                                        <img style="width: 100px;height: 100px;" class="text-right text-uppercase" src="{{asset($category->image)}}">
                                        @endif
                                    </td>
                                    <td>{{ $category->title }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.market.category.edit', $category['id'],['marketType' => $marketType->id]) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a> 

                                            {{-- <a href="{{ route('admin.market.category.details', $category['id']) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-eye"></i></a> --}}

                                            <a href="{{ route('admin.market.type.category.delete', $category->id) }}" data-id="{{$category['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $cat->appends($_GET)->links() !!}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{$marketType->title}} Banner</h3>
                <div class="tile-body">
                    <a href="{{ route('admin.market.banner.create', ['marketType' => $marketType->id]) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>
                    <br><br>
                    <table class="table table-hover custom-data-table-style table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><i class="fi fi-br-picture"></i>Banner Image</th>
                                <th> Heading </th>
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banner as $key => $banner)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                        @if($banner->image!='')
                                        <img style="width: 100px;height: 100px;" class="text-right text-uppercase" src="{{asset($banner->image)}}">
                                        @endif
                                    </td>
                                    <td>{{ $banner->content_heading }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.market.banner.edit', $banner['id'],['marketType' => $marketType->id]) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a> 
                                            <a href="{{ route('admin.market.type.banner.delete', $banner->id) }}" data-id="{{$banner['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i></a>
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

    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{$marketType->title}} FAQ</h3>
                <div class="tile-body">
                    <a href="{{ route('admin.market.faq.create', ['marketType' => $marketType->id]) }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New</a>

                    <br><br>

                    <table class="table table-hover custom-data-table-style table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Question</th>
                                {{-- <th>Answer</th> --}}
                                {{-- <th>Status</th> --}}
                                <th style="width:100px; min-width:100px;" class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($faq as $key => $singleFaq)
                                <tr>
                                    <td>{{ 1 + $key }}</td>
                                    <td>{!! $singleFaq->question !!}</td>
                                    {{-- <td>{!! $singleFaq->answer !!}</td> --}}
                                    {{-- <td class="text-center">
                                        <div class="toggle-button-cover margin-auto">
                                            <div class="button-cover">
                                                <div class="button-togglr b2" id="button-11">
                                                    <input id="toggle-block" type="checkbox" name="status" class="checkbox" data-faq_id="{{ $singleFaq['id'] }}" {{ $singleFaq['status'] == 1 ? 'checked' : '' }}>
                                                    <div class="knobs"><span>Pending</span></div>
                                                    <div class="layer"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td> --}}
                                    <td class="text-center">
                                        <div class="btn-group" role="group" aria-label="Second group">
                                            <a href="{{ route('admin.market.faq.edit', $singleFaq['id'],['marketType' => $marketType->id]) }}" class="btn btn-sm btn-primary edit-btn"><i class="fa fa-edit"></i></a> 
                                            <a href="{{ route('admin.market.type.faq.delete', $singleFaq->id) }}" data-id="{{$singleFaq['id']}}" class="sa-remove btn btn-sm btn-danger edit-btn" onclick="return confirm('Are you sure ?')"><i class="fa fa-trash"></i></a>
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
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{$marketType->title}} FOOTER</h3>
                <div class="tile-body">
                    <br><br>
                    <?php //dd($footer); ?>
                     <form action="{{ route('admin.market.type.footer.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                   
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="title">Title <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" value="{{ old('title', $footer->title) }}">
                                <input type="hidden" name="id" value="{{$footer->id}}">
                            @error('title')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="short_desc"> Short Description <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('short_desc') is-invalid @enderror" type="text" name="short_desc"
                                id="short_desc">{{ old('short_desc', $footer->short_desc) }}</textarea>
                            @error('short_desc')
                                {{ $message ?? '' }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="btn_text">Button <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('btn_text') is-invalid @enderror" type="text"
                                name="btn_text" id="btn_text" value="{{ old('btn_text', $footer->btn_text) }}" />
                            @error('btn_text')
                                {{ $message ?? '' }}
                            @enderror
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="btn_link">Button Link <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <input class="form-control @error('btn_link') is-invalid @enderror" type="text"
                                name="btn_link" id="btn_link" value="{{ URL::to('/').'/'.'user/login' }}" />
                            @error('btn_link')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="btn_desc">Button Short Description <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('btn_desc') is-invalid @enderror" rows="4" type="text" name="btn_desc"
                                id="btn_desc">{{ old('btn_desc', $footer->btn_desc) }}</textarea>
                               
                            @error('btn_desc')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    @if ($footer->footer_logo != null)
                                        <figure class="mt-2" style="width: 80px; height: auto;">
                                            <img src="{{ asset($footer->footer_logo) }}" id="blogImage" class="img-fluid"
                                                alt="img">
                                        </figure>
                                    @endif
                                </div>
                                <div class="col-md-10">
                                    <label class="control-label"> Footer Logo</label>
                                    <input class="form-control @error('footer_logo') is-invalid @enderror" type="file"
                                        id="footer_logo" name="footer_logo" />
                                    @error('footer_logo')
                                        {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                   
                        <div class="form-group">
                            <label class="control-label" for="footer_tag">Footer Bottom Description <span
                                    class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('footer_tag') is-invalid @enderror" type="text" rows="4" name="footer_tag"
                                id="footer_tag">{{ old('footer_tag', $footer->footer_tag) }}</textarea>
                            @error('footer_tag')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.footer.content.index') }}"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">
        $('#short_description').summernote({
            height: 400
        });
        $('#faq_short').summernote({
            height: 400
        });
        $('#short_content').summernote({
            height: 400
        });
        $('#sticky_content').summernote({
            height: 400
        });
        $('#medium_content').summernote({
            height: 400
        });
        $('#section_four_short_desc').summernote({
            height: 400
        });
        $('#section_five_short_desc').summernote({
            height: 400
        });
        $('#section_six_short_desc').summernote({
            height: 400
        });
        $('#footer_tag').summernote({
            height: 140
        });
        $('#btn_desc').summernote({
            height: 140
        });
        $('#short_desc').summernote({
            height: 140
        });
    </script>
@endpush