@extends('front.layouts.appprofile')
@section('title', 'Client detail')
<style>
.input-flex {
  display: flex;
  align-items: center;
  justify-content: flex-start;
}
.input-flex .info-ml {
  margin-left: 20px;
  margin-top: 6px;
}
</style>
@section('section')
<section class="edit-sec client-details">
    <div class="container-fluid">
        <div class="row">
            {{-- <div class="col-md-6">
                <p class="text-muted"><small>Displaying {{$data->firstItem()}} to {{$data->lastItem()}} of {{$data->total()}} records </small></p>
            </div> --}}
            <div class="col-md-6 text-end">
                <a href="{{ route('front.client.index') }}" class="btn btn-back">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            </div>
        </div>

        <div class="row mt-0">
            <div class="col-md-6">
                <h5 class="mb-3">{{$data->title}}</h5>

                <p class="text-muted created-on"><small> Created on {{ date('j F Y g:i A', strtotime($data->created_at)) }}</small></p>
                @if(!empty($data->client_name))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Name:</p>
                    <p class="text-muted info-ml"><small>{{ $data->client_name }}</small></p>
                </div>
                @endif
                @if(!empty($data->email_id))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Email:</p>
                    <p class="text-muted info-ml"><small>{{ $data->email_id }}</small></p>
                </div>
                @endif
                @if(!empty($data->phone_number))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Phone Number:</p>
                    <p class="text-muted info-ml"><small>{{ $data->phone_number }}</small></p>
                </div>
                @endif
                @if(!empty($data->company_name))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Company Name:</p>
                    <p class="text-muted info-ml"><small>{{ $data->company_name }}</small></p>
                </div>
                @endif
                @if(!empty($data->address))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Address:</p>
                    <p class="text-muted info-ml"><small>{{ $data->address }}</small></p>
                </div>
                @endif
                @if(!empty($data->city))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">City:</p>
                    <p class="text-muted info-ml"><small>{{ $data->city }}</small></p>
                </div>
                @endif
                @if(!empty($data->state))
                <div class="input-flex info-row justify-content-between">
                   <p class="mb-0">State:</p>
                    <p class="text-muted info-ml"><small>{{ $data->state }}</small></p>
                </div>
                @endif
                @if(!empty($data->zip))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Zip/ Postcode:</p>
                    <p class="text-muted info-ml"><small>{{ $data->zip }}</small></p>
                </div>
                @endif
                @if(!empty($data->country))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Country:</p>
                    <p class="text-muted info-ml"><small>{{ $data->country }}</small></p>
                </div>
                @endif
                @if(!empty($data->link))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Website:</p>
                    <p class="text-muted info-ml"><small>{{ $data->link }}</small></p>
                </div>
                @endif
                 @if(!empty($data->vat_no))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">VAT Number:</p>
                    <p class="text-muted info-ml"><small>{{ $data->vat_no }}</small></p>
                </div>
                @endif
                @if(!empty($data->group->group_name))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Client Groups :</p>
                    <p class="text-muted info-ml"><small>{{ $data->group->group_name ?? '' }}</small></p>
                </div>
                @endif
                @if(!empty($data->currencyDetail->currency_symbol))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Currency:</p>
                    <p class="text-muted info-ml"><small>{{ $data->currencyDetail->currency_symbol ?? '' }}</small></p>
                </div>
                @endif
                @if(!empty($data->commercial->name))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Commercials:</p>
                    <p class="text-muted info-ml"><small>{{ $data->commercial->name  ?? ''}}</small></p>
                </div>
                @endif
                @if(!empty($data->rate))
                <div class="input-flex info-row justify-content-between">
                    <p class="mb-0">Rate:</p>
                    <p class="text-muted info-ml"><small>{{ $data->rate }}</small></p>
                </div>
                @endif
            </div>
        </div>


</section>

@endsection
