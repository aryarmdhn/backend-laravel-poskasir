<?php

use App\Models\User;
use App\Models\Product;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TransaksiController;

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
Route::get('/', function () {
    return view('pages.auth.login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('home', function () {
        $staff = User::where('role', 'staff')->get();
        $admin = User::where('role', 'admin')->get();
        $product = Product::count();
        return view('pages.dashboard', [
            'staff' => $staff,
            'admin' => $admin,
            'product' => $product,
        ]);
    })->name('home');

    // hanya untuk admin
    Route::middleware([CheckRole::class . ':admin'])->group(function () {
        Route::resource('users', UserController::class);
        Route::resource('products', ProductController::class);
        Route::resource('categories', CategoryController::class);

        // diskon
        Route::get('setdiskon', [DiskonController::class, 'index'])->name('setdiskon.index');
        Route::post('/setdiskon/update/{id}', [DiskonController::class, 'update'])->name('setdiskon.update');
    });

    // untuk staff
    Route::middleware([CheckRole::class . ':staff,admin'])->group(function () {
        // setting profile
        Route::get('profile', [UserController::class, 'profile'])->name('pages.profile');
        Route::post('/profile/updateprofile/{id}', [UserController::class, 'updateProfile'])->name('pages.profile.update');

        
       // transaksi
        Route::get('transaksi', [TransaksiController::class, 'index'])->name('pages.transaksi.index');
        Route::get('/transaksi/create', [TransaksiController::class, 'create'])->name('pages.transaksi.create');
        Route::post('/transaksi/store', [TransaksiController::class, 'store'])->name('pages.transaksi.store');

    });
});
