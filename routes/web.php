<?php

use Illuminate\Support\Facades\Route;

/* Login */
Route::get('login',[\App\Http\Controllers\user\CredentialController::class,'login'])->name('login');
Route::post('login/submit',[\App\Http\Controllers\user\CredentialController::class,'loginSubmit'])->name('loginSubmit');
Route::get('logout',[\App\Http\Controllers\user\CredentialController::class,'logout'])->name('logout');

/* User */
Route::get('/', function () {
    return view('welcome');
});
Route::get('options',[\App\Http\Controllers\technican\TechnicanController::class,'options'
])->name('options');
Route::get('general/registration/{token}/{email}',[\App\Http\Controllers\user\CredentialController::class,'index'
])->name('user.registration');
Route::post('general/registration',[\App\Http\Controllers\user\CredentialController::class,'userRegistration'
])->name('user.registrationSubmit');
Route::get('general/user/delete/{id}',[\App\Http\Controllers\user\CredentialController::class,'delete'
])->name('user.delete');

/* Emails User */
Route::post('registration/email/send',[\App\Http\Controllers\user\mails\RegisterMailController::class,'sender'
])->name('registrationEmail');





/* Technican */
Route::get('home/technican',[\App\Http\Controllers\technican\TechnicanController::class,'index'
])->name('technican.home')->middleware('auth','tech');
Route::get('requests/technican',[\App\Http\Controllers\technican\TechnicanController::class,'requests'
])->name('technican.requests')->middleware('auth','tech');


/* Head Technican */
Route::get('settings/admin',[\App\Http\Controllers\technican\TechnicanController::class,'admin'
])->name('technican.settings');
Route::get('settings/admin/technican',[\App\Http\Controllers\technican\TechnicanController::class,'adminSettings'
])->name('technican.settings.technican');
Route::post('settings/admin/upgrade',[\App\Http\Controllers\technican\CredentialController::class,'upgradePermissions'
])->name('technican.permission.upgrade');

