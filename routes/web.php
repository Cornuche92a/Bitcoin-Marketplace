<?php


use Illuminate\Support\Facades\Route;
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


//MainPage
Route::get('/', function () {
    return redirect('/login');
});

/**Route::get('/login','HomeController@index')->name('login');*/
Route::get('/register','HomeController@register')->name('register');


// Dashboard
Route::get('/dashboard','HomeController@dashboard')->name('dashboard')->middleware('auth');
Route::get('/notification/{id}','notifications@index')->name('notifications')->middleware('auth');
Route::get('/profile','ProfileController@index')->name('profile')->middleware('auth');
Route::post('/profile/changeprofile','ProfileController@general')->name('profile.changeprofile')->middleware('auth');
Route::post('/profile/changepassword','ProfileController@password')->name('profile.changepassword')->middleware('auth');
Route::get('/profile/changeprofile', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');
Route::get('/profile/changepassword', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');

// FAQ
Route::get('/faq','HomeController@faq')->name('faq')->middleware('auth');


//News
Route::post('/news/add','NewsController@add')->name('news.add')->middleware('auth');
Route::post('/news/delete','NewsController@delete')->name('news.delete')->middleware('auth');

//Chat support
Route::get('/support','Support@index')->name('support')->middleware('auth');
Route::post('/support/submit', 'Support@submit')->name('support.send')->middleware('auth');
Route::post('/support/show', 'Support@show')->name('support.show')->middleware('auth');
Route::post('/support/reply', 'Support@reply')->name('support.reply')->middleware('auth');
Route::get('/support/submit', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');
Route::get('/support/show', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');
Route::get('/support/submit', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');
Route::get('/support/admin', 'SupportAdmin@index')->name('supportadmin.index')->middleware('auth');
Route::post('/support/admin/show', 'SupportAdmin@show')->name('supportadmin.show')->middleware('auth');
Route::post('/support/admin/action', 'SupportAdmin@action')->name('supportadmin.action')->middleware('auth');
Route::get('/support/admin/show', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');
Route::get('/support/admin/action', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');


//Products
Route::get('/cart/{categoryname}/{name}', 'ShopController@show')->name('products.show')->middleware('auth');
Route::get('/shop/view/{type}','ShopController@showcategory')->name('products.type')->middleware('auth');
Route::get('/shop/{categoryname}','ShopController@index')->name('products.index')->middleware('auth');

//Payment
Route::get('/add_funds','PaymentController@index')->name('payment.addfunds')->middleware('auth');
Route::post('/add_funds/getnewaddress','PaymentController@getaddr')->name('payment.getaddr')->middleware('auth');
Route::get('/add_funds/getnewaddress', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');
Route::get('/add_funds/success','HomeController@AddingFundsSuccess')->name('payment.success')->middleware('auth');
Route::get('/add_funds/check','PaymentController@check')->name('payment.check')->middleware('auth');


//Orders
Route::get('/orders','HomeController@orders')->name('orders')->middleware('auth');

//PlaceOrder
Route::post('/placeorder','ShopController@placeorder')->name('placeorder')->middleware('auth');
Route::get('/placeorder', function () {
    return redirect()->to('/dashboard');
})->middleware('auth');


// Authenticate
Auth::routes();

//Logging Out
Route::get('/logout', function(){
    auth()->logout();
    Session()->flush();
    return Redirect::to('/login');
})->name('logout');


//Administration Page


Route::get('/home', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('home')->middleware('auth');





Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
