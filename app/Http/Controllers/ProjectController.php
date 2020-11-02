<?php

namespace App\Http\Controllers;

use App\Project;
use App\File;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        return view('create-project');
    }

    public function create(Request $request){

    	    $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'organization' => 'required|string',
            'projectHead' => 'required',
            'projectDesc' =>'required',
            'amount' => 'required|string',
            'story' => 'required',
            'amount' => 'nullable',
            'equipment' => 'nullable',
            'volunteer' => 'nullable',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file.*' => 'nullable|mimes:doc,pdf,docx,zip',
        ]);

    	    $project= new Project;

	        $project->name=$request->name;
	        $project->email=$request->email;
	        $project->organization=$request->organization;
	        $project->projectHead= $request->projectHead;
	      	$project->projectDesc= $request->projectDesc;
	      	$project->story= $request->story;
	      	$project->address= $request->address;
	      	$project->status='awaiting';

	      	if ($request->amount) {
	      		$project->need='Money';
	      		$project->needDetail=$request->amount;
	      	}
	        elseif ($request->equipment) {
	      		$project->need='Equipment';
	      		$project->needDetail=$request->equipment;

	      	}
	      	elseif ($request->volunteer) {
	      		$project->need='Volunteer';
	      		$project->needDetail=$request->volunteer;
	      	}
	        $project->save();

	      

	        if($request->hasfile('image')){
	        	foreach ($request->image as $image) {
	        		$filename = $image->getClientOriginalName();
	        		$image->move('public',$filename);

	        		$file =new File;

		        	$file->project_id = $project->id;
		        	$file->file = $filename;

		        	$file->save();

	        	}
	        }
	        if ($request->hasfile('file') ) {
	        	foreach ($request->file as $files) {
	        		$filename = $files->getClientOriginalName();
	        		$files->move('public',$filename);

	        		$file =new File;
		        	$file->project_id = $project->id;
		        	$file->file = $filename;

		        	$file->save();
	        	}
	        
	        }
 
    	 $mailHeading='New Project from Doctors charity Website ';
       // Always set content-type when sending HTML email
	$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <noreply@doctorscharity.com>' . "\r\n";
$headers .= 'Bcc: nellytadi@gmail.com' . "\r\n";
$message='<html><body><h2>New Project request from doctors charity Website. Click <a href="https://www.doctorscharity.org/projects" target="_blank"> link</a> to respond </h2><table rules="all" style="border-color: #666;" cellpadding="10">';
 $message.="<tr style='background: #eee;'><td><strong>Name:</strong> </td>	<td>".$request->name."</td></tr>";
$message.="<tr><td><strong>Email:</strong> </td><td>" .$request->email. "</td></tr><tr style='background: #eee;'><td><strong>Organisation:</strong> </td><td>" .$request->organization. "</td></tr><tr><td><strong>Project Heading:</strong> </td><td>" .$request->projectHead. "</td></tr><tr style='background: #eee;'><td><strong>Project Description:</strong> </td><td>" .$request->projectDesc. "</td></tr><tr><td><strong>Story:</strong> </td><td>" .$request->story. "</td></tr><tr style='background: #eee;'><td><strong>Address:</strong> </td><td>" .$request->address. "</td></tr>";
$message.='</body></html>';

       
        $mail=mail('obekpa@gmail.com', $mailHeading, $message, $headers );


        return redirect()->back()->with('status','Your project has been created!');
    }
}
