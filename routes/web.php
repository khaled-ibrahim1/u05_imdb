<?php

use App\Http\Controllers\AdminCommentController;
use App\Http\Controllers\AdminMovieController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\MlistController;
use App\Http\Controllers\MlistMovieController;
use App\Http\Controllers\MovieCommentsController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\WatchlistController;
use App\Models\Category;
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

Route::get("/", [MovieController::class, "index"])->name("home");
Route::get("/movies/{movie:slug}", [MovieController::class, "show"]);

// Comments
Route::post("/movies/{movie:slug}/comments", [MovieCommentsController::class, "store",])->middleware("auth");

// Admin Comments
Route::get("/admin/dashboard/comments", [AdminCommentController::class, "index",])->middleware("admin");
Route::post("/admin/dashboard/comments", [AdminCommentController::class, "store",])->middleware("admin");
Route::patch("/admin/dashboard/comments/{comment}", [AdminCommentController::class, "approval",])->middleware("admin");
Route::delete("/admin/dashboard/comments/{comment}", [AdminCommentController::class, "destroy",])->middleware("admin");

// Register
Route::get("/register", [RegisterController::class, "create"])->middleware("guest");
Route::post("/register", [RegisterController::class, "store"])->middleware("guest");

// Login and logout
Route::get("/login", [SessionsController::class, "create"])->middleware("guest")->name("login");
Route::post("/sessions", [SessionsController::class, "store"])->middleware("guest");
Route::post("logout", [SessionsController::class, "destroy"])->middleware("auth");

// Watchlist
Route::post("/movie/{movie:slug}/add", [WatchlistController::class, "store",])->middleware("auth");
Route::get("/watchlist", [WatchlistController::class, "show"])->middleware("auth");
Route::delete("/movie/watchlist/delete", [WatchlistController::class, "destroy",])->middleware("auth");

// Admin Movies
Route::get("/admin/dashboard", [SessionsController::class, "authAdmin",])->middleware("admin", "auth");
Route::post("/admin/dashboard/movies", [AdminMovieController::class, "store",])->middleware("admin");
Route::get("/admin/dashboard/movies/create", [AdminMovieController::class, "create",])->middleware("admin");
Route::get("/admin/dashboard/movies", [AdminMovieController::class, "index",])->middleware("admin");
Route::get("/admin/dashboard/movies/{movie}/edit", [AdminMovieController::class, "edit",])->middleware("admin");
Route::delete("/admin/dashboard/movies/{movie}", [AdminMovieController::class, "destroy",])->middleware("admin");
Route::match(["patch", "get"], "/admin/dashboard/movies/{movie}", [AdminMovieController::class, "update",])->middleware("admin");

// Admin Users
Route::get("/admin/dashboard/users", [AdminUserController::class, "index",])->middleware("admin");
Route::get("/admin/dashboard/users/{user}/edit", [AdminUserController::class, "edit",])->middleware("admin");
Route::post("/admin/dashboard/users", [AdminUserController::class, "store",])->middleware("admin");
Route::get("/admin/dashboard/users/create", [AdminUserController::class, "create",])->middleware("admin");
Route::delete("/admin/dashboard/users/{user}", [AdminUserController::class, "destroy",])->middleware("admin");
Route::match(["patch", "get"], "/admin/dashboard/users/{user}", [AdminUserController::class, "update",])->middleware("admin");

// Movie Lists
Route::get("/lists/settings", [MlistController::class, "index",])->middleware("auth");
Route::get("/lists", [MlistController::class, "show"])->middleware("auth");
Route::get("lists/settings/create", [MlistController::class, "create",])->middleware("auth");
Route::post("/lists/settings/create", [MlistController::class, "store",])->middleware("auth");
Route::get("/lists/settings/{list}/edit", [MlistController::class, "edit",])->middleware("auth");
Route::patch("/lists/settings/{list}/update", [MlistController::class, "update",])->middleware("auth");
Route::get("/lists/settings/{list}", [MlistController::class, "update",])->middleware("auth");
Route::delete("/lists/settings/{list}", [MlistController::class, "destroy",])->middleware("auth");

// List and Movie connection
Route::post("/lists/{movie:slug}/add", [MlistMovieController::class, "store",])->middleware("auth");
Route::delete("/lists/delete", [MlistMovieController::class, "destroy",])->middleware("auth");
