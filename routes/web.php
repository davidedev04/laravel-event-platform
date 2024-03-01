<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\EventController;
use Database\Seeders\EventSeeder;
use Faker\Guesser\Name;

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
// rotta base dell'index
Route::get('/', [EventController::class, 'index'])->Name('index.events');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // rotta per andare a pagina create
    Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
    // rotta per inserie l'evento dentro al database
    Route::post('/event/create', [EventController::class, 'store'])->name('event.store');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route :: get('/events/{id}', [EventController :: class, 'show'])
    -> name('events.show');

});

require __DIR__ . '/auth.php';
