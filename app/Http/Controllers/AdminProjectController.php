<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\File;

class AdminProjectController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
    	$projects= Project::where('status','awaiting')->get();
    	return view('projects',compact('projects'));
    }
    public function approved($id)
    {
    	$projects= Project::find($id);
    	$projects->status='approved';
    	$projects->save();
    	return redirect()->route('admin.projects')->with('status', 'Project has been approved successfully');
    }
    public function reject($id)
    {
    	$projects= Project::find($id);
    	$projects->status='rejected';
    	$projects->save();

    	return redirect()->route('admin.projects')->with('status', 'Project has been rejected successfully');
    }

    public function show($id)
    {
    	$project= Project::find($id);
    	return view('project',compact('project'));
    }
}
