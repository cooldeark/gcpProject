<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($outInputValue)
    {

        //外部傳進來的參數
        $this->myValue=$outInputValue;
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //此為user寄信給我
        if(array_key_exists('userSendtoMyself', $this->myValue)){
            return $this->subject('JamesWeb User寄信來拉')//信件的主旨
            ->view('mail.userSendMail')->with(['params'=>$this->myValue]); 

        }else if(array_key_exists('sendToUser', $this->myValue)){
            return $this->subject('JamesWeb')//信件的主旨
            ->view('mail.sendToUserMail')->with(['params'=>$this->myValue]); 
        }else{
            return $this->subject('JamesWeb 註冊驗證信')//信件的主旨
            ->view('mail.sendMail')->with(['params'=>$this->myValue]);
        }
    }
}
