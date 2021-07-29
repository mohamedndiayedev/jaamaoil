<?php

use Illuminate\Support\Facades\Route;
use App\HttP\Controllers\testController;
use App\HttP\Controllers\listController;

use App\HttP\Controllers\downloadController;
use App\HttP\Controllers\VoucherController;
use App\HttP\Controllers\userController;
use App\HttP\Controllers\manageUsersController;


Route::get('/', function () {
    return view('landing-page');
});


Route::middleware(['auth'])->group(function(){

});


Route::get('/create-master-voucher', [listController::class, 'voucherNames']);

Route::get("/logout", [userController::class, 'logout']);

Route::get("/session-check", [userController::class, 'sessionCheck']);

Route::get("/vouchers-list", [VoucherController::class, 'listVouchers']);

Route::get("/customer-vouchers", [VoucherController::class, 'customerVouchers']);

Route::post("/vouchers-list", [VoucherController::class, 'searchVouchers']);

Route::post("/create-master-voucher", [VoucherController::class, 'createVoucher']);

Route::get("/download", [downloadController::class, 'downloadVouchers']);

Route::get("/individual", [downloadController::class, 'individualVoucher']);

Route::get('/login', function () {
    return view('login');
});

Route::post("/login", [userController::class, 'login']);

Route::get('/manage-customers', [manageUsersController::class, 'viewCustomers']);
Route::get('/manage-staffs', [manageUsersController::class, 'viewStaffs']);
Route::get('/manage-admins', [manageUsersController::class, 'viewAdmins']);


Route::get('/reg-customer', function () {
    return view('add-customer');
});
Route::get('/reg-staff', function () {
    return view('add-staff');
});
Route::get('/reg-admin', function () {
    return view('add-admin');
});
Route::post("/add-customer", [manageUsersController::class, 'addCustomer']);
Route::post("/add-staff", [manageUsersController::class, 'addStaff']);
Route::post("/add-admin", [manageUsersController::class, 'addAdmin']);
Route::post("/manage-staffs", [manageUsersController::class, 'removeUser']);
Route::post("/manage-admins", [manageUsersController::class, 'removeUser']);

Route::get('/check-voucher', [VoucherController::class, 'checkVoucher']);

Route::get('/redeem-voucher', [VoucherController::class, 'redeemVoucher']);

Route::get('/test', [testController::class, 'test']);



Route::get('/staff-home', [listController::class, 'staffVoucherList']);
Route::get('/customer-home', [listController::class, 'customerVoucherList']);
Route::get('/change-status', [listController::class, 'changeStatus']);
Route::get('/scan-me', function () {
    return view('scanner');
});

Route::get('/profile', function () {
    return view('profile');
});
Route::post("/profile", [manageUsersController::class, 'changePassword']);


Route::get('/profile-staff', function () {
    return view('prof-staff');
});
Route::post("/profile-staff", [manageUsersController::class, 'changePassword']);


Route::get('/profile-customer', function () {
    return view('prof-customer');
});
Route::post("/profile-customer", [manageUsersController::class, 'changePassword']);
