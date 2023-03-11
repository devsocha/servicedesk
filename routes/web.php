<?php

use Illuminate\Support\Facades\Route;

/* Login */
Route::get('login',[\App\Http\Controllers\user\CredentialController::class,'login'])->name('login')->middleware('unauth');
Route::post('login/submit',[\App\Http\Controllers\user\CredentialController::class,'loginSubmit'])->name('loginSubmit');
Route::get('logout',[\App\Http\Controllers\user\CredentialController::class,'logout'])->name('logout');

/* User */
Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('options',[\App\Http\Controllers\user\UserController::class,'options'
])->name('options')->middleware('auth','user');
Route::post('options/submit',[\App\Http\Controllers\user\UserController::class,'optionsSubmit'
])->name('options.submit')->middleware('auth','user');
Route::get('general/registration/{token}/{email}',[\App\Http\Controllers\user\CredentialController::class,'index'
])->name('user.registration');
Route::post('general/registration',[\App\Http\Controllers\user\CredentialController::class,'userRegistration'
])->name('user.registrationSubmit');
Route::get('home',[\App\Http\Controllers\user\UserController::class, 'index'
])->name('home')->middleware('auth','user');
Route::get('forms/{id}',[\App\Http\Controllers\user\FormsController::class, 'index'
])->name('forms')->middleware('auth','user');
Route::get('requests',[\App\Http\Controllers\user\RequestController::class, 'index'
])->name('requests')->middleware('auth','user');
Route::get('form/{id}',[\App\Http\Controllers\user\FormController::class, 'index'
])->name('form')->middleware('auth','user');
Route::post('form/submit',[\App\Http\Controllers\user\FormController::class, 'submit'
])->name('form.submit')->middleware('auth','user');
Route::get('requests-view/{id}',[\App\Http\Controllers\user\RequestController::class, 'show'
])->name('requestsView')->middleware('auth','user');
Route::get('general/reset-password/{token}/{email}',[\App\Http\Controllers\user\mails\ResetPasswordMailController::class,'resetView'
])->name('user.resetPassword');
Route::post('general/reset-password',[\App\Http\Controllers\user\mails\ResetPasswordMailController::class,'resetViewSubmit'
])->name('user.resetPassword.submit');
Route::get('reset-password',function (){return view('general.restartPasswordEmail');})->name('resetPassword');



/* Emails User */
Route::post('registration/email/send',[\App\Http\Controllers\user\mails\RegisterMailController::class,'sender'
])->name('registrationEmail');
Route::post('restart/email/send',[\App\Http\Controllers\user\mails\ResetPasswordMailController::class,'sender'
])->name('resetPasswordEmail');

/* Technican */
Route::get('home/technican',[\App\Http\Controllers\technican\TechnicanController::class,'index'
])->name('technican.home')->middleware('auth','tech');
Route::get('requests/technican',[\App\Http\Controllers\technican\TechnicanController::class,'requests'
])->name('technican.requests')->middleware('auth','tech');
Route::get('options/technican',[\App\Http\Controllers\technican\TechnicanController::class,'options'
])->name('technican.options');
Route::post('options/technican/submit',[\App\Http\Controllers\technican\TechnicanController::class,'optionsSubmit'
])->name('technican.options.submit');
Route::get('technican/requests-view/{id}',[\App\Http\Controllers\technican\RequestController::class, 'index'
])->name('technican.requestsView')->middleware('auth','tech');
Route::get('requests/take/{id}',[\App\Http\Controllers\technican\RequestController::class, 'getTechnican'
])->name('requestsViewTake')->middleware('auth','tech');
Route::post('requests/take/new/{id}',[\App\Http\Controllers\technican\RequestController::class, 'getNewTechnican'
])->name('requestsViewTakeNew')->middleware('auth','tech');
Route::get('requests/end/{id}',[\App\Http\Controllers\technican\RequestController::class, 'endRequest'
])->name('requestsViewEnd')->middleware('auth','tech');
Route::post('to-do/add',[\App\Http\Controllers\technican\ToDoListController::class,'addToDo'
])->name('addToDo')->middleware('auth','tech');
/* Head Technican */
Route::get('settings/admin',[\App\Http\Controllers\technican\TechnicanController::class,'admin'
])->name('technican.settings')->middleware('auth','tech','headtech');
Route::get('settings/admin/technican',[\App\Http\Controllers\technican\TechnicanController::class,'adminSettings'
])->name('technican.settings.technican')->middleware('auth','tech','headtech');
Route::post('settings/admin/upgrade',[\App\Http\Controllers\technican\CredentialController::class,'upgradePermissions'
])->name('technican.permission.upgrade')->middleware('auth','tech','headtech');
Route::get('settings/admin/users/edit/{id}',[\App\Http\Controllers\technican\TechnicanController::class,'edit'
])->name('technican.settings.users.edit')->middleware('auth','tech','headtech');
Route::post('settings/admin/users/edit/submit',[\App\Http\Controllers\technican\TechnicanController::class,'editSubmit'
])->name('technican.settings.users.edit.submit')->middleware('auth','tech','headtech');
Route::get('general/user/delete/{id}',[\App\Http\Controllers\user\CredentialController::class,'delete'
])->name('user.delete')->middleware('auth','tech','headtech');;
Route::get('technican/admin/category',[\App\Http\Controllers\technican\CategoryController::class,'index'
])->name('technican.category')->middleware('auth','tech','headtech');
Route::post('technican/admin/category/submit',[\App\Http\Controllers\technican\CategoryController::class,'store'
])->name('technican.category.submit')->middleware('auth','tech','headtech');
Route::get('technican/admin/category/delete/{id}',[\App\Http\Controllers\technican\CategoryController::class,'destroy'
])->name('technican.category.delete')->middleware('auth','tech','headtech');
Route::get('technican/admin/category/edit/{id}',[\App\Http\Controllers\technican\CategoryController::class,'edit'
])->name('technican.category.edit')->middleware('auth','tech','headtech');
Route::post('technican/admin/category/edit/submit}',[\App\Http\Controllers\technican\CategoryController::class,'update'
])->name('technican.category.edit.submit')->middleware('auth','tech','headtech');
Route::get('technican/admin/forms',[\App\Http\Controllers\technican\FormsController::class,'index'
])->name('technican.forms')->middleware('auth','tech','headtech');
Route::post('technican/admin/forms/submit',[\App\Http\Controllers\technican\FormsController::class,'store'
])->name('technican.forms.submit')->middleware('auth','tech','headtech');
Route::get('technican/admin/forms/edit/{id}',[\App\Http\Controllers\technican\FormsController::class,'edit'
])->name('technican.forms.edit')->middleware('auth','tech','headtech');
Route::post('technican/admin/forms-edit/submit',[\App\Http\Controllers\technican\FormsController::class,'update'
])->name('technican.forms.edit.submit')->middleware('auth','tech','headtech');
