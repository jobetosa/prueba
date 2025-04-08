
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class)->except(['create', 'edit', 'show']);
Route::get('/', function () {
    return redirect('/products');
})->name('home');