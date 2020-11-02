<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
class ContactController extends Controller
{
    public function store(Request $request)
    {
    	 $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'subject' => 'nullable|string',
            'message' => 'nullable',
        ]);

    	 $contact= new Contact;

    	 $contact->name=$request->name;
    	 $contact->email=$request->email;
    	 $contact->message=$request->message;
    	 $contact->subject=$request->subject;

    	 $contact->save();
    	 
    	 $mailHeading='New Contact Information from Doctors Charity Website';
       // Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@doctorscharity.com>' . "\r\n";
//$headers .= 'Cc: nellytadi@gmail.com' . "\r\n";
$message='<html><body><h2> Doctors Charity Contact Message </h2><table rules="all" style="border-color: #666;" cellpadding="10">';
 $message.="<tr style='background: #eee;'><td><strong>Name:</strong> </td>	<td>".$request->name."</td></tr>";
$message.="<tr><td><strong>Email:</strong> </td><td>" .$request->email. "</td></tr><tr style='background: #eee;'><td><strong>Message:</strong> </td><td>" .$request->message. "</td></tr>";
$message.='</body></html>';


       
        $mail=mail('obekpa@gmail.com', $mailHeading, $message, $headers );

    	 return redirect()->back()->with('status','Thank you for contacting us. We will get back to you as soon as possible');


    }
}
