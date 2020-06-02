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
            ->where('create_by','=',auth()->user()->id)->get();//取得登入者所建的fileName，並且去重
            
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
            // $creator=$this->fuck=$request->fuck;//get view blade fuck value
            $creator=auth()->user()->id;
           
            $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
            ]);
            
            $getfileName=$request->file('select_file')->getClientOriginalName();//取得上傳檔案名稱
            $fileIsExist=DB::connection('mysql_excel')->table('excel1')->where('fileName',$getfileName)->first();//DB mysql_excel setting is in config/database.php

            if($fileIsExist){
                return back()->with('error','FileName Already Exist! Please change fileName .');//這裡對應到blade的$message=Session::get('error')，第一個error是Session::get的參數，第二個逗點後的是要顯示的內容
            }else{
                //下面兩行主要是用來擷取主要檔案名稱，不要含副檔名
                // preg_match_all('/([^$]*)\.[\w]{0,4}/',$getfileName,$fileName);//
                // $fileName=$fileName[1][0];//一定要用[1]才能拿到檔案ㄏ
                
                //  dd($fileName);//取得上傳檔案名稱，.xlsx or xls都能分析

                $path = $request->file('select_file')->getRealPath();//取得你上傳檔案的路徑
                $myValues=array('creator'=>$creator,'fileName'=>$getfileName);
                //import 的參數列:
                //public function import($import, $filePath, string $disk = null, string $readerType = null);

                $data = Excel::import(new Users_Excel_Import($myValues),$path);//這樣就全部吃進去了，直接寫進DB
                return back()->with('success', 'Excel Data Imported successfully.');
            }
           
            
        }else{
            return view('login.loginPage');
        }
     
    }

    function exportExampleExcel(){
        $fileName="範例檔案.xlsx";
        $data=DB::connection('mysql_excel')->table('excel1')->select(DB::raw('name,create_account,ACNO,product_name,invest_money,index_year'))->where('fileName','=',$fileName)->get()->toArray();
        return Excel::download(new Users_Excel_Export($data),'exampleFile.xlsx');
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
