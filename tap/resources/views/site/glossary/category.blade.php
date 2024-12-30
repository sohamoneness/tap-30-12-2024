@extends('site.layouts.app2')
@section('title', 'Homepage')
@section('section')
<section class="page_header m-0">
    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>{{$glossaryType->title}}</h2>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{!! URL::to('v2/glossary') !!}">Glossary</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$glossaryType->title}}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>

<section class="glossary_section">
    <div class="container">
        

        <ul class="glossary_pagination">
            <li class="active"><a href="?keyword=">All</a></li>
            <li><a href="?keyword=a">A</a></li>
            <li><a href="?keyword=b">B</a></li>
            <li><a href="?keyword=c">C</a></li>
            <li><a href="?keyword=d">D</a></li>
            <li><a href="?keyword=e">E</a></li>
            <li><a href="?keyword=f">F</a></li>
            <li><a href="?keyword=g">G</a></li>
            <li><a href="?keyword=h">H</a></li>
            <li><a href="?keyword=i">I</a></li>
            <li><a href="?keyword=j">J</a></li>
            <li><a href="?keyword=k">K</a></li>
            <li><a href="?keyword=l">L</a></li>
            <li><a href="?keyword=m">M</a></li>
            <li><a href="?keyword=n">N</a></li>
            <li><a href="?keyword=o">O</a></li>
            <li><a href="?keyword=p">P</a></li>
            <li><a href="?keyword=q">Q</a></li>
            <li><a href="?keyword=r">R</a></li>
            <li><a href="?keyword=s">S</a></li>
            <li><a href="?keyword=t">T</a></li>
            <li><a href="?keyword=u">U</a></li>
            <li><a href="?keyword=v">V</a></li>
            <li><a href="?keyword=w">W</a></li>
            <li><a href="?keyword=x">X</a></li>
            <li><a href="?keyword=y">Y</a></li>
            <li><a href="?keyword=z">Z</a></li>
        </ul>

        <ul class="glossary_list">
        	@foreach($glossaries as $glossary)
            <li>
                <h4><a href="{!! URL::to('v2/glossary-details/'.$glossary->slug) !!}">{{$glossary->term}}</a></h4>
                <p>{!!$glossary->definition!!}</p>
               <!--  <a href="#" class="cat_meta">{{$glossary->type->title}}</a> -->
            </li>
            @endforeach
        </ul>
    </div>
</section>


<section class="cat_section">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-sm-6 text-center">
        <div class="title_area">
          <h5 class="text-white">There’s never been a better time to start writing.</h5>
          <h2 class="text-white">JOIN THE <span>COMMUNITY</span></h2>
          <p>Our community welcomes writers from all walks of life - if you’re ready to learn, you’re in the right place.</p>
          <div class="d-block">
            <a href="#" class="theme_btn">Subscribe Now</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection