@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection

@section('content')
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
                <form action="{{ route('admin.market.faq.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="question">Question <span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('question') is-invalid @enderror" type="text" name="question" id="question" value="">{{ $targetfaq->question }}</textarea>
                            @error('question') {{ $message }} @enderror
                        </div>
                    </div>
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="answer">Answer<span class="m-l-5 text-danger"> *</span></label>
                            <textarea class="form-control @error('answer') is-invalid @enderror" type="text" name="answer" id="answer" style="min-height: 200px">{{ $targetfaq->answer }}</textarea>
                            @error('answer') {{ $message ?? '' }} @enderror
                        </div>
                    </div>
                    <div class="tile-footer">
                        {{-- @if (request()->input('marketType'))
                            <input type="hidden" name="market_type_id" value="{{ request()->input('marketType') }}">
                        @endif --}}
                        <input type="hidden" name="id" value="{{ $targetfaq->id }}">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update faq</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.market.faq.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
        // $('#question').summernote({
        //     height: 400
        // });
        // $('#answer').summernote({
        //     height: 400
        // });
    </script>
@endpush
