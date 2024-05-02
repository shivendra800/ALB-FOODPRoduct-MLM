<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
 
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

// Route::get('/', function () {
//     return view('front_home');
// });


Route::get('/about', function () {
    return view('layouts.about'); });

    Route::get('/policy', function () {
        return view('layouts.policy'); });
        
        Route::get('/cancellation-refund-policy', function () {
            return view('layouts.cancellation_refund_policy'); });
Route::get('/term-condition', function () {
                return view('layouts.term_condition'); });

Route::get('/','App\Http\Controllers\FrontController@index');
Route::get('/All-Category','App\Http\Controllers\FrontController@all_category');
Route::get('/contact','App\Http\Controllers\FrontController@contact');
Route::get('/All-Category/{slug}','App\Http\Controllers\FrontController@category_product');
Route::get('/Product-detail/{id}','App\Http\Controllers\FrontController@productdetails');
Route::post('/add_to_cart','App\Http\Controllers\CartController@add_to_cart');
Route::get('/load-cart-count','App\Http\Controllers\CartController@cartcount');
Route::get('/load-wishlist-count','App\Http\Controllers\CartController@wishlistcount');
Route::post('/add_to_wishlist','App\Http\Controllers\CartController@addtowishlist');
Route::post('/delete_cart_item','App\Http\Controllers\CartController@deleteproduct');
Route::post('/update_cart','App\Http\Controllers\CartController@updatecart');
Route::post('delete_wishlist_item','App\Http\Controllers\CartController@deletewishlistitem');
Route::middleware(['auth'])->group(function (){
    Route::get('cart','App\Http\Controllers\CartController@viewcart');
   
    Route::get('checkout','App\Http\Controllers\Checkoutcontroller@checkout');
    Route::post('place-order','App\Http\Controllers\Checkoutcontroller@placeorder');
    // api for get city state wise onchange
    Route::get('Getcity-state-wise/{id}','App\Http\Controllers\Checkoutcontroller@getcitystatewise');
    // ---
    Route::get('wishlist','App\Http\Controllers\CartController@viewwishlist');
    Route::post('proceed-to-pay','App\Http\Controllers\Checkoutcontroller@razorpaycheck');
    Route::get('my-order','App\Http\Controllers\FrontController@my_order');
    Route::get('view-order-details/{id}','App\Http\Controllers\FrontController@view_order_details');

    Route::post('add-rating','App\Http\Controllers\RatingController@add_rating');

    Route::get('add-review/{id}','App\Http\Controllers\ReviewController@add');
    Route::post('add-review','App\Http\Controllers\ReviewController@submit');
    Route::get('edit-review/{id}','App\Http\Controllers\ReviewController@edit');
    Route::post('update-review','App\Http\Controllers\ReviewController@update');

     //user level income ---
     Route::get('my-profile','App\Http\Controllers\UserProfileController@uerprofile');
     Route::get('tree-view','App\Http\Controllers\UserProfileController@index');
     Route::get('User-Level-Transection','App\Http\Controllers\UserProfileController@LevelTransectionHistory');
     Route::get('User-wallet','App\Http\Controllers\UserProfileController@Userwallet');
     Route::post('withdrwal-wallet-amount','App\Http\Controllers\UserProfileController@WithdrwalWalletAmount');
     
     Route::get('withdraw','App\Http\Controllers\UserProfileController@withdraw');
     Route::post('withdraw-request-send','App\Http\Controllers\UserProfileController@withdrawrequestsend');
     
     Route::get('apprvel-list','App\Http\Controllers\UserProfileController@apprvelList');
     
     Route::get('download-invoice/{id}','App\Http\Controllers\UserProfileController@downloadinvoice');



     Route::post('checksponser_id','App\Http\Controllers\Checkoutcontroller@checksponserid');
     //end
 

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth','isAdmin'])->group(function (){
  
    Route::get('/dashboard','App\Http\Controllers\Admin\DashboardController@dashboard');
    Route::get('/Stock-Orverview-Report-Excel','App\Http\Controllers\Admin\DashboardController@stock_orverview_report_excel');

    Route::get('/Category','App\Http\Controllers\Admin\CategoryController@index');
    Route::get('/Add-Category','App\Http\Controllers\Admin\CategoryController@create');
    Route::post('/Add-Category','App\Http\Controllers\Admin\CategoryController@store');
    Route::get('/Edit-Category/{id}','App\Http\Controllers\Admin\CategoryController@edit');
    Route::post('/Edit-Category/{id}','App\Http\Controllers\Admin\CategoryController@update');
    Route::get('/Delete-Category/{id}','App\Http\Controllers\Admin\CategoryController@destroy');

    Route::get('/Product','App\Http\Controllers\Admin\ProductController@index');
    Route::get('/Add-Product','App\Http\Controllers\Admin\ProductController@create');
    Route::post('/Add-Product','App\Http\Controllers\Admin\ProductController@store');
    Route::get('/Edit-Product/{id}','App\Http\Controllers\Admin\ProductController@edit');
    Route::post('/Edit-Product/{id}','App\Http\Controllers\Admin\ProductController@update');
    Route::get('/Delete-Product/{id}','App\Http\Controllers\Admin\ProductController@destroy');
    
    Route::match(['get','post'],'stock-Update','App\Http\Controllers\Admin\ProductController@stockUpdate');
    Route::get('stockUpdate-history','App\Http\Controllers\Admin\ProductController@stockUpdatehistory');
    
    
    Route::get('/Pending-orders','App\Http\Controllers\Admin\OrderController@pending_orders');
    Route::post('/Pending-orders','App\Http\Controllers\Admin\OrderController@pending_orders_search');
    Route::get('/Pending-order-Report-Excel/{start_date}/{end_date}/{payment_status}','App\Http\Controllers\Admin\OrderController@pending_order_report_excel');

    Route::get('/Dispatched-orders','App\Http\Controllers\Admin\OrderController@dispatched_orders');
    Route::post('/Dispatched-orders','App\Http\Controllers\Admin\OrderController@dispatched_orders_search');
    Route::get('/Dispatched-orders-Report-Excel/{start_date}/{end_date}/{payment_status}','App\Http\Controllers\Admin\OrderController@dispatched_orders_report_excel');

    Route::get('/Shipped-orders','App\Http\Controllers\Admin\OrderController@shipped_orders');
    Route::post('/Shipped-orders','App\Http\Controllers\Admin\OrderController@shipped_orders_search');
    Route::get('/Shipped-orders-Report-Excel/{start_date}/{end_date}/{payment_status}','App\Http\Controllers\Admin\OrderController@shipped_orders_report_excel');

    Route::get('/OutForDelivery-orders','App\Http\Controllers\Admin\OrderController@out_for_delivery_orders');
    Route::post('/OutForDelivery-orders','App\Http\Controllers\Admin\OrderController@out_for_delivery_orderss_search');
    Route::get('/OutForDelivery-orders-Report-Excel/{start_date}/{end_date}/{payment_status}','App\Http\Controllers\Admin\OrderController@out_for_delivery_report_excel');

    Route::get('/Delivered-orders','App\Http\Controllers\Admin\OrderController@delivered_orders');
    Route::post('/Delivered-orders','App\Http\Controllers\Admin\OrderController@delivered_orders_search');
    Route::get('/Delivered-orders-Report-Excel/{start_date}/{end_date}/{payment_status}','App\Http\Controllers\Admin\OrderController@delivered_orders_report_excel');
    
     Route::get('/invoice-bill/{id}','App\Http\Controllers\Admin\OrderController@InvoiceBill');

    Route::get('admin/view-order/{id}','App\Http\Controllers\Admin\OrderController@view_order');
    Route::put('update-order/{id}','App\Http\Controllers\Admin\OrderController@updateorder');

    Route::get('users','App\Http\Controllers\Admin\DashboardController@users');
    Route::get('view-users/{id}','App\Http\Controllers\Admin\DashboardController@viewusers');
        Route::get('view-userwise-withdrawl/{id}','App\Http\Controllers\Admin\DashboardController@viewuserwisewithdrawl');

    Route::get('vendors','App\Http\Controllers\Admin\VendorController@index');
    Route::match(['get','post'],'add-edit-vendor/{id?}','App\Http\Controllers\Admin\VendorController@AddEditVendor');

    Route::get('/Purchase-Stock','App\Http\Controllers\Admin\PurchaseOrderController@index');
    Route::post('/Purchase-Stock','App\Http\Controllers\Admin\PurchaseOrderController@indexsearch');
    Route::get('/Purchase-Stock-Report-Excel/{start_date}/{end_date}/{vendor_id}','App\Http\Controllers\Admin\PurchaseOrderController@purchase_Stock_report_excel');
    Route::get('/Add-Purchase-Order','App\Http\Controllers\Admin\PurchaseOrderController@create');
    Route::post('/Add-Purchase-Order','App\Http\Controllers\Admin\PurchaseOrderController@store');
    Route::get('/Edit-Purchase-Order/{id}','App\Http\Controllers\Admin\PurchaseOrderController@edit');
    Route::post('/Edit-Purchase-Order/{id}','App\Http\Controllers\Admin\PurchaseOrderController@update');
    Route::get('/Delete-Purchase-Order/{id}','App\Http\Controllers\Admin\PurchaseOrderController@destroy');

    Route::get('/Purchase-History','App\Http\Controllers\Admin\PurchaseOrderController@purchase_history');
    Route::post('/Purchase-History','App\Http\Controllers\Admin\PurchaseOrderController@purchase_historysearch');
    Route::get('/Purchase-history-details/{vendor_id}','App\Http\Controllers\Admin\PurchaseOrderController@purchase_history_details');
    Route::post('/Purchase-history-details/{vendor_id}','App\Http\Controllers\Admin\PurchaseOrderController@purchase_history_detailssearch');
    Route::get('/view-all-product/{invoice_id}','App\Http\Controllers\Admin\PurchaseOrderController@view_all_product');

    Route::get('/Purchase-Bill-Update','App\Http\Controllers\Admin\PurchaseOrderController@purchase_bill_update');
    Route::get('/Stock','App\Http\Controllers\Admin\PurchaseOrderController@Stock');
    Route::get('/Purchase-Bill-Update/{vendor_id}','App\Http\Controllers\Admin\PurchaseOrderController@purchase_bill_update_view');
    Route::post('/Purchase-Bill-Update-Save/{vendor_id}','App\Http\Controllers\Admin\PurchaseOrderController@purchase_bill_update_save');

    Route::get('/Delivery-Men','App\Http\Controllers\Admin\DeliveryController@index');
    Route::get('/Add-Delivery-Men','App\Http\Controllers\Admin\DeliveryController@create');
    Route::post('/Add-Delivery-Men','App\Http\Controllers\Admin\DeliveryController@store');
    Route::get('/Edit-Delivery-Men/{id}','App\Http\Controllers\Admin\DeliveryController@edit');
    Route::post('/Edit-Delivery-Men/{id}','App\Http\Controllers\Admin\DeliveryController@update');
    Route::get('/Delete-Delivery-Men/{id}','App\Http\Controllers\Admin\DeliveryController@destroy');
    Route::match(['get','post'],'/Assign-pincode/{id}','App\Http\Controllers\Admin\DeliveryController@AssignPincode');
    Route::post( 'assign-pincode-update/{id}','App\Http\Controllers\Admin\DeliveryController@AssignPincodeUpdate');
    
    
    Route::get('/Delivery-MenList','App\Http\Controllers\Admin\DeliveryController@Deliverymenlist');
    Route::get('/Delivery-orderList/{id}','App\Http\Controllers\Admin\DeliveryController@Deliveryorderlist');

    Route::post('/cash-collection/{id}','App\Http\Controllers\Admin\DeliveryController@CashCollectionUpdate');
    Route::get('/cash-collection-histroy/{id}','App\Http\Controllers\Admin\DeliveryController@CashCollectionHistroy');



    // api get location --
    Route::post('/get-location','App\Http\Controllers\Admin\DeliveryController@get_location');

     // api get delivery boy pincode code wise --
     Route::get('/Get-delivery-boy/{pincode}','App\Http\Controllers\Admin\OrderController@get_delivery_boy');


    // api--- get vendor wise previous balance---    
    Route::get('/vendor_wise_previous_balance/{vendorid}','App\Http\Controllers\Admin\PurchaseOrderController@vendor_wise_previous_balance');
    
    // delivery boy dashboard
    Route::get('/DeliveryBoy-Dashboard','App\Http\Controllers\Admin\DeliveryBoyDashboardController@dashboard');


     //admin view tree
     Route::get('withdraw-request','App\Http\Controllers\Admin\TreeController@withdrawrequest');
     Route::get('withdraw-Approverequest','App\Http\Controllers\Admin\TreeController@withdrawApproverequest');
     Route::match(['get','post'],'update-withdraw-request/{id}','App\Http\Controllers\Admin\TreeController@updatewithdrawrequest');
     Route::get('view-tree','App\Http\Controllers\Admin\TreeController@viewtree');
     Route::get('Level-Transection','App\Http\Controllers\Admin\LevelTransectionController@LevelTransectionHistory');
     Route::get('AdminAll-Transection','App\Http\Controllers\Admin\LevelTransectionController@AdminAllTransectionHistory');

     Route::get('user-account-details/{id}','App\Http\Controllers\Admin\TreeController@AccountDetailsUserPdf');
    
});



