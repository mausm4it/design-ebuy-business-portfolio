<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Mail\ReceiveContactMail;
use App\Models\Admin\SiteInfo;

class MessageController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Form validation

        $site_info = SiteInfo::first();
         
        $request->validate([
            'name'   =>  'required|max:255',
            'email'   =>  'required|max:255',
            'subject'   =>  'required|max:255',
            'message'   =>  'required|max:500',
        ]);

        // Get All Request
        $input = $request->all();

        // Record to database
        Message::firstOrCreate([
            'name' => $input['name'],
            'email' => $input['email'],
            'subject' => $input['subject'],
            'message' => $input['message'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        

         Mail::to($site_info->email)->send(new ContactFormMail($data));
         
         Mail::to($request->email)->send(new ReceiveContactMail($data));


        return redirect()->to('/'.'#contact')
            ->with('success', 'frontend.your_message_has_been_delivered');
    }

}