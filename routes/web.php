<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about', 'AboutUsController@index')->name('about');
Route::get('/services/module', 'ServiceController@index')->name('module');
Route::get('/teams', 'TeamController@index')->name('team');
Route::get('/clients', 'ClientController@index')->name('client');
Route::get('/blog', 'BlogController@index')->name('blog');
Route::post('/blog/store', 'BlogController@store')->name('blog.store');
Route::get('/contact', 'ContactUsController@index')->name('contact');
Route::post('/contact/store', 'ContactUsController@store')->name('contact.store');

Route::get('/404', function () {
    return view('404');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=>['auth','admin']],function (){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::get('logo/name', 'LogoNameController@index')->name('logo.name');
    Route::post('logo/name/update', 'LogoNameController@update')->name('logo.name.update');

    Route::get('slider/addslider', 'SliderController@index')->name('addslider');
    Route::post('slider/addslider/store', 'SliderController@store')->name('addslider.store');
    Route::get('slider/slider', 'SliderController@slider')->name('slider');
    Route::delete('slider/slider/delete{id}','SliderController@destroy')->name('slider.delete');
    Route::get('slider/slider/edit{id}','SliderController@edit')->name('slider.edit');
    Route::post('slider/update','SliderController@update')->name('slider.update');

    Route::get('social', 'SocialController@social')->name('social');
    Route::post('social/update', 'SocialController@update')->name('social.update');


    Route::get('module/addmodule', 'ModuleController@index')->name('addmodule');
    Route::post('module/addmodule/store', 'ModuleController@store')->name('addmodule.store');
    Route::get('module/module', 'ModuleController@module')->name('module');
    Route::delete('module/module/delete{id}','ModuleController@destroy')->name('module.delete');

    Route::get('partner/addpartner', 'PartnerController@index')->name('addpartner');
    Route::post('partner/addpartner/store', 'PartnerController@store')->name('addpartner.store');
    Route::get('partner/partner', 'PartnerController@partner')->name('partner');
    Route::delete('partner/partner/delete{id}','PartnerController@destroy')->name('partner.delete');

    Route::get('about-us', 'AboutUsController@index')->name('about-us');
    Route::post('about-us/update', 'AboutUsController@update')->name('about-us.update');

    Route::get('team/addteam', 'TeamController@index')->name('addteam');
    Route::post('team/addteam/store', 'TeamController@store')->name('addteam.store');
    Route::get('team/team', 'TeamController@team')->name('team');
    Route::delete('team/team/delete{id}','TeamController@destroy')->name('team.delete');

    Route::get('advisory/addadvisory', 'AdvisoryController@index')->name('addadvisory');
    Route::post('advisory/addadvisory/store', 'AdvisoryController@store')->name('addadvisory.store');
    Route::get('advisory/advisory', 'AdvisoryController@advisory')->name('advisory');
    Route::delete('advisory/advisory/delete{id}','AdvisoryController@destroy')->name('advisory.delete');

    Route::get('client-comment', 'ClientCommentController@comment')->name('client-comment');
    Route::delete('client-comment/delete{id}','ClientCommentController@destroy')->name('client-comment.delete');

    Route::get('contact', 'ContactController@contact')->name('contact');
    Route::delete('contact/delete{id}','ContactController@destroy')->name('contact.delete');

    Route::get('contact-information', 'ContactInformationController@index')->name('contact-information');
    Route::post('contact-information/update', 'ContactInformationController@update')->name('contact-information.update');

    Route::get('seo', 'SeoController@index')->name('seo');
    Route::post('seo/update', 'SeoController@update')->name('seo.update');

    Route::get('settings', 'SettingsController@index')->name('settings');
    Route::post('/settings/update', 'SettingsController@passwordUpdate')->name('settings.update');
    Route::post('settings/update', 'SettingsController@update')->name('settings.update');

});
