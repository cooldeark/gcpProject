<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Config;
use Response;
use App\IDtoName;
class functionalController extends Controller
{
    function __construct(Request $request){
        $this->fuck=$request->happy;
        // dd($this->fuck);
    }
    public function limitDataTable(){

        //第一種取資料方式
        $firstQueryType=DB::connection('mysql_ssp')->select('
        SELECT
        *
    FROM
        (
        SELECT
            zoneID,
            zoneName,
            siteID,
            siteName,
            supplierID,
            ssp_supplier.name AS supplierName
        FROM
            (
            SELECT
                ssp_zone.id AS zoneID,
                ssp_zone.name AS zoneName,
                ssp_site.id AS siteID,
                ssp_site.name AS siteName,
                ssp_site.supplier_id AS supplierID
            FROM
                ssp_zone
            LEFT JOIN ssp_site ON ssp_zone.site_id = ssp_site.id
        ) AS a
    LEFT JOIN ssp_supplier ON a.supplierID = ssp_supplier.id
    ) AS b
        ');

    // dd($firstQueryType);
    //第一種取資料方式 END
    
//--------------------------------------------------------------------------------


    //第二種取資料方式，切記最後select放在最後就好，一次select所有你要的欄位與要設置的別名
    $secondQueryType=DB::connection('mysql_ssp')->table('ssp_zone')->leftJoin('ssp_site',function($query){
        $query->on('ssp_zone.site_id','=','ssp_site.id');
    })->leftJoin('ssp_supplier',function($query){
        $query->on('ssp_site.supplier_id','=','ssp_supplier.id');
    })->select(DB::raw('ssp_zone.id AS zoneID,ssp_zone.name AS zoneName,ssp_site.id AS siteID,ssp_site.name AS siteName,ssp_site.supplier_id AS supplierID,ssp_supplier.name as supplierName'))->get()->toArray();
    // dd($secondQueryType);
    //第二種取資料方式end
    
    //這裡是拿下拉選單的值給予ui用
    $dataTableTypeList=Config::get('tableTypeList')['webType'];
    return view('productBlade/dataTable',compact('dataTableTypeList'));

    }

    public function getDataTableData(Request $request){

        
        //這裡的$select_arr是用來組成query用的，所以如要更改要看這裡，這裡會隨著你的DB table column而有不同

        $select_arr=[
             '0' => 'id',
             '1' => 'name',
             '2' => 'type',
             '3' => 'size_id',
        ];

/*//原本的參數
        $select_arr = [
            '0' => 'id',
            '1' => 'type',
            '2' => 'name',
            '3' => 'size_id',
            '4' => 'zone.type',
            '5' => 'zone.status'
        ];
*/
        $select_array = [
            'zone.id as id',
            'zone.type as type',
            'zone.name as name',
            'zone.size_id as size_id',
            'zone.status as status',
            'site.id as site_id',
            'site.name as site_name',
            'site.supplier_id as supplier_id',
            'zone.charge_mode as charge_mode',
            'zone.profit as profit',
            'zone.fix_profit as fix_profit',
            'zone.default_ad as default_ad',
            'zone.lazy_loading as lazy_loading',
            'zone.is_adult as is_adult'
        ];
        //這裡的$select_arr是用來組成query用的 end


        
        /**
         * 這裡的request，是因為與dataTable有掛勾，所以會丟很多dataTable UI上面的參數過來，
         * 所以我們用foreach的方式去剖析到底丟過來什麼東西而去做相關參數的query設定。
         */
        foreach ($request->query as $key => $value) {
        
            switch ($key) {
                case 'start':
                    $start = $value;
                    break;
                case 'length':
                    $length = $value;
                    break;
                case 'draw':
                    $draw = $value;
                    break;
                case 'order':
                    if ($value[0]['column'] != '4') {
                        $order[0] = $select_arr[(int) $value[0]['column']];
                        $order[2] = $value[0]['dir'];
                    } else {
                        $order[0] = $select_arr[0];
                        $order[2] = $value[0]['dir'];
                    }
                    break;
                case 'search'://這個很重要，可以知道使用者有沒有使用搜尋功能
                    if (isset($value['value'])) {
                        $d = json_decode($value['value']);//這裡array 的 index就是col的順序，0為版位號碼，1維版位名稱以此類推，不過因為我們要一次全找，所以這裡變成是所有搜尋value
                        $user_is_search = true;//這裡判斷使用者是不是有輸入值
                        $zoneNotRepeat = true;
                        
                        $search_col_value=$d->val;
                        $combinedQuery='';
                        $allValueEmpty=0;//用來檢查是不是搜尋欄都沒有輸入值
                        foreach($search_col_value as $col => $val){
                            //如果沒有值，就不放入搜尋列
                            if($val==""){
                                $allValueEmpty++;
                            }else{
                                //判斷combinedQuery是否有值，因為如果已經有了，代表query要加上and
                                if($combinedQuery!=''){
                                    $nowSelect=$select_arr[$col];
                                    if($nowSelect=='size_id'){
                                        $col_size_id_array=explode(',',$val);//把user輸入的sizeID編成陣列
                                        $nowQueryValueSentence="";//這個是用來組合user輸入的sizeID的query語句
                                        $querySetenceLength=count($col_size_id_array);//user輸入幾個值
                                        
                                        foreach($col_size_id_array as $sizeIDIndex=>$sizeIDValue){
                                            $querySetenceLength--;//先扣一，這樣就可以去判斷是不是最後一個，要不要加and
                                            $nowQueryValue=sprintf('(^%s$|^%s,|,%s,|,%s$)',$sizeIDValue,$sizeIDValue,$sizeIDValue,$sizeIDValue);//組合user輸入的sizeID
                                            if($querySetenceLength==0){//如果為0最後的query就不用加上and
                                                $nowQueryValueSentence.=$nowSelect.' regexp '.'"'.$nowQueryValue.'"';
                                            }else{
                                                $nowQueryValueSentence.=$nowSelect.' regexp '.'"'.$nowQueryValue.'"'.' and ';
                                            }                                                 
                                        }

                                        $querySentence=' and '.$nowQueryValueSentence;
                                        $combinedQuery.=$querySentence;
                                        
                                    }else{
                                        $querySentence=' and '.$nowSelect.' like '.'"%'.$val.'%"';//要記得like後面是接字串
                                        $combinedQuery.=$querySentence;
                                    }
                                    
                                }else{
                                    $nowSelect=$select_arr[$col];
                                    if($nowSelect=='size_id'){
                                        $col_size_id_array=explode(',',$val);
                                        $nowQueryValueSentence="";
                                        $querySetenceLength=count($col_size_id_array);
                                        
                                        foreach($col_size_id_array as $sizeIDIndex=>$sizeIDValue){
                                            $querySetenceLength--;
                                            $nowQueryValue=sprintf('(^%s$|^%s,|,%s,|,%s$)',$sizeIDValue,$sizeIDValue,$sizeIDValue,$sizeIDValue);
                                            if($querySetenceLength==0){
                                                $nowQueryValueSentence.=$nowSelect.' regexp '.'"'.$nowQueryValue.'"';
                                            }else{
                                                $nowQueryValueSentence.=$nowSelect.' regexp '.'"'.$nowQueryValue.'"'.' and ';
                                            }                                                 
                                        }
                                        $querySentence=$nowQueryValueSentence;
                                        $combinedQuery.=$querySentence;
                                        
                                    }else{
                                        $querySentence=$nowSelect.' like '.'"%'.$val.'%"';//要記得like後面是接字串
                                        $combinedQuery.=$querySentence;
                                    }
                                    
                                }
                                
                            }
                        }
                        


                        //下面兩個是要去mysql 搜尋用的參數，是用於只有單欄搜尋的時候
                        /*
                        $serach_col = $select_arr[$d->col];
                        $search_val = $d->val;
                        */

                        /*
                        //這裡面的邏輯牽扯到不同使用者進來看到不同的畫面，所以要這樣去操作，例如管理者可以看到8欄位，使用者只有七欄這樣
                        if ($d->col!=1 && $d->col!=0) {
                            $serach_col = $select_arr[$d->col-1];
                            $search_val = $d->val;
                        } else {
                            $serach_col = $select_arr[$d->col];
                            $search_val = $d->val;
                        }
                        */
                    } else {
                        $user_is_search = false;
                    }
                    break;
                default:
                    break;
            }
        }

        //大重點:要用dataTable分表的話，必須要先offset再來limit
        /*A方式
        給予data，這個是以沒有要客製化UI的資料，直接給予query出來的資料讓畫面顯示
        */
        //$myData=DB::connection('mysql_ssp')->table('ssp_zone')->select(DB::raw('id,type,name'))->offset($start)->orderBy($order[0], $order[2])->limit($length)->get()->toArray();
        //$result['data']=$myData;
        //A方式結束

        /**
         * B方式給予data，
         * 因為我們還會需要客製化一些資料在最後result裡面，所以我們不直接toArray，而是用foreach去做處理
         */


        //這裡判斷，如果使用者有丟value進來搜尋的話，我們就要用它有丟資料的東西去做搜尋
        if($user_is_search){
            
            if($allValueEmpty==4){//代表所有值都是空的所以找全部
                $myData=DB::connection('mysql_ssp')->table('ssp_zone')->select(DB::raw('id,type,name,size_id'))->offset($start)->orderBy($order[0], $order[2])->limit($length)->get();
                //這裡的count是讓dataTable做顯示用的，計算你現在在第幾頁
                $Zone_count = DB::connection('mysql_ssp')->table('ssp_zone')->count();
                $Zone_count2 = $Zone_count;
            }else{
            $finalQuery=sprintf('select id,name,type,size_id from ssp_zone where %s limit %s offset %s',$combinedQuery,$length,$start);
            $myData=DB::connection('mysql_ssp')->select($finalQuery);
            //這個是單一搜尋時使用的
            /*
            $myData=DB::connection('mysql_ssp')->table('ssp_zone')->select(DB::raw('id,type,name,size_id'))->where($serach_col,'like','%'.$search_val.'%')->offset($start)->orderBy($order[0], $order[2])->limit($length)->get();
            */

            

            //這裡因為他有下搜尋條件式，所以我們不可以讓她用原先的raw數量去判別，要另外算，因為如果加上offset & limit他就無法顯示下一頁了
            // $filter=DB::connection('mysql_ssp')->table('ssp_zone')->select(DB::raw('id,type,name,size_id'))->where($serach_col,'like','%'.$search_val.'%')->get()->count();//原先的單獨寫法
            
            $Zone_count = DB::connection('mysql_ssp')->table('ssp_zone')->count();

            //這裡因為他有下搜尋條件式，所以我們不可以讓她用原先的raw數量去判別，要另外算，因為如果加上offset & limit他就無法顯示下一頁了
            $filterQuery=sprintf('select id,name,type,size_id from ssp_zone where %s ',$combinedQuery);
            $filterData=DB::connection('mysql_ssp')->select($filterQuery);
            $filter=count($filterData);
            $Zone_count2 = $filter;
            }
        }else{
            $myData=DB::connection('mysql_ssp')->table('ssp_zone')->select(DB::raw('id,type,name,size_id'))->offset($start)->orderBy($order[0], $order[2])->limit($length)->get();
            //這裡的count是讓dataTable做顯示用的，計算你現在在第幾頁
            $Zone_count = DB::connection('mysql_ssp')->table('ssp_zone')->count();
            $Zone_count2 = $Zone_count;
        }

        //dataTable吃的json格式，就是要下面那樣
        $result = [
            "draw" => $draw,
            "recordsTotal" => $Zone_count,//總共有多少筆
            "recordsFiltered" => $Zone_count2,//現在顯示的筆數
            "data" => array(),
        ];

        $getSizeList=new IDtoName;
        $getSizeList=$getSizeList->getDataTableSizeList();

        //這裡把我們的資料整理好丟給result的data裡面
        foreach($myData as $index=>$value){
            $ar = [];
            $ar["id"] = $value->id;

            //畫面上type顯示替換
            if($value->type==1){
                $myType='Web';
            }else if($value->type==2){
                $myType="Phone";
            }else{
                $myType="Adult";
            }


            $ar["type"]=$myType;
            $ar["name"]=$value->name;

            $mySize=explode(',',$value->size_id);
            $mySizeName="";
            
            //這裡將版位的ID變成名稱做顯示
            try{
                foreach($mySize as $sizeIndex=>$sizeValue){
                    $mySizeName.=$getSizeList[$sizeValue]."<br>";
                }
            }catch(\Throwable $e){
                // dd($e->getMessage());//印出錯誤
                dd($value);
            }
            
            $ar["size_id"]=$mySizeName;

            array_push($result['data'],$ar);
        }
        
        
        return json_encode($result, true);
    }



    function getDataTableSizeList(Request $req){
        //這個function 是給 多重選擇下拉選單用的
        $getData=new IDtoName;
        //這裡要確認是否有輸入資料進來做search
        if($req->qu == null || $req->qu == ""){
            $sizeList=$getData->getDataTableSizeList();
        }else{
            $size_array1 = $getData->getDataTableSizeList();
            $sizeList= [];
           
            foreach ($size_array1 as $key => $value) {
                if(preg_match("/$req->qu/i",$value)){
                    $sizeList[$key]=$value;
                }
  
            }
        }
        //這裡一定要用下面的方式寫，才可以讓ui不會一直轉圈圈，不然會一直轉，要符合格式
        $remote_format = [
            "success" => true,
            "result" => $sizeList,
        ];
        
      return Response::json($remote_format,201);//這裡201不是必要
    }




















    public function fuckip(Request $request){
        dd($request->country.'fkme');
        return $request->ip;
    }





    
    public function phpip(){
        //這是不對低，因為這只會取得當下server proxy的ip資料，不是我們要的user client資料
        $getUserInfo=json_decode(file_get_contents('http://ip-api.com/json'));
        dd($getUserInfo);
    }







    public function realUserIp(){

        //測試code，可以不用消耗次數而去測試
        /*
        if(Session::has('userInfo')){
            //do nothing
            
        }else{
            $userInfo=json_decode('{"ip":"111.241.133.167","type":"ipv4","continent_code":"AS","continent_name":"Asia","country_code":"TW","country_name":"Taiwan","region_code":"CYI","region_name":"Taiwan","city":"Taipei","zip":"100","latitude":25.042139053344727,"longitude":121.51986694335938,"location":{"geoname_id":1668341,"capital":"Taipei","languages":[{"code":"zh","name":"Chinese","native":"\u4e2d\u6587"}],"country_flag":"http:\/\/assets.ipstack.com\/flags\/tw.svg","country_flag_emoji":"\ud83c\uddf9\ud83c\uddfc","country_flag_emoji_unicode":"U+1F1F9 U+1F1FC","calling_code":"886","is_eu":false}}');
            Session::put('userInfo',$userInfo);
        }
        
        Session::flush();//測試沒有session的邏輯
        if(is_null(Session::get('userInfo')) || empty(Session::get('userInfo'))){
            $getUserCountry='TW';
            dd('fuck');
        }else{
            $getUserInfo=Session::get('userInfo');
            $getUserCountry=$getUserInfo->country_code;
        }
        
        dd($getUserCountry);
        */
        //測試code end

        //這個才是真的有取得user ip
        //$userIp=$_SERVER['REMOTE_ADDR'];
        //user info by ipstack.com
        // $userInfo=json_decode(file_get_contents('http://api.ipstack.com/'.$_SERVER['REMOTE_ADDR'].'?access_key=c10d75ab24cc78ff5eae81fcb9a129e8'));
        /*
        //這是假資料
        $userInfo=json_decode('{"ip":"111.241.133.167","type":"ipv4","continent_code":"AS","continent_name":"Asia","country_code":"TW","country_name":"Taiwan","region_code":"CYI","region_name":"Taiwan","city":"Taipei","zip":"100","latitude":25.042139053344727,"longitude":121.51986694335938,"location":{"geoname_id":1668341,"capital":"Taipei","languages":[{"code":"zh","name":"Chinese","native":"\u4e2d\u6587"}],"country_flag":"http:\/\/assets.ipstack.com\/flags\/tw.svg","country_flag_emoji":"\ud83c\uddf9\ud83c\uddfc","country_flag_emoji_unicode":"U+1F1F9 U+1F1FC","calling_code":"886","is_eu":false}}');
        Session::put('userInfo',$userInfo);
        */
        if(Session::has('userInfo')){
            //do nothing
        }else{
            $userInfo=json_decode(file_get_contents('http://api.ipstack.com/'.$_SERVER['REMOTE_ADDR'].'?access_key=c10d75ab24cc78ff5eae81fcb9a129e8'));
            Session::put('userInfo',$userInfo);
        }
        if(is_null(Session::get('userInfo')) || empty(Session::get('userInfo'))){
            $getUserCountry='TW';
        }else{
            $getUserInfo=Session::get('userInfo');
            $getUserCountry=$getUserInfo->country_code;
        }
    }


}
