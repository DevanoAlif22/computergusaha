<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\KarirController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\CeoController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\StatisFaqController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\JourneyController;
use App\Http\Controllers\Admin\LayananController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\UserManagementController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PortofolioController;
use App\Http\Controllers\Admin\FaqCategoryController;
use App\Http\Controllers\Admin\KategoriBlogController;
use App\Http\Controllers\Admin\KategoriLayananController;

/*
|--------------------------------------------------------------------------
| Landing Page (Halaman Awal)
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::get('/home-landing', fn() => view('index'));
Route::get('/landing-preview', fn() => view('index'));

/*
|--------------------------------------------------------------------------
| Dashboard (Hanya untuk user yang sudah login)
|--------------------------------------------------------------------------
*/
// Route::get('/dashboard', fn() => view('Admin.IndexAdmin'))
//     ->middleware(['auth', 'verified'])
//     ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile Routes (Breeze Default)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Manajemen User (Hanya untuk Admin / Auth)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/users', [UserManagementController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserManagementController::class, 'create'])->name('users.create');
    Route::post('/users', [UserManagementController::class, 'store'])->name('users.store');
    Route::get('/users/{user}/edit', [UserManagementController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [UserManagementController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserManagementController::class, 'destroy'])->name('users.destroy');
});

/*
|--------------------------------------------------------------------------
| Halaman Utama / Variasi Landing
|--------------------------------------------------------------------------
*/
Route::get('/more-about-us', fn() => view('page-about-5'));
Route::get('/modern-shop', fn() => view('home-shop-modern'));
Route::get('/creative-it-solutions', fn() => view('home-it-solutions2'));
Route::get('/data-analysis', fn() => view('home-data-analysis'));
Route::get('/app-landing', fn() => view('home-app-landing'));
Route::get('/saas-technology', fn() => view('home-saas-technology'));
Route::get('/marketing-startup', fn() => view('home-marketing-startup'));
Route::get('/it-solution', fn() => view('home-it-solutions2'));
Route::get('/software-company', fn() => view('home-software-company'));
Route::get('/digital-agency', fn() => view('home-digital-agency'));
Route::get('/about2', [FrontController::class, 'about'])->name('about');

/*
|--------------------------------------------------------------------------
| Produk & Layanan
|--------------------------------------------------------------------------
*/
Route::get('/product-app', fn() => view('page-product-app'));
Route::get('/services-app', fn() => view('page-services-app'));
Route::get('/shop-app', fn() => view('page-shop-app'));
Route::get('/single-project-app', fn() => view('page-single-project-app'));
Route::get('/single-post-app', fn() => view('page-single-post-app'));

Route::get('/product-5', fn() => view('page-product-5'));
Route::get('/about-5', fn() => view('page-about-5'));
Route::get('/services-5', fn() => view('page-services-5'));
Route::get('/shop-5', fn() => view('page-shop-5'));
Route::get('/single-project-5', fn() => view('page-single-project-5'));
// route user list portofolio,karir,blog
Route::get('/portfolio', [FrontController::class, 'listPortofolio']);
Route::get('/portfolio/{id}', [FrontController::class, 'detailPortofolio'])->name('portfolio.detail');
Route::get('/karir', [FrontController::class, 'listKarir'])->name('karir.index');
Route::get('/karir/{id}', [FrontController::class, 'detailKarir'])->name('karir.detail');
Route::get('/blog', [FrontController::class, 'listBlog'])->name('blog.index');
Route::get('/blog/{id}', [FrontController::class, 'detailBlog'])->name('blog.detail');



Route::get('/page-portfolio-5', fn() => view('page-portfolio-5'));
Route::get('/portfolio-5', fn() => view('page-portfolio-5'));
Route::get('/portfolio-load-more', fn() => view('page-portfolio-5'));

/*
|--------------------------------------------------------------------------
| Blog & Konten
|--------------------------------------------------------------------------
*/

Route::get('/blog-5', fn() => view('page-blog-5'));
Route::get('/blog-app', fn() => view('page-blog-app'));

/*
|--------------------------------------------------------------------------
| Contact & Pricing
|--------------------------------------------------------------------------
*/
Route::get('/contact-app', fn() => view('page-contact-app'));
Route::get('/page-contact-app', fn() => view('page-contact-app'));
Route::get('/contact-5', fn() => view('page-contact-5'));
Route::get('/start-project', fn() => view('page-contact-5'));
Route::get('/pricing-plan', fn() => view('page-about-5'));

/*
|--------------------------------------------------------------------------
| Karir & FAQ
|--------------------------------------------------------------------------
*/

Route::get('/faq', fn() => view('faq'));

/*
|--------------------------------------------------------------------------
| Auth / Login
|--------------------------------------------------------------------------
*/
Route::get('/login', fn() => view('login'));
Route::get('/signin', fn() => view('page-contact-5'));   // sementara
Route::get('/start-trial', fn() => view('page-contact-5')); // sementara

/*
|--------------------------------------------------------------------------
| Layanan Detail
|--------------------------------------------------------------------------
*/
Route::get('/services5', fn() => view('services5'));
Route::get('/servicesdetails', fn() => view('servicesdetails'));
Route::get('/servicesdetailsowa', fn() => view('servicesdetailsowa'));
Route::get('/servicesdetailsoaku', fn() => view('servicesdetailsoaku'));
Route::get('/servicesdetailsodigi', fn() => view('servicesdetailsodigi'));
Route::get('/servicesdetailsomail', fn() => view('servicesdetailsomail'));







//Admin

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('portofolio', PortofolioController::class, ['as' => 'admin']);
    Route::resource('kategori-layanan', KategoriLayananController::class, ['as' => 'admin']);
    Route::resource('category', CategoryController::class, ['as' => 'admin']);
    Route::resource('layanan', LayananController::class, ['as' => 'admin']);
    Route::resource('kategori-blog', KategoriBlogController::class, ['as' => 'admin']);
    Route::resource('profile', ProfileController::class, ['as' => 'admin']);
    Route::resource('tentang-kami', TentangKamiController::class, ['as' => 'admin']);
    Route::resource('statis-faq', StatisFaqController::class, ['as' => 'admin']);
    Route::resource('faq', FaqController::class, ['as' => 'admin']);
    Route::resource('faq-category', FaqCategoryController::class, ['as' => 'admin']);
    Route::resource('blog', BlogController::class, ['as' => 'admin']);
    Route::post('upload/summernote', [UploadController::class, 'summernote'])
        ->name('admin.upload.summernote');
    Route::resource('category', CategoryController::class, ['as' => 'admin']);
    Route::resource('karir', KarirController::class, ['as' => 'admin']);
    Route::resource('ceo', CeoController::class, ['as' => 'admin']);
    Route::resource('partner', PartnerController::class, ['as' => 'admin']);
    Route::resource('journey', JourneyController::class, ['as' => 'admin']);
});

/*
|--------------------------------------------------------------------------
| Auth Routes (Laravel Breeze)
|--------------------------------------------------------------------------
*/
require __DIR__ . '/auth.php';
