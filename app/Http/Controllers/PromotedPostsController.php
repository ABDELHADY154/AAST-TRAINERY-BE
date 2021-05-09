<?php

namespace App\Http\Controllers;

use App\InternshipPost;
use Illuminate\Http\Request;

class PromotedPostsController extends Controller
{
    public function index()
    {
        $promotedPosts = InternshipPost::where('post_type', 'promotedPost')->get();
        return view('admin.promotedPost.index', ['posts' => $promotedPosts]);
    }

    public function create(Request $request)
    {

        return view('admin.promotedPost.create');
    }

    public function show($id)
    {
        $intern =  InternshipPost::where('id', $id)->first();
        return view('admin.promotedPost.show', ['intern' => $intern]);
    }

    public function destroy($id)
    {
        $intern =  InternshipPost::where('id', $id)->first();
        $intern->delete();
        return redirect(route('promotedPost.index'));
    }


    public function edit($id)
    {
        $post = InternshipPost::find($id);
        return view('admin.promotedPost.edit', ['intern' => $post]);
    }
}
