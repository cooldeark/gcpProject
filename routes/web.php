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

//這裡的是不用確定是否有登入就可以用的
Route::get('/','indexLoginController@loginPage');
Route::get('/register','indexLoginController@register');
Route::post('/userRegist','indexLoginController@createUser');
Route::post('/checkAuth','indexLoginController@checkAuth');
Route::get('/confirmEmail','emailController@confirmEmail');
Route::get('/errorPage','errorHandleController@errorPage');
//測試的function
Route::get('/test001','testFunctionController@test001');
Route::get('/testEmail','indexLoginController@testEmail');


//此曾middleware判斷是否有登入
Route::group(['middleware'=>['checkAuth']],function(){
    Route::get('/contactMe','indexLoginController@contactMePage');
    Route::post('/leaveMessage','indexLoginController@leaveMessage');
    Route::get('/testBigquery','bigQueryController@searchTableData');
    Route::get('/index','indexLoginController@loginSuccess');
    Route::get('/logout','indexLoginController@logOut');
    
    Route::get('/aboutMe','indexLoginController@aboutMe');

    //product blade
    Route::get('/product','indexLoginController@product');
    Route::get('/productDMP','indexLoginController@productDMP');
    Route::get('/productDSP','indexLoginController@productDSP');
    Route::get('/productSSP','indexLoginController@productSSP');
    Route::get('/productEAS','indexLoginController@productEAS');
    Route::get('/productCUA','indexLoginController@productCUA');

    // Route::get('/verifyEmail','indexLoginController@verifyLoginPage');//就算是自己內部導，還是要在這裡建置get的route
    Route::get('/sendMail','SendMailController@send');

    //excel handle
    Route::get('/testExcel','excelInputController@excel_index');
    Route::post('/testExcel/import', 'excelInputController@import');
    Route::get('/getExcelFileContent','excelInputController@getFileContent');
    Route::get('/downLoadFile','excelInputController@exportDataByPDF');
    Route::get('/downExampleFile','excelInputController@exportExampleExcel');
    Route::get('/downLoadWordFile','excelInputController@wordDownload');

    

    Route::get('/dataTable/{happy?}','functionalController@limitDataTable');
    Route::get('/dataTableGetData','functionalController@getDataTableData');
    Route::get('/dataTableGetSizeList','functionalController@getDataTableSizeList');

    //test ip
    Route::get('/ipgood/{ip?}','functionalController@fuckip');//use by javascript get ip
    Route::get('/phpip','functionalController@phpip');
    Route::get('/realUserIp','functionalController@realUserIp');

    Route::get('/test',function(){
        return view('/welcome');
    });

    Route::get('/testExtend',function(){
        return view('/teachTest/testExtend');
    });

Route::get('/wordCloud','indexLoginController@wordCloud');

});