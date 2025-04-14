<?php

use App\Http\Controllers\DistroController;
use App\Models\Distro;
use Illuminate\Support\Facades\Route;

/* Route::get('/', function () { */
/*     return view('welcome'); */
/* }); */

Route::get('/', [DistroController::class, "getAllDistros"]);

Route::get("/get-distro", [DistroController::class, "getAllDistros"])->name("get-distro");

Route::get("/get-distro/{id}", [DistroController::class, "getDistro"])->name("get-distro-id");

Route::get("/add-distro", function() {
    return view("DistroAdd");
})->name("add-distro");

Route::post("/create-distro", [DistroController::class, 'createDistro'])->name("create-distro");

Route::post("/delete-distro/{id}", [DistroController::class, 'deleteDistro'])->name("delete-distro");

Route::get("/edit-distro/{id}", [DistroController::class, 'editDistro'])->name("edit-distro");
Route::post("/update-distro/{id}", [DistroController::class, 'updateDistro'])->name("update-distro");
