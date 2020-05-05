<?php

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

//GitHubログイン（ボタンのリンク先）
Route::get('user/github','\App\Http\Controllers\GithubAuthController@redirectToProvider');

//認証後の戻りURL
Route::get('login/github/callback','\App\Http\Controllers\GithubAuthController@handleProviderCallback');
