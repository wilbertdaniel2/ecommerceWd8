<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Admin\ShowProducts;
use App\Http\Livewire\Admin\CreateProduct;
use App\Http\Livewire\Admin\EditProduct;

use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\OrderController;

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\Admin\CoverController;
use App\Http\Controllers\RoleController;
use App\Http\Livewire\Admin\ShowCategory;

use App\Http\Livewire\Admin\BrandComponent;

use App\Http\Livewire\Admin\ColorComponent;
use App\Http\Livewire\Admin\CreateCover;
use App\Http\Livewire\Admin\ShowDepartment;
use App\Http\Livewire\Admin\DepartmentComponent;

use App\Http\Livewire\Admin\MunicipalityComponent;
use App\Http\Livewire\Admin\ShowRole;
use App\Http\Livewire\Admin\UserComponent;

Route::get('/', ShowProducts::class)->name('admin.index')->middleware('can:admin.products.index');

Route::get('products/create', CreateProduct::class)->name('admin.products.create')->middleware('can:admin.products.index');

Route::get('products/{product}/edit', EditProduct::class)->name('admin.products.edit')->middleware('can:admin.products.edit');

Route::post('products/{product}/files', [ProductController::class, 'files'])->name('admin.products.files');

Route::get('covers', CreateCover::class)->name('admin.covers.index')->middleware('can:admin.covers.index');

Route::get('orders', [OrderController::class, 'index'])->name('admin.orders.index')->middleware('can:admin.orders.index');
Route::get('orders/{order}', [OrderController::class, 'show'])->name('admin.orders.show');

Route::get('categories', [CategoryController::class, 'index'])->name('admin.categories.index')->middleware('can:admin.categories.index');
Route::get('categories/{category}', ShowCategory::class)->name('admin.categories.show');

Route::get('brands', BrandComponent::class)->name('admin.brands.index')->middleware('can:admin.brands.index');

Route::get('colors', ColorComponent::class)->name('admin.colors.index');

Route::get('departments', DepartmentComponent::class)->name('admin.departments.index');
Route::get('departments/{department}', ShowDepartment::class)->name('admin.departments.show');

Route::get('municipalities/{municipality}', MunicipalityComponent::class)->name('admin.municipalities.show');

Route::get('users', UserComponent::class)->name('admin.users.index')->middleware('can:admin.users.index');

Route::get('roles', [RoleController::class, 'index'])->name('admin.roles.index');
Route::get('roles/{role}', ShowRole::class)->name('admin.roles.show');


// Route::get('covers', [CoverController::class, 'index'])->name('admin.covers.index');
// Route::get('covers/create', [CoverController::class, 'create'])->name('admin.covers.create');
// Route::post('covers/store', [CoverController::class, 'store'])->name('admin.covers.store');
// Route::get('covers/{cover}/edit', [CoverController::class, 'edit'])->name('admin.covers.edit');
// Route::put('covers/{cover}', [CoverController::class, 'update'])->name('admin.covers.update');
