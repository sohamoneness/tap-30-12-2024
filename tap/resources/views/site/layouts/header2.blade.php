<!doctype html>

<html lang="en">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }} @yield('title')</title>

    <link href="{{ asset('site/css/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <link href="{{ asset('site/css/style.css')}}" rel="stylesheet">

    <script src="{{ asset('site/js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @yield('style')

  </head>

  <body>

    <nav class="navbar navbar-expand-lg">

      <div class="container-xxl">

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">

          <span class="navbar-toggler-icon"></span>

        </button>



        <a class="navbar-brand" href="{!! URL::to('v2') !!}">

          <img src="{{ asset('site/images/copywriter_logo_black.png')}}">

        </a>



        <ul class="navbar-nav ms-auto align-items-center login_menu order-sm-4">

          <li class="nav-item">

            <a class="nav-link " href="https://demo91.co.in/laravel-only/ContentSaas/public/cart">

              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart">

                <circle cx="9" cy="21" r="1"></circle>

                <circle cx="20" cy="21" r="1"></circle>

                <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>

              </svg>

              <span></span>

            </a>

          </li>

        </ul>

        <div class="collapse navbar-collapse order-sm-3" id="navbarSupportedContent">

          <ul class="navbar-nav main_nav mx-auto align-items-center">

            <?php /*<li class="nav-item">

              <a class="nav-link active" href="{!! URL::to('v2') !!}">Home</a>

            </li>*/?>

            <li class="nav-item dropdown">

              <a class="nav-link dropdown-toggle" href="javascript: void(0)" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">

                Markets

              </a>

              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                <li><a class="dropdown-item" href="{!! URL::to('v2/bloggers') !!}">Bloggers</a></li>

                <li><a class="dropdown-item" href="{!! URL::to('v2/employers') !!}">Employers</a></li>

                <li><a class="dropdown-item" href="{!! URL::to('v2/freelancer') !!}">Freelancer</a></li>

                <li><a class="dropdown-item" href="{!! URL::to('v2/publishers') !!}">Publishers</a></li>

                <li><a class="dropdown-item" href="{!! URL::to('v2/in-house-copywriter') !!}">In House Copywriters</a></li>

              </ul>

            </li>

            <li class="nav-item">

              <a class="nav-link " href="{!! URL::to('v2/features') !!}">Features</a>

            </li>

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{!! URL::to('v2/knowledge-centre') !!}" id="dropdownMenuLink" role="button" aria-expanded="false">Content Hub</a>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <li><a class="dropdown-item" href="{!! URL::to('v2/blog') !!}">Blog</a></li>
                <li><a class="dropdown-item" href="{!! URL::to('v2/glossary') !!}">Glossary</a></li>
                <li><a class="dropdown-item" href="{!! URL::to('v2/tools') !!}">Tools</a></li>
                <li><a class="dropdown-item" href="{!! URL::to('v2/faqs') !!}">FAQs</a></li>
              </ul>
            </li>

            <li class="nav-item">

              <a class="nav-link " href="{!! URL::to('v2/pricing') !!}">Plans &amp; Pricing</a>

            </li>

            <li class="nav-item">

              <a class="nav-link " href="{!! URL::to('v2/marketplace') !!}">Freelancers Marketplace</a>

            </li>

            <li class="nav-item">

              <a class="nav-link " href="{!! URL::to('user/login') !!}">Login</a>

            </li>

          </ul>

        </div>

      </div>

    </nav>