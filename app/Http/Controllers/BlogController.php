<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Blogfile;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        $blogs=Blog::latest('created_at')->simplePaginate(5);

        return view('blog',compact('blogs'));
    }



        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $blogs=Blog::find($id);
        
        return view('blogpost',compact('blogs'));
    }

}
