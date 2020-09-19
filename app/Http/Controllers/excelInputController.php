<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\inputExcel;//import model

use DB;
use Excel;
use App\Imports\Users_Excel_Import;
use App\Exports\Users_Excel_Export;
// use PhpOffice\PhpWord\PhpWord;
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
           
            //判斷前端丟過來的檔案是否符合我們的副檔名，select_file為前端<input name="select_file"...> 的name，所以會抓到他的名字
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

                // $path = $request->file('select_file')->getRealPath();//取得你上傳檔案的路徑,給windows用的
                //給linux用的
                $path1 = $request->file('select_file')->store('temp'); 
                $path=storage_path('app').'/'.$path1;  
                //給linux用的path
                
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

    function wordDownload(){
        date_default_timezone_set('Asia/Taipei');
        $PHPWord = new \PhpOffice\PhpWord\PhpWord();//將它具現化
        $document=$PHPWord->loadTemplate(storage_path('app/public/wordExport/wordTemplate.docx'));//載入範本
        //塞入值
        $nowDate=date('Y-m',time());
        $document->setValue('title_name', htmlspecialchars('姓名'));
        $document->setValue('name',  htmlspecialchars("James"));
        $document->setValue('y', (date("Y",time())));
        $document->setValue('m',  date("m", time()));
        $document->setValue('pay_y', (date("Y", strtotime("+1 month")) - 1911));
        $document->setValue('pay_m',  date("m", strtotime("+1 month")));
        $document->setValue('pay_d',  date("t", strtotime("+1 month")));
        $document->setValue('title_taxid',  '稅金');
        $document->setValue('taxid',  '123');
        $document->setValue('address_type', '地址類別');
        $document->setValue('address',  htmlspecialchars('天龍國天龍巷'));
        $document->setValue('mail_address',  htmlspecialchars('james@clickforce.com.tw'));
        $document->setValue('type',  '國內個人');
        // $document->setValue('totle_pay', number_format($this->tax_down($model->type, $totle_pay), 0, ".", ","));
        $document->setValue('totle_pay','1234');
        // $document->setValue('tax_pay', number_format($this->taxDeduct($model->type, $totle_pay), 0, ".", ","));
        $document->setValue('tax_pay','5566');
        // $document->setValue('pay', number_format($this->taxDeductTot($model->type, $totle_pay), 0, ".", ","));
        $document->setValue('pay','7788');
        // $document->setValue('detil1', "本期收益請款收益 : " . number_format($SupplierApplicationMonies_v, 0, ".", ","));
        $document->setValue('tax','20%');
        $document->setValue('detil1','本期收益請款收益 : 15852');
        $document->setValue('detil2','前年度未請款收益 : 5524');
        $document->setValue('detil3', "");

        $document->saveAs(storage_path('app/public/wordExport/goOut.docx'));//另存新檔案
        header('Content-Disposition: attachment; filename=測試檔案.docx');//這個是設置你匯出的檔案名稱
        readfile(storage_path('app/public/wordExport/goOut.docx'));//這個function是要把你剛剛設的參數東西，存入到哪個檔案裏面
        unlink(storage_path('app/public/wordExport/goOut.docx'));//這個是要刪除哪個檔案這樣，基本上可以不用這個參數，因為saveAs會把它overwrite掉，基本上也可以放
        exit;
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
