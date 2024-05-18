<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\AdminController;

Route::get('/home', [HomeController::class, 'showHome'])->name('home');


Route::get('/about', function () {
    return view('About');
});

Route::get('/services', function () {
    return view('services');
});


Route::get('/signup',[RegistController::class,'create'])->name('showRegist');


Route::post('/RegistProcess',[RegistController::class,'store'])->name('storeUser');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('loginUser');
Route::post('/logout', [LoginController::class,'logout'])->name('logout');


Route::get('/event',[EventController::class,'index'])->name('showEvent');
Route::get('/uploadEvent', function () {return view('uploadEvent');});
Route::post('/uploadEvent', [EventController::class,'store'])->name('uploadEvent');
Route::get('/event/search', [EventController::class, 'searchEvent'])->name('searchEvent');
Route::get('/event/{id}', [EventController::class, 'showDetail'])->name('detailEvent');
Route::get('/event/edit/{id}', [EventController::class, 'editEvent'])->name('editEvent');
Route::post('/event/update/{id}', [EventController::class, 'updateEvent'])->name('updateEvent');

Route::get('/company',[CompanyController::class,'index'])->name('company');
Route::get('/uploadCompany',function(){
    return view('admin.uploadCompany');
});
Route::get('/company/search', [CompanyController::class, 'searchPerusahaan'])->name('searchCompany');
Route::get('/company/{id}', [CompanyController::class, 'showDetail'])->name('detailCompany');
Route::get('/company/{id}/formSponsor', [CompanyController::class, 'showFormSponsor'])->name('formSponsor');
Route::post('/storeSponsor', [CompanyController::class, 'storeSponsor'])->name('storeSponsor');


// ADMIN SIDE
Route::post('/uploadCompany', [AdminController::class,'store'])->name('uploadCompany');
Route::middleware('admin')->get('/adminHome', [AdminController::class, 'index'])->name('adminHome');
Route::post('/update-status-approval', [AdminController::class, 'updateStatusApproval']);
Route::post('/update-status-transfer', [AdminController::class, 'updateStatusTransfer']);

Route::get('download/proposal-sponsor/{file_name}', [AdminController::class,'downloadProposalSponsor'])->name('download.proposal-sponsor');
Route::get('download/proposal-kegiatan/{file_name}', [AdminController::class,'downloadProposalKegiatan'])->name('download.proposal-kegiatan');
Route::get('download/surat-pengantar/{file_name}', [AdminController::class,'downloadSuratPengantar'])->name('download.surat-pengantar');



