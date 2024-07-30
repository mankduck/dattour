<?php
use App\Http\Controllers\Backend\Permission\PermissionController;
use App\Http\Controllers\Backend\Permission\RoleController;

Route::group(['prefix' => 'role'], function () {
    Route::get('index', [RoleController::class, 'index'])->name('role.index');
    Route::get('create', [RoleController::class, 'create'])->name('role.create');
    Route::post('store', [RoleController::class, 'store'])->name('role.store');
    Route::get('{id}/edit', [RoleController::class, 'edit'])->where(['id' => '[0-9]+'])->name('role.edit');
    Route::post('{id}/update', [RoleController::class, 'update'])->where(['id' => '[0-9]+'])->name('role.update');
    Route::get('{id}/delete', [RoleController::class, 'delete'])->where(['id' => '[0-9]+'])->name('role.delete');
    Route::delete('{id}/destroy', [RoleController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('role.destroy');
    Route::get('permission', [RoleController::class, 'permission'])->name('role.permission');
    Route::post('updatePermission', [RoleController::class, 'updatePermission'])->name('role.updatePermission');
});

Route::group(['prefix' => 'permission'], function () {
    Route::get('index', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('create', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('store', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('{id}/edit', [PermissionController::class, 'edit'])->where(['id' => '[0-9]+'])->name('permission.edit');
    Route::post('{id}/update', [PermissionController::class, 'update'])->where(['id' => '[0-9]+'])->name('permission.update');
    Route::get('{id}/delete', [PermissionController::class, 'delete'])->where(['id' => '[0-9]+'])->name('permission.delete');
    Route::delete('{id}/destroy', [PermissionController::class, 'destroy'])->where(['id' => '[0-9]+'])->name('permission.destroy');
});