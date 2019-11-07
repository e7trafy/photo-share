<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Photo;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Home extends Controller
{

    public function index(){
        $albums = Album::all()->count();
        $users = User::all()->count();
        $photos = Photo::all()->count();
        return view('admin.home',compact(
            'albums',
            'users',
            'photos'));
    }

}
