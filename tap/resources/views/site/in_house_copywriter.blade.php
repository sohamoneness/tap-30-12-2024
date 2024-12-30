@extends('site.layouts.app')
@section('title', '- In House Copywriters')
@section('section')
 <section class="marketing_banner">
        <img src="{{ asset('site/images/marketing_banner.png')}}">
        <div class="container">
            <div class="row flex-sm-row-reverse align-items-center">
                <div class="col-sm-6">
                    <figure>
                        <img src="{{ asset('site/images/marketing.png')}}">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <div class="title_area pe-0 pe-sm-5">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{!! URL::to('v2') !!}">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Markets</li>
                            </ol>
                        </nav>
                        <h2 class="text-white">Grow Your Skillset and Further Your Career</h2>
                        <p class="text-white">Whether you’re looking to learn new skills, supercharge your daily efficiency, get inspired, or supplement your income, The Author’s Pad has everything you need to take your in-house copywriting career to the next level. Take the first step today.</p>
                        <a href="#" class="theme_btn">Get Started Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="solution_section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <div class="title_area pe-0 pe-sm-2 mb-3 mb-sm-0">
                        <h5 class="text-theme">TAP is for In-House Copywriters</h5>
                        <h2>Benefits for In-House Copywriters</h2>
                        <p>Want to hone your skills, streamline your workflow and boost your earnings? The Author’s Pad is the place for you. Get involved today.</p>
                        <a href="#" class="theme_btn">Get Started Today</a>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="row gy-3 gy-sm-4">
                        <div class="col-sm-4">
                            <div class="solution_item">
                                <figure>
                                    <img src="{{ asset('site/images/s1.svg')}}">
                                </figure>
                                <h5>Training Programs</h5>
                                <p>Master your craft with regular seminars and tailored writing courses.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="solution_item">
                                <figure>
                                    <img src="{{ asset('site/images/s1.svg')}}">
                                </figure>
                                <h5>Project Management</h5>
                                <p>Create new tasks and manage your workflow on your dashboard.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="solution_item">
                                <figure>
                                    <img src="{{ asset('site/images/s1.svg')}}">
                                </figure>
                                <h5>Communication</h5>
                                <p>Collaborate with colleagues, team leaders, and clients with ease.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="solution_item">
                                <figure>
                                    <img src="{{ asset('site/images/s2.svg')}}">
                                </figure>
                                <h5>News and Insights</h5>
                                <p>Stay on the cusp of industry trends with daily news articles and insights.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="solution_item">
                                <figure>
                                    <img src="{{ asset('site/images/s2.svg')}}">
                                </figure>
                                <h5>Freelancing Opportunities</h5>
                                <p>Supplement your income and build your portfolio in our freelance marketplace.</p>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="solution_item">
                                <figure>
                                    <img src="{{ asset('site/images/s2.svg')}}">
                                </figure>
                                <h5>Writing Tools</h5>
                                <p>Boost your efficiency with tailored templates, grammar helpers, and AI tools.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="title_area text-center">
                        <h2>Master your craft and progress your career today</h2>
                        <div class="d-block px-sm-5 mb-sm-5">
                            <p>Building your expertise while working as an in-house copywriter doesn’t have to be challenging. With our project management tools, tailored courses, helpful guides, and global events, you’ll have everything you need to elevate your career. Get started today.</p>
                        </div>
                        <a href="#" class="theme_btn">Take the Next Step</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-0">
        <div class="container">
            <div class="calltoaction_section">
                <div class="row justify-content-center">
                    <div class="col-sm-8">
                        <div class="title_area">
                            <h2>Get professional <span>SEO content</span> for your blog today</h2>
                            <a href="#" class="theme_btn white large">Start Today</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="right_image_content pt-0">
        <div class="container">
            <div class="row align-items-center flex-sm-row-reverse">
                <div class="col-sm-6">
                    <figure>
                        <img src="{{ asset('site/images/image1.png')}}">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <div class="title_area pe-0 pe-sm-5">
                        <h2>Take your writing to the next level</h2>
                        <div class="content_area">
                        <ul>
                        <li>Learn new skills and grow your expertise with our range of tailored writing courses.</li>
<li>Stay on the cusp of industry trends with news updates, insights, and daily tips.</li>
<li>Utilise intuitive premade document and email templates to enhance your efficiency.</li>
</ul>
</div>
                        <a href="{!! URL::to('user/short_courses') !!}" class="theme_btn">Get Start Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="left_image_content pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <figure>
                        <img src="{{ asset('site/images/image2.png')}}">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <div class="title_area ps-0 ps-sm-5">
                        <h2>Stay organised and boost your efficiency</h2>
                        <div class="content_area">
                        <ul>
                        <li>Upload, control, view and manage critical projects in one place.</li>
<li>See all of your upcoming deadlines and prioritise tasks on your dashboard.</li>
<li>Collaborate and communicate with clients, colleagues and team leaders with ease.</li>
</ul>
</div>
                        <a href="{!! URL::to('user/project') !!}" class="theme_btn">Get Start Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="right_image_content pt-0">
        <div class="container">
            <div class="row align-items-center flex-sm-row-reverse">
                <div class="col-sm-6">
                    <figure>
                        <img src="{{ asset('site/images/image3.png')}}">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <div class="title_area pe-0 pe-sm-5">
                        <h2>Network with like-minded professionals</h2>
                        <div class="content_area">
                        <ul>
                        <li>Attend tailored writing classes to grow your expertise alongside colleagues.</li>
<li>Grow your network and get noticed at our global copywriting events.</li>
<li>Get inspired and learn new skills at tailored seminars.</li>
</ul>
</div>
                        <a href="{!! URL::to('v2/marketplace') !!}" class="theme_btn">Get Start Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="left_image_content pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <figure>
                        <img src="{{ asset('site/images/image4.png')}}">
                    </figure>
                </div>
                <div class="col-sm-6">
                    <div class="title_area ps-0 ps-sm-5">
                        <h2>Supplement your income and grow your portfolio</h2>
                        <div class="content_area">
                        <ul>
                        <li>Discover new freelance opportunities to earn extra cash in tandem with your job.</li>
<li>Supplement your income by selling pre-made content to publishers.</li>
<li>Grow your portfolio and build your personal brand alongside your career.</li>
</ul>
</div>
                        
                        <a href="{!! URL::to('client') !!}" class="theme_btn">Get Start Today</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="faq_section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-7">
                    <div class="title_area text-center">
                        <h2>Frequently asked <span>questions</span></h2>
                        <p>Discover answers to all of the common in-house copywriter queries we receive. Did we miss something? Get in touch today and ask away.</p>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <div class="accordian_box active">
                        <h5><span>01.</span> How can the Author’s Pad make me more efficient in my job?</h5>
                        <div class="accordian_content">
                            The Author’s Pad offers a range of features designed to speed up your workflow. On our intuitive dashboard, you can upload and manage all of your projects directly. You’ll see all of your deadlines and any key details at a glance, so you have everything you need to complete your work efficiently. Plus, with our AI title generator, content templates, and daily insights, you’ll never be short of the inspiration you need to start writing outstanding content. 
                        </div>
                    </div>

                    <div class="accordian_box">
                        <h5><span>02.</span> What kind of copywriting events do you run?</h5>
                        <div class="accordian_content">
                            From global networking meetups to niche copywriting seminars, you’ll find dozens of inspirational events on our platform. We host regular classes and training sessions, so you’ll never be short of a new way to network with like-minded individuals and grow your expertise. We’ll also let you know about any off-platform events happening around the world that we think will benefit you. 
                        </div>
                    </div>
                    <div class="accordian_box">
                        <h5><span>03.</span>  How does the freelance marketplace work?</h5>
                        <div class="accordian_content">
                            If you’re interested in supplementing your income, our freelance marketplace is the place to be. On there, you’ll find a range of premium articles that publishers would like writers to create. You can apply to these requests directly using your portfolio as a CV. Alternatively, if you’ve already written an article in your spare time, you can upload it to the marketplace for publishers to buy. The Author’s Pad will automatically encrypt your content, so there’s no opportunity for anyone to steal your work. 
                        </div>
                    </div>
                    <div class="accordian_box">
                        <h5><span>04.</span> Will my employer benefit from The Author’s Pad?</h5>
                        <div class="accordian_content">
                            Yes. The Author’s Pad is a community for everyone in the writing industry. Employers will love the chance to find new leads, liaise with clients and streamline their workflows on our platform. They’ll be able to assign you to projects directly, specifying all necessary details so you can work at your best. Your employer can then view any updates you provide on the status of the task.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="cat_section">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-sm-5 text-center">
            <div class="title_area">
              <h5 class="text-white">Elevate your Career</h5>
              <h2 class="text-white">Ready to get started? Join <span>the Community</span></h2>
              <p>Build your personal brand. Master your craft. Turn your blog into a business. Kickstart your journey today.</p>
              <div class="d-block">
                <a href="{!! URL::to('v2/pricing') !!}" class="theme_btn">Get Started Today</a>
                <a href="{!! URL::to('v2/contact') !!}" class="theme_btn white">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
<!-- <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.accordian_box:first').addClass('active');
            $('.accordian_box').click(function(){
                if(!$(this).hasClass('active')) {
                    $('.accordian_box.active').removeClass('active');
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
                //$(this).toggleClass('active');
                //$('.accordian_box').not($(this).parent().next()).removeClass('active');;
            });
        });
    </script> -->
@endsection