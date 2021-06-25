<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class AdminMessageController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'checkIsAdmin'])->except(['store']);
    }

    public function index(){
        $messags = Message::all();
        return \view('admin.message.index', [
            'messags' => $messags
        ]);
    }

    public function store(MessageRequest $request){        
        Message::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'desc' => $request->desc,
        ]);

        return redirect()->back();
    }

    public function show(Message $message){
        // \dd($message);
        $message->reading = 1;
        $message->save();

        // return \redirect()->back();
        return \view('admin.message.show',[
            'message' => $message
        ]);
    }

    public function destroy(Message $message)
    {
        $message->delete();
        session()->flash('success', 'تمة عملة الحذف بنجاح');
        return \redirect()->route('admin.message.index');
    }

}
