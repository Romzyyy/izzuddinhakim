<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\MyAcademiaController;
use App\Http\Controllers\MyBlogController;
use App\Http\Controllers\MyContentController;
use App\Http\Controllers\MyEventsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/test', function () {
    return response()->json(['message' => 'API is working']);
});

// Route::post('/create-blog', [MyBlogController::class, 'createMyBlog']);

// Route::post('/create-content', [MyContentController::class, 'createMycontent']);

// Route::post('/create-event', [MyEventsController::class, 'createMyEvents']);

// Route::post('/create-academia', [MyAcademiaController::class, 'createAcademia']);

// Route::post('/create-contact',  [ContactController::class, 'createContact']);
// Route::post('/create-contact',  function () {
//     return response()->json(['message' => 'API is working']);
// });