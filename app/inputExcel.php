<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inputExcel extends Model
{
    //這裡一開始是空的，所以要添加相關的資料庫，如果你是用預設的，就不用，不過好習慣都加就好了
    protected $connection="mysql_excel";//你的資料庫
    public $table="excel1";//你的table
    //在fillable裡面的是代表哪些column可以被寫入的，沒有在裡面的都不能被寫入
    protected $fillable=[
        'create_by',
        'fileName',
        'name',
        'create_account',
        'ACNO',
        'product_name',
        'invest_money',
        'index_year'
    ];
    
}
