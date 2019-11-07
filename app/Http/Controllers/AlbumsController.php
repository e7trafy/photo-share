<?php

namespace App\Http\Controllers;

use App\Album;
use App\Http\Controllers\Admin\AlbumsTrait;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class AlbumsController extends Controller
{
//        public function __construct()
//    {
//        $this->middleware('auth');
//    }
    use AlbumsTrait;

    public function index()
    {
        $albums = Auth::user()->albums()->with('photos')->orderBy('created_at', 'desc')->get();
        return view('site.albums.home', compact('albums'));
    }

    public function getUserAlbums($id = null)
    {
        if (Auth::check() && Auth::user()->getId() == $id) {
            $albums = Auth::user()->albums()->with('photos')->orderBy('created_at', 'desc')->get();
        } else {
            $albums = User::findOrFail($id)->albums()->where('privacy', 1)->with('photos')->orderBy('created_at', 'desc')->get();
        }
        return View::make('site.albums.albums')->with('albums', $albums)->render();


    }

//    public function getUserAlbums($id = null)
//    {
//
//
//        if (Auth::check() && Auth::user()->getId() == $id) {
//            $albums = Auth::user()->albums()->with('photos')->orderBy('created_at', 'desc')->get();
//        } else {
//            $albums = User::findOrFail($id)->albums()->where('privacy', 1)->with('photos')->orderBy('created_at', 'desc')->get();
//        }
//
//        return response()->json(['error' => false, 'data' => $albums]);
//    }

    public function getPublicAlbums()
    {

        $albums = Album::privacy()->with(['photos', 'user'])->orderBy('created_at', 'desc')->get();

        return View::make('site.albums.albums')->with('albums', $albums)->render();

//        return response()->json(['error' => false, 'data' => $albums]);
    }


    public function getAlbum($id)
    {
        $album = Album::with(['photos', 'user'])->findOrFail($id);
        $view = View::make('site.albums.viewalbum')->with('album', $album)->render();
        return $view;
    }

    public function create()
    {
        $view = View::make('site.albums.create')->render();
        return $view;
    }

    public function edit($id)
    {
        $album = Album::with(['photos', 'user'])->findOrFail($id);
        $view = View::make('site.albums.edit')->with('album', $album)->render();
        return $view;
    }

    public function destroy($id)
    {
        Album::FindOrFail($id)->delete();
//        return redirect()->route($this->getClassNameFromModel() . '.index');

//        return $view;
        return response()->json(['error' => false, 'data' => true]);
    }

}
