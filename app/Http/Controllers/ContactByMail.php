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

        Mail::to($sender)->queue(new Contact($sender_name,$mail));
        // try {
        // } catch (\Throwable $th) {
        //     return redirect("/")->with("email_failure","email was not sent");
        // }

        return redirect("/")->with("email_success","email was sent successfully");
    }

}
