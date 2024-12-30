@extends('site.layouts.app2')
@section('title', 'Contact')
@section('section')
<section class="page_header m-0">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>Contact Us</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<section class="pricing_section">
      <div class="container">      
         <div class="row justify-content-center">
            
            <div class="col-sm-8">
               @if(Session::has('message'))
               <div class="alert alert-success" role="alert">
                  {{ Session::get('message') }}
               </div>
               @endif
               <div class="title_area text-center">
                  <h2>Let's Start a <span>Conversation</span></h2>
                  <p>Please fill in the contact form to talk to us about your questions and queries. We'd love to hear your thoughts - let's chat.</p>
                  <!--<ul class="pricing_tab">-->
                  <!--  <a href="#">$(USD)</a>-->
                  <!--  <a href="#" class="active">£(GBP)</a>-->
                  <!--  <a href="#">€(EUR)</a>-->
                  <!--  <a href="#">AU$(AUD)</a>-->
                  <!--</ul>-->
               </div>
            </div>
         </div>
         <div class="row justify-content-center">
            <div class="col-12 col-lg-7 col-md-9 m-auto contact_form">
               <form action="{{ route('sitenew.savecontact') }}" method="POST">
                  @csrf
                  <div class="form-group row ">
                     <div class="col-md-6 mb-3">
                        <input type="text" placeholder="First Name" class="form-control textbox"  name="first_name" value="{{ old('first_name') }}" maxlength="50">
                        @if($errors->has('first_name'))
                           <p class="text-danger">{{ $errors->first('first_name') }}</p>
                        @endif
                     </div>
                     <div class="col-md-6 mb-3">
                        <input type="text" placeholder="Last Name" class="form-control textbox"  name="last_name" value="{{ old('last_name') }}" maxlength="50">
                        @if($errors->has('last_name'))
                           <p class="text-danger">{{ $errors->first('last_name') }}</p>
                        @endif
                     </div>
                  </div>
                  <div class="form-group mb-3">
                     <input type="text" placeholder="Your Email" class="form-control textbox" name="email"  value="{{ old('email') }}" maxlength="50">
                     @if($errors->has('email'))
                        <p class="text-danger">{{ $errors->first('email') }}</p>
                     @endif
                  </div>
                  <div class="form-group mb-3">
                     <input type="tel" placeholder="Phone Number" class="form-control textbox" name="ph_number"  value="{{ old('ph_number') }}" maxlength="12">
                     @if($errors->has('ph_number'))
                        <p class="text-danger">{{ $errors->first('ph_number') }}</p>
                     @endif
                  </div>
                  <div class="form-group mb-3">
                     <textarea id="" cols="30" rows="6" class="form-control textarea" placeholder="Message" name="message" >{{ old('message') }}</textarea>
                     @if($errors->has('message'))
                        <p class="text-danger">{{ $errors->first('message') }}</p>
                     @endif
                  </div>
                  <div class="form-group">
                     <button type="submit" class="theme_btn">Submit</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
</section>
<script >
   $(document).ready(function () {
      $('.alert').delay(5000).slideUp();
   });
</script>
@endsection