@extends('admin.app')
@section('title')
    {{ $pageTitle }}
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> {{ $pageTitle }}</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12 mx-auto">
            <div class="tile">
                <h3 class="tile-title">{{ $subTitle }}
                    <span class="top-form-btn">
                        <a class="btn btn-secondary" href="{{ route('admin.tools.AreaOfInterest.index') }}"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                    </span>
                </h3>
                <hr>
                <form action="{{ route('admin.tools.AreaOfInterest.store') }}" method="POST" role="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <div class="form-group">
                                <div class="select-floating-admin">
                                    <label class="control-label" for="category">Category <span
                                            class="m-l-5 text-danger">*</span></label>
                                          
                                    <select name="cat_id" id="category"
                                        class="filter_select form-control @error('category') is-invalid @enderror">
                                        <option value="" hidden selected>Select a Category</option>
                                        @foreach ($categories as $category)
                                       
                                            <option value="{{ $category->id }}"
                                                {{ old('cat_id') == $category->id ? 'selected' : '' }}>
                                                {{ ucwords($category->title) }}</option>
                                        @endforeach
                                    </select>
                                    @error('cat_id')
                                        <p class="small text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="select-floating-admin">
                                <label class="control-label" for="category">Sub Category <span
                                        class="m-l-5 text-danger">*</span></label>
                                <select name="sub_cat_id" id="sub_cat_id"
                                    class="filter_select form-control @error('sub_cat_id') is-invalid @enderror">
                                    <option value="" hidden selected>Select</option>
                                    @foreach ($subcategories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $category->id == old('sub_cat_id') ? 'selected' : '' }}>
                                            {{ ucwords($category->title) }}</option>
                                    @endforeach
                                </select>
                                @error('sub_cat_id')
                                    <p class="small text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="name"> Title <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" value="{{ old('title') }}" />
                            @error('title')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="description">Description<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" type="text" name="description"
                                id="description">{{ old('description') }}</textarea>
                            @error('description')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="feature">Feature<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('feature') is-invalid @enderror" type="text" name="feature"
                                id="feature">{{ old('feature') }}</textarea>
                            @error('feature')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="pros">Pros<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('pros') is-invalid @enderror" type="text" name="pros"
                                id="pros">{{ old('pros') }}</textarea>
                            @error('pros')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cons">Cons<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('cons') is-invalid @enderror" type="text" name="cons"
                                id="cons">{{ old('cons') }}</textarea>
                            @error('cons')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="price">Price<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('price') is-invalid @enderror" type="text" name="price"
                                id="price">{{ old('price') }}</textarea>
                            @error('price')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="link">Website Link<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('link') is-invalid @enderror" type="text" name="link"
                                id="link">{{ old('link') }}</textarea>
                            @error('link')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="affiliate_programme">Affiliate Programme<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('affiliate_programme') is-invalid @enderror" type="text" name="affiliate_programme"
                                id="affiliate_programme">{{ old('affiliate_programme') }}</textarea>
                            @error('affiliate_programme')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="affiliate_programme_link">Affiliate Programme Link/ Revenue<span class="m-l-5 text-danger">
                                    *</span></label>
                            <textarea class="form-control @error('affiliate_programme_link') is-invalid @enderror" type="text" name="affiliate_programme_link"
                                id="affiliate_programme_link">{{ old('affiliate_programme_link') }}</textarea>
                            @error('affiliate_programme_link')
                                {{ $message ?? '' }}
                            @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="image">Image <span class="m-l-5 text-danger">
                                    *</span></label>
                            <input class="form-control @error('image') is-invalid @enderror" type="file" name="image"
                                id="image" value="{{ old('image') }}" />
                            @error('image')
                                {{ $message ?? '' }}
                            @enderror
                        </div>


                        <label class="control-label">Benefits<span class="m-l-5 text-danger"> *</span></label>
                        <div class="form-group">
                            <table class="search_table" id="table">
                                <tbody id="tbody-benefit">

                                @if(old('benefits'))
                                @php
                                    $old_benefits = old('benefits');
                                @endphp
                                @foreach($old_benefits as $key => $value)  
                                @php
                                    
                                @endphp
                                <tr id="benefitsTr{{$key}}" class="tr_benefits">
                                    <input type="hidden" name="benefits[{{$key}}][tool_benefit_id]" value="{{ old('benefits.'.$key.'.tool_benefit_id') }}">
                                    
                                    <td>
                                        <label class="control-label" for="name">Title </label>
                                        <input class="form-control" type="text" name="benefits[{{$key}}][title]" id="d_title{{$key}}" value="{{ old('benefits.'.$key.'.title') }}" />
                                        @error('benefits.'.$key.'.title')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                   
                                    <td>
                                        <label>Description </label>
                                        <textarea type="text" class="form-control tool_benefits_description" rows="4" name="benefits[{{$key}}][description]" id="ben_description{{$key}}">{{ old('benefits.'.$key.'.description') }}</textarea>
                                        @error('benefits.'.$key.'.description')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addBenefitBtn" id="d_add{{$key}}">Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeBenefitBtn" onclick="removeRowBenefit({{$key}})"  id="ben_remove{{$key}}">Remove</a>
                                        
                                    </td>
                                </tr>                        
                                @endforeach
                                @else                                
                                <tr id="benefitsTr1" class="tr_benefits">
                                    <input type="hidden" name="benefits[1][tool_benefit_id]" value="">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="benefits[1][title]" id="d_title1" value="" />
                                    </td>
                                    <td>
                                        <label>Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control tool_benefits_description" rows="4" name="benefits[1][description]" id="ben_description1"></textarea>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addBenefitBtn" id="d_add1" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeBenefitBtn" onclick="removeRowBenefit(1)" id="ben_remove1" >Remove</a>
                                        
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <label class="control-label">Use Cases<span class="m-l-5 text-danger"> *</span></label>
                        <div class="form-group">
                            <table class="search_table" id="table">
                                <tbody id="tbody-usecase">

                                @if(old('usecases'))
                                @php
                                    $old_usecases = old('usecases');
                                @endphp
                                @foreach($old_usecases as $key => $value)  
                                @php
                                    
                                @endphp
                                <tr id="useCaseTr{{$key}}" class="tr_usecases">
                                    <input type="hidden" name="usecases[{{$key}}][tool_usecase_id]" value="{{ old('usecases.'.$key.'.tool_usecase_id') }}">
                                    <td>
                                        <label class="control-label" for="name">Title </label>
                                        <input class="form-control" type="text" name="usecases[{{$key}}][title]" id="" value="{{ old('usecases.'.$key.'.title') }}" />
                                        @error('usecases.'.$key.'.title')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>                                   
                                    <td>
                                        <label>Description </label>
                                        <textarea type="text" class="form-control tool_usecases_description" rows="4" name="usecases[{{$key}}][description]" id="">{{ old('usecases.'.$key.'.description') }}</textarea>
                                        @error('usecases.'.$key.'.description')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label class="control-label" for="name">Url </label>
                                        <input class="form-control" type="text" name="usecases[{{$key}}][url]" id="" value="{{ old('usecases.'.$key.'.url') }}" />
                                        @error('usecases.'.$key.'.url')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addUsecaseBtn" id="">Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeBenefitBtn" onclick="removeRowUsecase({{$key}})"  id="">Remove</a>
                                        
                                    </td>
                                </tr>                        
                                @endforeach
                                @else
                                <tr id="useCaseTr1" class="tr_usecases">
                                    <input type="hidden" name="usecases[1][tool_usecase_id]" value="">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="usecases[1][title]" id="" value="" />
                                    </td>
                                    <td>
                                        <label>Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control tool_usecases_description" rows="4" name="usecases[1][description]" id=""></textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" for="name">Url </label>
                                        <input class="form-control" type="text" name="usecases[1][url]" id="" value="" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addUsecaseBtn" id="" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeBenefitBtn" onclick="removeRowUsecase(1)" id="" >Remove</a>
                                        
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <label class="control-label">How To Use<span class="m-l-5 text-danger"> *</span></label>
                        <div class="form-group">
                            <table class="search_table" id="table">
                                <tbody id="tbody-howtouse">

                                @if(old('howtouses'))
                                @php
                                    $old_howtouses = old('howtouses');
                                @endphp
                                @foreach($old_howtouses as $key => $value)  
                                @php
                                    
                                @endphp
                                <tr id="howtoUseTr{{$key}}" class="tr_howtouses">
                                    <input type="hidden" name="howtouses[{{$key}}][tool_howtouse_id]" value="{{ old('howtouses.'.$key.'.tool_howtouse_id') }}">
                                    <td>
                                        <label class="control-label" for="name">Title </label>
                                        <input class="form-control" type="text" name="howtouses[{{$key}}][title]" id="" value="{{ old('howtouses.'.$key.'.title') }}" />
                                        @error('howtouses.'.$key.'.title')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>                                   
                                    <td>
                                        <label>Description </label>
                                        <textarea type="text" class="form-control " rows="4" name="howtouses[{{$key}}][description]" id="">{{ old('howtouses.'.$key.'.description') }}</textarea>
                                        @error('howtouses.'.$key.'.description')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label class="control-label" for="name">Icon  </label>
                                        <input class="form-control" type="file" name="howtouses[{{$key}}][icon]" id=""  />
                                        @error('howtouses.'.$key.'.icon')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addHowtouseBtn" id="">Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeHowtouseBtn" onclick="removeRowHowtouse({{$key}})"  id="">Remove</a>
                                        
                                    </td>
                                </tr>                        
                                @endforeach
                                @else                                
                                <tr id="howtoUseTr1" class="tr_howtouses">
                                    <input type="hidden" name="howtouses[1][tool_howtouse_id]" value="">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="howtouses[1][title]" id="" value="" />
                                    </td>
                                    <td>
                                        <label>Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control " rows="4" name="howtouses[1][description]" id=""></textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" for="name">Icon </label>
                                        <input class="form-control" type="file" name="howtouses[1][icon]" id=""  />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addHowtouseBtn" id="" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeHowtouseBtn" onclick="removeRowHowtouse(1)" id="" >Remove</a>
                                        
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <label class="control-label">Integration Compatibility<span class="m-l-5 text-danger"> *</span></label>
                        <div class="form-group">
                            <table class="search_table" id="table">
                                <tbody id="tbody-compatibility">

                                @if(old('integration_compatibilities'))
                                @php
                                    $old_integration_compatibilities = old('integration_compatibilities');
                                @endphp
                                @foreach($old_integration_compatibilities as $key => $value)  
                                @php
                                    
                                @endphp
                                <tr id="compatibilitiesTr{{$key}}" class="tr_compatibilities">
                                    <input type="hidden" name="integration_compatibilities[{{$key}}][tool_compatibility_id]" value="{{ old('integration_compatibilities.'.$key.'.tool_compatibility_id') }}">
                                    
                                    <td>
                                        <label class="control-label" for="name">Title </label>
                                        <input class="form-control" type="text" name="integration_compatibilities[{{$key}}][title]" id="d_title{{$key}}" value="{{ old('integration_compatibilities.'.$key.'.title') }}" />
                                        @error('integration_compatibilities.'.$key.'.title')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                   
                                    <td>
                                        <label>Description </label>
                                        <textarea type="text" class="form-control " rows="4" name="integration_compatibilities[{{$key}}][description]" id="">{{ old('integration_compatibilities.'.$key.'.description') }}</textarea>
                                        @error('integration_compatibilities.'.$key.'.description')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addCompatibilityBtn" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeCompatibilityBtn" onclick="removeRowCompatibility({{$key}})"  >Remove</a>
                                        
                                    </td>
                                </tr>                        
                                @endforeach
                                @else                                
                                <tr id="compatibilitiesTr1" class="tr_compatibilities">
                                    <input type="hidden" name="integration_compatibilities[1][tool_compatibility_id]" value="">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="integration_compatibilities[1][title]" value="" />
                                    </td>
                                    <td>
                                        <label>Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control tool_benefits_description" rows="4" name="integration_compatibilities[1][description]" ></textarea>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addCompatibilityBtn" id="d_add1" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeCompatibilityBtn" onclick="removeRowCompatibility(1)" id="ben_remove1" >Remove</a>
                                        
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                        <label class="control-label">Manage Plans<span class="m-l-5 text-danger"> *</span></label>
                        <div class="form-group">
                            <table class="search_table" id="table">
                                <tbody id="tbody-plans">

                                @if(old('plans'))
                                @php
                                    $old_plans = old('plans');
                                @endphp
                                @foreach($old_plans as $key => $value)  
                                @php
                                    
                                @endphp
                                <tr id="plansTr{{$key}}" class="tr_plans">
                                    
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span> </label>
                                        <input class="form-control" type="text" name="plans[{{$key}}][title]" id="d_title{{$key}}" value="{{ old('plans.'.$key.'.title') }}" />
                                        @error('plans.'.$key.'.title')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>                                   
                                    <td>
                                        <label>Short Description <span class="m-l-5 text-danger">*</span> </label>
                                        <textarea type="text" class="form-control " rows="4" name="plans[{{$key}}][short_description]" id="">{{ old('plans.'.$key.'.short_description') }}</textarea>
                                        @error('plans.'.$key.'.short_description')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label>Long Description </label>
                                        <textarea type="text" class="form-control " rows="4" name="plans[{{$key}}][long_description]" id="">{{ old('plans.'.$key.'.long_description') }}</textarea>
                                        @error('plans.'.$key.'.long_description')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label class="control-label" >Amount <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="plans[1][amount]" value="{{ old('plans.'.$key.'.amount') }}" />
                                        @error('plans.'.$key.'.amount')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>
                                    <td>
                                        <label class="control-label" for="name">Link <span class="m-l-5 text-danger">*</span> </label>
                                        <input class="form-control" type="text" name="plans[{{$key}}][link]"  value="{{ old('plans.'.$key.'.link') }}" />
                                        @error('plans.'.$key.'.link')
                                            <p class="small text-danger">{{ $message }}</p>
                                        @enderror
                                    </td>    
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addPlanBtn" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removePlanBtn" onclick="removeRowPlan({{$key}})"  >Remove</a>
                                        
                                    </td>
                                </tr>                        
                                @endforeach
                                @else
                                
                                <tr id="plansTr1" class="tr_plans">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="plans[1][title]" value="" />
                                    </td>
                                    <td>
                                        <label>Short Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control " rows="4" name="plans[1][short_description]" ></textarea>
                                    </td>
                                    <td>
                                        <label>Long Description </label>
                                        <textarea type="text" class="form-control " rows="4" name="plans[1][long_description]" ></textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" >Amount <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="plans[1][amount]" value="" />
                                    </td>
                                    <td>
                                        <label class="control-label" >Link <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="plans[1][link]" value="" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addPlanBtn" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removePlanBtn" onclick="removeRowPlan(1)"  >Remove</a>
                                        
                                    </td>
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>


                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save
                            </button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.tools.AreaOfInterest.category.index') }}"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
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
        $('#description').summernote({
            height: 400
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        @if (old('benefits'))      
            @foreach($old_benefits as $key=>$benefits)
                var totalBenefits = "{{$key}}";
            @endforeach        
            totalBenefits = parseInt(totalBenefits)  
            var iBenefits = totalBenefits+1;            
        @else            
            var iBenefits = 2;            
        @endif

        $(document).on('click','.addBenefitBtn',function(){
            var thisClickedBtn = $(this); 

            var htmlBenefits = `<tr id="benefitsTr`+iBenefits+`" class="tr_benefits">
                                    <input type="hidden" name="benefits[`+iBenefits+`][tool_benefit_id]" value="">
                                    
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="benefits[`+iBenefits+`][title]" id="d_title`+iBenefits+`" value="" />
                                    </td>
                                    <td>
                                        <label>Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control tool_benefits_description" rows="4" name="benefits[`+iBenefits+`][description]" id="ben_description`+iBenefits+`"></textarea>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addBenefitBtn" id="d_add`+iBenefits+`" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeBenefitBtn" onclick="removeRowBenefit(`+iBenefits+`)" id="ben_remove`+iBenefits+`" >Remove</a>
                                        
                                    </td>
                                </tr>`;


            $('#tbody-benefit').append(htmlBenefits);
            iBenefits++;
        });
        function removeRowBenefit(iDetail){
            var count_tr_benefits = $('.tr_benefits').length;        
            
            if(count_tr_benefits > 1){                
                $('#benefitsTr'+iDetail).remove();
            }        
        } 

        @if (old('usecases'))      
            @foreach($old_usecases as $key=>$usecases)
                var totalusecases = "{{$key}}";
            @endforeach        
            totalusecases = parseInt(totalusecases)  
            var iUsecases = totalusecases+1;            
        @else            
            var iUsecases = 2;                        
        @endif

        $(document).on('click','.addUsecaseBtn',function(){
            var thisClickedBtn = $(this); 

            var htmlUsecases = `<tr id="useCaseTr`+iUsecases+`" class="tr_usecases">
                                    <input type="hidden" name="usecases[`+iUsecases+`][tool_usecase_id]" value="">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="usecases[`+iUsecases+`][title]" id="" value="" />
                                    </td>
                                    <td>
                                        <label>Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control tool_usecases_description" rows="4" name="usecases[`+iUsecases+`][description]" id=""></textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" for="name">Url </label>
                                        <input class="form-control" type="text" name="usecases[`+iUsecases+`][url]" id="" value="" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addUsecaseBtn" id="" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeBenefitBtn" onclick="removeRowUsecase(`+iUsecases+`)" id="" >Remove</a>
                                        
                                    </td>
                                </tr>`;


            $('#tbody-usecase').append(htmlUsecases);
            iUsecases++;
        });
        function removeRowUsecase(iDetail){
            var count_tr_usecases = $('.tr_usecases').length;        
            
            if(count_tr_usecases > 1){                
                $('#useCaseTr'+iDetail).remove();
            }        
        } 

        @if (old('howtouses'))      
            @foreach($old_howtouses as $key=>$howtouses)
                var totalhowtouses = "{{$key}}";
            @endforeach        
            totalhowtouses = parseInt(totalhowtouses)  
            var iHowtouse = totalhowtouses+1;            
        @else            
            var iHowtouse = 2;            
        @endif

        
        $(document).on('click','.addHowtouseBtn',function(){
            var thisClickedBtn = $(this); 

            var htmlHowtouse = `<tr id="howtoUseTr`+iHowtouse+`" class="tr_howtouses">
                                    <input type="hidden" name="howtouses[`+iHowtouse+`][tool_howtouse_id]" value="">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="howtouses[`+iHowtouse+`][title]" id="" value="" />
                                    </td>
                                    <td>
                                        <label>Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control " rows="4" name="howtouses[`+iHowtouse+`][description]" id=""></textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" for="name">Icon </label>
                                        <input class="form-control" type="file" name="howtouses[`+iHowtouse+`][icon]" id=""  />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addHowtouseBtn" id="" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removeHowtouseBtn" onclick="removeRowHowtouse(`+iHowtouse+`)" id="" >Remove</a>
                                        
                                    </td>
                                </tr>`;


            $('#tbody-howtouse').append(htmlHowtouse);
            iHowtouse++;
        });
        function removeRowHowtouse(iDetail){
            var count_tr_usecases = $('.tr_howtouses').length;        
            
            if(count_tr_usecases > 1){                
                $('#howtoUseTr'+iDetail).remove();
            }        
        } 

        @if (old('integration_compatibilities'))      
            @foreach($old_integration_compatibilities as $key=>$compatibilities)
                var totalcompatibilities = "{{$key}}";
            @endforeach        
            totalcompatibilities = parseInt(totalcompatibilities)  
            var iCompatibility = totalcompatibilities+1;            
        @else
            var iCompatibility = 2;            
        @endif

        $(document).on('click','.addCompatibilityBtn',function(){
            var thisClickedBtn = $(this); 

            var htmlCompatibilities = `<tr id="compatibilitiesTr`+iCompatibility+`" class="tr_compatibilities">
                                            <input type="hidden" name="integration_compatibilities[`+iCompatibility+`][tool_compatibility_id]" value="">
                                            <td>
                                                <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                                <input class="form-control" type="text" name="integration_compatibilities[`+iCompatibility+`][title]" value="" />
                                            </td>
                                            <td>
                                                <label>Description <span class="m-l-5 text-danger">*</span></label>
                                                <textarea type="text" class="form-control tool_benefits_description" rows="4" name="integration_compatibilities[`+iCompatibility+`][description]" ></textarea>
                                            </td>
                                            <td>
                                                <a href="javascript:void(0);" class="btn btn-submit addCompatibilityBtn" id="d_add`+iCompatibility+`" >Add</a>
                                                <a href="javascript:void(0);" class="btn btn-danger removeCompatibilityBtn" onclick="removeRowCompatibility(`+iCompatibility+`)" id="ben_remove`+iCompatibility+`" >Remove</a>
                                                
                                            </td>
                                        </tr>`;


            $('#tbody-compatibility').append(htmlCompatibilities);
            iCompatibility++;
        });
        function removeRowCompatibility(iCompatibility){
            var count_tr_compatibilities = $('.tr_compatibilities').length;        
            
            if(count_tr_compatibilities > 1){                
                $('#compatibilitiesTr'+iCompatibility).remove();
            }        
        } 



        @if (old('plans'))      
            @foreach($old_plans as $key=>$compatibilities)
                var totalplans = "{{$key}}";
            @endforeach        
            totalplans = parseInt(totalplans)  
            var iPlan = totalplans+1;            
        @else            
            var iPlan = 2;            
        @endif

        $(document).on('click','.addPlanBtn',function(){
            var thisClickedBtn = $(this); 

            var htmlPlans = `<tr id="plansTr`+iPlan+`" class="tr_plans">
                                    <td>
                                        <label class="control-label" for="name">Title <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="plans[`+iPlan+`][title]" value="" />
                                    </td>
                                    <td>
                                        <label>Short Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control " rows="4" name="plans[`+iPlan+`][short_description]" ></textarea>
                                    </td>
                                    <td>
                                        <label>Long Description <span class="m-l-5 text-danger">*</span></label>
                                        <textarea type="text" class="form-control " rows="4" name="plans[`+iPlan+`][long_description]" ></textarea>
                                    </td>
                                    <td>
                                        <label class="control-label" >Amount <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="plans[`+iPlan+`][amount]" value="" />
                                    </td>
                                    <td>
                                        <label class="control-label" >Link <span class="m-l-5 text-danger">*</span></label>
                                        <input class="form-control" type="text" name="plans[`+iPlan+`][link]" value="" />
                                    </td>
                                    <td>
                                        <a href="javascript:void(0);" class="btn btn-submit addPlanBtn" >Add</a>
                                        <a href="javascript:void(0);" class="btn btn-danger removePlanBtn" onclick="removeRowPlan(`+iPlan+`)"  >Remove</a>
                                        
                                    </td>
                                </tr>`;


            $('#tbody-plans').append(htmlPlans);
            iPlan++;
        });
        function removeRowCompatibility(iPlan){
            var count_tr_plans = $('.tr_plans').length;        
            
            if(count_tr_plans > 1){                
                $('#plansTr'+iPlan).remove();
            }        
        } 

        
    </script>
@endpush
