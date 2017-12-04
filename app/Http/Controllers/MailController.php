<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function email()
    {
        $data = array('name'=>"virendra sehwag");
        Mail::send(['text'=>'mail.email'], $data, function($message)
        {
            $message->to('ersiddharthkothari@gmail.com')->subject('Mail Through Laravel Framework');
            $message->from('siddharth.kothari@sts.in');
        });
        echo "mail sent";
    }
    
}
