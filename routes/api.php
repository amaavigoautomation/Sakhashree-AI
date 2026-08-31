<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get("/categories",[CategoryController::class,'categoriesAPI']);


Route::get('/test', function () {
    return response()->json(['message' => 'API route is working!']);
});
