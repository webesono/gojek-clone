<?php
use App\Models\Post;
use App\Models\Help;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryHelp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TambahAdminController;
use App\Http\Controllers\CategoryHelpController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\DashboardHelpController;
use Cviebrock\EloquentSluggable\Services\SlugService;


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
    return view('home', [
        "title" => "Home"
    ]);
});


Route::get('/about', function () {
    return view('about', [
        "title" => "About",
    ]);
});
//halaman help
Route::get('/help', [HelpController::class, 'index']);

//halaman blog
Route::get('/blog', [PostController::class, 'index']);

//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);

//halaman single help
Route::get('helps/{help:slug}', [HelpController::class, 'show']);

//halaman posts single kategori
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);

//halaman posts single kategori help
Route::get('/categoryhelps/{categoryHelp:slug}', [CategoryHelpController::class, 'show']);

//halaman posts single user
Route::get('author/{author:username}', function (User $author) {
    return view('posts',[
        'title' => "Post by : $author->name",
        'posts' => $author->posts->load('category','author'),
    ]);
});

Route::get('/searchHelp/', [HelpController::class,'searchHelp'])->name('searchHelp');

Route::get('/search/', [PostController::class,'search'])->name('search');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/tambahadmin', [TambahAdminController::class, 'index'])->middleware('guest');

Route::post('/tambahadmin', [TambahAdminController::class, 'store']);

Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::get('check_slug', function () {
    $slug = SlugService::createSlug(Post::class, 'slug', request('title'));
    return response()->json(['slug' => $slug]);
});
Route::get('cek_slug', function () {
    $slug1 = SlugService::createSlug(Help::class, 'slug', request('title'));
    return response()->json(['slug' => $slug1]);
});
Route::resource('/dashboard/allposts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/allhelps', DashboardHelpController::class)->middleware('auth');