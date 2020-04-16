<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// 記得使用 use
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;


class SendMailController extends Controller
{
    public function send()
    {
        // 收件者務必使用 collect 指定二維陣列，每個項目務必包含 "name", "email"
        $to = collect([
            ['name' => '註冊者', 'email' => 'cooldeark@gmail.com']
        ]);
 
        // 提供給模板的參數，現在這裡的$params是不會有作用的
        /*
        $params = [
            'fuck' => '您好，這是一段測試訊息的內容'
        ];
        */
        // 若要直接檢視模板
        // echo (new Warning($data))->render();die;
        
        //下方是可以塞給我們sendMail這個class value
        Mail::to($to)->send(new sendMail($params));
    }
}
