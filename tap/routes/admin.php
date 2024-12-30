<?php

use App\Http\Controllers\Admin\EventPageController;
use App\Http\Controllers\Admin\PlansPriceCategoryController;
use App\Http\Controllers\Admin\PlansPriceController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ForgotPasswordController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\Admin\RegisterController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\InvitationController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\UserManagementController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\GlossaryTypeController;
use App\Http\Controllers\Admin\GlossaryController;
use App\Http\Controllers\Admin\ArticleCategoryManagementController;
use App\Http\Controllers\Admin\ArticleSubCategoryManagementController;
use App\Http\Controllers\Admin\ArticleTertiaryCategoryController;
use App\Http\Controllers\Admin\BlogPageController;
use App\Http\Controllers\Admin\EventTypeController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\CourseCategoryController;
use App\Http\Controllers\Admin\DealsController;
use App\Http\Controllers\Admin\DealsCategoryController;
use App\Http\Controllers\Admin\DealPageController;
use App\Http\Controllers\Admin\LessonController;
use App\Http\Controllers\Admin\TopicController;
use App\Http\Controllers\Admin\QuizController;
use App\Http\Controllers\Admin\CourseModuleController;
use App\Http\Controllers\Admin\CourseTopicController;
use App\Http\Controllers\Admin\CourseSlideController;
use App\Http\Controllers\Admin\CourseQuizController;
use App\Http\Controllers\Admin\CourseTestimonialController;
use App\Http\Controllers\Admin\MarketController;
use App\Http\Controllers\Admin\MarketTypeController;
use App\Http\Controllers\Admin\MarketCategoryController;
use App\Http\Controllers\Admin\MarketBannerController;
use App\Http\Controllers\Admin\MarketFaqController;
use App\Http\Controllers\Admin\MarketPlacePageController;
use App\Http\Controllers\Admin\MarketPlaceFaqController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\SupportWidgetController;
use App\Http\Controllers\Admin\SupportFaqCategoryController;
use App\Http\Controllers\Admin\SupportFaqController;
use App\Http\Controllers\Admin\JobCategoryController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\JobEmploymentTypeController;
use App\Http\Controllers\Admin\TemplateCategoryController;
use App\Http\Controllers\Admin\TemplateSubCategoryController;
use App\Http\Controllers\Admin\TemplateTypeController;
use App\Http\Controllers\Admin\TemplateController;
use App\Http\Controllers\Admin\HomePageController;
use App\Http\Controllers\Admin\SocialMediaController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\ToolsController;
use App\Http\Controllers\Admin\ToolsInterestCategoryController;
use App\Http\Controllers\Admin\ToolSubCategoryController;
use App\Http\Controllers\Admin\ToolsInterestController;
use App\Http\Controllers\Admin\PlansPricePageController;
use App\Http\Controllers\Admin\PlansFaqController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\CourseManagementController;
use App\Http\Controllers\Admin\ShortCourseController;
use App\Http\Controllers\Admin\FeatureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    //admin password reset routes
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset']);
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register')->middleware('hasInvitation');
    Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::post('/changepassword', [ProfileController::class, 'changePassword'])->name('profile.changepassword');

        Route::get('/invite_list', [InvitationController::class, 'index'])->name('invite');
        Route::get('/invitation', [InvitationController::class, 'create'])->name('invite.create');
        Route::post('/invitation', [InvitationController::class, 'store'])->name('invitation.store');

        Route::get('/adminuser', [AdminUserController::class, 'index'])->name('adminuser');
        Route::post('/adminuser', [AdminUserController::class, 'updateAdminUser'])->name('adminuser.update');

        Route::get('/settings', [SettingController::class, 'index'])->name('settings');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
        

        /** user management **/
        Route::group(['prefix' => 'users'], function () {
            Route::get('/', [UserManagementController::class, 'index'])->name('users.index');
            Route::post('/', [UserManagementController::class, 'updateUser'])->name('users.post');
            Route::get('/{id}/delete', [UserManagementController::class, 'delete'])->name('users.delete');
            Route::get('/{id}/view', [UserManagementController::class, 'viewDetail'])->name('users.detail');
            Route::post('updateStatus', [UserManagementController::class, 'updateStatus'])->name('users.updateStatus');
            Route::get('/{id}/details', [UserManagementController::class, 'details'])->name('users.details');
        });
        
        //**  article management  **/
        Route::group(['prefix'  =>   'blog/management'], function () {
            Route::get('/', [BlogController::class, 'index'])->name('article.index');
            Route::get('/create', [BlogController::class, 'create'])->name('article.create');
            Route::post('/store', [BlogController::class, 'store'])->name('article.store');
            Route::get('/{id}/edit', [BlogController::class, 'edit'])->name('article.edit');
            Route::post('/update', [BlogController::class, 'update'])->name('article.update');
            Route::get('/{id}/delete', [BlogController::class, 'delete'])->name('article.delete');
            Route::post('updateStatus', [BlogController::class, 'updateStatus'])->name('article.updateStatus');
            Route::post('article/updateStatus', [BlogController::class, 'blogupdateStatus'])->name('articleStatus.updateStatus');
            Route::get('/{id}/details', [BlogController::class, 'details'])->name('article.details');
            Route::post('/csv-store', [BlogController::class, 'csvStore'])->name('article.data.csv.store');
            Route::get('/export', [BlogController::class, 'export'])->name('article.data.csv.export');
            Route::get('/content/create', [BlogController::class, 'contentCreate'])->name('article.content.create');
            Route::post('/content/store', [BlogController::class, 'contentStore'])->name('article.content.store');
            Route::get('/content/{id}/edit', [BlogController::class, 'contentEdit'])->name('article.content.edit');
            Route::post('/content/update', [BlogController::class, 'contentUpdate'])->name('article.content.update');
            Route::get('/content/{id}/details', [BlogController::class, 'contentDetails'])->name('article.content.details');
            Route::get('/content/{id}/delete', [BlogController::class, 'contentDelete'])->name('article.content.delete');
            Route::get('/search', [BlogController::class, 'search'])->name('article.search');
            Route::get('/article/tool/toggle', [BlogController::class, 'articleToggle'])->name('article.tool.toggle');
            Route::get('/article/tool/fetch', [BlogController::class, 'articleFetch'])->name('article.tool.fetch');
        });

        //FAQ Management
        Route::group(['prefix' => 'faq'], function () {
            Route::get('/', [FaqController::class, 'index'])->name('faq.index');
            Route::get('/create', [FaqController::class, 'create'])->name('faq.create');
            Route::post('/store', [FaqController::class, 'store'])->name('faq.store');
            Route::get('/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
            Route::post('/update', [FaqController::class, 'update'])->name('faq.update');
            Route::get('/{id}/delete', [FaqController::class, 'delete'])->name('faq.delete');
            Route::post('updateStatus', [FaqController::class, 'updateStatus'])->name('faq.updateStatus');
            Route::get('/{id}/details', [FaqController::class, 'details'])->name('faq.details');
            
        });

        Route::group(['prefix' => 'glossarytype'], function () {
            Route::get('/', [GlossaryTypeController::class, 'index'])->name('glossarytype.index');
            Route::get('/create', [GlossaryTypeController::class, 'create'])->name('glossarytype.create');
            Route::post('/store', [GlossaryTypeController::class, 'store'])->name('glossarytype.store');
            Route::get('/{id}/edit', [GlossaryTypeController::class, 'edit'])->name('glossarytype.edit');
            Route::post('/update', [GlossaryTypeController::class, 'update'])->name('glossarytype.update');
            Route::get('/{id}/delete', [GlossaryTypeController::class, 'delete'])->name('glossarytype.delete');
            Route::post('updateStatus', [GlossaryTypeController::class, 'updateStatus'])->name('glossarytype.updateStatus');
        });

        Route::group(['prefix' => 'glossary'], function () {
            Route::get('/', [GlossaryController::class, 'index'])->name('glossary.index');
            Route::get('/create', [GlossaryController::class, 'create'])->name('glossary.create');
            Route::post('/store', [GlossaryController::class, 'store'])->name('glossary.store');
            Route::get('/{id}/edit', [GlossaryController::class, 'edit'])->name('glossary.edit');
            Route::post('/update', [GlossaryController::class, 'update'])->name('glossary.update');
            Route::get('/{id}/delete', [GlossaryController::class, 'delete'])->name('glossary.delete');
            Route::post('updateStatus', [GlossaryController::class, 'updateStatus'])->name('glossary.updateStatus');
            Route::get('/{id}/details', [GlossaryController::class, 'details'])->name('glossary.details');
            
        });

        //** Category management **/
        Route::group(['prefix' => 'blog/category'], function () {
            Route::get('/', [ArticleCategoryManagementController::class, 'index'])->name('article-category.index');
            Route::get('/create', [ArticleCategoryManagementController::class, 'create'])->name('article-category.create');
            Route::post('/store', [ArticleCategoryManagementController::class, 'store'])->name('article-category.store');
            Route::get('/{id}/edit', [ArticleCategoryManagementController::class, 'edit'])->name('article-category.edit');
            Route::post('/update', [ArticleCategoryManagementController::class, 'update'])->name('article-category.update');
            Route::get('/{id}/delete', [ArticleCategoryManagementController::class, 'delete'])->name('article-category.delete');
            Route::post('updateStatus', [ArticleCategoryManagementController::class, 'updateStatus'])->name('article-category.updateStatus');
            Route::get('/{id}/details', [ArticleCategoryManagementController::class, 'details'])->name('article-category.details');
            Route::post('/csv-store', [ArticleCategoryManagementController::class, 'csvStore'])->name('article-category.data.csv.store');
            Route::get('/export', [ArticleCategoryManagementController::class, 'export'])->name('article-category.data.csv.export');
        });

        //** Sub category management **/
        Route::group(['prefix' => 'blog/subcategory'], function () {
            Route::get('/', [ArticleSubCategoryManagementController::class, 'index'])->name('article-subcategory.index');
            Route::get('/create', [ArticleSubCategoryManagementController::class, 'create'])->name('article-subcategory.create');
            Route::post('/store', [ArticleSubCategoryManagementController::class, 'store'])->name('article-subcategory.store');
            Route::get('/{id}/edit', [ArticleSubCategoryManagementController::class, 'edit'])->name('article-subcategory.edit');
            Route::post('/update', [ArticleSubCategoryManagementController::class, 'update'])->name('article-subcategory.update');
            Route::get('/{id}/delete', [ArticleSubCategoryManagementController::class, 'delete'])->name('article-subcategory.delete');
            Route::post('updateStatus', [ArticleSubCategoryManagementController::class, 'updateStatus'])->name('article-subcategory.updateStatus');
            Route::get('/{id}/details', [ArticleSubCategoryManagementController::class, 'details'])->name('article-subcategory.details');
            Route::post('/csv-store', [ArticleSubCategoryManagementController::class, 'csvStore'])->name('article-subcategory.data.csv.store');
            Route::get('/export', [ArticleSubCategoryManagementController::class, 'export'])->name('article-subcategory.data.csv.export');
        });

        //** article  Tertiary Category management  **/
        Route::group(['prefix' => 'tertiary'], function () {
            Route::get('/', [ArticleTertiaryCategoryController::class, 'index'])->name('article-tertiary.index');
            Route::get('/create', [ArticleTertiaryCategoryController::class, 'create'])->name('article-tertiary.create');
            Route::post('/store', [ArticleTertiaryCategoryController::class, 'store'])->name('article-tertiary.store');
            Route::get('/{id}/edit', [ArticleTertiaryCategoryController::class, 'edit'])->name('article-tertiary.edit');
            Route::post('/update', [ArticleTertiaryCategoryController::class, 'update'])->name('article-tertiary.update');
            Route::get('/{id}/delete', [ArticleTertiaryCategoryController::class, 'delete'])->name('article-tertiary.delete');
            Route::post('updateStatus', [ArticleTertiaryCategoryController::class, 'updateStatus'])->name('article-tertiary.updateStatus');
            Route::get('/{id}/details', [ArticleTertiaryCategoryController::class, 'details'])->name('article-tertiary.details');
            Route::post('/csv-store', [ArticleTertiaryCategoryController::class, 'csvStore'])->name('article-tertiary.data.csv.store');
            Route::get('/export', [ArticleTertiaryCategoryController::class, 'export'])->name('article-tertiary.data.csv.export');
        });

        //** Blog/Article frontend page master  **/
        Route::group(['prefix' => 'blog/page'], function () {
            Route::get('/', [BlogPageController::class, 'index'])->name('article.page.index');
            Route::get('/create', [BlogPageController::class, 'create'])->name('article.page.create');
            Route::post('/store', [BlogPageController::class, 'store'])->name('article.page.store');
            Route::get('/{id}/edit', [BlogPageController::class, 'edit'])->name('article.page.edit');
            Route::post('/update', [BlogPageController::class, 'update'])->name('article.page.update');
            Route::get('/{id}/details', [BlogPageController::class, 'details'])->name('article.page.details');
        });


        //**  event type  **//
        Route::group(['prefix' => 'event/category'], function () {
            Route::get('/', [EventTypeController::class, 'index'])->name('event-category.index');
            Route::get('/create', [EventTypeController::class, 'create'])->name('event-category.create');
            Route::post('/store', [EventTypeController::class, 'store'])->name('event-category.store');
            Route::get('/{id}/edit', [EventTypeController::class, 'edit'])->name('event-category.edit');
            Route::post('/update', [EventTypeController::class, 'update'])->name('event-category.update');
            Route::get('/{id}/delete', [EventTypeController::class, 'delete'])->name('event-category.delete');
            Route::post('updateStatus', [EventTypeController::class, 'updateStatus'])->name('event-category.updateStatus');
            Route::get('/{id}/details', [EventTypeController::class, 'details'])->name('event-category.details');
            Route::post('/csv-store', [EventTypeController::class, 'csvStore'])->name('event-category.data.csv.store');
            Route::get('/export', [EventTypeController::class, 'export'])->name('event-category.data.csv.export');
        });

        //**  event management  **//
        Route::group(['prefix'  =>   'event'], function () {
            Route::get('/', [EventController::class, 'index'])->name('event.index');
            Route::get('/create', [EventController::class, 'create'])->name('event.create');
            Route::post('/store', [EventController::class, 'store'])->name('event.store');
            Route::get('/{id}/edit', [EventController::class, 'edit'])->name('event.edit');
            Route::post('/update', [EventController::class, 'update'])->name('event.update');
            Route::get('/{id}/delete', [EventController::class, 'delete'])->name('event.delete');
            Route::post('updateStatus', [EventController::class, 'updateStatus'])->name('event.updateStatus');
            Route::post('updateSubscriptionStatus', [EventController::class, 'updateSubscriptionStatus'])->name('event.updateSubscriptionStatus');
            Route::get('/{id}/details', [EventController::class, 'details'])->name('event.details');
            Route::post('/csv-store', [EventController::class, 'csvStore'])->name('event.data.csv.store');
            Route::get('/export', [EventController::class, 'export'])->name('event.data.csv.export');
        });
        
        //** Deals frontend page master  **/
        Route::group(['prefix' => 'events/page'], function () {
            Route::get('/', [EventPageController::class, 'index'])->name('events.page.index');
            Route::get('/create',  [EventPageController::class, 'create'])->name('events.page.create');
            Route::post('/store',  [EventPageController::class, 'store'])->name('events.page.store');
            Route::get('/{id}/edit',  [EventPageController::class, 'edit'])->name('events.page.edit');
            Route::post('/update',  [EventPageController::class, 'update'])->name('events.page.update');
            Route::get('/{id}/details',  [EventPageController::class, 'details'])->name('events.page.details');
        });

        // ** Order Management routes */
        Route::group(['prefix'  =>   'orders'], function () {
            Route::get('/', [OrderController::class, 'index'])->name('order.index');
            // Route::get('/create', [OrderController::class, 'create'])->name('order.create');
            // Route::post('/store', [OrderController::class, 'store'])->name('order.store');
            // Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('order.edit');
            // Route::post('/update', [OrderController::class, 'update'])->name('order.update');
            // Route::get('/{id}/delete', [OrderController::class, 'delete'])->name('order.delete');
            Route::post('updateStatus', [OrderController::class, 'updateStatus'])->name('order.updateStatus');
            Route::get('/{id}/details', [OrderController::class, 'details'])->name('order.details');
            // Route::post('/csv-store', [OrderController::class, 'csvStore'])->name('order.data.csv.store');
            // Route::get('/export', [OrderController::class, 'export'])->name('order.data.csv.export');
        });

        //** course category management   **/
        Route::group(['prefix' => 'course/category'], function () {
            Route::get('/', [CourseCategoryController::class, 'index'])->name('course-category.index');
            Route::get('/create', [CourseCategoryController::class, 'create'])->name('course-category.create');
            Route::post('/store', [CourseCategoryController::class, 'store'])->name('course-category.store');
            Route::get('/{id}/edit', [CourseCategoryController::class, 'edit'])->name('course-category.edit');
            Route::post('/update', [CourseCategoryController::class, 'update'])->name('course-category.update');
            Route::get('/{id}/delete', [CourseCategoryController::class, 'delete'])->name('course-category.delete');
            Route::post('updateStatus', [CourseCategoryController::class, 'updateStatus'])->name('course-category.updateStatus');
            Route::get('/{id}/details', [CourseCategoryController::class, 'details'])->name('course-category.details');
            Route::post('/csv-store', [CourseCategoryController::class, 'csvStore'])->name('course-category.data.csv.store');
            Route::get('/export', [CourseCategoryController::class, 'export'])->name('course-category.data.csv.export');
        });

        // Admin/deals
        Route::group(['prefix' => 'deals'], function(){
            Route::get('/', [DealsController::class, 'index'])->name('deals.index');
            Route::get('/create', [DealsController::class, 'create'])->name('deals.create');
            Route::post('/store', [DealsController::class, 'store'])->name('deals.store');
            Route::get('/{id}/edit', [DealsController::class, 'edit'])->name('deals.edit');
            Route::post('/update', [DealsController::class, 'update'])->name('deals.update');
            Route::get('/{id}/delete', [DealsController::class, 'delete'])->name('deals.delete');
            Route::post('updateStatus', [DealsController::class, 'updateStatus'])->name('deals.updateStatus');
            Route::post('updateSubscriptionStatus', [DealsController::class, 'updateSubscriptionStatus'])->name('deals.updateSubscriptionStatus');
            Route::get('/{id}/details', [DealsController::class, 'details'])->name('deals.details');
            Route::post('/csv-store', [DealsController::class, 'csvStore'])->name('deals.data.csv.store');
            Route::get('/export', [DealsController::class, ''])->name('deals.data.csv.export');
        });

        // Admin/deals/category
        Route::group(['prefix' => 'deals/category'], function(){
            Route::get('/', [DealsCategoryController::class, 'index'])->name('deals.category.index');
            Route::get('/create', [DealsCategoryController::class, 'create'])->name('deals.category.create');
            Route::post('/store', [DealsCategoryController::class, 'store'])->name('deals.category.store');
            Route::get('/{id}/edit', [DealsCategoryController::class, 'edit'])->name('deals.category.edit');
            Route::post('/update', [DealsCategoryController::class, 'update'])->name('deals.category.update');
            Route::get('/{id}/delete', [DealsCategoryController::class, 'delete'])->name('deals.category.delete');
            Route::post('updateStatus', [DealsCategoryController::class, 'updateStatus'])->name('deals.category.updateStatus');
            Route::get('/{id}/details', [DealsCategoryController::class, 'details'])->name('deals.category.details');
        });

        //** Deals frontend page master  **/
        Route::group(['prefix' => 'deals/page'], function () {
            Route::get('/', [DealPageController::class, 'index'])->name('deals.page.index');
            Route::get('/create', [DealPageController::class, 'create'])->name('deals.page.create');
            Route::post('/store', [DealPageController::class, 'store'])->name('deals.page.store');
            Route::get('/{id}/edit', [DealPageController::class, 'edit'])->name('deals.page.edit');
            Route::post('/update', [DealPageController::class, 'update'])->name('deals.page.update');
            Route::get('/{id}/details', [DealPageController::class, 'details'])->name('deals.page.details');
        });

       
        //** course lesson management **/
        Route::group(['prefix' => 'course/lesson'], function () {
            Route::get('/', [LessonController::class, 'index'])->name('lesson.index');
            Route::get('/create', [LessonController::class, 'create'])->name('lesson.create');
            Route::post('/store', [LessonController::class, 'store'])->name('lesson.store');
            Route::get('/{id}/edit', [LessonController::class, 'edit'])->name('lesson.edit');
            Route::post('/update', [LessonController::class, 'update'])->name('lesson.update');
            Route::post('/update/{id}/topic/', [LessonController::class, 'updateLessonTopic'])->name('lesson.updateLessonTopic');
            Route::get('/delete/lesson/{lid}/topic/{tid}', [LessonController::class, 'deleteLessonTopic'])->name('lesson.deleteLessonTopic');
            Route::get('/{id}/delete', [LessonController::class, 'delete'])->name('lesson.delete');
            Route::post('updateStatus', [LessonController::class, 'updateStatus'])->name('lesson.updateStatus');
            Route::get('/{id}/details', [LessonController::class, 'details'])->name('lesson.details');
            Route::post('/csv-store', [LessonController::class, 'csvStore'])->name('lesson.data.csv.store');
            Route::get('/export', [LessonController::class, 'export'])->name('lesson.data.csv.export');
        });

        //** course topic management **/
        Route::group(['prefix' => 'course/topic'], function () {
            Route::get('/', [TopicController::class, 'index'])->name('topic.index');
            Route::get('/create', [TopicController::class, 'create'])->name('topic.create');
            Route::post('/store', [TopicController::class, 'store'])->name('topic.store');
            Route::get('/{id}/edit', [TopicController::class, 'edit'])->name('topic.edit');
            Route::post('/update', [TopicController::class, 'update'])->name('topic.update');
            Route::get('/{id}/delete', [TopicController::class, 'delete'])->name('topic.delete');
            Route::post('updateStatus', [TopicController::class, 'updateStatus'])->name('topic.updateStatus');
            Route::get('/{id}/details', [TopicController::class, 'details'])->name('topic.details');
            Route::post('/csv-store', [TopicController::class, 'csvStore'])->name('topic.data.csv.store');
            Route::get('/export', [TopicController::class, 'export'])->name('topic.data.csv.export');
        });

        //** course quiz management **/
        Route::group(['prefix' => 'course/quiz'], function () {
            Route::get('/', [QuizController::class, 'index'])->name('quiz.index');
            Route::get('/create', [QuizController::class, 'create'])->name('quiz.create');
            Route::post('/store', [QuizController::class, 'store'])->name('quiz.store');
            Route::get('/{id}/edit', [QuizController::class, 'edit'])->name('quiz.edit');
            Route::post('/update', [QuizController::class, 'update'])->name('quiz.update');
            Route::get('/{id}/delete', [QuizController::class, 'delete'])->name('quiz.delete');
            Route::post('updateStatus', [QuizController::class, 'updateStatus'])->name('quiz.updateStatus');
            Route::get('/{id}/details', [QuizController::class, 'details'])->name('quiz.details');
            Route::post('/csv-store', [QuizController::class, 'csvStore'])->name('quiz.data.csv.store');
            Route::get('/export', [QuizController::class, 'export'])->name('quiz.data.csv.export');
        });

        //**  course module management  **/
        Route::group(['prefix'  =>   'module'], function () {
            Route::get('/{id}', [CourseModuleController::class, 'index'])->name('course.module.index');
            Route::get('/create', [CourseModuleController::class, 'create'])->name('course.module.create');
            Route::post('/store', [CourseModuleController::class, 'store'])->name('course.module.store');
            Route::get('/{id}/edit', [CourseModuleController::class, 'edit'])->name('course.module.edit');
            Route::post('/update', [CourseModuleController::class, 'update'])->name('course.module.update');
            Route::get('/{id}/delete', [CourseModuleController::class, 'delete'])->name('course.module.delete');
            Route::post('updateStatus', [CourseModuleController::class, 'updateStatus'])->name('course.module.updateStatus');
            Route::get('/{id}/details', [CourseModuleController::class, 'details'])->name('course.module.details');
            Route::post('/csv-store', [CourseModuleController::class, 'csvStore'])->name('course.module.data.csv.store');
            Route::get('/export', [CourseModuleController::class, 'export'])->name('course.module.data.csv.export');
        });

        //**  course topics management  **//
        Route::group(['prefix'  =>   'topic'], function () {
            Route::get('/{id}', [CourseTopicController::class, 'index'])->name('course.topic.index');
            Route::get('/create', [CourseTopicController::class, 'create'])->name('course.topic.create');
            Route::post('/store', [CourseTopicController::class, 'store'])->name('course.topic.store');
            Route::get('/{id}/edit', [CourseTopicController::class, 'edit'])->name('course.topic.edit');
            Route::post('/update', [CourseTopicController::class, 'update'])->name('course.topic.update');
            Route::get('/{id}/delete', [CourseTopicController::class, 'delete'])->name('course.topic.delete');
            Route::post('updateStatus', [CourseTopicController::class, 'updateStatus'])->name('course.topic.updateStatus');
            Route::get('/{id}/details', [CourseTopicController::class, 'details'])->name('course.topic.details');
            Route::post('/csv-store', [CourseTopicController::class, 'csvStore'])->name('course.topic.data.csv.store');
            Route::get('/export', [CourseTopicController::class, 'export'])->name('course.topic.data.csv.export');
        });

        //**  course slide management  **//
        Route::group(['prefix'  =>   'slide'], function () {
            Route::get('/{id}', [CourseSlideController::class, 'index'])->name('course.slide.index');
            Route::get('/create', [CourseSlideController::class, 'create'])->name('course.slide.create');
            Route::post('/store', [CourseSlideController::class, 'store'])->name('course.slide.store');
            Route::get('/{id}/edit', [CourseSlideController::class, 'edit'])->name('course.slide.edit');
            Route::post('/update', [CourseSlideController::class, 'update'])->name('course.slide.update');
            Route::get('/{id}/delete', [CourseSlideController::class, 'delete'])->name('course.slide.delete');
            Route::post('updateStatus', [CourseSlideController::class, 'updateStatus'])->name('course.slide.updateStatus');
            Route::get('/{id}/details', [CourseSlideController::class, 'details'])->name('course.slide.details');
            Route::post('/csv-store', [CourseSlideController::class, 'csvStore'])->name('course.slide.data.csv.store');
            Route::get('/export', [CourseSlideController::class, 'export'])->name('course.slide.data.csv.export');
        });

        //**  course quiz management  **//
        Route::group(['prefix'  =>   'quiz'], function () {
            Route::get('/{id}', [CourseQuizController::class, 'index'])->name('course.quiz.index');
            Route::get('/create', [CourseQuizController::class, 'create'])->name('course.quiz.create');
            Route::post('/store', [CourseQuizController::class, 'store'])->name('course.quiz.store');
            Route::get('/{id}/edit', [CourseQuizController::class, 'edit'])->name('course.quiz.edit');
            Route::post('/update', [CourseQuizController::class, 'update'])->name('course.quiz.update');
            Route::get('/{id}/delete', [CourseQuizController::class, 'delete'])->name('course.quiz.delete');
            Route::post('updateStatus', [CourseQuizController::class, 'updateStatus'])->name('course.quiz.updateStatus');
            Route::get('/{id}/details', [CourseQuizController::class, 'details'])->name('course.quiz.details');
            Route::post('/csv-store', [CourseQuizController::class, 'csvStore'])->name('course.quiz.data.csv.store');
            Route::get('/export', [CourseQuizController::class, 'export'])->name('course.quiz.data.csv.export');
        });

        //**  course testimonial management  **//
        Route::group(['prefix'  =>   'testimonial'], function () {
            Route::get('/{id}', [CourseTestimonialController::class, 'index'])->name('course.testimonial.index');
            Route::get('/create', [CourseTestimonialController::class, 'create'])->name('course.testimonial.create');
            Route::post('/store', [CourseTestimonialController::class, 'store'])->name('course.testimonial.store');
            Route::get('/{id}/edit', [CourseTestimonialController::class, 'edit'])->name('course.testimonial.edit');
            Route::post('/update', [CourseTestimonialController::class, 'update'])->name('course.testimonial.update');
            Route::get('/{id}/delete', [CourseTestimonialController::class, 'delete'])->name('course.testimonial.delete');
            Route::post('updateStatus', [CourseTestimonialController::class, 'updateStatus'])->name('course.testimonial.updateStatus');
            Route::get('/{id}/details', [CourseTestimonialController::class, 'details'])->name('course.testimonial.details');
            Route::post('/csv-store', [CourseTestimonialController::class, 'csvStore'])->name('course.testimonial.data.csv.store');
            Route::get('/export', [CourseTestimonialController::class, 'export'])->name('course.testimonial.data.csv.export');
        });
        // });

        //**  market management  **/
        Route::group(['prefix'  =>   'market'], function () {
            Route::get('/', [MarketController::class, 'index'])->name('market.index');
            Route::get('/create', [MarketController::class, 'create'])->name('market.create');
            Route::post('/store', [MarketController::class, 'store'])->name('market.store');
            Route::get('/{id}/edit', [MarketController::class, 'edit'])->name('market.edit');
            Route::post('/update', [MarketController::class, 'update'])->name('market.update');
            Route::get('/{id}/delete', [MarketController::class, 'delete'])->name('market.delete');
            Route::post('updateStatus', [MarketController::class, 'updateStatus'])->name('market.updateStatus');
            Route::get('/{id}/details', [MarketController::class, 'details'])->name('market.details');
            Route::post('/csv-store', [MarketController::class, 'csvStore'])->name('market.data.csv.store');
            Route::get('/export', [MarketController::class, 'export'])->name('market.data.csv.export');
        });

        //**  market type management  **/
        Route::group(['prefix'  =>   'market/type'], function () {
            Route::get('/', [MarketTypeController::class, 'index'])->name('market.type.index');
            Route::get('/create', [MarketTypeController::class, 'create'])->name('market.type.create');
            Route::post('/store', [MarketTypeController::class, 'store'])->name('market.type.store');
            Route::get('/{id}/edit', [MarketTypeController::class, 'edit'])->name('market.type.edit');
            Route::post('/update', [MarketTypeController::class, 'update'])->name('market.type.update');
            Route::get('/{id}/delete', [MarketTypeController::class, 'delete'])->name('market.type.delete');
            Route::post('updateStatus', [MarketTypeController::class, 'updateStatus'])->name('market.type.updateStatus');
            Route::get('/{id}/details', [MarketTypeController::class, 'details'])->name('market.type.details');
            Route::post('/csv-store', [MarketTypeController::class, 'csvStore'])->name('market.type.data.csv.store');
            Route::get('/export', [MarketTypeController::class, 'export'])->name('market.type.data.csv.export');
            Route::get('/content/{marketTypeId}', [MarketTypeController::class, 'content'])->name('market.type.content');
            Route::post('/content', [MarketTypeController::class, 'contentUpdate'])->name('market.type.content.update');            
             Route::post('/footer', [MarketTypeController::class, 'footerUpdate'])->name('market.type.footer.update');
            Route::post('/category', [MarketTypeController::class, 'category'])->name('market.type.category.update');
            Route::get('/{id}/delete', [MarketTypeController::class, 'deleteCategory'])->name('market.type.category.delete');
            Route::post('/banner', [MarketTypeController::class, 'banner'])->name('market.type.banner.update');
            Route::get('/banner/{id}/delete', [MarketTypeController::class, 'deleteBanner'])->name('market.type.banner.delete');
            Route::post('/faq', [MarketTypeController::class, 'faq'])->name('market.type.faq.update');
            Route::get('/faq/{id}/delete', [MarketTypeController::class, 'deleteFaq'])->name('market.type.faq.delete');
        });

        //**  market category management  **/
        Route::group(['prefix'  =>   'market/category/type/'], function () {
            Route::get('/', [MarketCategoryController::class, 'index'])->name('market.category.index');
            Route::get('/create', [MarketCategoryController::class, 'create'])->name('market.category.create');
            Route::post('/store', [MarketCategoryController::class, 'store'])->name('market.category.store');
            Route::get('/{id}/edit', [MarketCategoryController::class, 'edit'])->name('market.category.edit');
            Route::post('/update', [MarketCategoryController::class, 'update'])->name('market.category.update');
            Route::get('/{id}/delete', [MarketCategoryController::class, 'delete'])->name('market.category.delete');
            Route::post('updateStatus', [MarketCategoryController::class, 'updateStatus'])->name('market.category.updateStatus');
            Route::get('/{id}/details', [MarketCategoryController::class, 'details'])->name('market.category.details');
            Route::post('/csv-store', [MarketCategoryController::class, 'csvStore'])->name('market.category.data.csv.store');
            Route::get('/export', [MarketCategoryController::class, 'export'])->name('market.category.data.csv.export');
        });

        //**  market banner management  **//
        Route::group(['prefix'  =>   'market/banner'], function () {
            Route::get('/', [MarketBannerController::class, 'index'])->name('market.banner.index');
            Route::get('/create', [MarketBannerController::class, 'create'])->name('market.banner.create');
            Route::post('/store', [MarketBannerController::class, 'store'])->name('market.banner.store');
            Route::get('/{id}/edit', [MarketBannerController::class, 'edit'])->name('market.banner.edit');
            Route::post('/update', [MarketBannerController::class, 'update'])->name('market.banner.update');
            Route::get('/{id}/delete', [MarketBannerController::class, 'delete'])->name('market.banner.delete');
            Route::post('updateStatus', [MarketBannerController::class, 'updateStatus'])->name('market.banner.updateStatus');
            Route::get('/{id}/details', [MarketBannerController::class, 'details'])->name('market.banner.details');
            Route::post('/csv-store', [MarketBannerController::class, 'csvStore'])->name('market.banner.data.csv.store');
            Route::get('/export', [MarketBannerController::class, 'export'])->name('market.banner.data.csv.export');
        });

        //**  market faq management  **//
        Route::group(['prefix'  =>   'market/faq'], function () {
            Route::get('/', [MarketFaqController::class, 'index'])->name('market.faq.index');
            Route::get('/create', [MarketFaqController::class, 'create'])->name('market.faq.create');
            Route::post('/store', [MarketFaqController::class, 'store'])->name('market.faq.store');
            Route::get('/{id}/edit', [MarketFaqController::class, 'edit'])->name('market.faq.edit');
            Route::post('/update', [MarketFaqController::class, 'update'])->name('market.faq.update');
            Route::get('/{id}/delete', [MarketFaqController::class, 'delete'])->name('market.faq.delete');
            Route::post('updateStatus', [MarketFaqController::class, 'updateStatus'])->name('market.faq.updateStatus');
            Route::get('/{id}/details', [MarketFaqController::class, 'details'])->name('market.faq.details');
            Route::post('/csv-store', [MarketFaqController::class, 'csvStore'])->name('market.faq.data.csv.store');
            Route::get('/export', [MarketFaqController::class, 'export'])->name('market.faq.data.csv.export');
        });

        Route::group(['prefix'  =>   '/marketplace/page'], function () {
            Route::get('/', [MarketPlacePageController::class, 'index'])->name('marketplace.page.index');
            Route::get('/{id}/edit', [MarketPlacePageController::class, 'edit'])->name('marketplace.page.edit');
            Route::post('/update', [MarketPlacePageController::class, 'update'])->name('marketplace.page.update');
            Route::get('/{id}/details', [MarketPlacePageController::class, 'details'])->name('marketplace.page.details');
        });
        // Marketplace- FAQ management
        Route::group(['prefix'  =>   '/marketplace/faq'], function () {
            Route::get('/', [MarketPlaceFaqController::class, 'index'])->name('marketplace.faq.index');
            Route::get('/create', [MarketPlaceFaqController::class, 'create'])->name('marketplace.faq.create');
            Route::post('/store', [MarketPlaceFaqController::class, 'store'])->name('marketplace.faq.store');
            Route::get('/{id}/edit', [MarketPlaceFaqController::class, 'edit'])->name('marketplace.faq.edit');
            Route::post('/update', [MarketPlaceFaqController::class, 'update'])->name('marketplace.faq.update');
            Route::get('/{id}/delete', [MarketPlaceFaqController::class, 'delete'])->name('marketplace.faq.delete');
            Route::post('updateStatus', [MarketPlaceFaqController::class, 'updateStatus'])->name('marketplace.faq.updateStatus');
            Route::get('/{id}/details', [MarketPlaceFaqController::class, 'details'])->name('marketplace.faq.details');
            Route::post('/csv-store', [MarketPlaceFaqController::class, 'csvStore'])->name('marketplace.faq.data.csv.store');
            Route::get('/export', [MarketPlaceFaqController::class, 'export'])->name('marketplace.faq.data.csv.export');
        });

        //**  support management  **//
        Route::group(['prefix'  =>   'support'], function () {
            Route::get('/', [SupportController::class, 'index'])->name('support.index');
            Route::get('/create', [SupportController::class, 'create'])->name('support.create');
            Route::post('/store', [SupportController::class, 'store'])->name('support.store');
            Route::get('/{id}/edit', [SupportController::class, 'edit'])->name('support.edit');
            Route::post('/update', [SupportController::class, 'update'])->name('support.update');
            Route::get('/{id}/delete', [SupportController::class, 'delete'])->name('support.delete');
            Route::post('updateStatus', [SupportController::class, 'updateStatus'])->name('support.updateStatus');
            Route::get('/{id}/details', [SupportController::class, 'details'])->name('support.details');
            Route::post('/csv-store', [SupportController::class, 'csvStore'])->name('support.data.csv.store');
            Route::get('/export', [SupportController::class, 'export'])->name('support.data.csv.export');
        });
        //**  support management  **//
        Route::group(['prefix'  =>   'support/widget'], function () {
            Route::get('/', [SupportWidgetController::class, 'index'])->name('support.widget.index');
            Route::get('/create', [SupportWidgetController::class, 'create'])->name('support.widget.create');
            Route::post('/store', [SupportWidgetController::class, 'store'])->name('support.widget.store');
            Route::get('/{id}/edit', [SupportWidgetController::class, 'edit'])->name('support.widget.edit');
            Route::post('/update', [SupportWidgetController::class, 'update'])->name('support.widget.update');
            Route::get('/{id}/delete', [SupportWidgetController::class, 'delete'])->name('support.widget.delete');
            Route::post('updateStatus', [SupportWidgetController::class, 'updateStatus'])->name('support.widget.updateStatus');
            Route::get('/{id}/details', [SupportWidgetController::class, 'details'])->name('support.widget.details');
            Route::post('/csv-store', [SupportWidgetController::class, 'csvStore'])->name('support.widget.data.csv.store');
            Route::get('/export', [SupportWidgetController::class, 'export'])->name('support.widget.data.csv.export');
        });
        //**  support management  **//
        Route::group(['prefix'  =>   'support/faq/category'], function () {
            Route::get('/', [SupportFaqCategoryController::class, 'index'])->name('support.faq.category.index');
            Route::get('/create', [SupportFaqCategoryController::class, 'create'])->name('support.faq.category.create');
            Route::post('/store', [SupportFaqCategoryController::class, 'store'])->name('support.faq.category.store');
            Route::get('/{id}/edit', [SupportFaqCategoryController::class, 'edit'])->name('support.faq.category.edit');
            Route::post('/update', [SupportFaqCategoryController::class, 'update'])->name('support.faq.category.update');
            Route::get('/{id}/delete', [SupportFaqCategoryController::class, 'delete'])->name('support.faq.category.delete');
            Route::post('updateStatus', [SupportFaqCategoryController::class, 'updateStatus'])->name('support.faq.category.updateStatus');
            Route::get('/{id}/details', [SupportFaqCategoryController::class, 'details'])->name('support.faq.category.details');
            Route::post('/csv-store', [SupportFaqCategoryController::class, 'csvStore'])->name('support.faq.category.data.csv.store');
            Route::get('/export', [SupportFaqCategoryController::class, 'export'])->name('support.faq.category.data.csv.export');
        });

        //**  support management  **//
        Route::group(['prefix'  =>   'support/faq'], function () {
            Route::get('/', [SupportFaqController::class, 'index'])->name('support.faq.index');
            Route::get('/create', [SupportFaqController::class, 'create'])->name('support.faq.create');
            Route::post('/store', [SupportFaqController::class, 'store'])->name('support.faq.store');
            Route::get('/{id}/edit', [SupportFaqController::class, 'edit'])->name('support.faq.edit');
            Route::post('/update', [SupportFaqController::class, 'update'])->name('support.faq.update');
            Route::get('/{id}/delete', [SupportFaqController::class, 'delete'])->name('support.faq.delete');
            Route::post('updateStatus', [SupportFaqController::class, 'updateStatus'])->name('support.faq.updateStatus');
            Route::get('/{id}/details', [SupportFaqController::class, 'details'])->name('support.faq.details');
            Route::post('/csv-store', [SupportFaqController::class, 'csvStore'])->name('support.data.csv.store');
            Route::get('/export', [SupportFaqController::class, 'export'])->name('support.data.csv.export');
        });
    });
     //**  job category  **//
     Route::group(['prefix' => 'job/category'], function () {
        Route::get('/', [JobCategoryController::class, 'index'])->name('job.category.index');
        Route::get('/create', [JobCategoryController::class, 'create'])->name('job.category.create');
        Route::post('/store', [JobCategoryController::class, 'store'])->name('job.category.store');
        Route::get('/{id}/edit', [JobCategoryController::class, 'edit'])->name('job.category.edit');
        Route::post('/update', [JobCategoryController::class, 'update'])->name('job.category.update');
        Route::get('/{id}/delete', [JobCategoryController::class, 'delete'])->name('job.category.delete');
        Route::post('updateStatus', [JobCategoryController::class, 'updateStatus'])->name('job.category.updateStatus');
        Route::get('/{id}/details', [JobCategoryController::class, 'details'])->name('job.category.details');
        Route::post('/csv-store', [JobCategoryController::class, 'csvStore'])->name('job.category.data.csv.store');
        Route::get('/export', [JobCategoryController::class, 'export'])->name('job.category.data.csv.export');
    });

    //**  job management  **//
    Route::group(['prefix'  =>   'job'], function () {
        Route::get('/', [JobController::class, 'index'])->name('job.index');
        Route::get('/create', [JobController::class, 'create'])->name('job.create');
        Route::post('/store', [JobController::class, 'store'])->name('job.store');
        Route::get('/{id}/edit', [JobController::class, 'edit'])->name('job.edit');
        Route::post('/update', [JobController::class, 'update'])->name('job.update');
        Route::get('/{id}/delete', [JobController::class, 'delete'])->name('job.delete');
        Route::post('updateStatus', [JobController::class, 'updateStatus'])->name('job.updateStatus');
        Route::post('updateFeatureStatus', [JobController::class, 'updatefeatureStatus'])->name('job.updateFeatureStatus');
        Route::post('updateBeginnerStatus', [JobController::class, 'updatebeginnerStatus'])->name('job.updateBeginnerstatus');
        Route::get('/{id}/details', [JobController::class, 'details'])->name('job.details');
        Route::post('/csv-store', [JobController::class, 'csvStore'])->name('job.data.csv.store');
        Route::get('/export', [JobController::class, 'export'])->name('job.data.csv.export');
        Route::get('/job/application/{id}', [JobController::class, 'application'])->name('job.application');
        Route::get('/job/save/{id}', [JobController::class, 'save'])->name('job.save');
        Route::get('/job/notInterest/{id}', [JobController::class, 'interest'])->name('job.interest');
        Route::get('/job/report/{id}', [JobController::class, 'report'])->name('job.report');
    
        //**  employment type  **//
        Route::group(['prefix' => 'employmentType'], function () {
            Route::get('/', [JobEmploymentTypeController::class, 'index'])->name('job.type.index');
            Route::get('/create', [JobEmploymentTypeController::class, 'create'])->name('job.type.create');
            Route::post('/store', [JobEmploymentTypeController::class, 'store'])->name('job.type.store');
            Route::get('/{id}/edit', [JobEmploymentTypeController::class, 'edit'])->name('job.type.edit');
            Route::post('/update', [JobEmploymentTypeController::class, 'update'])->name('job.type.update');
            Route::get('/{id}/delete', [JobEmploymentTypeController::class, 'delete'])->name('job.type.delete');
            Route::post('updateStatus', [JobEmploymentTypeController::class, 'updateStatus'])->name('job.type.updateStatus');
            Route::get('/{id}/details', [JobEmploymentTypeController::class, 'details'])->name('job.type.details');
            Route::post('/csv-store', [JobEmploymentTypeController::class, 'csvStore'])->name('job.type.data.csv.store');
            Route::get('/export', [JobEmploymentTypeController::class, 'export'])->name('job.type.data.csv.export');
        });
    });
          //template management
            //** Category management **/
            Route::group(['prefix' => 'template/category'], function () {
                Route::get('/', [TemplateCategoryController::class, 'index'])->name('template.category.index');
                Route::get('/create', [TemplateCategoryController::class, 'create'])->name('template.category.create');
                Route::post('/store', [TemplateCategoryController::class, 'store'])->name('template.category.store');
                Route::get('/{id}/edit', [TemplateCategoryController::class, 'edit'])->name('template.category.edit');
                Route::post('/update', [TemplateCategoryController::class, 'update'])->name('template.category.update');
                Route::get('/{id}/delete', [TemplateCategoryController::class, 'delete'])->name('template.category.delete');
                Route::post('updateStatus', [TemplateCategoryController::class, 'updateStatus'])->name('template.category.updateStatus');
                Route::get('/{id}/details', [TemplateCategoryController::class, 'details'])->name('template.category.details');
                Route::post('/csv-store', [TemplateCategoryController::class, 'csvStore'])->name('template.category.data.csv.store');
                Route::get('/export', [TemplateCategoryController::class, 'export'])->name('template.category.data.csv.export');
            });

            //** Sub category management **/
            Route::group(['prefix' => 'template/subcategory'], function () {
                Route::get('/', [TemplateSubCategoryController::class, 'index'])->name('template.subcategory.index');
                Route::get('/create', [TemplateSubCategoryController::class, 'create'])->name('template.subcategory.create');
                Route::post('/store', [TemplateSubCategoryController::class, 'store'])->name('template.subcategory.store');
                Route::get('/{id}/edit', [TemplateSubCategoryController::class, 'edit'])->name('template.subcategory.edit');
                Route::post('/update', [TemplateSubCategoryController::class, 'update'])->name('template.subcategory.update');
                Route::get('/{id}/delete', [TemplateSubCategoryController::class, 'delete'])->name('template.subcategory.delete');
                Route::post('updateStatus', [TemplateSubCategoryController::class, 'updateStatus'])->name('template.subcategory.updateStatus');
                Route::get('/{id}/details', [TemplateSubCategoryController::class, 'details'])->name('template.subcategory.details');
                Route::post('/csv-store', [TemplateSubCategoryController::class, 'csvStore'])->name('template.subcategory.data.csv.store');
                Route::get('/export', [TemplateSubCategoryController::class, 'export'])->name('template.subcategory.data.csv.export');
            });

            //**  type management  **/
            Route::group(['prefix' => 'template/type'], function () {
                Route::get('/', [TemplateTypeController::class, 'index'])->name('template.type.index');
                Route::get('/create', [TemplateTypeController::class, 'create'])->name('template.type.create');
                Route::post('/store', [TemplateTypeController::class, 'store'])->name('template.type.store');
                Route::get('/{id}/edit', [TemplateTypeController::class, 'edit'])->name('template.type.edit');
                Route::post('/update', [TemplateTypeController::class, 'update'])->name('template.type.update');
                Route::get('/{id}/delete', [TemplateTypeController::class, 'delete'])->name('template.type.delete');
                Route::post('updateStatus', [TemplateTypeController::class, 'updateStatus'])->name('template.type.updateStatus');
                Route::get('/{id}/details', [TemplateTypeController::class, 'details'])->name('template.type.details');
                Route::post('/csv-store', [TemplateTypeController::class, 'csvStore'])->name('template.type.data.csv.store');
                Route::get('/export', [TemplateTypeController::class, 'export'])->name('template.type.data.csv.export');
            });

            //**  template management  **/
            Route::group(['prefix'  =>   'template'], function () {
                Route::get('/', [TemplateController::class, 'index'])->name('template.index');
                Route::get('/create', [TemplateController::class, 'create'])->name('template.create');
                Route::post('/store', [TemplateController::class, 'store'])->name('template.store');
                Route::get('/{id}/edit', [TemplateController::class, 'edit'])->name('template.edit');
                Route::post('/update', [TemplateController::class, 'update'])->name('template.update');
                Route::get('/{id}/delete', [TemplateController::class, 'delete'])->name('template.delete');
                Route::post('updateStatus', [TemplateController::class, 'updateStatus'])->name('template.updateStatus');
                Route::get('/{id}/details', [TemplateController::class, 'details'])->name('template.details');
                Route::post('/csv-store', [TemplateController::class, 'csvStore'])->name('template.data.csv.store');
                Route::get('/export', [TemplateController::class, 'export'])->name('template.data.csv.export');
            });

            //** Frontend management **/
            Route::group(['prefix' => 'frontend-management'], function () {
                // Home-page management
                Route::group(['prefix' => '/home-page'], function(){
                    Route::get('/', [HomePageController::class, 'index'])->name('homepagemanagement.index');
                    Route::get('/{id}/edit', [HomePageController::class, 'edit'])->name('homepagemanagement.edit');
                    Route::post('/update', [HomePageController::class, 'update'])->name('homepagemanagement.update');
                    Route::get('/{id}/details', [HomePageController::class, 'details'])->name('homepagemanagement.details');
                });
            });
            
            // -------------------Master Management--------------------
            Route::group(['prefix'=>'master/'],function(){

                // Social Media master
                Route::group(['prefix' => 'socialmedia'], function () {
                    Route::get('/', [SocialMediaController::class, 'index'])->name('socialmedia.master.index');
                    Route::get('/create', [SocialMediaController::class, 'create'])->name('socialmedia.master.create');
                    Route::post('/store', [SocialMediaController::class, 'store'])->name('socialmedia.master.store');
                    Route::get('/{id}/edit', [SocialMediaController::class, 'edit'])->name('socialmedia.master.edit');
                    Route::post('/update', [SocialMediaController::class, 'update'])->name('socialmedia.master.update');
                    Route::get('/{id}/delete', [SocialMediaController::class, 'delete'])->name('socialmedia.master.delete');
                    Route::post('updateStatus', [SocialMediaController::class, 'updateStatus'])->name('socialmedia.master.updateStatus');
                });
                // Language Master
                Route::group(['prefix' => 'language'], function () {
                    Route::get('/', [LanguageController::class, 'index'])->name('language.master.index');
                    Route::get('/create', [LanguageController::class, 'create'])->name('language.master.create');
                    Route::post('/store', [LanguageController::class, 'store'])->name('language.master.store');
                    Route::get('/{id}/edit', [LanguageController::class, 'edit'])->name('language.master.edit');
                    Route::post('/update', [LanguageController::class, 'update'])->name('language.master.update');
                    Route::get('/{id}/delete', [LanguageController::class, 'delete'])->name('language.master.delete');
                    Route::post('updateStatus', [LanguageController::class, 'updateStatus'])->name('language.master.updateStatus');
                });

                // Plans Pricing Category
                Route::group(['prefix' => 'currency'], function () {
                    Route::get('/', [CurrencyController::class, 'index'])->name('plans.category.index');
                    Route::get('/create', [CurrencyController::class, 'create'])->name('plans.category.create');
                    Route::post('/store', [CurrencyController::class, 'store'])->name('plans.category.store');
                    Route::get('/{id}/edit', [CurrencyController::class, 'edit'])->name('plans.category.edit');
                    Route::post('/update', [CurrencyController::class, 'update'])->name('plans.category.update');
                    Route::get('/{id}/delete', [CurrencyController::class, 'delete'])->name('plans.category.delete');
                });
            });
              //tools-feature management
               //tools-feature management
            //** Content management **//
            Route::group(['prefix' => 'tools/content'], function () {
                Route::get('/', [ToolsController::class, 'index'])->name('tools.content.index');
                Route::get('/{id}/edit', [ToolsController::class, 'edit'])->name('tools.content.edit');
                Route::post('/update', [ToolsController::class, 'update'])->name('tools.content.update');
                Route::get('/{id}/details', [ToolsController::class, 'details'])->name('tools.content.details');
            });

            //** Area of Interest Category **//
            Route::group(['prefix' => 'tools/AreaOfInterest/category'], function () {
                Route::get('/', [ToolsInterestCategoryController::class, 'index'])->name('tools.AreaOfInterest.category.index');
                Route::get('/create', [ToolsInterestCategoryController::class, 'create'])->name('tools.AreaOfInterest.category.create');
                Route::post('/store', [ToolsInterestCategoryController::class, 'store'])->name('tools.AreaOfInterest.category.store');
                Route::get('/{id}/edit', [ToolsInterestCategoryController::class, 'edit'])->name('tools.AreaOfInterest.category.edit');
                Route::post('/update', [ToolsInterestCategoryController::class, 'update'])->name('tools.AreaOfInterest.category.update');
                Route::get('/{id}/delete', [ToolsInterestCategoryController::class, 'delete'])->name('tools.AreaOfInterest.category.delete');
                Route::post('updateStatus', [ToolsInterestCategoryController::class, 'updateStatus'])->name('tools.AreaOfInterest.category.updateStatus');
                Route::get('/{id}/details', [ToolsInterestCategoryController::class, 'details'])->name('tools.AreaOfInterest.category.details');
               
            });
            //** sub Category **//
            Route::group(['prefix' => 'tools/sub/category'], function () {
                Route::get('/', [ToolSubCategoryController::class, 'index'])->name('tools.sub.category.index');
                Route::get('/create', [ToolSubCategoryController::class, 'create'])->name('tools.sub.category.create');
                Route::post('/store', [ToolSubCategoryController::class, 'store'])->name('tools.sub.category.store');
                Route::get('/{id}/edit', [ToolSubCategoryController::class, 'edit'])->name('tools.sub.category.edit');
                Route::post('/update', [ToolSubCategoryController::class, 'update'])->name('tools.sub.category.update');
                Route::get('/{id}/delete', [ToolSubCategoryController::class, 'delete'])->name('tools.sub.category.delete');
                Route::post('updateStatus', [ToolSubCategoryController::class, 'updateStatus'])->name('tools.sub.category.updateStatus');
                Route::get('/{id}/details', [ToolSubCategoryController::class, 'details'])->name('tools.sub.category.details');
            
            });
            //**   Area of Interest  **//
            Route::group(['prefix' => 'tools/AreaOfInterest'], function () {
                Route::get('/', [ToolsInterestController::class, 'index'])->name('tools.AreaOfInterest.index');
                Route::get('/create', [ToolsInterestController::class, 'create'])->name('tools.AreaOfInterest.create');
                Route::post('/store', [ToolsInterestController::class, 'store'])->name('tools.AreaOfInterest.store');
                Route::get('/{id}/edit', [ToolsInterestController::class, 'edit'])->name('tools.AreaOfInterest.edit');
                Route::post('/update', [ToolsInterestController::class, 'update'])->name('tools.AreaOfInterest.update');
                Route::get('/{id}/delete', [ToolsInterestController::class, 'delete'])->name('tools.AreaOfInterest.delete');
                Route::post('updateStatus', [ToolsInterestController::class, 'updateStatus'])->name('tools.AreaOfInterest.updateStatus');
                Route::get('/{id}/details', [ToolsInterestController::class, 'details'])->name('tools.AreaOfInterest.details');
                Route::post('/csv-store', [ToolsInterestController::class, 'csvStore'])->name('tools.AreaOfInterest.data.csv.store');
                Route::get('/export', [ToolsInterestController::class, 'export'])->name('tools.AreaOfInterest.data.csv.export');

                Route::get('/search', [ToolsInterestController::class, 'search'])->name('tools.AreaOfInterest.search');
                Route::get('/toggle', [ToolsInterestController::class, 'toolsToggle'])->name('tools.AreaOfInterest.toggle');
                Route::get('/fetch', [ToolsInterestController::class, 'toolsFetch'])->name('tools.AreaOfInterest.fetch');
            });

            // -------------------- Plans and Pricing-------------------------
            Route::group(['prefix'=>'plans-pricing'], function(){
                // Plans Pricing Master
                Route::group(['prefix' => '/management'], function () {
                    Route::get('/', [PlansPriceController::class, 'index'])->name('plans.management.index');
                    Route::get('/create', [PlansPriceController::class, 'create'])->name('plans.management.create');
                    Route::post('/store', [PlansPriceController::class, 'store'])->name('plans.management.store');
                    Route::get('/{id}/edit', [PlansPriceController::class, 'edit'])->name('plans.management.edit');
                    Route::post('/update', [PlansPriceController::class, 'update'])->name('plans.management.update');
                    Route::post('/updatePricing', [PlansPriceController::class, 'updatePricing'])->name('plans.management.updatePricing');
                    Route::get('{id}/deletePricing', [PlansPriceController::class, 'deletePricing'])->name('plans.management.deletePricing');
                    Route::get('{id}/details', [PlansPriceController::class, 'details'])->name('plans.management.details');
                    Route::get('/{id}/delete', [PlansPriceController::class, 'delete'])->name('plans.management.delete');
                    Route::post('updateStatus', [PlansPriceController::class, 'updateStatus'])->name('plans.management.updateStatus');
                });

                // Plans Pricing frontend page
                Route::group(['prefix' => '/page'], function () {
                    Route::get('/', [PlansPricePageController::class, 'index'])->name('plans.page.index');
                    Route::get('/create', [PlansPricePageController::class, 'create'])->name('plans.page.create');
                    Route::post('/store', [PlansPricePageController::class, 'store'])->name('plans.page.store');
                    Route::get('/{id}/edit', [PlansPricePageController::class, 'edit'])->name('plans.page.edit');
                    Route::post('/update', [PlansPricePageController::class, 'update'])->name('plans.page.update');
                    Route::get('/{id}/details', [PlansPricePageController::class, 'details'])->name('plans.page.details');
                });

                // Plans pricing faqs
                Route::group(['prefix'  =>   '/faq'], function () {
                    Route::get('/', [PlansFaqController::class, 'index'])->name('plans.faq.index');
                    Route::get('/create', [PlansFaqController::class, 'create'])->name('plans.faq.create');
                    Route::post('/store', [PlansFaqController::class, 'store'])->name('plans.faq.store');
                    Route::get('/{id}/edit', [PlansFaqController::class, 'edit'])->name('plans.faq.edit');
                    Route::post('/update', [PlansFaqController::class, 'update'])->name('plans.faq.update');
                    Route::get('/{id}/delete', [PlansFaqController::class, 'delete'])->name('plans.faq.delete');
                    Route::post('updateStatus', [PlansFaqController::class, 'updateStatus'])->name('plans.faq.updateStatus');
                    Route::get('/{id}/details', [PlansFaqController::class, 'details'])->name('plans.faq.details');
                    Route::post('/csv-store', [PlansFaqController::class, 'csvStore'])->name('plans.faq.data.csv.store');
                    Route::get('/export', [PlansFaqController::class, 'export'])->name('plans.faq.data.csv.export');
                });
            });

            //--------- Footer Management --------------//
           
            Route::group(['prefix' => 'footer'], function () {
                Route::get('/', [FooterController::class, 'index'])->name('footer.content.index');
                Route::get('/{id}/edit', [FooterController::class, 'edit'])->name('footer.content.edit');
                Route::post('/update', [FooterController::class, 'update'])->name('footer.content.update');
                Route::get('/{id}/details', [FooterController::class, 'details'])->name('footer.content.details');
            });

            //** Settings Management **/
            Route::group(['prefix' => 'settings'], function () {
                Route::get('/', [SettingController::class, 'index'])->name('settings.index');
                Route::get('/{id}/edit', [SettingController::class, 'edit'])->name('settings.edit');
                Route::post('/update', [SettingController::class, 'update'])->name('settings.update');
                Route::get('/{id}/details', [SettingController::class, 'details'])->name('settings.details');
               
            });

             //** course management **/
        Route::group(['prefix' => 'course'], function () {
            Route::get('/', [CourseManagementController::class, 'index'])->name('course.index');
            Route::get('/create', [CourseManagementController::class, 'create'])->name('course.create');
            Route::post('/store', [CourseManagementController::class, 'store'])->name('course.store');
            Route::get('/{id}/edit', [CourseManagementController::class, 'edit'])->name('course.edit');
            Route::post('/update', [CourseManagementController::class, 'update'])->name('course.update');

            Route::post('/update/{id}/lesson/', [CourseManagementController::class, 'updateCourseLesson'])->name('course.updateCourseLesson');
            Route::get('/{cid}/delete/lesson/{lid}', [CourseManagementController::class, 'deleteCourseLesson'])->name('course.deleteCourseLesson');

            Route::get('/{id}/delete', [CourseManagementController::class, 'delete'])->name('course.delete');
            Route::post('updateStatus', [CourseManagementController::class, 'updateStatus'])->name('course.updateStatus');
            Route::get('/{id}/details', [CourseManagementController::class, 'details'])->name('course.details');
            Route::post('/csv-store', [CourseManagementController::class, 'csvStore'])->name('course.data.csv.store');
            Route::get('/export', [CourseManagementController::class, 'export'])->name('course.data.csv.export');
        });


        Route::group(['prefix'  =>   'short_courses'], function () {
            Route::get('/', [ShortCourseController::class, 'index'])->name('short_courses.index');
            Route::get('/create', [ShortCourseController::class, 'create'])->name('short_courses.create');
            Route::post('/store', [ShortCourseController::class, 'store'])->name('short_courses.store');
            Route::get('/{id}/edit', [ShortCourseController::class, 'edit'])->name('short_courses.edit');
            Route::post('/update', [ShortCourseController::class, 'update'])->name('short_courses.update');
            Route::get('/{id}/delete', [ShortCourseController::class, 'delete'])->name('short_courses.delete');
            Route::post('updateStatus', [ShortCourseController::class, 'updateStatus'])->name('short_courses.updateStatus');
            
        });
        
        Route::group(['prefix'  =>   'tools/feature'], function () {
            Route::get('/', [FeatureController::class, 'index'])->name('feature.index');
            Route::get('/create', [FeatureController::class, 'create'])->name('feature.create');
            Route::post('/store', [FeatureController::class, 'store'])->name('feature.store');
            Route::get('/{id}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
            Route::post('/update', [FeatureController::class, 'update'])->name('feature.update');
            Route::get('/{id}/delete', [FeatureController::class, 'delete'])->name('feature.delete');
            Route::post('updateStatus', [FeatureController::class, 'updateStatus'])->name('feature.updateStatus');
            
        });
});
