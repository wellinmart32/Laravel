<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\MessageReceived;
use Illuminate\Support\Facades\Mail;

class MessageController extends Controller
{
    public function send(Request $request)
    {
        $data = array(
            'name' => 'AdoptaMejor',
            'subject' => $request->subject,
            'content' => $request->content,
        );


        Mail::send('mail.message-received', $data, function ($message) {
            $message->from('wellinmart32@gmail.com', 'wellinmart32');
            $message->to('wellinmart32@gmail.com')->subject('AdoptaMejor - comentario de wellinmart32');
        });

        return 'Mensaje enviado correctamente.';
    }

    public function index()
    {
        return view('mail.message-form');
    }
}
