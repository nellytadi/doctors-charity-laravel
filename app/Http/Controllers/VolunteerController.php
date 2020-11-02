<?php

namespace App\Http\Controllers;

use App\Project;
use App\Volunteer_physical;
use App\Volunteer_tele;
use App\Volunteer;
use Illuminate\Http\Request;
use Auth;

class VolunteerController extends Controller
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


    public function index(){

        $allprojects=Project::all();
        return view('volunteer',compact('allprojects'));
    	
    }


    public function create(Request $request){

        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'location' => 'required|string',
            'specialty' =>'required|string',
            'field' => 'required|string',
            'qualification' => 'required|string',
        ]);

        $volunteer_physical= new Volunteer_physical;

        $volunteer_physical->name=$request->name;
        $volunteer_physical->email=$request->email;
        $volunteer_physical->location=$request->location;
        $volunteer_physical->specialty=$request->specialty;
        $volunteer_physical->field=$request->field;
        $volunteer_physical->qualification=$request->qualification;

        $volunteer_physical->save();

        return redirect('home');
    }

    public function createtele(Request $request)
    {
        
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'location' => 'required|string',
            'specialty' =>'required|string',
            'field' => 'required|string',
            'qualification' => 'required|string',
            'desiredtime' => 'required|string',
        ]);

        $volunteer_tele= new Volunteer_tele;

        $volunteer_tele->name=$request->name;
        $volunteer_tele->email=$request->email;
        $volunteer_tele->location=$request->location;
        $volunteer_tele->specialty=$request->specialty;
        $volunteer_tele->field=$request->field;
        $volunteer_tele->qualification=$request->qualification;
        $volunteer_tele->desiredtime=$request->desiredtime;
        $volunteer_tele->save();

        return redirect('home');
    }


    public function storeEach($id)
    {
         $project=Project::find($id);
         $volunteer= new Volunteer;

         $volunteer->projectHead=$project->projectHead;
         $volunteer->project_id=$project->id;
         $volunteer->name=Auth::user()->name; 
         $volunteer->email=Auth::user()->email;
         $volunteer->volunteertype='Physical';

         $volunteer->save();
         return redirect()->back()->with('volunteerstatus','You have offered to volunteer on Doctors Charity. We will get back to you as soon as possible');


    }
}
