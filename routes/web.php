<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardEventController;

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


// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home",
        "name" => "Bob",
        "email" => "Bob@gmail.com"
    ]);
});
Route::get('/about', function () {
    return view("about", [
        "title" => "About",
        "active" => "about",
    ]);
});


Route::get('/events', [EventController::class, "index"]);
// Halaman single event
Route::get("events/{event:slug}", [EventController::class, "show"]);

Route::get('/categories', function () {
    return view("categories", [
        "title" => "Event Categories",
        "active" => "categories",
        "categories" => Category::all()
    ]);
});

// Route::get('/authors/{author:username}', function (User $author) {
//     return view("events", [
//         "title" => "Event By Author : $author->name",
//         "active" => "categories",
//         "events" => $author->events->load("author", "category"),
//     ]);
// });


Route::get('/login', [LoginController::class, "index"])->name("login")->middleware("guest");
Route::post('/login', [LoginController::class, "authenticate"]);
Route::post('/logout', [LoginController::class, "logout"]);


Route::get('/register', [RegisterController::class, "index"])->middleware("guest");
Route::post('/register', [RegisterController::class, "store"]);


Route::get('/dashboard', function () {
    return view("dashboard.index");
})->middleware("auth");

Route::get("/dashboard/events/checkSlug", [DashboardEventController::class, "checkSlug"])->middleware("auth");
Route::resource('/dashboard/events', DashboardEventController::class)->middleware("auth");

Route::get("/dashboard/categories/checkSlug", [AdminCategoryController::class, "checkSlug"])->middleware("admin");
Route::resource("/dashboard/categories", AdminCategoryController::class)->except("show")->middleware("admin");
