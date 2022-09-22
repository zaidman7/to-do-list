<?php

use Illuminate\Support\Facades\Route;
use App\Models\Item;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileUpload;
use App\Http\Controllers\ScraperController;
use App\Http\Controllers\PostController;

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
    return view('all-items', [
        'items' => Item::get()->sortBy('deadline')
    ]);
});

Route::get('/items/{item}', function (Item $item) {
    return view('item', [
        'item' => $item
    ]);
});

Route::get('/add-item', [Controller::class, 'addPage']);
Route::post('/add', [Controller::class, 'add']);

Route::get('/update-progress/{item}', [Controller::class, 'updatePage']);
Route::post('/update/{item}', [Controller::class, 'update']);

Route::get('/change-deadline/{item}', [Controller::class, 'changeDeadlinePage']);
Route::post('/change-deadline/{item}', [Controller::class, 'changeDeadline']);

Route::get('/delete/{item}', [Controller::class, 'deletePage']);
Route::post('/delete/{item}', [Controller::class, 'delete']);

Route::get('/upload-file/{item}', [FileUpload::class, 'createForm']);
Route::post('/upload-file/{item}', [FileUpload::class, 'fileUpload']);


Route::get('/scraper', [ScraperController::class, 'scraper']);

Route::get('/testpost', [PostController::class, 'returnView']);
Route::post('/testpost', [PostController::class, 'post']);