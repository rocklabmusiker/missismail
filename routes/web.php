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
Route::group(['middleware' => 'web'], function() {
	// index
	Route::get('/', 'IndexController@index')->name('index');
	Route::post('/emailHeader/register', 'IndexController@inputForm')->name('emailHeader');
	Route::post('/', 'IndexController@formFromFooter');

	// tarifs
	Route::get('/tarif', 'TarifController@get')->name('tarif');
	// news
	Route::get('/tarif/news', 'NewsController@allNews')->name('allNews');
	Route::get('/tarif/news/{id}', 'NewsController@singleNews')->name('singleNews');
	//testimonials
	Route::get('/tarif/allTestimonials', 'TestimonialsController@allTestimonials')->name('allTestimonials');

	// shops
	Route::get('/shops', 'ShopsController@get')->name('shops');

	// impressum
	Route::get('/impressum', 'ImpressumController@get')->name('impressum');

	// datenSchutz
	Route::get('/datenSchutz', 'DatenSchutzController@get')->name('datenSchutz');

	// politicConf
	Route::get('/politicConf', 'PoliticConfController@get')->name('politicConf');

	// rules
	Route::get('/rules', 'RulesController@get')->name('rules');

	
	// User index
	Auth::routes();
	Route::get('/user', 'UserIndexController@index')->name('userIndex');
	Route::post('/user', 'UserIndexController@indexPost');
	Route::post('/register', 'Auth\RegisterController@register')->name('register');
});



	Route::get('/verifyemail/{token}', 'Auth\RegisterController@verify');

// User menu
Route::group(['prefix' => 'user'], function() {

	// userindex showAllorderWithHelp
	Route::get('/allOrderHelp', 'user\ShowAllOrderWithHelpController@get')->name('showAllOrderWithHelp');
	Route::delete('/allOrderHelp/{orderHelpId}', 'user\ShowAllOrderWithHelpController@delete')->name('OrderWithHelpDelete');

	// userindex showAllorderWithHelp
	Route::get('/allSelfOrder', 'user\ShowAllOrderSelfController@get')->name('showAllOrderSelf');


	// myProfile
	Route::get('/myProfile', 'user\UserMyProfileController@get')->name('userMyProfile');

	Route::get('/myProfile/edit', 'user\UserMyProfileController@show')->name('userMyProfileEdit');
	Route::put('/myProfile/edit', 'user\UserMyProfileController@edit');

	Route::get('/myProfile/changePassword', 'user\UserMyProfileController@changePasswordView')->name('userMyProfileChangePassword');
	Route::post('/myProfile/changePassword', 'user\UserMyProfileController@changePassword');

	Route::get('/myProfile/testimonials', 'user\UserMyProfileController@getTestimonials')->name('userMyProfileTestimonials');
	Route::post('/myProfile/testimonials', 'user\UserMyProfileController@sendTestimonials');

	// payment
	Route::get('payment', 'user\PaymentController@get')->name('payment');
	Route::post('payment/send', 'user\PaymentController@send')->name('paymentSend');

	// orderWithHelp
	Route::get('/orderWithHelp', 'user\OrderWithHelpController@get')->name('orderWithHelp');
	Route::post('/orderWithHelp', 'user\OrderWithHelpController@send');

	// orderSelf
	Route::get('/orderSelf', 'user\OrderSelfController@get')->name('orderSelf');
	Route::post('/orderSelf', 'user\OrderSelfController@send');

	// instruction
	Route::get('/instruction', 'user\InstructionController@get')->name('instruction');

});


// Admin
                           
