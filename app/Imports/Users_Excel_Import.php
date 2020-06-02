<?php

namespace App\Imports;
// use DB;
use App\inputExcel;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;//這可以跳過第一條row
use PhpOffice\PhpSpreadsheet\Shared\Date;//可以存時間格式

//Users_Excel_import這檔案他類似一個中繼站，抓著我們所創立的model:inputExcel，給予maatwebsite的function import使用
class Users_Excel_Import implements ToModel,WithStartRow//,WithStartRow這是跟上面跳過第一條row一起加入的
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */


    public function __construct($params){//params是controller的這些資料進來=> $myValues=array('creator'=>$creator,'fileName'=>$getfileName);
        $this->myValue=$params;
        
    }

    public function model(array $row)
    {
        
        
        //從這裡開始是舊的方式
        //第一次foreach，rows[0]=>會是n ，會是name的第一位，所以row[3]會是e
        
        // foreach ($row as $rows) 
        // {
            
        //    // dd($row);//會是一個陣列，你的title陣列長這樣
            
        //      array:6 [▼
        //         0 => "Name"
        //         1 => "gender"
        //         2 => "address"
        //         3 => "city"
        //         4 => "postal_code"
        //         5 => "country"
        //         ]
             
        //     $data[] = array(
        //             'name'  => $row[0],
        //             'gender'        => $row[1],
        //             'address'       => $row[2],
        //             'city'          => $row[3],
        //             'postal_code'   => $row[4],
        //             'country'       => $row[5],
        //         );
        // }
        // DB::connection('mysql_excel')->table('excel1')->insert($data);


        //到這裡都是舊的，下面是新的，不過他會把第一排也吃進去，就是title那欄位
        
        //這裡是判斷excel裡面轉時間的問題，Date::excelToDateTimeObject只能用在unixTime，type only can eat integer
        // dd($row[1]);//從excel存進來的input 時間格式為mircosoft time
        
        if(gettype($row[1])=='integer'){
            $row1Data=Date::excelToDateTimeObject($row[1]);
        }else if(gettype($row[1])=='string'){
            $converStringDateToTime=25569+(strtotime($row[1])/86400);//this is unixTime to excel date(microsoft time)
            $row1Data=Date::excelToDateTimeObject($converStringDateToTime);
        }
        
        return new inputExcel([
                    'create_by'=>$this->myValue['creator'],
                    'fileName'=>$this->myValue['fileName'],
                    'name'  => $row[0],
                    'create_account'        =>$row1Data ,
                    'ACNO'       => $row[2],
                    'product_name'          => $row[3],
                    'invest_money'   => $row[4],
                    'index_year'       => $row[5],
                
        ]);
        
    }
//這個是跟上面一起做搭配的，都要有哦，這個funciton return 的數字就是讓excel第幾排不要被匯入DB，return 2 就是第一排不要匯入，第二排開始匯入
    public function startRow(): int
    {
        return 3;
    }
}
