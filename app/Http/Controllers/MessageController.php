<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    //
    public function messages(){
        $messages = Message::get();
        return view('admin.messages')->with('messages',$messages);
    }
    public function supprimermessage($id){
        $message = Message::find($id);
        $message->delete();
        return back()->with('status',"Message has been deleted successfully");
    }
}
