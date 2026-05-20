<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CarouselController;
use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\TickerController;
use App\Http\Controllers\Admin\DynamicContentController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\AchievementController;
use App\Http\Controllers\Admin\WhyChooseUsController;
use App\Http\Controllers\Admin\SeoSettingController;
use App\Http\Controllers\Admin\CareersController;
use App\Http\Controllers\Admin\BranchController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\AppointmentController;


Route::middleware(['web', 'auth:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // About Us
        Route::get('/about-us', [AboutUsController::class, 'index'])->name('about.index');
        Route::post('/about-us', [AboutUsController::class, 'update'])->name('about.update');

        // Achievements
        Route::resource('achievements', AchievementController::class);
        Route::resource('why-choose-us', WhyChooseUsController::class);

        // Resource Routes
        Route::resource('services', ServiceController::class);
        Route::resource('blogs', BlogController::class);
        Route::resource('carousel', CarouselController::class);
        Route::resource('faqs', FaqController::class)->parameters(['faqs' => 'faq']);
        Route::resource('team', TeamController::class);
        Route::resource('testimonials', TestimonialController::class);
        Route::resource('contacts', ContactUsController::class)->only(['index', 'show', 'destroy']);
        Route::resource('appointments', AppointmentController::class)->only(['index', 'show', 'destroy']);
        Route::patch('/appointments/{id}/status', [AppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');
        Route::resource('tickers', TickerController::class);

        Route::resource('careers', CareersController::class);
        Route::resource('branches', BranchController::class);
        // Newsletter Subscribers
        Route::get('/subscribers/broadcast', [SubscriberController::class, 'broadcastForm'])->name('subscribers.broadcast');
        Route::post('/subscribers/broadcast', [SubscriberController::class, 'sendBroadcast'])->name('subscribers.send');
        Route::resource('subscribers', SubscriberController::class)->only(['index', 'destroy']);
        Route::resource('categories', CategoryController::class);
        
        // Site Settings
        Route::get('/settings', [DynamicContentController::class, 'index'])->name('settings.index');
        Route::get('/settings/{id}/edit', [DynamicContentController::class, 'edit'])->name('settings.edit');
        Route::post('/settings/{id}', [DynamicContentController::class, 'update'])->name('settings.update');

        // SEO Settings
        Route::resource('seo-settings', SeoSettingController::class);

        // Specialized Actions
        Route::get('/service-video/{id}/delete', [ServiceController::class, 'deleteVideo'])->name('service.video.delete');
        Route::get('/service-gallery/{id}/delete', [ServiceController::class, 'deleteGallery'])->name('service.gallery.delete');
        Route::patch('/services/{id}/toggle-status', [ServiceController::class, 'toggleStatus'])->name('services.toggleStatus');
    });
