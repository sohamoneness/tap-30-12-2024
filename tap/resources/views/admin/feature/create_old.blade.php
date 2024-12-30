@extends('admin.app')
@section('title')
    {{ $pageTitle }}
@endsection
@section('content')
    {{-- Multiselect css and script  --}}
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
            <a class="btn btn-secondary" href="{{ route('admin.feature.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
            </span>
                <h3 class="tile-title">{{ $subTitle }}</h3>
                <hr>
                <form action="{{ route('admin.feature.store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"  id="title" value="{{ old('title') }}" />
                            @error('title')
                                <p class="small text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">Sub Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control @error('sub_title') is-invalid @enderror" type="text" name="sub_title"  id="sub_title" value="{{ old('sub_title') }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Brief Description<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="brief_description" id="brief_description">{{ old('brief_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">News Letter Section Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control" type="text" name="news_letter_section_title" id="news_letter_section_title" value="{{ old('news_letter_section_title') }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">News Letter Section Sub Title<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="news_letter_section_sub_title" id="news_letter_section_sub_title">{{ old('news_letter_section_sub_title') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">News Letter Section Button Name<span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control" type="text" name="news_letter_section_button_name"  id="news_letter_section_button_name" value="{{ old('news_letter_section_button_name') }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name">FAQ Section Title <span class="m-l-5 text-danger">*</span></label>
                            <input class="form-control" type="text" name="faq_section_title"  id="faq_section_title" value="{{ old('faq_section_title') }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">FAQ Section Sub Title<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="faq_section_sub_title" id="faq_section_sub_title">{{ old('faq_section_sub_title') }}</textarea>
                        </div>
                    </div><br>
                    <label class="control-label">Feature Details<span class="m-l-5 text-danger"> *</span></label>
                    <table class="search_table">
                        <tbody id="time-tbody2">
                            <tr>
                                <td>
                                    <label class="control-label" for="name">Title </label>
                                    <input class="form-control" type="text" name="feature_details_title[]" id="" value="" />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Sub Title </label>
                                    <input class="form-control" type="text" name="feature_details_sub_title[]" id="" value="" />
                                </td>
                                <td>
                                    <label>Description </label>
                                    <textarea type="text" class="form-control feature_details_description" rows="4" name="feature_details_description[]" id=""></textarea>
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Name </label>
                                    <input class="form-control" type="text" name="feature_details_button_name[]" id="" value="" />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Link </label>
                                    <input class="form-control" type="text" name="feature_details_button_link[]" id="" value="" />
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit a-add2">Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger a-rm2">Remove</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <label class="control-label">FAQ Questions<span class="m-l-5 text-danger"> *</span></label>
                    <table class="search_table">
                        <tbody id="time-tbody1">
                            <tr>
                                <td>
                                    <label class="control-label" for="name">Question </label>
                                    <input class="form-control" type="text" name="feature_faq_questions[]" id="" value="" />
                                </td>
                                <td>
                                    <label>Answer </label>
                                    <textarea type="text" class="form-control feature_faq_answers" rows="4" name="feature_faq_answers[]" id=""></textarea>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit a-add1">Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger a-rm1">Remove</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="content">Join Community Section Title<span class="m-l-5 text-danger">*</span></label>
                             <input class="form-control @error('join_cummunity_section_title') is-invalid @enderror" type="text" name="join_cummunity_section_title" id="join_cummunity_section_title" value="{{ old('join_cummunity_section_title') }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Join Community Section Sub Title<span class="m-l-5 text-danger">*</span></label>
                             <input class="form-control @error('join_cummunity_section_sub_title') is-invalid @enderror" type="text" name="join_cummunity_section_sub_title"  id="join_cummunity_section_sub_title" value="{{ old('join_cummunity_section_sub_title') }}" />
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Join Community Section Description<span class="m-l-5 text-danger">*</span></label>
                            <textarea type="text" class="form-control" rows="4" name="join_cummunity_section_brief_description" id="join_cummunity_section_brief_description">{{ old('join_cummunity_section_brief_description') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="content">Join Community Section Button Name<span class="m-l-5 text-danger">*</span></label>
                             <input class="form-control @error('join_cummunity_section_button_name') is-invalid @enderror" type="text" name="join_cummunity_section_button_name" id="join_cummunity_section_button_name" value="{{ old('join_cummunity_section_button_name') }}" />
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save Data</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.article.index') }}"><i  class="fa fa-fw fa-lg fa-times-circle"></i>Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script type="text/javascript">

        $('#key_learnings').summernote({
            height: 400
        });

        $('.short_course_module_resources').summernote({
            height: 400
        });

        $('.faq_answers').summernote({
            height: 400
        });

        $('.short_course_exercise_descriptions').summernote({
            height: 400
        });

        $('body').on('click','a.a-add1',function(e){

            var html = '<tr>\
                            <td>\
                                <label class="control-label" for="name">Question </label>\
                                <input class="form-control" type="text" name="feature_faq_questions[]" id="" value="" />\
                            </td>\
                            <td>\
                                <label>Answer </label>\
                                <textarea type="text" class="form-control feature_faq_answers" rows="4" name="feature_faq_answers[]" id=""></textarea>\
                            </td>\
                            <td>\
                                <a href="javascript:void(0);" class="btn btn-submit a-add1">Add</a>\
                                <a href="javascript:void(0);" class="btn btn-danger a-rm1">Remove</a>\
                            </td>\
                        </tr>';

            $('#time-tbody1').append(html);
                $('.faq_answers').summernote({
                    height: 400
                });
            });

            $('body').on('click','a.a-rm1',function(e){
                $(this).parent().parent().remove();
            });

            $('body').on('click','a.a-add2',function(e){
            

            var html = '<tr>\
                            <td>\
                                <label class="control-label" for="name">Title </label>\
                                <input class="form-control" type="text" name="feature_details_title[]" id="" value="" />\
                            </td>\
                            <td>\
                                <label class="control-label" for="name">Sub Title </label>\
                                <input class="form-control" type="text" name="feature_details_sub_title[]" id="" value="" />\
                            </td>\
                            <td>\
                                <label>Description </label>\
                                <textarea type="text" class="form-control feature_details_description" rows="4" name="feature_details_description[]" id=""></textarea>\
                            </td>\
                            <td>\
                                <label class="control-label" for="name">Button Name </label>\
                                <input class="form-control" type="text" name="feature_details_button_name[]" id="" value="" />\
                            </td>\
                            <td>\
                                <label class="control-label" for="name">Button Link </label>\
                                <input class="form-control" type="text" name="feature_details_button_link[]" id="" value="" />\
                            </td>\
                            <td>\
                                <a href="javascript:void(0);" class="btn btn-submit a-add2">Add</a>\
                                <a href="javascript:void(0);" class="btn btn-danger a-rm2">Remove</a>\
                            </td>\
                        </tr>';

            $('#time-tbody2').append(html);

            $('.faq_answers').summernote({
                height: 400
            });
        });

        $('body').on('click','a.a-rm2',function(e){
            $(this).parent().parent().remove();
        }); 

    </script>
@endpush

