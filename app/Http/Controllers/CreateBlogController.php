<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Blogfile;
use Illuminate\Http\Request;

class CreateBlogController extends Controller
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



    public function create()
    {
    	return view('createBlog');
    }

    public function store(Request $request)
    {
    	 $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email',
            'postHead' => 'required',
            'post' =>'required',
            'url' => 'nullable|string',
            'image.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
           
        ]);

    	    $blog= new Blog;

	        $blog->name=$request->name;
	        $blog->email=$request->email;
	        $blog->postHead= $request->postHead;
	      	$blog->post= $request->post;
	      	$blog->url= $request->url;
	    
	        $blog->save();

	      

       if($request->hasfile('image')){
	        	foreach ($request->image as $image) {
	        		$filename = $image->getClientOriginalName();
	        		$image->move('public',$filename);

	        		$file =new Blogfile;

		        	$file->blog_id = $blog->id;
		        	$file->file = $filename;

		        	$file->save();

	        	}
	        }


        return redirect()->back()->with('status','Your Post has been Published!');
    }



}

