<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function sendMessage(Request $request){
        $incomming_fields = $request->validate([
            'sender_name' => ['required', 'string', 'max:255', 'min:4'],
            'sender_email' => ['required', 'email'],
            'sender_message' => ['required', 'string', 'max:255'],
        ]);

        $message = Message::create($incomming_fields);

        return back()->withErrors(['success' => 'Wiadomość została wysłana!']);
    }

    public function setMessageAsReaded(Message $message){
        $message->setAttribute('is_read', true);
        $message->save();

        return back()->withErrors(['success' => 'Wiadomosc przeczytana!']);
    }

    public function deleteMessage(Message $message){
        $message->delete();

        return back()->withErrors(['success' => 'Wiadomosc usunięta!']);
    }
}
