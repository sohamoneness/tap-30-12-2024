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
        <div class="col-md-12 mx-auto">
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
                    <table class="search_table" id="tableDetail">
                        <tbody id="tbody-detail">
                            
                            @if(old('detail'))
                            @php
                                $old_details = old('detail');
                            @endphp
                            @foreach($old_details as $key => $value)                        
                            <tr id="detailTr{{$key}}" class="tr_detail">
                                <td>
                                    <label class="control-label" for="name">Title </label>
                                    <input class="form-control" type="text" name="detail[{{$key}}][title]" id="d_title{{$key}}" value="{{ old('detail.'.$key.'.title') }}" />
                                    @error('detail.'.$key.'.title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label class="control-label" for="name">Sub Title </label>
                                    <input class="form-control" type="text" name="detail[{{$key}}][sub_title]" id="d_sub_title{{$key}}" value="{{ old('detail.'.$key.'.sub_title') }}" />
                                    @error('detail.'.$key.'.sub_title')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label>Description </label>
                                    <textarea type="text" class="form-control feature_details_description" rows="4" name="detail[{{$key}}][description]" id="d_description{{$key}}">{{ old('detail.'.$key.'.description') }}</textarea>
                                    @error('detail.'.$key.'.description')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label>Image </label>
                                    <input class="form-control" type="file" name="detail[{{$key}}][image]" id="d_image{{$key}}"  />
                                    @error('detail.'.$key.'.image')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Name </label>
                                    <input class="form-control" type="text" name="detail[{{$key}}][button_name]" id="d_button_name{{$key}}" value="{{ old('detail.'.$key.'.button_name') }}" />
                                    @error('detail.'.$key.'.button_name')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Link </label>
                                    <input class="form-control" type="text" name="detail[{{$key}}][button_link]" id="d_button_link{{$key}}" value="{{ old('detail.'.$key.'.button_link') }}" />
                                    @error('detail.'.$key.'.button_link')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit addDetailBtn" id="d_add{{$key}}">Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger removeDetailBtn" onclick="removeRowDetail({{$key}})"  id="d_remove{{$key}}">Remove</a>
                                </td>
                            </tr>                        
                            @endforeach
                            @else
                            <tr id="detailTr1" class="tr_detail">
                                <td>
                                    <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                    <input class="form-control" type="text" name="detail[1][title]" id="d_title1" value="" />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Sub Title <span class="m-l-5 text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="detail[1][sub_title]" id="d_sub_title1" value="" />
                                </td>
                                <td>
                                    <label>Description <span class="m-l-5 text-danger">*</span></label>
                                    <textarea type="text" class="form-control feature_details_description" rows="4" name="detail[1][description]" id="d_description1"></textarea>
                                </td>
                                <td>
                                    <label>Image <span class="m-l-5 text-danger">*</span></label>
                                    <input class="form-control" type="file" name="detail[1][image]" id="d_image1"  />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Name <span class="m-l-5 text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="detail[1][button_name]" id="d_button_name1" value="" />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Link <span class="m-l-5 text-danger">*</span></label>
                                    <input class="form-control" type="text" name="detail[1][button_link]" id="d_button_link1" value="" />
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit addDetailBtn" id="d_add1" >Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger removeDetailBtn" onclick="removeRowDetail(1)" id="d_remove1" >Remove</a>
                                </td>
                            </tr>
                            @endif
                        </tbody>
                    </table>

                    <label class="control-label">FAQ Questions<span class="m-l-5 text-danger"> *</span></label>
                    <table class="search_table" id="tableFaq">
                        <tbody id="tbody-faq">
                            @if(old('faq'))
                            @php
                                $old_faqs = old('faq');
                            @endphp
                            @foreach($old_faqs as $key => $value)                        
                            <tr id="faqTr{{$key}}" class="tr_faq">
                                <td>
                                    <label class="control-label" for="name">Question </label>
                                    <input class="form-control" type="text" name="faq[{{$key}}][question]" id="f_question{{$key}}" value="{{ old('faq.'.$key.'.question') }}" />
                                    @error('faq.'.$key.'.question')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <label>Answer </label>
                                    <textarea type="text" class="form-control feature_faq_answers" rows="4" name="faq[{{$key}}][answer]" id="f_answer{{$key}}" >{{ old('faq.'.$key.'.answer') }}</textarea>
                                    @error('faq.'.$key.'.answer')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit addFaqBtn">Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger removeFaqBtn" onclick="removeRowFaq({{$key}});" id="f_remove{{$key}}">Remove</a>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <tr id="faqTr1" class="tr_faq">
                                <td>
                                    <label class="control-label" for="name">Question </label>
                                    <input class="form-control" type="text" name="faq[1][question]" id="f_question1"  />
                                </td>
                                <td>
                                    <label>Answer </label>
                                    <textarea type="text" class="form-control feature_faq_answers" rows="4" name="faq[1][answer]" id="f_answer1" ></textarea>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit addFaqBtn">Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger removeFaqBtn" onclick="removeRowFaq(1);" id="f_remove1">Remove</a>
                                </td>
                            </tr>
                            @endif
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

        var rowCountDetail = $('#tableDetail tbody tr').length;
        var rowCountFaq = $('#tableFaq tbody tr').length;

        $(document).ready(function(){
            // alert(rowCountFaq);
            if(rowCountDetail == 1){
                $('#d_remove1').hide();
            }
            if(rowCountFaq == 1){
                $('#f_remove1').hide();
            }
        })

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


        var iDetail = 2;
        @if (old('detail'))      
            @foreach($old_details as $key=>$details)
                var totalDetails = "{{$key}}";
            @endforeach        
            totalDetails = parseInt(totalDetails)    
            console.log('totalDetails:- '+totalDetails);
            iDetail = totalDetails+1;        
        @endif

        console.log('index Detail:- '+iDetail);

        $(document).on('click','.addDetailBtn',function(){
            var thisClickedBtn = $(this); 

            var htmlDetails = `<tr id="detailTr`+iDetail+`" class="tr_detail">
                                <td>
                                    <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                    <input class="form-control" type="text" name="detail[`+iDetail+`][title]" id="d_title`+iDetail+`" value="" />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Sub Title <span class="m-l-5 text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="detail[`+iDetail+`][sub_title]" id="d_sub_title`+iDetail+`" value="" />
                                </td>
                                <td>
                                    <label>Description <span class="m-l-5 text-danger">*</span></label>
                                    <textarea type="text" class="form-control feature_details_description" rows="4" name="detail[`+iDetail+`][description]" id="d_description`+iDetail+`"></textarea>
                                </td>
                                <td>
                                    <label>Image <span class="m-l-5 text-danger">*</span></label>
                                    <input class="form-control" type="file" name="detail[`+iDetail+`][image]" id="d_image`+iDetail+`"  />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Name <span class="m-l-5 text-danger">*</span> </label>
                                    <input class="form-control" type="text" name="detail[`+iDetail+`][button_name]" id="d_button_name`+iDetail+`" value="" />
                                </td>
                                <td>
                                    <label class="control-label" for="name">Button Link <span class="m-l-5 text-danger">*</span></label>
                                    <input class="form-control" type="text" name="detail[`+iDetail+`][button_link]" id="d_button_link`+iDetail+`" value="" />
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit addDetailBtn" id="d_add`+iDetail+`" >Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger removeDetailBtn" onclick="removeRowDetail(`+iDetail+`)" id="d_remove`+iDetail+`" >Remove</a>
                                </td>
                            </tr>`;


            $('#tbody-detail').append(htmlDetails);
            iDetail++;
        });

        function removeRowDetail(iDetail){
            var count_tr_detail = $('.tr_detail').length;        
            
            if(count_tr_detail > 1){                
                $('#detailTr'+iDetail).remove();
            }        
        }  
        
        var iFaq = 2;
        @if (old('faq'))      
            @foreach($old_faqs as $key=>$details)
                var totalFaqs = "{{$key}}";
            @endforeach        
            totalFaqs = parseInt(totalFaqs)    
            console.log('totalFaqs:- '+totalFaqs);
            iFaq = totalFaqs+1;        
        @endif

        console.log('index Faq:- '+iFaq);

        $(document).on('click','.addFaqBtn',function(e){

            var htmlFaq = `<tr id="faqTr`+iFaq+`" class="tr_faq">
                                <td>
                                    <label class="control-label" for="name">Question </label>
                                    <input class="form-control" type="text" name="faq[`+iFaq+`][question]" id="f_question`+iFaq+`"  />
                                </td>
                                <td>
                                    <label>Answer </label>
                                    <textarea type="text" class="form-control feature_faq_answers" rows="4" name="faq[`+iFaq+`][answer]" id="f_answer`+iFaq+`" ></textarea>
                                </td>
                                <td>
                                    <a href="javascript:void(0);" class="btn btn-submit addFaqBtn">Add</a>
                                    <a href="javascript:void(0);" class="btn btn-danger removeFaqBtn" onclick="removeRowFaq(`+iFaq+`);" id="f_remove`+iFaq+`">Remove</a>
                                </td>
                            </tr>`;

            $('#tbody-faq').append(htmlFaq);
            iFaq++;            
        });

        function removeRowFaq(iFaq){
            var count_tr_faq = $('.tr_faq').length;        
            
            if(count_tr_faq > 1){                
                $('#faqTr'+iFaq).remove();
            }        
        }

        $('.faq_answers').summernote({
            height: 400
        });

        

    </script>
@endpush

