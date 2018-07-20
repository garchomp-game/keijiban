<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Http\Requests\GalleryRequest;
use App\Models\User;
class GalleryController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(User $user)
    {
        $gallery = Gallery::where('user_id', $user->id)->get();
        return view('gallery.index',compact('gallery', 'user'));
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create(User $user)
    {
        return view('gallery.create', compact('user'));
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(GalleryRequest $request)
    {
        $gallery = new Gallery();
        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->content_type = $request->content_type;
        $gallery->content_description = $request->content_description;
        $gallery->user_id = user('id');
        if ($request->content_type == 'image') {
            $path = $request->file('content_description')->store(
                'public/GalleryImage'
            );
            $gallery->path = ltrim($path, 'public/');
        }
        $gallery->save();
        return redirect()->route('gallery.index', ['user' => user('id')]);
    }

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function show(User $user, Gallery $gallery)
    {
        return view('gallery.show', compact('gallery'));
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
    public function update(GalleryRequest $request, $id)
    {
        //
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
        Gallery::find($id)->destroy();
        return resource()->route('gallery.index');
    }
}
