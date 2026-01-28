<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\PortfoliosController;
use App\Http\Controllers\Admin\PortfolioImageController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\InfoPageController;
use App\Http\Controllers\Admin\ProjectManagementConsultantPageController;
use App\Http\Controllers\Admin\RealtorPageController;
use App\Http\Controllers\Admin\ProjectManagementConsultantProjectController;
use App\Http\Controllers\Admin\RealtorListingController;
use App\Http\Controllers\LandController;
use App\Http\Controllers\RenderController;



Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about-us', [App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/renders', [App\Http\Controllers\HomeController::class, 'renders'])->name('renders');
Route::get('/land-for-sale', [App\Http\Controllers\HomeController::class, 'land'])->name('land-for-sale');
Route::get('/services', [App\Http\Controllers\HomeController::class, 'services'])->name('services');
Route::get('/services/{slung}', [App\Http\Controllers\HomeController::class, 'service'])->name('service');
Route::get('/contact-us', [App\Http\Controllers\HomeController::class, 'contact'])->name('contact');
Route::get('/our-work', [App\Http\Controllers\HomeController::class, 'portfolio'])->name('our-work');
Route::get('/our-work/{slung}', [App\Http\Controllers\HomeController::class, 'portfolio_service'])->name('portfolio-service');
Route::get('/trendy-updates', [App\Http\Controllers\HomeController::class, 'updates'])->name('trendy-updates');
Route::get('/team', [App\Http\Controllers\HomeController::class, 'team'])->name('team');
Route::get('/history', [App\Http\Controllers\HomeController::class, 'history'])->name('history');
Route::get('/project-management-consultants', [App\Http\Controllers\HomeController::class, 'consultants'])->name('project-management-consultants');
Route::get('/project-management-consultants/projects/{slug}', [App\Http\Controllers\HomeController::class, 'project_management_consultant_project'])
    ->name('project-management-consultants.project');
Route::get('/realtors', [App\Http\Controllers\HomeController::class, 'realtors'])->name('realtors');
Route::get('/realtors/listings/{slug}', [App\Http\Controllers\HomeController::class, 'realtor_listing'])
    ->name('realtors.listing');

Route::get('/update-slung', [App\Http\Controllers\HomeController::class, 'update_slung'])->name('update-slung');

Route::get('/update-portfolio-slungs', [App\Http\Controllers\HomeController::class, 'update_portfolio_slungs'])->name('update-portfolio-slungs');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::resource('teams', \App\Http\Controllers\Admin\TeamController::class)->names('admin.teams');
    Route::resource('services', ServiceController::class)->names('admin.services');
    Route::resource('blogs', BlogController::class)->names('admin.blog');
    Route::resource('testimonials', TestimonialController::class)->names('admin.testimonials');
    Route::resource('slides', \App\Http\Controllers\SlideController::class)->names('admin.slides');


    Route::resource('portfolios', PortfoliosController::class)->names('admin.portfolio');
    Route::delete('portfolio-images/{image}', [PortfoliosController::class,'destroyImage'])->name('portfolio-images.destroy');

    Route::get('settings', [SettingController::class, 'edit'])->name('admin.settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('admin.settings.update');
    Route::get('info-pages/{slug}/edit', [InfoPageController::class, 'edit'])->name('admin.info-pages.edit');
    Route::put('info-pages/{slug}', [InfoPageController::class, 'update'])->name('admin.info-pages.update');
    Route::get('pages/project-management-consultants', [ProjectManagementConsultantPageController::class, 'edit'])
        ->name('admin.pages.project-management-consultants.edit');
    Route::put('pages/project-management-consultants', [ProjectManagementConsultantPageController::class, 'update'])
        ->name('admin.pages.project-management-consultants.update');
    Route::resource('pages/project-management-consultant-projects', ProjectManagementConsultantProjectController::class)
        ->parameters(['project-management-consultant-projects' => 'pmcProject'])
        ->names('admin.pages.project-management-consultant-projects');
    Route::get('pages/realtors', [RealtorPageController::class, 'edit'])
        ->name('admin.pages.realtors.edit');
    Route::put('pages/realtors', [RealtorPageController::class, 'update'])
        ->name('admin.pages.realtors.update');
    Route::resource('pages/realtor-listings', RealtorListingController::class)
        ->parameters(['realtor-listings' => 'listing'])
        ->names('admin.pages.realtor-listings');

    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('lands')->group(function () {
        Route::get('/', [LandController::class, 'index'])->name('lands.index');
        Route::get('/create', [LandController::class, 'create'])->name('lands.create');
        Route::post('/store', [LandController::class, 'store'])->name('lands.store');
        Route::get('/{land}', [LandController::class, 'show'])->name('lands.show');
        Route::get('/{land}/edit', [LandController::class, 'edit'])->name('lands.edit');
        Route::put('/{land}', [LandController::class, 'update'])->name('lands.update');
        Route::delete('/{land}', [LandController::class, 'destroy'])->name('lands.destroy');
    });
    Route::prefix('renders')->group(function () {
        Route::get('/', [RenderController::class, 'index'])->name('renders.index');
        Route::get('/create', [RenderController::class, 'create'])->name('renders.create');
        Route::post('/', [RenderController::class, 'store'])->name('renders.store');
        Route::get('/{render}/edit', [App\Http\Controllers\RenderController::class, 'edit'])->name('renders.edit');
        Route::put('/{render}', [App\Http\Controllers\RenderController::class, 'update'])->name('renders.update');
        Route::delete('/{render}', [App\Http\Controllers\RenderController::class, 'destroy'])->name('renders.destroy');
    });
});

Route::middleware(['auth', 'is_admin'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

require __DIR__.'/auth.php';
