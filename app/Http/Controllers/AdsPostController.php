<?php

namespace App\Http\Controllers;

use App\InternshipPost;
use Illuminate\Http\Request;

class AdsPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adsPosts = InternshipPost::where('post_type', 'adsPost')->get();
        return view('admin.adsPost.index', ['posts' => $adsPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.adsPost.create');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $adsPost = InternshipPost::find($id);
        if ($adsPost) {
            return view('admin.adsPost.show', ['intern' => $adsPost]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $intern =  InternshipPost::where('id', $id)->first();
        $intern->delete();
        return redirect(route('adsPost.index'));
    }
}
