<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inputExcel;//import model

use DB;
use Excel;
use App\Imports\Users_Excel_Import;

class excelInputController extends Controller
{
    function import_excel(){
        $data=DB::connection('mysql_excel')->table('excel1')->get();
        return view('excelView.import_excel',compact('data'));
    }


    function import(Request $request)
    {
     $this->validate($request, [
      'select_file'  => 'required|mimes:xls,xlsx'
     ]);

     $path = $request->file('select_file')->getRealPath();
        
    //import 的參數列:
    //public function import($import, $filePath, string $disk = null, string $readerType = null);

     $data = Excel::import(new Users_Excel_Import,$path);//這樣就全部吃進去了，直接寫進DB
     return back()->with('success', 'Excel Data Imported successfully.');
    }




    function test(){
        $test=inputExcel::create([
        'name'=>'fuck',
        'gender'=>'fuck',
        'address'=>'fuck',
        'city'=>'fuck',
        'postal_code'=>'fuck',
        'country'=>'fuck'
        ]);
    }
}
