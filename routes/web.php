<?php
use App\Http\Controllers\LanguageController;
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

Auth::routes();

// dashboard Routes

Route::group(['middleware' => 'auth'], function () {

    Route::get('/', 'DashboardController@index')->name('index');

    //Enquriy
    Route::get('/create_enquiry', 'EnquiryController@create_enquiry');
    Route::post('/create_enquiry/create',['as' => 'create_enquiry.create', 'uses' => 'EnquiryController@create']);
    Route::get('/edit_enquiry/{enquiry_id}',['as' => 'edit_enquiry', 'uses' => 'EnquiryController@edit']);
    Route::post('/save_enquiry',['as' => 'save_enquiry', 'uses' => 'EnquiryController@save_change']);
    Route::get('/del_enquiry',['as' => 'del_enquiry', 'uses' => 'EnquiryController@del_enquiry']);

    //CRM
    Route::get('/crm', 'CrmController@index')->name('crm_index');
    Route::get('/customer_create', 'CrmController@customer_create');
    Route::post('/add_account', 'CrmController@add_account');
    Route::post('/add_account_enquiry', 'CrmController@add_account_enquiry');
    Route::get('/edit_customer/{account_id}',['as' => 'edit_customer', 'uses' => 'CrmController@edit_customer']);
    Route::get('/edit_account/{account_id}',['as' => 'edit_account', 'uses' => 'CrmController@edit_account']);
    Route::post('/update_account',['as' => 'update_account', 'uses' => 'CrmController@update_account']);
    Route::get('/account_create', 'CrmController@account_create');
    Route::post('/update_password', 'CrmController@update_password');
    Route::get('/del_account',['as' => 'del_account', 'uses' => 'CrmController@del_account']);
    Route::post('/crm/avatar_upload','CrmController@saveAvatarUpload')->name('avatar_upload');

    Route::get('/user_profile', ['as' => 'user_profile', 'uses'=> 'CrmController@user_profile']);
    Route::post('/update_profile', ['as' => 'update_profile', 'uses'=> 'CrmController@update_profile']);
    Route::post('/update_user_pwd', 'CrmController@update_user_pwd');


    //Task
    Route::get('/task_management/with_itinerary_id/{itinerary_id}', ['uses' => 'TaskController@task_management'])->name('task_management');
    Route::get('/task_edit',['uses' => 'TaskController@edit_task'])->name('edit_task');
    Route::post('/del_task',['uses' => 'TaskController@delete_task']);
    Route::get('/task_detail',['as' => 'task_detail','uses' => 'TaskController@task_detail']);
    Route::post('/task_product_detail',['as' => 'task_product_detail','uses' => 'TaskController@task_product_detail']);
    Route::post('/save_task', ['uses' => 'TaskController@save_task'])->name('save_task');

    //Contact
    Route::get('/contact_management/{itinerary_id}', ['uses' => 'ContactController@contact_management'])->name('contact_management');
    Route::post('/save_status', ['uses' => 'ContactController@save_status'])->name('save_status');
    //Itinerary

    Route::get('/itinerary_add_info/{id}/{type}',['uses' => 'ItineraryController@add_itinerary_info'])->name('add_itinerary_info'); /**create or edit and get itinerary info */
    Route::post('/save_basic_info', ['uses' => 'ItineraryController@save_basic_info'])->name('save_basic_info'); /* edit itinerary basic info*/


    Route::get('/itinerary_add_daily/{itinerary_id}', ['as' => 'itinerary_add_daily', 'uses' => 'ItineraryController@add_daily']);
    Route::get('/itinerary_add_daily_search',['as' => 'itinerary_add_daily_search', 'uses' => 'ItineraryController@product_search']);
    Route::get('/itinerary_template_search',['as' => 'itinerary_template_search', 'uses' => 'ItineraryController@template_search']);
    Route::get('/itinerary_add_daily_filter',['as' => 'itinerary_add_daily_filter', 'uses' => 'ItineraryController@filter']);
    Route::post('/del_itinerary',['uses' => 'ItineraryController@delete_itinerary']);
    Route::get('/itinerary_send/{itinerary_id}',['uses' => 'ItineraryController@send_itinerary'])->name('send_itinerary');
    Route::post('/itinerary_send',['uses' => 'ItineraryController@send_email_itinerary'])->name('itinerary_send');
    Route::post('/itinerary_daily_save',['as' => 'itinerary_daily_save', 'uses' => 'ItineraryController@saveDailyItinerary']);
    Route::post('/itinerary_template_save',['as' => 'itinerary_template_save', 'uses' => 'ItineraryController@saveTemplateItinerary']);
    Route::post('/get_product_pricing_tag',['as' => 'get_product_pricing_tag', 'uses' => 'ItineraryController@get_product_pricing_tag']);
    Route::post('/get_product_pricing_and_tag',['as' => 'get_product_pricing_and_tag', 'uses' => 'ItineraryController@get_product_pricing_and_tag']);
    Route::post('/check_itinerary_product_season',['as' => 'check_itinerary_product_season', 'uses' => 'ItineraryController@check_itinerary_product_season']);
    Route::get('/complete_itinerary/{itinerary_id}',['uses' => 'ItineraryController@complete_itinerary'])->name('complete_itinerary');
    Route::post('/itinerary_complete_with_budget',['as' => 'itinerary_complete_with_budget', 'uses' => 'ItineraryController@itinerary_complete_with_budget']);
    Route::post('/delete_template_itinerary',['as' => 'delete_template_itinerary', 'uses' => 'ItineraryController@delete_template_itinerary']);
    Route::post('/preview_template_itinerary',['as' => 'preview_template_itinerary', 'uses' => 'ItineraryController@preview_template_itinerary']);
    Route::post('/currency_converter',['as' => 'currency_converter', 'uses' => 'ItineraryController@currency_converter']);
    Route::get('/get/travel_showcase/{itinerary_id}', 'ItineraryController@show_itinerary');

    //Product
    Route::get('/product/add/{flag?}', 'ProductController@add_product')->name('product_add');
    Route::get('/product', 'ProductController@index')->name('product');
    Route::post('/product/detail', 'ProductController@product_detail')->name('product_detail');

    Route::get('/product/add/{flag?}', 'ProductController@product_add')->name('product_add');
    Route::get('/product/edit/{product_id?}', 'ProductController@product_edit')->name('product_edit');
    Route::get('/product/delete/{product_id?}', 'ProductController@product_delete')->name('product_delete');
    // Route::post('/product/city', 'ProductController@get_city')->name('product.city');
    Route::post('/product/tag', 'ProductController@get_tag')->name('product.tag');
    Route::post('/product/save', 'ProductController@product_save')->name('product_save');

    Route::post('/product/description', 'ProductController@product_description')->name('product_description');
    Route::post('/product/gallery/upload', 'ProductController@upload_gallery')->name('upload_gallery');
    Route::post('/product/gallery/delete', 'ProductController@delete_gallery')->name('delete_gallery');
    Route::post('/product/pricing', 'ProductController@product_pricing')->name('product_pricing');

    //Setting
    Route::get('/settings', 'SettingController@index')->name('setting');
    Route::get('/settings/tags/{flag?}', 'SettingController@tags')->name('tags');
    Route::get('/settings/customer/', 'SettingController@customer')->name('customer');

    /**account_type */
    Route::get('/settings/detail_account_type/{account_type_id?}', 'SettingController@detail_account_type')->name('detail_account_type');
    Route::post('/settings/save_account_type', 'SettingController@save_account_type')->name('save_account_type');
    Route::post('/settings/account_type_del',['uses' => 'SettingController@account_type_del'])->name('account_type_del');

    /**task_type */
    Route::get('/settings/detail_task_type/{task_type_id?}', 'SettingController@detail_task_type')->name('detail_task_type');
    Route::post('/settings/save_task_type', 'SettingController@save_task_type')->name('save_task_type');
    Route::post('/settings/task_type_del',['uses' => 'SettingController@task_type_del'])->name('task_type_del');

    /**currency */
    Route::get('/settings/detail_currency/{currency_id?}', 'SettingController@detail_currency')->name('detail_currency');
    Route::post('/settings/save_currency', 'SettingController@save_currency')->name('save_currency');
    Route::post('/settings/currency_del',['uses' => 'SettingController@currency_del'])->name('currency_del');

    /**customer */
    Route::get('/settings/detail_customer/{customer_id?}', 'SettingController@detail_customer')->name('detail_customer');
    Route::post('/settings/save_customer', 'SettingController@save_customer')->name('save_customer');
    Route::post('/settings/customer_del',['uses' => 'SettingController@customer_del'])->name('customer_del');

    /**language */
    Route::get('/settings/detail_language/{language_id?}', 'SettingController@detail_language')->name('detail_language');
    Route::post('/settings/save_language', 'SettingController@save_language')->name('save_language');
    Route::post('/settings/language_del',['uses' => 'SettingController@language_del'])->name('language_del');

    /**category */
    Route::get('/settings/detail_category/{category_id?}', 'SettingController@detail_category')->name('detail_category');
    Route::post('/settings/save_category', 'SettingController@save_category')->name('save_category');
    Route::post('/settings/category_del',['uses' => 'SettingController@category_del'])->name('category_del');

    /**category_tag */
    Route::get('/settings/detail_category_tag/{category_tag_id?}', 'SettingController@detail_category_tag')->name('detail_category_tag');
    Route::post('/settings/save_category_tag', 'SettingController@save_category_tag')->name('save_category_tag');
    Route::post('/settings/category_tag_del',['uses' => 'SettingController@category_tag_del'])->name('category_tag_del');

     /** default_settings */
     Route::post('/settings/save_default_settings',['uses' => 'SettingController@save_default_settings'])->name('save_default_settings');


});
