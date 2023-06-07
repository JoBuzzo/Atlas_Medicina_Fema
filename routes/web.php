<?php


use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Group\{
    Index,
    Show,
    Store, 
    Update
};
use App\Http\Livewire\PdfStore;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', Index::class)->name('images.index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('group-image/edit/{id}', Update::class)->name('images.update');
    Route::get('group-image/create', Store::class)->name('images.store');
    route::get('categories', Categories::class)->name('categories');
});

Route::get('/pdf/{id}', [PdfStore::class, 'teste'])->name('pdf.store');

Route::get('group-image/{id}', Show::class)->name('images.show');


require __DIR__.'/auth.php';
