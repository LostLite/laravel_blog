<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Home\AboutController;
use App\Http\Controllers\Home\HomeSliderController;

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
    return view('frontend.index');
});

Route::get('/dashboard', function () {
    return view('admin.index');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(AdminController::class)->group(function(){
        Route::name('admin.')->group(function(){

            Route::get('admin/profile', 'profile')->name('profile');
            Route::get('admin/edit/profile', 'edit_profile')->name('edit_profile');
            Route::post('admin/store/profile', 'store_profile')->name('store_profile');
            Route::get('admin/change-password', 'change_password')->name('change_password');
            Route::post('admin/change-password', 'update_password')->name('update_password');

        });
    });

    Route::controller(HomeSliderController::class)->group(function(){
        Route::name('home.')->group(function(){
            Route::get('home/slide', 'HomeSlider')->name('slide');
            Route::post('home/slide', 'UpdateSlider')->name('slide.update');
        });
    });

    Route::controller(AboutController::class)->group(function(){
        Route::get('/about/page', 'AboutPage')->name('about.page');
        Route::post('/about/page', 'UpdateAboutPage')->name('update.about');
        Route::get('/about', 'HomeAbout')->name('home.about');
    });
    
});


require __DIR__.'/auth.php';
