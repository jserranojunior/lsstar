<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\mailFirst;

class EmailController extends Controller
{
    public function index(){
        return view('emails.mails');
    }

    public function send(){
        Mail::to('jorgeserranojunior@hotmail.com')->send(new mailFirst());
        return 'OK';
    }
}
