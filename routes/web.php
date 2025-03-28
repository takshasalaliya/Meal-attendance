<?php

use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\UserController;
use App\Http\Middleware\ValidUser;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use SimpleSoftwareIO\QrCode\Facades\QrCode;




Route::middleware(['Admin:admin'])->group(function(){
    //    
       Route::get('/', function () {
           return view('index');
       });
       Route::get('student',[UserController::class,'student']);
       Route::post('qrcode',[UserController::class,'qrcode']);
       Route::post('excel_qrcode',[UserController::class,'excel_qrcode']);
       Route::view('scanner','scanner');
       Route::get('scannerurl',[UserController::class,'scannerurl']);
       Route::get('scanner_submit/{id}',[UserController::class,'scanner_submit']);
      
       Route::get('qrselect',[UserController::class,'pdf_view']);
       Route::get('add_volunteer',[UserController::class,'volunteer']);
       Route::post('add_volunteer',[UserController::class,'add_volunteer']);
       Route::get('/dowload',[UserController::class,'dowload']);
       Route::get('/delete/{id}',[UserController::class,'delete']);
       Route::get('/deleteuser/{id}',[UserController::class,'deleteuser']);
         Route::post('/excel_manual',[UserController::class,'excel_manual']);
        Route::post('meal_select',[UserController::class,'meal_select']);
});
Route::middleware(['Volunteer:volunteer'])->group(function(){
    Route::view('scan','volunteer/scanner');
    Route::get('scannerdetail',[UserController::class,'scannerdetail']);
       Route::get('submit_scanner/{id}',[UserController::class,'submit_scanner']);
});

Route::get('/login_',[UserController::class,'login']);
Route::get('/register/{id}',[UserController::class,'form']);
Route::post('submit',[UserController::class,'from_submit']);
Route::get('/logout',[UserController::class,'logout']);
Route::view('/login','login');
Route::view('email','mail.email');

