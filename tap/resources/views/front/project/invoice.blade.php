@extends('front.layouts.appprofile')
@section('title', 'Project detail')
 
@section('section')
<section class="edit-sec">
    <div class="container">
        <div class="row my-3">
            <div class="col-md-6">
                {{-- <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p> --}}
            </div>
            <div class="col-md-6 text-end">
                <a href="{{ route('front.project.index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div>
        </div>

        <div class="row mt-0">
            <div class="col-md-12">
                <h5 class="mb-3">{{$data->title ?? ''}}</h5>

                <p class="mb-0 mt-4">Charge Limit:</p>

                <p class="text-muted"><small>{{ $data->charges_limit ?? ''}}</small></p>
                <p class="mb-0 mt-4">Currency:</p>

                <p class="text-muted"><small>{{ $data->currency->currency_symbol ?? ''}}  {{ $data->currency->currency ?? ''}}</small></p>
                <p class="mb-0 mt-4">Total Count:</p>

                <p class="text-muted"><small>{{ $data->total_count ?? ''}}</small></p>
            </div>
        </div>

        

      
    </div>
</section>

@endsection