Route::get('admin', 'Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('admin', 'Admin\LoginController@login');   
            
Route::post('admin-password/email', 'Admin\ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email'); 
Route::get('admin-password/reset', 'Admin\ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
Route::post('admin-password/reset', 'Admin\ResetPasswordController@reset');                    
Route::get('admin-password/reset/{token}', 'Admin\ResetPasswordController@showResetForm')->name('admin.password.reset');

Route::group(['prefix' => 'admin'], function() {

	Route::get('/home', 'AdminController@index')->name('adminHome');
	// testimonials
	Route::get('/ShowTestimonial/{id}', 'AdminController@adminIndexShowTestimonial')->name('adminIndexShowTestimonial');
	Route::put('/UpdateTestimonial/{id}', 'AdminController@adminIndexUpdateTestimonial')->name('adminIndexUpdateTestimonial');
	Route::delete('/DeleteTestimonial/{id}', 'AdminController@adminIndexDeleteTestimonial')->name('adminIndexDeleteTestimonial');


	// ===========Order with Help===========
	Route::get('/orderWithHelpNew', 'admin\AdminOrderWithHelpController@orderWithHelpNew')->name('adminOrderWithHelpNew');
	Route::get('/orderWithHelpInProcessing', 'admin\AdminOrderWithHelpController@orderWithHelpInProcessing')->name('adminOrderWithHelpInProcessing');
	Route::get('/orderWithHelpDone', 'admin\AdminOrderWithHelpController@orderWithHelpDone')->name('adminOrderWithHelpDone');
	Route::get('/orderWithHelpArchive', 'admin\AdminOrderWithHelpController@orderWithHelpArchive')->name('adminOrderWithHelpArchive');

	// user Profil order with Help
	Route::get('/userProfilOrderWithHelp/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelp')->name('adminUserProfilOrderWithHelp');
	// удалить заказ полностью
	Route::delete('/userProfilOrderWithHelp/DeleteOrder/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpDeleteOrder')->name('adminUserProfilOrderWithHelpDeleteOrder');
	// открыть доступ на покупки самому
	Route::put('/userProfilOrderWithHelp/AccessBuySelf/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpAccessBuySelf')->name('adminUserProfilOrderWithHelpAccessBuySelf');
	// update money
	Route::put('/userProfilOrderWithHelp/UpdateMoney/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpUpdateMoney')->name('adminUserProfilOrderWithHelpUpdateMoney');
	// update status
	Route::put('/userProfilOrderWithHelp/UpdateStatus/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpUpdateStatus')->name('adminUserProfilOrderWithHelpUpdateStatus');
	// memo
	Route::put('/userProfilOrderWithHelp/Memo/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpMemo')->name('adminUserProfilOrderWithHelpMemo');
	Route::delete('/userProfilOrderWithHelp/DeleteMemo/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpDeleteMemo')->name('adminUserProfilOrderWithHelpDeleteMemo');
	// emails
	Route::post('/userProfilOrderWithHelp/Email/{id}/{order}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpEmail')->name('adminUserProfilOrderWithHelpEmail');
	Route::get('/userProfilOrderWithHelp/ShowAdminMail/{id}/{order}/{id_mail}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpShowAdminMail')->name('adminUserProfilOrderWithHelpShowAdminMail');
	Route::delete('/userProfilOrderWithHelp/DeleteAdminMail/{id}/{order}/{id_mail}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpDeleteAdminMail')->name('adminUserProfilOrderWithHelpDeleteAdminMail');

	Route::get('/userProfilOrderWithHelp/ShowUserMail/{id}/{order}/{id_mail}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpShowUserMail')->name('adminUserProfilOrderWithHelpShowUserMail');
	Route::delete('/userProfilOrderWithHelp/DeleteUserMail/{id}/{order}/{id_mail}', 'admin\AdminOrderWithHelpController@userProfilOrderWithHelpDeleteUserMail')->name('adminUserProfilOrderWithHelpDeleteUserMail');




	// ===========Order Self===========
	Route::get('/orderSelfNew', 'admin\AdminOrderSelfController@orderSelfNew')->name('adminOrderSelfNew');
	Route::get('/orderSelfInProcessing', 'admin\AdminOrderSelfController@orderSelfInProcessing')->name('adminOrderSelfInProcessing');
	Route::get('/orderSelfDone', 'admin\AdminOrderSelfController@orderSelfDone')->name('adminOrderSelfDone');
	Route::get('/orderSelfArchive', 'admin\AdminOrderSelfController@orderSelfArchive')->name('adminOrderSelfArchive');

	// user Profil order with Help
	Route::get('/userProfilOrderSelf/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelf')->name('adminUserProfilOrderSelf');
	// удалить заказ полностью
	Route::delete('/userProfilOrderSelf/DeleteOrder/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelfDeleteOrder')->name('adminUserProfilOrderSelfDeleteOrder');
	// открыть доступ на покупки самому
	Route::put('/userProfilOrderSelf/AccessBuySelf/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelfAccessBuySelf')->name('adminUserProfilOrderSelfAccessBuySelf');
	// update money
	Route::put('/userProfilOrderSelf/UpdateMoney/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelfUpdateMoney')->name('adminUserProfilOrderSelfUpdateMoney');
	// update status
	Route::put('/userProfilOrderSelf/UpdateStatus/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelfUpdateStatus')->name('adminUserProfilOrderSelfUpdateStatus');
	// memo
	Route::put('/userProfilOrderSelf/Memo/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelfMemo')->name('adminUserProfilOrderSelfMemo');
	Route::delete('/userProfilOrderSelf/DeleteMemo/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelfDeleteMemo')->name('adminUserProfilOrderSelfDeleteMemo');
	// emails
	Route::post('/userProfilOrderSelf/Email/{id}/{order}', 'admin\AdminOrderSelfController@userProfilOrderSelfEmail')->name('adminUserProfilOrderSelfEmail');
	Route::get('/userProfilOrderSelf/ShowAdminMail/{id}/{order}/{id_mail}', 'admin\AdminOrderSelfController@userProfilOrderSelfShowAdminMail')->name('adminUserProfilOrderSelfShowAdminMail');
	Route::delete('/userProfilOrderSelf/DeleteAdminMail/{id}/{order}/{id_mail}', 'admin\AdminOrderSelfController@userProfilOrderSelfDeleteAdminMail')->name('adminUserProfilOrderSelfDeleteAdminMail');

	Route::get('/userProfilOrderSelf/ShowUserMail/{id}/{order}/{id_mail}', 'admin\AdminOrderSelfController@userProfilOrderSelfShowUserMail')->name('adminUserProfilOrderSelfShowUserMail');
	Route::delete('/userProfilOrderSelf/DeleteUserMail/{id}/{order}/{id_mail}', 'admin\AdminOrderSelfController@userProfilOrderSelfDeleteUserMail')->name('adminUserProfilOrderSelfDeleteUserMail');


	// edit news 
	Route::get('/newsEdit', 'admin\NewsEditController@show')->name('newsEditShow');
	Route::put('/newsCreate', 'admin\NewsEditController@create')->name('newsCreate');
	Route::delete('/newsDelete/{id}', 'admin\NewsEditController@delete')->name('newsDelete');

	// edit shop
	Route::get('/shopEdit', 'admin\ShopEditController@show')->name('shopEditShow');
	Route::put('/shopCreate', 'admin\ShopEditController@create')->name('shopCreate');
	Route::delete('/shopDelete/{id}', 'admin\ShopEditController@delete')->name('shopDelete');

});


  



	

