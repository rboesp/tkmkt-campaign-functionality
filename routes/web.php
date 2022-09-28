<?php

use App\Models\Inventory;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    // $inventory_data = Inventory::find(1)->first()->toArray();
    $models = Inventory::whereIn('id', [1, 2, 3])->get();
    // return 'hi';
    return view('welcome', [
        'inventory_data' => $models->toArray()
    ]);
});
