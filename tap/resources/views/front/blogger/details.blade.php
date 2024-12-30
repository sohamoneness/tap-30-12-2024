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
                <a href="{{ url('user/pitch/blogger/index') }}" class="add-btn-edit d-inline-block secondary-btn"><i class="fa-solid fa-chevron-left"></i> Back</a>
            </div>
        </div>

        <div class="row mt-0">
            <div class="col-md-12">
                <p class="mb-0 mt-4">Website Name:</p>
                 <p class="text-muted"><small>{{ $data->website_name }}</small></p>

               
                <p class="mb-0 mt-4">Website Description:</p>

                <p class="text-muted"><small>{{ $data->website_description }}</small></p>
                
                 <p class="mb-0 mt-4">Category:</p>

                <p class="text-muted"><small>{{ $data->categorypitch->title }}</small></p>
                
                 <p class="mb-0 mt-4">Domain Authority:</p>

                <p class="text-muted"><small>{{ $data->domain_authority }}</small></p>
                
                 <p class="mb-0 mt-4">Alexa Rank:</p>

                <p class="text-muted"><small>{{ $data->alexa_rank }}</small></p>
                
                 <p class="mb-0 mt-4">Link:</p>

                <p class="text-muted"><small>{{ $data->link }}</small></p>
                
                 <p class="mb-0 mt-4">Email:</p>

                <p class="text-muted"><small>{{ $data->email_address}}</small></p>
                
                
            </div>
        </div>

        
    </div>
</section>

@endsection
