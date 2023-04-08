<?php

use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\ExportController;
use App\Http\Livewire\Screens\AgeForm;
use App\Http\Livewire\Screens\CauseForm;
use App\Http\Livewire\Screens\Dashboard;
use App\Http\Livewire\Screens\DietForm;
use App\Http\Livewire\Screens\GenderForm;
use App\Http\Livewire\Screens\GroceryFrequency;
use App\Http\Livewire\Screens\LocationForm;
use App\Http\Livewire\Screens\Login;
use App\Http\Livewire\Screens\Playground;
use App\Http\Livewire\Screens\ReceiptUploaded;
use App\Http\Livewire\Screens\RecipeDetails;
use App\Http\Livewire\Screens\Recipes;
use App\Http\Livewire\Screens\Registration;
use App\Http\Livewire\Screens\ShopForm;
use App\Http\Livewire\Screens\ShoppingList;
use App\Http\Livewire\Screens\SurveyCompleted;
use App\Http\Livewire\Screens\UploadReceipt;
use App\Http\Livewire\Screens\Video;
use App\Http\Livewire\Screens\VideoDetails;
use App\Http\Livewire\Screens\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('auth/facebook', [FacebookController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Screens
Route::middleware(['guest'])->group(function () {
    Route::get('/app', Welcome::class)->name('welcome');
    Route::get('/registration', Registration::class)->name('register');
    Route::get('/login', Login::class)->name('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/video', Video::class)->name('videos');
    Route::get('/video/{id}', VideoDetails::class)->name('videoDetails');
    Route::get('/recipes', Recipes::class)->name('recipes');
    Route::get('/playground', Playground::class)->name('playground');
    Route::get('/recipe/{recipe_id}', RecipeDetails::class)->name('recipe');
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/location-form', LocationForm::class)->name('locationForm');
    Route::get('/shop-for', ShopForm::class)->name('shopForm');
    Route::get('/grocery-frequency', GroceryFrequency::class)->name('groceryFrequency');
    Route::get('/shopping-list', ShoppingList::class)->name('shoppingList');
    Route::get('/diet-form', DietForm::class)->name('dietForm');
    Route::get('/cause-form', CauseForm::class)->name('causeForm');
    Route::get('/survey-completed', SurveyCompleted::class)->name('surveyCompleted');
    Route::get('/gender-form', GenderForm::class)->name('genderForm');
    Route::get('/age-form', AgeForm::class)->name('ageForm');
    Route::get('/upload-receipt', UploadReceipt::class)->name('uploadReceipt');
    Route::get('/receipt-uploaded', ReceiptUploaded::class)->name('receiptUploaded');
    Route::get('/logout', function () {
        Auth::logout();

        return Redirect::to('app');
    });
});

//unbounce
Route::get('/u/{slug}', function ($slug) {
    return view('unbounce', ['slug' => $slug]);
})->name('unbounce');

Route::get('/', function () {
    return view('unbounce', ['slug' => 'home']);
})->name('home');

Route::get('/export/users', [ExportController::class, 'users'])
    ->name('export.users');
