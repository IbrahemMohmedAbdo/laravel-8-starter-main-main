<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminMerchantsController;
use App\Http\Controllers\Operation\OperationMerchantsController;

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

Route::get('/', function () {
    return redirect(route('login'));
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth','authTwoFactor'])
    ->name('dashboard');

Route::resource('admin/merchants', AdminMerchantsController::class);
Route::resource('admin/operation', OperationMerchantsController::class);
Route::get('/export', [ExcelController::class, 'export'])->name('export');


require __DIR__ . '/auth.php';

