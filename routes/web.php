<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\MyAcademiaController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\MyEventsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SummaryController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', function () {
    return view('dashboard');
    })->name('dashboard');

Route::prefix('admin')->middleware(['auth', 'verified'])->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('contact', ContactController::class);

    Route::resource('blog', MyBlogController::class);

    Route::resource('academia', MyAcademiaController::class);

    Route::resource('event', MyEventsController::class);

    Route::resource('aboutme', SummaryController::class);

    Route::resource('education', EducationController::class);

    Route::resource('experience', ExperienceController::class);
});

require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/blog', [MyBlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [MyBlogController::class, 'show'])->name('blog.show');
Route::get('/blog/category/{slug}', [MyBlogController::class, 'category'])->name('blog.category');

Route::get('/event', [MyEventsController::class, 'index'])->name('event');
Route::get('/event/{slug}', [MyEventsController::class, 'show'])->name('event.show');

Route::get('/academia', [MyAcademiaController::class, 'index'])->name('academia');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');

route::post('/upload-image', [ImageUploadController::class, 'store'])->name('upload.image');