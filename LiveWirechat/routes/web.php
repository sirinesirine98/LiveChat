
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomAuthController;
use App\Http\Livewire\Chat\CreateChat;
use App\Http\Livewire\Chat\Main;
use App\Http\Controllers\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class , 'index']);

Route::get('/home', [HomeController::class , 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});




//liveware
Route::get('/users', CreateChat::class)->name('users');
Route::get('/chats/{key?}', Main::class)->name('chat');




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/rendezvous/create', [App\Http\Controllers\RendezVousController::class, 'create'])->name('rendezvous.create');
Route::get('/rendezvous', [App\Http\Controllers\RendezVousController::class, 'index'])->name('rendezvous.index');
Route::post('/rendezvous', [RendezVousController::class, 'store'])->name('rendezvous.store');
Route::delete('/rendezvous/{id}', [RendezVousController::class, 'destroy'])->name('rendezvous.destroy');
