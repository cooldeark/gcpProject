<?php

namespace App\Imports;
// use DB;
use App\inputExcel;
use Maatwebsite\Excel\Concerns\ToModel;
//Users_Excel_import這檔案他類似一個中繼站，抓著我們所創立的model:inputExcel，給予maatwebsite的function import使用
class Users_Excel_Import implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
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
        
        return new inputExcel([
           
                    'name'  => $row[0],
                    'gender'        => $row[1],
                    'address'       => $row[2],
                    'city'          => $row[3],
                    'postal_code'   => $row[4],
                    'country'       => $row[5],
                
        ]);
        
    }
}
