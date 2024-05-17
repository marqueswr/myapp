<?php

use App\Models\Aluno;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminAlunoController;
use App\Http\Controllers\AdminProductController;

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
Route::get('/', [AlunoController::class, 'index'])->name('home');
Route::get('/aluno/{aluno:slug}', [AlunoController::class, 'show'])->name('aluno');
//Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [ProductController::class, 'show'])->name('product');

Route::get('/admin/alunos/atrasosem/{aluno}', [AdminAlunoController::class, 'atrasoSemJustificativa'])->name('admin.alunos.atrasosem');
Route::get('/admin/alunos/atrasocom/{aluno}', [AdminAlunoController::class, 'atrasoComJustificativa'])->name('admin.alunos.atrasocom');


// Admin produtos
Route::get('/admin/products', [AdminProductController::class, 'index'])->name('admin.products');
Route::get('/admin/products/create', [AdminProductController::class, 'create'])->name('admin.product.create');
Route::post('/admin/products', [AdminProductController::class, 'store'])->name('admin.product.store');
Route::get('/admin/products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.product.edit');
Route::put('/admin/products/{product}', [AdminProductController::class, 'update'])->name('admin.product.update');
Route::get('/admin/products/{product}/delete', [AdminProductController::class, 'destroy'])->name('admin.product.destroy');
Route::get('/admin/products/{product}/delete-image', [AdminProductController::class, 'destroyImage'])->name('admin.product.destroyImage');

//admin alunos
Route::get('/admin/alunos', [AdminAlunoController::class, 'index'])->name('admin.alunos');
Route::get('/admin/alunos/create', [AdminAlunoController::class, 'create'])->name('admin.aluno.create');
Route::post('/admin/alunos', [AdminAlunoController::class, 'store'])->name('admin.aluno.store');
Route::get('/admin/alunos/{aluno}/edit', [AdminAlunoController::class, 'edit'])->name('admin.aluno.edit');
Route::put('/admin/alunos/{aluno}', [AdminAlunoController::class, 'update'])->name('admin.aluno.update');
Route::get('/admin/alunos/{aluno}/delete', [AdminAlunoController::class, 'destroy'])->name('admin.aluno.destroy');
Route::get('/admin/alunos/{aluno}/delete-image', [AdminProductController::class, 'destroyImage'])->name('admin.aluno.destroyImage');









