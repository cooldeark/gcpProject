<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/testBigquery','bigQueryController@searchTableData');

Route::get('/','indexLoginController@loginPage');
Route::post('/checkAuth','indexLoginController@checkAuth');
Route::get('/index','indexLoginController@loginSuccess');
Route::get('/logout','indexLoginController@logOut');
Route::get('/register','indexLoginController@register');
Route::post('/userRegist','indexLoginController@createUser');
Route::get('/aboutMe','indexLoginController@aboutMe');
Route::get('/product','indexLoginController@product');
Route::get('/productDSP','indexLoginController@product');




Route::get('/errorPage','errorHandleController@errorPage');
Route::get('/confirmEmail','emailController@confirmEmail');
// Route::get('/verifyEmail','indexLoginController@verifyLoginPage');//就算是自己內部導，還是要在這裡建置get的route
Route::get('/sendMail','SendMailController@send');



//excel handle
Route::get('/testExcel','excelInputController@excel_index');
Route::post('/testExcel/import', 'excelInputController@import');
Route::get('/getExcelFileContent','excelInputController@getFileContent');
Route::get('/downLoadFile','excelInputController@exportDataByPDF');
Route::get('/downExampleFile','excelInputController@exportExampleExcel');


Route::get('/testEmail','indexLoginController@testEmail');

Route::get('/test',function(){
    return view('/welcome');
});

Route::get('/testExtend',function(){
    return view('/teachTest/testExtend');
});

Route::get('/wordCloud','indexLoginController@wordCloud');