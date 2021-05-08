<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactByMail extends Controller
{

    public function sendMail(Request $request){
        $sender_name = $request->name;
        $sender = $request->email;
        $mail = $request->message;

        Mail::to("orders@trendsettergods.net")->queue(new Contact($sender_name,$mail));


        return redirect("/")->with("email_success","email was sent successfully");
    }

}
