@extends('front.layouts.appprofile')
@section('title', 'Blog Category detail')

@section('section')
<section class="edit-sec">
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">
                {{-- <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p> --}}
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('front.user.pitch.blog.category.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div>
        </div>

        <div class="row mt-0">
            <div class="col-md-12">
                <h5 class="mb-3">{{$data->title}}</h5>

               
                <p class="mb-0 mt-4">Description:</p>

                <p class="text-muted"><small>{{ $data->description }}</small></p>
            </div>
        </div>

        
    </div>
</section>

@endsection
