@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file"></i> {{ $pageTitle }}</h1>
            <p>{{ $subTitle }}</p>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <table class="table table-hover custom-data-table-style table-striped table-col-width" id="sampleTable">
                    <tbody>
                        <tr>
                            <td>Title</td>
                            <td>{{ empty($faqCategory['title'])? null:$faqCategory['title'] }}</td>
                        </tr>
                        <tr>
                            <td>Type</td>
                            <td>{{ empty($faqCategory->description)? null:($faqCategory->description) }}</td>
                        </tr>
                        <tr>
                            <td>Meta Title</td>
                            <td>{{ empty($faqCategory['meta_title'])? null:$faqCategory['meta_title'] }}</td>
                        </tr>
                        <tr>
                            <td>Meta Keywords</td>
                            <td>{{ empty($faqCategory['meta_keywords'])? null:$faqCategory['meta_keywords'] }}</td>
                        </tr>
                        <tr>
                            <td>Meta Description</td>
                            <td>{{ empty($faqCategory['meta_description'])? null:$faqCategory['meta_description'] }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="{{ route('admin.faq.index') }}" class="btn btn-primary"><i class="fa fa-left-arrow"></i>Back</a>
            </div>
        </div>
    </div>
@endsection
