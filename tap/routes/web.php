<?php

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Auth::routes();

// Route::get('command', function () {
// 	/* php artisan migrate */
//     \Artisan::call('migrate:fresh --seed');
//     dd("Migration Done");
// });

// Route::get('/', function() {
//     return view('frontend.index');
// });

//Route::get('login', 'Admin\LoginController@showLoginForm')->name('login');

require 'admin.php';
require 'site.php';
require 'api.php';

Route::prefix('v2')->group(function(){
    Route::name('sitenew.')->group(function(){
        Route::get('','Site\CommonController@index')->name('home');
        Route::get('glossary','Site\GlossaryController@index')->name('glossary');
        Route::get('glossary-category/{id}/{slug}','Site\GlossaryController@category')->name('glossary-category');
        Route::get('glossary-details/{slug}','Site\GlossaryController@details')->name('glossary-details');
        Route::get('blog', 'Site\ArticleController@index')->name('article');
        Route::get('blog/{slug}', 'Site\ArticleController@details')->name('article.details');
        Route::get('faqs','Site\FaqsController@index')->name('faqs');
        Route::get('faqs/{id}','Site\FaqsController@details')->name('faqs-details');
        Route::get('bloggers','Site\CommonController@bloggers')->name('bloggers');
        Route::get('employers','Site\CommonController@employers')->name('employers');
        Route::get('freelancer','Site\CommonController@freelancer')->name('freelancer');
        Route::get('publishers','Site\CommonController@publishers')->name('publishers');
        Route::get('in-house-copywriter','Site\CommonController@in_house_copywriter')->name('in_house_copywriter');
        Route::get('knowledge-centre','Site\CommonController@knowledge_centre')->name('knowledge_centre');
        Route::get('feature-details/{slug}','Site\FeatureController@details')->name('feature-details');
        Route::get('features','Site\FeatureController@index')->name('features');
        Route::get('marketplace','Site\MarketPlaceController@index')->name('marketplace');
        Route::get('marketplace-details/{slug}', 'Site\MarketPlaceController@details')->name('marketplace.details');
        Route::get('pricing','Site\CommonController@pricing')->name('pricing');
        Route::get('contact','Site\CommonController@contact')->name('contact');
        Route::post('savecontact','Site\CommonController@savecontact')->name('savecontact');
        Route::get('tools','Site\ToolController@index')->name('tools');
        Route::get('tools/{slug?}','Site\ToolController@detail')->name('tools.detail');
       
    });    
});
