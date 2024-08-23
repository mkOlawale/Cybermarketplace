<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\homecontroller;
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

Route::get('/', [homecontroller::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/redirect', [homecontroller::class, 'redirect'])->middleware('auth', 'verified'); 

Route::get('/view_category', [admincontroller::class, 'viewCategory']);

Route::post('/add_category', [admincontroller::class, 'addCategory']);

Route::get('/delete_category/{id}', [admincontroller::class, 'DeleteCategory']);

Route::get('/view_products', [admincontroller::class, 'viewProducts']);

Route::post('/add_products', [admincontroller::class, 'addProducts']); 

Route::get('/show_product', [admincontroller::class, 'showProducts']);

Route::get('/delete_product/{id}', [admincontroller::class, 'deleteProducts']);

Route::get('/edit_product/{id}', [admincontroller::class, 'editProducts']);

Route::post('/update_products/{id}', [admincontroller::class, 'updateProducts']);

Route::get('/order', [admincontroller::class, 'order']);

Route::get('/delivered/{id}', [admincontroller::class, 'delivered']);

Route::get('/download_pdf/{id}', [admincontroller::class, 'pdf']);

Route::get('/send_email/{id}', [admincontroller::class, 'sendEmail']);

Route::post('/send_email_notification/{id}', [admincontroller::class, 'sendEmailNotification']);

Route::get('/search_route', [admincontroller::class, 'search']);


// home route start where admin route stop


Route::get('/product_details/{id}', [homecontroller::class, 'ProductsDetails']);

Route::post('/add_cart/{id}', [homecontroller::class, 'addCart']);

Route::get('/show_cart', [homecontroller::class, 'showCart']);

Route::get('/remove_cart/{id}', [homecontroller::class, 'DeleteCart']);

Route::get('/cash_delivery', [homecontroller::class, 'cashDelivery']);

Route::get('/stripe/{totalprice}', [homecontroller::class, 'stripe']);

Route::post('stripe/{totalprice}', [homecontroller::class, 'stripePost'])->name('stripe.post');

Route::get('/order_cancel', [homecontroller::class, 'cancelOrder']);

Route::get('/cancel_order/{id}', [homecontroller::class, 'cancelOrderBtn']);

Route::post('/add_comments', [homecontroller::class, 'addComment']);

Route::post('/add_reply', [homecontroller::class, 'replyComments']);
