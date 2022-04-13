<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBlogRequest;
use App\Models\Blog;
use App\Policies\BlogPolicy;
use App\Policies\UserPolicy;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $this->authorize('create', Blog::class);
       
       $blog = Blog::create([
           'title' => $request->title,
           'description'=>$request->description,
           'created_by'=>Auth::user()->id
       ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog) : JsonResponse
    {
        if($blog) {
            return response()->json(['blog' => $blog]);
        }
        return response()->json(['not found']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreBlogRequest $request,Blog $blog)
    {
        $this->authorize('update', Auth::user(), Blog::class);
       $blog->update([
            'title' => $request->title,
            'description'=>$request->description,
        ]);
        return response()->json(['message' => 'blog is updated successfully']);
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $this->authorize('delete', Auth::user(), Blog::class);
        $blog->delete();
        return response()->json(['message' => 'blog is deleted successfully']);
    }
}
