<?php

use Illuminate\Support\Facades\Route;

/* Login & Register */


/* User */
Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD
=======
Route::get('options',[\App\Http\Controllers\technican\TechnicanController::class,'options'
])->name('options');
>>>>>>> a836ad5 ( Dodanie route do nawigacji aplikacji)

/* Technican */
Route::get('home/technican',[\App\Http\Controllers\technican\TechnicanController::class,'index'
])->name('technican.home');
Route::get('requests/technican',[\App\Http\Controllers\technican\TechnicanController::class,'requests'
])->name('technican.requests');


/* Head Technican */
Route::get('settings/admin',[\App\Http\Controllers\technican\TechnicanController::class,'index'
<<<<<<< HEAD
])->name('admin/settings');
=======
])->name('technican.settings');
>>>>>>> a836ad5 ( Dodanie route do nawigacji aplikacji)

/* Head Admin */
