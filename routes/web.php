<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PageController,
    FormController,
    UserController
};

require __DIR__ . '/auth.php';

Route::get('/', function () {
    return view('page.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');



Route::get('/', [PageController::class, 'index'])->name('page.index');
Route::get('/about', [PageController::class, 'about'])->name('page.about');
Route::get('/services', [PageController::class, 'services'])->name('page.services');
Route::get('/contact', [PageController::class, 'contact'])->name('page.contact');
Route::get('/products', [PageController::class, 'products'])->name('page.products');

Route::get('/users', [UserController::class, 'index'])->name('users.list');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');


Route::get('/form', [FormController::class, 'form'])->middleware(['auth'])->name('form');
Route::get('/choose', [PageController::class, 'choose'])->middleware(['auth'])->name('page.choose');
