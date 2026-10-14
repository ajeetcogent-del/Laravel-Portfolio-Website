<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Agent\DashboardController as AgentDashboard;
use App\Http\Controllers\User\DashboardController as UserDashboard;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Agent\UserController as AgentUserController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ProjectController as AdminProjectController;
use App\Http\Controllers\Admin\TestimonialController as AdminTestimonialController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\SkillController as AdminSkillController;
use App\Http\Controllers\Admin\ServiceController as AdminServiceController;
use App\Http\Controllers\Admin\ProcessController as AdminProcessController;
use App\Http\Controllers\PortfolioController;
use App\Models\User;
use App\Http\Controllers\PostController;

// ─── Public Portfolio Routes ─────────────────────────────────────────────────
Route::get('/', [PortfolioController::class, 'home'])->name('home');
Route::get('/project/{slug}', [PortfolioController::class, 'show'])->name('project.show');
Route::post('/contact', [PortfolioController::class, 'contactStore'])->name('contact.store');

Route::get('/blog', function () {
    return view('blog');
})->name('blog');

// ─── Auth Routes ─────────────────────────────────────────────────────────────
Route::get('/login', [LoginController::class, 'create'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LoginController::class, 'destroy'])->name('logout');
Route::resource('post', PostController::class);
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

// ─── Admin Routes ─────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:' . User::ROLE_ADMIN])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
    Route::get('users/search', [AdminUserController::class, 'search'])->name('users.search');
    Route::resource('users', AdminUserController::class);
    Route::resource('blogs', AdminBlogController::class)->except(['show']);

    // Portfolio Management
    Route::resource('projects', AdminProjectController::class);
    Route::resource('testimonials', AdminTestimonialController::class)->except(['show']);
    Route::get('contacts', [AdminContactController::class, 'index'])->name('contacts.index');
    Route::get('contacts/{contact}', [AdminContactController::class, 'show'])->name('contacts.show');
    Route::delete('contacts/{contact}', [AdminContactController::class, 'destroy'])->name('contacts.destroy');
    Route::resource('skills', AdminSkillController::class)->except(['show']);
    Route::resource('services', AdminServiceController::class)->except(['show']);

    //DevelopementProcess
     Route::get('process', [AdminProcessController::class, 'index'])->name('process.index');
     Route::get('process/create', [AdminProcessController::class, 'create'])->name('process.create');
     Route::post('process/store', [AdminProcessController::class, 'store'])->name('process.store');
     Route::get('process/edit/{id}', [AdminProcessController::class, 'edit'])->name('process.edit');
     Route::put('process/update/{id}', [AdminProcessController::class, 'update'])->name('process.update');
     Route::delete('process/delete/{id}', [AdminProcessController::class, 'destroy'])->name('process.destroy');
});

// ─── Agent Routes ─────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:' . User::ROLE_AGENT])->prefix('agent')->name('agent.')->group(function () {
    Route::get('/dashboard', [AgentDashboard::class, 'index'])->name('dashboard');
    Route::get('/users', [AgentUserController::class, 'index'])->name('users.index');
});

// ─── User Routes ──────────────────────────────────────────────────────────────
Route::middleware(['auth', 'role:' . User::ROLE_USER])->group(function () {
    Route::get('/dashboard', [UserDashboard::class, 'index'])->name('dashboard');
});
