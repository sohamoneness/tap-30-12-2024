@extends('front.layouts.appprofile')

@section('title', 'Create Client')
@section('section')

<style>
    .input-group-btn {
        margin-top: 35px;
    }
</style>

<section class="edit-sec edit-basic-detail">
        <div class="container-fluid">
            <!-- <div class="row">
                <div class="col-12 text-center top-heading">
                    <div class="text-right" style="
                    text-align: right;">
                    <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.client.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a>
                    </div>
                    <h2>Add  Client Details</h2>
                </div>
            </div> -->
            <div class="row">
                <div class="col-md-8 col-12">
                    <div class="edit-basic-detail-content-wrap">
                        <!-- <div class="top-form-btn"> -->
                            <h3>Add Client Details</h3>
                            <form action="{{ route('front.client.store') }}" method="POST" role="form"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="tile-body">
                                    <div class="form-group">
                                        <label class="control-label" for="client_name">Client Name <span class="m-l-5 text-danger">
                                                *</span></label>
                                        <input class="form-control @error('client_name') is-invalid @enderror" type="text" name="client_name"
                                            id="client_name" value="{{ old('client_name') }}" />

                                        @error('client_name')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="occupation">Client Designation <span class="m-l-5 text-danger">
                                                *</span></label>
                                        <input class="form-control @error('occupation') is-invalid @enderror" type="text" placeholder="eg: developer" name="occupation"
                                            id="occupation" value="{{ old('occupation') }}" />

                                        @error('occupation')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="image">Client Image <span class="warn-text">* Size must not exceed 500KB</span></label>
                                        <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                            id="image" value="{{ old('image') }}"/>

                                        @error('image')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="phone_number">Contact (optional)</label>
                                        <input class="form-control @error('phone_number') is-invalid @enderror" type="text" name="phone_number"
                                            id="phone_number" value="{{ old('phone_number') }}" />
                                        @error('phone_number')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="email_id">Email (optional)</label>
                                        <input class="form-control @error('email_id') is-invalid @enderror" type="text" name="email_id"
                                            id="email_id" value="{{ old('email_id') }}" />
                                        @error('email_id')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="link">Website (optional)</label>
                                        <input class="form-control @error('link') is-invalid @enderror" type="text" name="link"
                                            id="link" placeholder="eg: https://www.google.com/" value="{{ old('link') }}" />
                                        @error('link')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="company_name">Company Name (optional)</label>
                                        <input class="form-control @error('company_name') is-invalid @enderror" type="text" name="company_name"
                                            id="company_name" value="{{ old('company_name') }}" />
                                        @error('company_name')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="address">Address (optional)</label>
                                        <input class="form-control @error('address') is-invalid @enderror" type="text" name="address"
                                            id="address" value="{{ old('address') }}" />
                                        @error('address')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="city">City (optional)</label>
                                        <input class="form-control @error('city') is-invalid @enderror" type="text" name="city"
                                            id="city" value="{{ old('city') }}" />
                                        @error('city')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="state">State (optional)</label>
                                        <input class="form-control @error('state') is-invalid @enderror" type="text" name="state"
                                            id="state" value="{{ old('state') }}" />
                                        @error('state')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="zip">Zip code (optional)</label>
                                        <input class="form-control @error('zip') is-invalid @enderror" type="text" name="zip"
                                            id="zip" value="{{ old('zip') }}" />
                                        @error('zip')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="country">Country (optional)</label>
                                        <input class="form-control @error('country') is-invalid @enderror" type="text" name="country"
                                            id="country" value="{{ old('country') }}" />
                                        @error('country')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="vat_no">VAT number (optional)</label>
                                        <input class="form-control @error('vat_no') is-invalid @enderror" type="text" name="vat_no"
                                            id="vat_no" value="{{ old('vat_no') }}" />
                                        @error('vat_no')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label class="control-label" for="client_group">Client Group (optional)</label>
                                                
                                                <select class="form-control" name="client_group">
                                                    <option value="" hidden selected>Select</option>
                                                    @foreach ($client_group as $item)
                                                        <option value="{{$item->id}}">{{$item->group_name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('client_group')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror    
                                            </div>
                                            <div class="col-auto center">
                                                <div class="input-group-append input-group-btn">
                                                    <button type="button" class="saveBTN d-inline-block" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        Create Group
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label" for="link">Commercial<span class="m-l-5 text-danger">
                                            *</span></label>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <select class="form-control @error('currency') is-invalid @enderror " name="currency">
                                                    @foreach ($currencies as $item)
                                                        <option value="{{$item->id}}">{{$item->currency_symbol}}</option>
                                                    @endforeach
                                                </select>
                                                @error('currency')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            <input type="number" class="form-control @error('rate') is-invalid @enderror" name="rate" aria-label="Text input with dropdown button">
                                            
                                            <div class="input-group-append">
                                                <select class="form-control @error('commercials') is-invalid @enderror" name="commercials">
                                                    @foreach ($charges_limit as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                                @error('commercials')
                                                    <p class="small text-danger">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tile-footer">
                                    <button class="saveBTN d-inline-block" type="submit">
                                        <!-- <i class="fa fa-fw fa-lg fa-check-circle"></i> -->
                                        Submit
                                    </button>
                                    <!-- <a class="add-btn-edit d-inline-block secondary-btn" href="{{ route('front.client.index') }}"><i class="fa fa-fw fa-lg fa-chevron-left"></i>Back</a> -->
                                </div>
                            </form>
                        <!-- </div> -->
                    </div>
                </div>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ceate Group</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <form method="post" action="{{route('front.portfolio.client.group.store')}}" enctype="multipart/form-data">
                                @csrf
                                <input type="text" name="group_name" class="form-control" placeholder="Name">
                                @error('group_name')
                                <p class="small text-danger">{{ $message }}</p>
                                @enderror   
                                <br>
                                <button type="submit" class="saveBTN d-inline-block" id="csvImportBtn">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection