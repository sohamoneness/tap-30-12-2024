<?php

use App\Http\Middleware\AuthenticateOnlyIfNotLoggedIn;
use App\Http\Middleware\RedirectToUSerLoginIfNotAuthenticated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AuthenticateOnlyIfLoggedIn;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\ArticleController;
use App\Http\Controllers\Front\DashboardController;
use App\Http\Controllers\Front\EventController;
use App\Http\Controllers\Front\BloggerController;


// login
Route::middleware([AuthenticateOnlyIfNotLoggedIn::class])->group(function () {
    Route::prefix('user/')->name('front.user.')->group(function () {
        Route::get('/user/register', 'Front\AuthController@register')->name('register');
        Route::post('/create', 'Front\AuthController@create')->name('create');
        Route::get('/login', 'Front\AuthController@login')->name('login');
        Route::post('/login/check', 'Front\AuthController@loginCheck')->name('login.check');
        Route::get('/forget-password-mail', 'Front\AuthController@forget_password_email')->name('forget_password_email');
        Route::post('/check-user-forget-password', 'Front\AuthController@check_user_forget_password')->name('check_user_forget_password');
        Route::get('/change-password-form', 'Front\AuthController@change_password_form')->name('change_password_form');
        Route::post('/save-password', 'Front\AuthController@save_password')->name('save_password');
        // Route::get('logout', 'Front\AuthController@logout')->name('logout');
    });
});

// Route::get('logout', 'Front\AuthController@logout')->name('front.user.logout');

Route::name('front.')->group(function () {
    // homepage
    Route::get('/', 'Front\HomeController@index')->name('index');
    Route::get('/blog', 'Front\ArticleController@index')->name('article');
    Route::get('/blog/{slug}', 'Front\ArticleController@details')->name('article.details');

    Route::prefix('user')->group(function () {
        // dashboard
        Route::name('dashboard.')->group(function () {
            Route::get('/dashboard', 'Front\DashboardController@index')->name('index');
        });
        Route::get('/event', 'Front\EventController@index')->name('event');
        Route::get('/event/{slug}', 'Front\EventController@details')->name('event.details');
        Route::post('/event/calender', 'Front\EventController@calender')->name('event.calender');
        Route::get('/course', 'Front\CourseController@index')->name('course');
        Route::get('/course/{slug}', 'Front\CourseController@details')->name('course.details');
        Route::name('deals.')->group(function () {
            Route::get('/deal', 'Front\DealController@index')->name('index');
            Route::get('/deal/{slug}', 'Front\DealController@details')->name('detail');
        });
        // job
        Route::name('job.')->group(function () {
            Route::get('/job', 'Front\JobController@index')->name('index');
            Route::get('/job/{slug}', 'Front\JobController@details')->name('details');
            Route::post('/save/job', 'Front\JobController@store')->name('save');
            Route::post('/apply/job', 'Front\JobController@jobapply')->name('apply');
            Route::post('/job/interest/{id}', 'Front\JobController@jobinterest')->name('interest');
            Route::post('/job/report', 'Front\JobController@jobreport')->name('report');
            Route::post('/job/search/save', 'Front\JobController@saveSearch')->name('search.save');
            Route::get('/job/search/saved', 'Front\JobController@savedSearch')->name('search.saved');
        });

        // template
        Route::name('template.')->group(function () {
        Route::get('/template', 'Front\TemplateController@index')->name('index');
        Route::get('/template/{slug}', 'Front\TemplateController@details')->name('details');
        Route::post('/save/template', 'Front\TemplateController@store')->name('save');
        });

        // short_courses
            Route::name('short_courses.')->group(function () {
                Route::get('/short_courses', 'Front\ShortCourseController@index')->name('index');
                Route::get('/short_courses/details/{id}', 'Front\ShortCourseController@details')->name('details');
            });

        // project
        Route::name('project.')->group(function () {
        Route::get('/project', 'Front\ProjectController@index')->name('index');
        Route::get('/project/task/list/{slug}', 'Front\ProjectController@taskList')->name('task.list');
        Route::get('/project/create', 'Front\ProjectController@create')->name('create');
        Route::get('/kanban-board/project', 'Front\ProjectController@kanbanBoard')->name('kanban-board');
        Route::post('/project/store', 'Front\ProjectController@store')->name('store');
        Route::get('/project/{slug}', 'Front\ProjectController@detail')->name('detail');
        Route::get('/project/delete/{id}', 'Front\ProjectController@delete')->name('delete');
        Route::get('/project/edit/{id}', 'Front\ProjectController@edit')->name('edit');
        Route::post('/project/update/{id}', 'Front\ProjectController@update')->name('update');
        Route::post('/project/updatestatus', 'Front\ProjectController@updateStatus')->name('updateStatus');
        Route::post('/project/updateCommercial', 'Front\ProjectController@updateCommercial')->name('updateCommercial');
        Route::get('/project/invoice/{id}', 'Front\ProjectController@invoice')->name('invoice.detail');
            Route::name('note.')->group(function () {
            Route::get('/project/note/{slug}', 'Front\ProjectNoteController@index')->name('index');
            Route::post('/project/note/store', 'Front\ProjectNoteController@store')->name('store');
            Route::get('/project/note/delete/{id}', 'Front\ProjectNoteController@delete')->name('delete');
            Route::post('/project/note/update/{id}', 'Front\ProjectNoteController@update')->name('update');
            
            });
            Route::name('file.')->group(function () {
            Route::get('/project/file/{slug}', 'Front\ProjectFileController@index')->name('index');
            Route::post('/project/file/store', 'Front\ProjectFileController@store')->name('store');
            Route::get('/project/file/delete/{id}', 'Front\ProjectFileController@delete')->name('delete');
            
            });
            Route::name('comment.')->group(function () {
            Route::get('/project/comment/{slug}', 'Front\ProjectCommentController@index')->name('index');
            Route::post('/project/comment/store', 'Front\ProjectCommentController@store')->name('store');
            
            });
            Route::name('feedback.')->group(function () {
            Route::get('/project/feedback/{slug}', 'Front\ProjectFeedbackController@index')->name('index');
            Route::post('/project/feedback/store', 'Front\ProjectFeedbackController@store')->name('store');
           
            
            });
        });

        // project task
        // project task
        Route::name('project.task.')->group(function () {
            Route::get('/task', 'Front\ProjectTaskController@index')->name('index');
            Route::get('/project/{projectId}/task/create', 'Front\ProjectTaskController@create')->name('create');
            Route::get('/project/{projectId}/task/kanban-board', 'Front\ProjectTaskController@kanbanBoard')->name('kanban-board-task');
            Route::post('/project/task/store', 'Front\ProjectTaskController@store')->name('store');
            Route::post('/project/task/save', 'Front\ProjectTaskController@save')->name('save');
            Route::get('/project/task/{slug}', 'Front\ProjectTaskController@detail')->name('detail');
            Route::get('/kanban-board-task-all', 'Front\ProjectTaskController@kanbanBoardTaskAll')->name('kanban-board-task-all');
            Route::get('/project/task/delete/{id}', 'Front\ProjectTaskController@delete')->name('delete');
            Route::get('/project/task/edit/{id}', 'Front\ProjectTaskController@edit')->name('edit');
            Route::post('/project/task/update/{id}', 'Front\ProjectTaskController@update')->name('update');
            Route::post('/project/task/updatestatus', 'Front\ProjectTaskController@updateStatus')->name('updateStatus');
            Route::post('/project/task/updateCommercial', 'Front\ProjectTaskController@updateCommercial')->name('updateCommercial');
            Route::post('/project/task/comment/update/{id}', 'Front\ProjectTaskController@updateComment')->name('comment.update');
            Route::get('/project/task/invoice/{id}', 'Front\ProjectTaskController@invoice')->name('invoice.detail');
            Route::get('/task-create', 'Front\ProjectTaskController@taskCreate')->name('task-create');
        });
        //content exchange
        Route::name('advertisement.')->group(function () {
            Route::get('/advertisement', 'Front\ContentExchangeArticleController@index')->name('index');
            Route::get('/advertisement/show', 'Front\ContentExchangeArticleController@show')->name('show');
            Route::get('/advertisement/create', 'Front\ContentExchangeArticleController@create')->name('create');
            Route::post('/advertisement/store', 'Front\ContentExchangeArticleController@store')->name('store');
            Route::get('/advertisement/{slug}', 'Front\ContentExchangeArticleController@detail')->name('detail');
            Route::get('/advertisement/{slug}', 'Front\ContentExchangeArticleController@detailPage')->name('detailPage');
            Route::get('/advertisement/delete/{id}', 'Front\ContentExchangeArticleController@delete')->name('delete');
            Route::get('/advertisement/edit/{id}', 'Front\ContentExchangeArticleController@edit')->name('edit');
            Route::post('/advertisement/update/{id}', 'Front\ContentExchangeArticleController@update')->name('update');
            Route::post('/advertisement/updatestatus', 'Front\ContentExchangeArticleController@updateStatus')->name('updateStatus');
            Route::post('/advertisement/updateCommercial', 'Front\ContentExchangeArticleController@updateCommercial')->name('updateCommercial');
            Route::post('/advertisement/proposal/store', 'Front\ContentExchangeArticleController@proposalStore')->name('proposal.store');
            Route::get('/advertisement/proposal/show/{id}', 'Front\ContentExchangeArticleController@proposalshow')->name('proposal.show');
            Route::post('/advertisement/proposal/updatestatus', 'Front\ContentExchangeArticleController@proposalupdateStatus')->name('proposal.updateStatus');
            Route::get('/advertisement/proposal/details/{id}', 'Front\ContentExchangeArticleController@proposaldetails')->name('proposal.details');
            Route::get('/advertisement/proposal/approval/show', 'Front\ContentExchangeArticleController@proposalapprovalShow')->name('proposal.approval.show');
            Route::post('/advertisement/proposal/project/store', 'Front\ContentExchangeArticleController@projectStore')->name('proposal.project.store');
               Route::post('/advertisement/proposal/channel/store', 'Front\ContentExchangeArticleController@channelStore')->name('proposal.channel.store');
            Route::post('/advertisement/proposal/message/store', 'Front\ContentExchangeArticleController@messageStore')->name('proposal.message.store');

            Route::post('/advertisement/proposal/channel/store/publisher', 'Front\ContentExchangeArticleController@channelStorePublisher')->name('proposal.channel.store.publisher');
        });
    });

    // cart
    Route::get('/cart', 'Front\CartController@index')->name('cart');
    Route::post('/cart', 'Front\CartController@add')->name('cart.add');
    Route::get('/cart/remove/{id}', 'Front\CartController@delete')->name('cart.delete');
    Route::get('/checkout', 'Front\CheckoutController@index')->name('checkout.index');
    Route::post('/store', 'Front\CheckoutController@store')->name('checkout.store');
    Route::view('/complete', 'front.checkout.complete')->name('checkout.complete');

    //footer
    Route::get('/privacy-policy', 'Front\FrontController@privacy')->name('privacy');
    Route::get('/terms-condition', 'Front\FrontController@terms')->name('terms');

    //market
    Route::name('market.')->group(function () {
        Route::get('/market', 'Front\MarketController@index')->name('index');
        Route::get('/market/{marketTypeSlug}', 'Front\MarketController@detail')->name('detail');
    });
    //feature
    Route::name('feature.')->group(function () {
        Route::get('/tool', 'Front\FeatureController@index')->name('index');
        Route::get('/tool/{slug}', 'Front\FeatureController@detail')->name('details');
    });

    //price
    Route::name('price.')->group(function () {
        Route::get('/pricing', 'Front\PriceController@index')->name('index');
    });

    //support
    Route::name('support.')->group(function () {
        Route::get('/support', 'Front\SupportController@index')->name('index');
    });

    //marketplace
    Route::name('marketplace.')->group(function () {
        Route::get('/marketplace', 'Front\MarketPlaceController@index')->name('index');
    });
    
     //blogger
    Route::name('user_blogger.')->group(function () {
        Route::get('/blogger', 'Front\BloggerController@show')->name('show');
        Route::get('/blogger/details/{id}','Front\BloggerController@bloggerdetails')->name('detail');
        Route::get('blogger/download-csv/{id}','Front\BloggerController@downloadCsv')->name('download.csv');
    });

    // portfolio in front
    Route::get('/portfolio/{slug}', 'Front\PortfolioController@index')->name('portfolio.index');

    Route::middleware([RedirectToUSerLoginIfNotAuthenticated::class])->group(function () {
        // User Logout
        Route::get('logout', 'Front\AuthController@logout')->name('user.logout');
        Route::name('profile.')->group(function () {
            Route::post('/profile/update', 'Front\PortfolioController@update')->name('update');
        });
        // portfolio in user management
        Route::prefix('user')->name('user.portfolio.')->group(function () {
            Route::get('portfolio/basic-details', 'Front\PortfolioController@edit')->name('index');
            Route::get('change/password', 'Front\PortfolioController@changePassword')->name('changePassword');
            Route::post('update/password', 'Front\PortfolioController@updatePassword')->name('updatePassword');
            Route::get('portfolio/basic-details/create', 'Front\Portfolio\ProfileController@create')->name('edit');
        });

        // User purchased course
        Route::prefix('user')->name('user.courses.')->group(function () {
            Route::get('/my-courses','Front\UserCourseController@index')->name('index');
            Route::get('/my-courses/{slug}','Front\UserCourseController@details')->name('details');
            Route::post('/my-courses/topic/savetopicAndSetCounter','Front\UserCourseController@savetopicAndSetCounter')->name('savetopicAndSetCounter');
            Route::post('/my-courses/topic/loadIndividualTopic','Front\UserCourseController@loadIndividualTopic')->name('loadIndividualTopic');
            Route::get('/my-courses/{slug}/{Lessonslug}/{Topicslug}','Front\UserCourseController@topicDetails')->name('topic');
            Route::post('/my-courses/rating/store','Front\UserCourseController@store')->name('rating.store');
        });

        //user events
        Route::prefix('user')->name('user.events')->group(function () {
            Route::get('/my-events','Front\EventController@showMyEvents');
        });

        //user orders
        Route::prefix('user')->name('user.orders')->group(function () {
            Route::get('/my-orders','Front\OrderController@index');
        });

        Route::get('user/cancel/subscription','Front\PortfolioController@cancelSubscription')->name('user.cancel.subscription');

        Route::prefix('user')->name('user.profile.edit')->group(function () {
            Route::get('/update/profile','Front\Portfolio\ProfileController@editProfile');
        });
        Route::prefix('user/pitch/blog/category')->name('user.pitch.blog.category.')->group(function(){
            Route::get('', 'Front\PitchBlogCategoryController@index')->name('index');
            Route::get('/create', 'Front\PitchBlogCategoryController@create')->name('create');
            Route::post('/store', 'Front\PitchBlogCategoryController@store')->name('store');
            Route::get('/edit/{id}', 'Front\PitchBlogCategoryController@edit')->name('edit');
            Route::post('/update', 'Front\PitchBlogCategoryController@update')->name('update');
            Route::get('/delete/{id}', 'Front\PitchBlogCategoryController@delete')->name('delete');
            Route::get('/detail/{id}', 'Front\PitchBlogCategoryController@detail')->name('detail');
        });
        Route::prefix('user/pitch/blog')->name('user.pitch.blog.')->group(function(){
            Route::get('', 'Front\PitchBlogController@index')->name('index');
            Route::get('/create', 'Front\PitchBlogController@create')->name('create');
            Route::post('/store', 'Front\PitchBlogController@store')->name('store');
            Route::get('/edit/{id}', 'Front\PitchBlogController@edit')->name('edit');
            Route::post('/update', 'Front\PitchBlogController@update')->name('update');
            Route::get('/delete/{id}', 'Front\PitchBlogController@delete')->name('delete');
            Route::get('/detail/{slug}', 'Front\PitchBlogController@detail')->name('detail');
            Route::post('/updatestatus', 'Front\PitchBlogController@updateStatus')->name('updateStatus');
        });
            Route::prefix('user/pitch/blogger')->name('user.pitch.blogger.')->group(function(){
            Route::get('/index', 'Front\BloggerController@index')->name('index');
            Route::get('/create', 'Front\BloggerController@create')->name('create');
            Route::post('/store', 'Front\BloggerController@store')->name('store');
            Route::get('/edit/{id}', 'Front\BloggerController@edit')->name('edit');
            Route::put('/update/{id}', 'Front\BloggerController@update')->name('update');
            Route::get('/delete/{id}', 'Front\BloggerController@delete')->name('delete');
            Route::get('/detail/{id}', 'Front\BloggerController@detail')->name('detail');
            Route::get('/download-csv','Front\BloggerController@downloadCsv')->name('download.csv');

        });

        Route::name('client.')->group(function () {
            Route::get('/client', 'Front\ClientController@index')->name('index');
            Route::get('/client/add', 'Front\ClientController@create')->name('create');
            Route::post('/client/store', 'Front\ClientController@store')->name('store');
            Route::get('/client/edit/{id}', 'Front\ClientController@edit')->name('edit');
            Route::post('/client/update', 'Front\ClientController@update')->name('update');
            Route::get('/client/delete/{id}', 'Front\ClientController@delete')->name('delete');
            Route::get('/client/detail/{id}', 'Front\ClientController@detail')->name('detail');
            Route::post('/client/group/store', 'Front\ClientController@group')->name('group.store');
        });

        Route::prefix('user')->name('portfolio.')->group(function () {
            Route::name('profile.')->group(function () {
                Route::post('/basic-detail/update', 'Front\Portfolio\ProfileController@update')->name('update');
            });

            Route::name('expertise.')->group(function () {
                Route::get('/portfolio/specialities', 'Front\Portfolio\ExpertiseController@index')->name('index');
                Route::get('/portfolio/specialities/create', 'Front\Portfolio\ExpertiseController@create')->name('create');
                Route::post('/portfolio/specialities/store', 'Front\Portfolio\ExpertiseController@store')->name('store');
                Route::get('/portfolio/specialities/edit/{id}', 'Front\Portfolio\ExpertiseController@edit')->name('edit');
                Route::post('/portfolio/specialities/update', 'Front\Portfolio\ExpertiseController@update')->name('update');
                Route::get('/portfolio/specialities/delete/{id}', 'Front\Portfolio\ExpertiseController@delete')->name('delete');
            });

            Route::name('education.')->group(function () {
                Route::get('/portfolio/education', 'Front\Portfolio\EducationController@index')->name('index');
                Route::get('/portfolio/education/create', 'Front\Portfolio\EducationController@create')->name('create');
                Route::post('/portfolio/education/store', 'Front\Portfolio\EducationController@store')->name('store');
                Route::get('/portfolio/education/edit/{id}', 'Front\Portfolio\EducationController@edit')->name('edit');
                Route::post('/portfolio/education/update', 'Front\Portfolio\EducationController@update')->name('update');
                Route::get('/portfolio/education/delete/{id}', 'Front\Portfolio\EducationController@delete')->name('delete');
            });

            Route::name('work-experience.')->group(function () {
                Route::get('/portfolio/employment', 'Front\Portfolio\ExperienceController@index')->name('index');
                Route::get('/portfolio/employment/create', 'Front\Portfolio\ExperienceController@create')->name('create');
                Route::post('/portfolio/employment/store', 'Front\Portfolio\ExperienceController@store')->name('store');
                Route::get('/portfolio/employment/edit/{id}', 'Front\Portfolio\ExperienceController@edit')->name('edit');
                Route::post('/portfolio/employment/update', 'Front\Portfolio\ExperienceController@update')->name('update');
                Route::get('/portfolio/employment/delete/{id}', 'Front\Portfolio\ExperienceController@delete')->name('delete');
            });

            Route::name('work-category.')->group(function () {
                Route::get('/portfolio/work-category', 'Front\Portfolio\WorkCategoryController@index')->name('index');
                Route::get('/portfolio/work-category/create', 'Front\Portfolio\WorkCategoryController@create')->name('create');
                Route::post('/portfolio/work-category/store', 'Front\Portfolio\WorkCategoryController@store')->name('store');
                Route::get('/portfolio/work-category/edit/{id}', 'Front\Portfolio\WorkCategoryController@edit')->name('edit');
                Route::post('/portfolio/work-category/update', 'Front\Portfolio\WorkCategoryController@update')->name('update');
                Route::get('/portfolio/work-category/delete/{id}',    'Front\Portfolio\WorkCategoryController@delete')->name('delete');
            });

            Route::name('category.')->group(function () {
                Route::get('/portfolio/category', 'Front\Portfolio\CategoryController@index')->name('index');
                Route::get('/portfolio/category/create', 'Front\Portfolio\CategoryController@create')->name('create');
                Route::post('/portfolio/category/store', 'Front\Portfolio\CategoryController@store')->name('store');
                Route::get('/portfolio/category/edit/{id}', 'Front\Portfolio\CategoryController@edit')->name('edit');
                Route::post('/portfolio/category/update', 'Front\Portfolio\CategoryController@update')->name('update');
                Route::get('/portfolio/category/delete/{id}', 'Front\Portfolio\CategoryController@delete')->name('delete');
            });

            Route::name('portfolio.')->group(function () {
                Route::get('/portfolio', 'Front\Portfolio\PortfolioController@index')->name('index');
                Route::get('/portfolio/create', 'Front\Portfolio\PortfolioController@create')->name('create');
                Route::post('/portfolio/store', 'Front\Portfolio\PortfolioController@store')->name('store');
                Route::get('/portfolio/edit/{id}', 'Front\Portfolio\PortfolioController@edit')->name('edit');
                Route::post('/portfolio/update', 'Front\Portfolio\PortfolioController@update')->name('update');
                Route::get('/portfolio/delete/{id}', 'Front\Portfolio\PortfolioController@delete')->name('delete');
            });
            
            Route::name('private-articles.')->group(function () {
                Route::get('/private-articles', 'Front\Portfolio\PrivatePortfolioController@index')->name('index');
                Route::get('/private-articles/create', 'Front\Portfolio\PrivatePortfolioController@create')->name('create');
                Route::post('/private-articles/store', 'Front\Portfolio\PrivatePortfolioController@store')->name('store');
                Route::get('/private-articles/edit/{id}', 'Front\Portfolio\PrivatePortfolioController@edit')->name('edit');
                Route::post('/private-articles/update', 'Front\Portfolio\PrivatePortfolioController@update')->name('update');
                Route::get('/private-articles/delete/{id}', 'Front\Portfolio\PrivatePortfolioController@delete')->name('delete');
                Route::get('/private-articles/detail/{slug}', 'Front\Portfolio\PrivatePortfolioController@detail')->name('detail');
                Route::post('/private-articles/request', 'Front\Portfolio\PrivatePortfolioController@request')->name('request');
                Route::get('/private-articles/request-list', 'Front\Portfolio\PrivatePortfolioController@requestList')->name('request-list');
                Route::post('/private-articles/updatestatus', 'Front\Portfolio\PrivatePortfolioController@updateStatus')->name('updateStatus');
            });

            Route::name('client.')->group(function () {
                Route::get('/portfolio/client', 'Front\Portfolio\ClientController@index')->name('index');
                Route::get('/portfolio/client/add', 'Front\Portfolio\ClientController@create')->name('create');
                Route::post('/portfolio/client/store', 'Front\Portfolio\ClientController@store')->name('store');
                Route::get('/portfolio/client/edit/{id}', 'Front\Portfolio\ClientController@edit')->name('edit');
                Route::post('/portfolio/client/update', 'Front\Portfolio\ClientController@update')->name('update');
                Route::get('/portfolio/client/delete/{id}', 'Front\Portfolio\ClientController@delete')->name('delete');
                Route::post('/portfolio/client/group/store', 'Front\Portfolio\ClientController@group')->name('group.store');
            });

            Route::name('certification.')->group(function () {
                Route::get('/portfolio/certification', 'Front\Portfolio\CertificateController@index')->name('index');
                Route::get('/portfolio/certification/create', 'Front\Portfolio\CertificateController@create')->name('create');
                Route::post('/portfolio/certification/store', 'Front\Portfolio\CertificateController@store')->name('store');
                Route::get('/portfolio/certification/edit/{id}', 'Front\Portfolio\CertificateController@edit')->name('edit');
                Route::post('/portfolio/certification/update', 'Front\Portfolio\CertificateController@update')->name('update');
                Route::get('/portfolio/certification/delete/{id}', 'Front\Portfolio\CertificateController@delete')->name('delete');
            });

            Route::name('testimonial.')->group(function () {
                Route::get('/portfolio/testimonial', 'Front\Portfolio\TestimonialController@index')->name('index');
                Route::get('/portfolio/testimonial/create', 'Front\Portfolio\TestimonialController@create')->name('create');
                Route::post('/portfolio/testimonial/store', 'Front\Portfolio\TestimonialController@store')->name('store');
                Route::get('/portfolio/testimonial/edit/{id}', 'Front\Portfolio\TestimonialController@edit')->name('edit');
                Route::post('/portfolio/testimonial/update', 'Front\Portfolio\TestimonialController@update')->name('update');
                Route::get('/portfolio/testimonial/delete/{id}', 'Front\Portfolio\TestimonialController@delete')->name('delete');
            });
            Route::name('feedback.')->group(function () {
                Route::get('/portfolio/feedback', 'Front\Portfolio\FeedbackController@index')->name('index');
                Route::get('/portfolio/feedback/create', 'Front\Portfolio\FeedbackController@create')->name('create');
                Route::post('/portfolio/feedback/store', 'Front\Portfolio\FeedbackController@store')->name('store');
                Route::get('/portfolio/feedback/edit/{id}', 'Front\Portfolio\FeedbackController@edit')->name('edit');
                Route::post('/portfolio/feedback/update', 'Front\Portfolio\FeedbackController@update')->name('update');
                Route::get('/portfolio/feedback/delete/{id}', 'Front\Portfolio\FeedbackController@delete')->name('delete');
            });

            

        });
    });
});


Route::get('/title-generator', function () {
    return view('front.title-generator.title-generator');
})->name('title-generator');
