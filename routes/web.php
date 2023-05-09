<?php


use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Categories;
use App\Http\Livewire\Group\{
    Index,
    Show,
    Store, 
    Update
};
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});
Route::get('group-image/edit/{id}', Update::class)->name('images.update');
Route::get('group-image/create', Store::class)->name('images.store');
Route::get('group-image/{id}', Show::class)->name('images.show');
Route::get('group-image', Index::class)->name('images.index');
route::get('categories', Categories::class)->name('categories');


require __DIR__.'/auth.php';
