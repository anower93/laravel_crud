<?php

use App\Http\Controllers\LeadGeneration;
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
    return view('welcome');
});



Route::get('info', [LeadGeneration::class, 'index'])->name('home');

Route::post('create-lead', [LeadGeneration::class, 'create'])->name('create');

Route::get('edit-lead/{id}', [LeadGeneration::class, 'edit'])->name('edit');

Route::post('update-lead/{id}', [LeadGeneration::class, 'update'])->name('update');

Route::get('delete-lead/{id}', [LeadGeneration::class, 'delete'])->name('delete');

