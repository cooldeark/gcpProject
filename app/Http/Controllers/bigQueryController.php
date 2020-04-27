<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Google\Cloud\BigQuery\BigQueryClient;
use Google\Cloud\Core\ExponentialBackoff;
use Google\Cloud\Core\ServiceBuilder;
putenv("GOOGLE_APPLICATION_CREDENTIALS=myweb-274810-5dd7c0d65a18.json");
class bigQueryController extends Controller
{
    function saveSearchTable(){
        $isComplete=false;
        // $project=new ServiceBuilder([
        //     'projectId' => 'myweb-274810',
        // ]);
        $bigquery= new BigQueryClient([
            'projectId'=>'myweb-274810'
        ]);
        $saveTable=$bigquery->dataset('james_profile_daily_log')->table('daily_log_20200407');
        $myQuery=sprintf("
        SELECT * FROM `myweb-274810.james_profile_daily_log.daily_log_20200413` ;
        ");

        $QueryJobConfiguration = $bigquery
                ->query($myQuery)
                ->allowLargeResults(true)
                ->writeDisposition('WRITE_TRUNCATE')
                ->createDisposition('CREATE_IF_NEEDED')
                ->destinationTable($saveTable);

            $result=$bigquery->startQuery($QueryJobConfiguration);
            $isComplete = $result->isComplete();

                while (!$isComplete) {
                    sleep(1); // let's wait for a moment...
                    $result->reload();
                    $isComplete = $result->isComplete();
                }
            print_r($result);
    }


    function searchTableData(){
        $isComplete=false;
        $bigquery= new BigQueryClient([
            'projectId'=>'myweb-274810'
        ]);
        $myQuery=sprintf("
        SELECT * FROM `myweb-274810.james_profile_daily_log.daily_log_20200421`;
        ");
            $QueryJobConfiguration=$bigquery->query($myQuery);
            $result=$bigquery->startQuery($QueryJobConfiguration);
            $isComplete = $result->isComplete();

                while (!$isComplete) {
                    sleep(1); // let's wait for a moment...
                    $result->reload();
                    $isComplete = $result->isComplete();
                }

            // $DataResult = $result->queryResults(['maxResults'=>0]);//取得資料方式1
            $DataResult=$result->queryResults();//可取資料

            foreach($DataResult as $value){//測試是否有取得資料
                print_r($value['userAgent']);exit;
            }

    }
}
