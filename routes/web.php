<?php


use App\Http\Controllers\Customers_Report;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoicesAttachmentsController;
use App\Http\Controllers\InvoiceAchiveController;
use App\Http\Controllers\InvoicesController;
use App\Http\Controllers\InvoicesDetailsController;
use App\Http\Controllers\InvoicesExportController;
use App\Http\Controllers\InvoicesPaidController;
use App\Http\Controllers\InvoicesPartialController;
use App\Http\Controllers\InvoicesReportController;
use App\Http\Controllers\InvoicesUnpaidController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\ProductsController;
use Illuminate\Http\Request;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Our resource routes
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
});
// Auth::routes(['register' => false]);
Route::get('/', function () {
    return view('Auth.login');
});
Auth::routes();



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('invoices', InvoicesController::class);
Route::resource('sections', SectionsController::class);
Route::resource('products', ProductsController::class);
Route::resource('invoices_paid', InvoicesPaidController::class);
Route::resource('invoices_unpaid', InvoicesUnpaidController::class);
Route::resource('InvoiceAttachments', InvoicesAttachmentsController::class);
Route::resource('invoices_Partial', InvoicesPartialController::class);
Route::resource('Archive', InvoiceAchiveController::class);
Route::resource('invoices_report', InvoicesReportController::class);
Route::resource('Customers_Report', Customers_Report::class);
// Route::get('export_invoices', InvoicesExportController::class);
Route::get('/{page}', [AdminController::class, 'index']);
Route::post('Search_customers', [Customers_Report::class, 'Search_customers']);
Route::get('/section/{id}', [InvoicesController::class, 'getproducts']);
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, 'edit']);
Route::get('/edit_invoice/{id}', [InvoicesController::class, 'edit']);
Route::get('Print_invoice/{id}', [InvoicesController::class, 'Print_invoice']);
// Route::get('ex', [InvoicesController::class, 'export']);
Route::get('ex', [InvoicesController::class, 'export'])->name('invoices.export');
Route::get('download/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'get_file']);
Route::get('View_file/{invoice_number}/{file_name}', [InvoicesDetailsController::class, 'open_file']);
Route::post('delete_file', [InvoicesDetailsController::class, 'destroy'])->name('delete_file');
Route::get('Status_show/{id}', [InvoicesController::class, 'show'])->name('Status_show');
Route::post('/Status_Update/{id}', [InvoicesController::class, 'Status_Update'])->name('Status_Update');
Route::get('/InvoicesDetails/{id}', [InvoicesDetailsController::class, 'edit']);
Route::post('Search_invoices', [InvoicesReportController::class, 'Search_invoices'])->name('search_invoices');
Route::get('MarkAsRead_all', [InvoicesController::class, 'MarkAsRead_all'])->name('MarkAsRead_all');
Route::get('unreadNotifications_count', [InvoicesController::class, 'unreadNotifications_count'])->name('unreadNotifications_count');
Route::get('unreadNotifications', [InvoicesController::class, 'unreadNotifications'])->name('unreadNotifications');
