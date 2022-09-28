<?php

use App\Models\Inventory;
use App\Models\Template;
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
    $templates = Template::whereIn('id', [1, 2, 3])->get();
    $inventory = Inventory::whereIn('id', [1, 2, 3])->get();
    return view('welcome', [
        'inventory_data' => $inventory->toArray(),
        'templates' => $templates->toArray()
    ]);
});
