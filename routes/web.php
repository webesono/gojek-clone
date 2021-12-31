<?php
use App\Models\Help;
use App\Models\Post;
use App\Models\User;
use App\Models\Leader;
use App\Models\Product;
use App\Models\Category;
use App\Models\CategoryHelp;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HelpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LeaderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TambahAdminController;
use App\Http\Controllers\CategoryHelpController;

use App\Http\Controllers\DashboardHelpController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardLeaderController;
use App\Http\Controllers\DashboardProfilController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\DashboardCategoryController;
use Cviebrock\EloquentSluggable\Services\SlugService;
use App\Http\Controllers\DashboardCategoryHelpController;






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

// ROUTES WEB USER 

//HOME
Route::get('/', [HomeController::class, 'index']);


//HELP
Route::get('/help', [HelpController::class, 'index']);
//halaman single help
Route::get('helps/{help:slug}', [HelpController::class, 'show']);
//halaman posts single kategori help
Route::get('/categoryhelps/{categoryHelp:slug}', [CategoryHelpController::class, 'show']);


//BLOG
Route::get('/blog', [PostController::class, 'index']);
//halaman single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);
//halaman posts single kategori
Route::get('/categories/{category:slug}', [CategoryController::class, 'show']);
//halaman posts single user
Route::get('author/{author:username}', function (User $author) {
    return view('posts',[
        'title' => "Post by : $author->name",
        'posts' => $author->posts->load('category','author'),
    ]);
});

//PRODUCT
Route::get('/products', [ProductController::class, 'index']);
Route::get('/product/{product:id}', [ProductController::class, 'show']);

//halaman leaders
Route::get('/leader', [LeaderController::class, 'index']);

// END ROUTES WEB USER

// ROUTES SEARCH

Route::get('/searchHelp/', [HelpController::class,'searchHelp'])->name('searchHelp');
Route::get('/search/', [PostController::class,'search'])->name('search');
Route::get('/searchProduct/', [ProductController::class,'searchProduct'])->name('searchProduct');


Route::get('/dasearchPost/', [DashboardPostController::class,'dasearchPost'])->name('dasearchPost')->middleware('auth');
Route::get('/dasearchHelp/', [DashboardHelpController::class,'dasearchHelp'])->name('dasearchHelp')->middleware('auth');
Route::get('/dasearchProduct/', [DashboardProductController::class,'dasearchProduct'])->name('dasearchProduct')->middleware('auth');
Route::get('/dasearchLeader/', [DashboardLeaderController::class,'dasearchLeader'])->name('dasearchLeader')->middleware('auth');

// END ROUTES SEARCH


// ROUTES LOGIN

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/tambahadmin', [TambahAdminController::class, 'index'])->middleware('guest');

Route::post('/tambahadmin', [TambahAdminController::class, 'store']);

// END ROUTES LOGIN

//ROUTES WEB ADMIN
Route::get('/dashboard', function(){
    return view('dashboard.index');
})->middleware('auth');

Route::resource('/dashboard/profile', DashboardProfilController::class)->middleware('auth');

Route::resource('/dashboard/allposts', DashboardPostController::class)->middleware('auth');

Route::resource('/dashboard/allhelps', DashboardHelpController::class)->middleware('auth');

Route::resource('/dashboard/allleaders', DashboardLeaderController::class)->middleware('auth');

Route::resource('/dashboard/allproducts', DashboardProductController::class)->middleware('auth');

Route::resource('/dashboard/allcategories', DashboardCategoryController::class)->except('show')->middleware('superAdmin');

Route::resource('/dashboard/allcategoryHelps', DashboardCategoryHelpController::class)->except('show')->middleware('superAdmin');

Route::resource('/dashboard/allusers', DashboardAdminController::class)->middleware('superAdmin');

Route::get('/dashboard/ubahpassword', [ChangePasswordController::class,'index'])->middleware('auth');

Route::post('/change/password',  [ChangePasswordController::class,'changePassword'])->name('profile.change.password')->middleware('auth');

//END ROUTES WEB ADMIN



// ROUTES BIKIN SLUG

Route::get('check_slug', function () {
    $slug = SlugService::createSlug(Post::class, 'slug', request('title'));
    return response()->json(['slug' => $slug]);
});
Route::get('check_slug3', function () {
    $slug = SlugService::createSlug(Help::class, 'slug', request('judul'));
    return response()->json(['slug' => $slug]);
});

Route::get('check_slug4', function () {
    $slug = SlugService::createSlug(CategoryHelp::class, 'slug', request('name'));
    return response()->json(['slug' => $slug]);
});
Route::get('check_slug2', function () {
    $slug = SlugService::createSlug(Category::class, 'slug', request('name'));
    return response()->json(['slug' => $slug]);
});
// END ROUTES BIKIN SLUG


