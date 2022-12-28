<?php

use Illuminate\Support\Facades\Route;

/* Login & Register */


/* User */
Route::get('/', function () {
    return view('welcome');
});

Route::get('options',[\App\Http\Controllers\technican\TechnicanController::class,'options'
])->name('options');

/* Technican */
Route::get('home/technican',[\App\Http\Controllers\technican\TechnicanController::class,'index'
])->name('technican.home');
Route::get('requests/technican',[\App\Http\Controllers\technican\TechnicanController::class,'requests'
])->name('technican.requests');


/* Head Technican */
Route::get('settings/admin',[\App\Http\Controllers\technican\TechnicanController::class,'admin'
])->name('technican.settings');

