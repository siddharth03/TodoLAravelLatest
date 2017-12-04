<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Mail;

class SendEmailOnBirthday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:Birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Birthday Mail Sender';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $users = User::whereMonth('date_of_birth', '=', date('m'))
                ->whereDay('date_of_birth', '=', date('d'))->get();
        
        foreach($users as $user) {
            Mail::send(['text'=> 'mail.email'], compact('user'), function($message) use($user) {
                $message->to($user->email)->subject('birthday to ' . $user->name);
                $message->from('siddharth.kothari@sts.in');
            });
        }
    }
}