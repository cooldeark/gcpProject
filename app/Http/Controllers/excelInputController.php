<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inputExcel;//import model

use DB;
use Excel;
use App\Imports\Users_Excel_Import;
use App\Exports\Users_Excel_Export;

use Auth;//如果要使用驗證要有這個
class excelInputController extends Controller
{

    

    function excel_index(){
        if(Auth::check()){
            $loginUserDataList=DB::connection('mysql_excel')->table('excel1')->select(DB::raw('distinct(fileName) as fileName'))
            ->where('create_by','=',31)->get();
            
            // dd(auth()->user()->id);//get loginUser ig

            $data=DB::connection('mysql_excel')->table('excel1')->get();//get all data
            
            return view('excelView.import_excel',compact('data','loginUserDataList'));
        }else{
            return view('login.loginPage');
        }
        
    }


    function import(Request $request)
    {
        if(Auth::check()){
            $creator=$this->fuck=$request->fuck;
           
            $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
            ]);
            
            $getfileName=$request->file('select_file')->getClientOriginalName();//取得檔案名稱
            
            //下面兩行主要是用來擷取主要檔案名稱，不要含副檔名
            // preg_match_all('/([^$]*)\.[\w]{0,4}/',$getfileName,$fileName);//
            // $fileName=$fileName[1][0];
            
            //  dd($fileName);//取得上傳檔案名稱，.xlsx or xls都能分析

            $path = $request->file('select_file')->getRealPath();
            $myValues=array('creator'=>$creator,'fileName'=>$getfileName);
            //import 的參數列:
            //public function import($import, $filePath, string $disk = null, string $readerType = null);

            $data = Excel::import(new Users_Excel_Import($myValues),$path);//這樣就全部吃進去了，直接寫進DB
            return back()->with('success', 'Excel Data Imported successfully.');
        }else{
            return view('login.loginPage');
        }
     
    }


    function getFileContent(Request $request){//$value 不可以直接放此值，因為我們是用laravel所以要用Request $request
        $fileName=$request->params;
        $queryData=DB::connection('mysql_excel')->table('excel1')->select(DB::raw('name,create_account,ACNO,product_name,invest_money,index_year'))->where('fileName','=',$fileName)->get()->toArray();
        // dd($queryData);
        return $queryData;
        
    }

    function exportDataByPDF(Request $request){
        $fileName=$request->params;
        $data=DB::connection('mysql_excel')->table('excel1')->select(DB::raw('name,create_account,ACNO,product_name,invest_money,index_year'))->where('fileName','=',$fileName)->get()->toArray();
        // dd($data);
        return Excel::download(new Users_Excel_Export($data),'fuck.xlsx');

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
