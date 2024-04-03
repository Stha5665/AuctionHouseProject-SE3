<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auction\AuctionController;
use App\Http\Controllers\Catalogue\CatalogueController;
use App\Http\Controllers\Item\ItemController;
use App\Http\Controllers\Bid\BidController;
use App\Http\Controllers\Sale\SaleController;

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

    Route::resource('auctions', AuctionController::class)->only('index');

    Route::resource('catalogues', CatalogueController::class)->only('index');

    Route::middleware('isSeller')->group(function (){
//        CRUD FOR items for seller,admin and both available
        Route::resource('items', ItemController::class);
    });

//    Route checking for buyers
    Route::middleware('isBuyer')->group(function (){
//        CRUD FOR items for seller,admin and both available
        Route::get('/biddings/{catalogueID}/{itemID}/{bidType}', [BidController::class, 'createBid'])->name('biddings.create');
        Route::post('/biddings/', [BidController::class, 'storeBid'])->name('biddings.store');
    });



});

Route::middleware(['auth','isAdmin'])->group(function (){
    Route::resource('auctions', AuctionController::class)->except(['index']);
    Route::resource('catalogues', CatalogueController::class)->except('index');
    Route::get('auctions/archive/{auctionID}', [AuctionController::class, 'archiveAuctionData'])->name('auctions.archive');
    Route::get('biddings/{auctionID}/{itemID}', [BidController::class, 'showBiddings'])->name('bids.index');

    Route::get('sales/{userID}', [SaleController::class, 'saleIndex'])->name('sales.index');
    Route::get('pending-sales/{userID}', [SaleController::class, 'pendingIndex'])->name('pending-sales-index.blade.php');
    Route::resource('users', UserController::class);
});

require __DIR__.'/auth.php';
