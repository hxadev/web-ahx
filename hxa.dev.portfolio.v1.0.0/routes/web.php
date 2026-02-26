<?php

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProjectController;
use App\Models\Phrase;
use App\Models\Project;

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

/**
 * ROUTES ROOT
 */
Route::get("/", function () {
    return Redirect::to("main");
});

Route::get('main', [PrincipalController::class, 'index']);

/**
 * ROUTES LOCALE
 */
Route::get("locale/{locale}", function ($locale) {
    \Session::put("locale", $locale);
    return redirect()->back();
});

/**
 * ROUTES PORTFOLIO
 */
Route::get("project", function () {
    return Redirect::to("main");
});
Route::get("project/{id}", [ProjectController::class, "index"]);
