<?php

use App\Models\News;
use App\Events\NewsHidden;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/news/create-test', function () {
    $news = new News();

    $news->title = 'Test2 news title';
    $news->body = 'Test2 news body';

    $news->save();
    return $news;
});

Route::get('/news/{id}/hide', function ($id) {
    $news = News::findOrFail($id);
    $news->hidden = true;
    $news->save();

    NewsHidden::dispatch($news);

    return 'News hidden';
});
