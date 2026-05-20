<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/services', [App\Http\Controllers\ServiceController::class, 'index'])->name('services');

Route::get('/services/{slug}', [App\Http\Controllers\ServiceController::class, 'show'])->name('service.detail');

Route::get('/contact', [App\Http\Controllers\ContactUsController::class, 'index'])->name('contact');
Route::post('/contact', [App\Http\Controllers\ContactUsController::class, 'store']);

Route::get('/branches', [App\Http\Controllers\BranchController::class, 'index'])->name('branches.index');

Route::get('/careers', function () {
    $careers = \App\Models\Career::where('status', 1)->orderByDesc('created_at')->get();
    return view('careers', compact('careers'));
})->name('careers');

Route::get('/careers/{id}', function ($id) {
    $career = \App\Models\Career::findOrFail($id);
    $siteSettings = \App\Models\DynamicContent::first() ?? new \App\Models\DynamicContent();
    return view('career-details', compact('career', 'siteSettings'));
})->name('careers.show');

Route::get('/blog', [App\Http\Controllers\BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'show'])->name('blog.details');

Route::get('/news', function () {
    return view('news');
})->name('news');

Route::get('/page2', function () {
    return view('page2');
})->name('home2');

Route::get('/page3', [App\Http\Controllers\ServiceController::class, 'home3'])->name('home3');

Route::post('/subscribe', [App\Http\Controllers\SubscriberController::class, 'store'])->name('subscribe');
Route::get('/book-appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
Route::post('/book-appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');



Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

Route::get('/event-details', function () {
    return redirect('/');
})->name('event.details');

Route::get('/speaker-details', function () {
    return redirect('/');
})->name('speaker.details');

// Missing Eventify Routes
Route::get('/home2', function () { return view('page2'); })->name('home2');
Route::get('/home3', function () { return view('page3'); })->name('home3');
Route::get('/home4', function () { return redirect('/'); })->name('home4');
Route::get('/home5', function () { return redirect('/'); })->name('home5');
Route::get('/home6', function () { return redirect('/'); })->name('home6');
Route::get('/home7', function () { return redirect('/'); })->name('home7');
Route::get('/home8', function () { return redirect('/'); })->name('home8');
Route::get('/home9', function () { return redirect('/'); })->name('home9');
Route::get('/home10', function () { return redirect('/'); })->name('home10');

Route::get('/speakers', function () { return redirect('/'); })->name('speakers');
Route::get('/events', function () { return redirect('/'); })->name('events');
Route::get('/event-schedule', function () { return redirect('/'); })->name('event.schedule');
Route::get('/memories', function () { return redirect('/'); })->name('memories');
Route::get('/faq', [App\Http\Controllers\HomeController::class, 'faq'])->name('faq');





Route::get('/login', function () {
    return view('login'); // Assuming login is in root resources/views as per reference
})->name('login');

Route::post('login', [App\Http\Controllers\AuthController::class, 'login'])
    ->name('login.submit');

Route::post('logout', [App\Http\Controllers\AuthController::class, 'logout'])
    ->name('logout');

Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'index']);

Route::get('/privacy-policy', function () {
    $siteSettings = \App\Models\DynamicContent::first() ?? new \App\Models\DynamicContent();
    return view('privacy-policy', compact('siteSettings'));
})->name('privacy.policy');

Route::get('/terms-conditions', function () {
    $siteSettings = \App\Models\DynamicContent::first() ?? new \App\Models\DynamicContent();
    return view('terms-conditions', compact('siteSettings'));
})->name('terms.conditions');
