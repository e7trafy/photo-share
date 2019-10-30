<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AlbumController extends Controller
{
//        public function __construct()
//    {
//        $this->middleware('auth');
//    }
//    public function index(){
//        return "text";
//    }

        public function getAllAlbums(){

            $albums=Auth::user()->albums()->with('photos')->orderBy('created_at','desc')->get();
            return response()->json(['error' =>false,'data'=>$albums]);
        }

        public function createAlbum(Request $request){
            $user = Auth::user();
            $title = $request->title;
            $privacy = $request->privacy;
            $photos = $request->photos;

            $album = Album::create([
                'name'=>$title,
                'privacy'=>$privacy,
                'user_id'=>$user->id
            ]);
            foreach ($photos as $photo){
                $imagePath = Storage::disk('uploads')->put($user->name.'/albums/'.$album->id,$photo);
                Photo::create([
                    'photo_path' =>'/uploads/' .$imagePath,
                    'album_id'=>$album->id
                ]);
            }
            return response()->json(['error'=>false,'data'=>$album]);
        }
}
