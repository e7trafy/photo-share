<?php


namespace App\Http\Controllers\Admin;


use App\Album;
use App\Http\Requests\Admin\Albums\Store;
use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

trait AlbumsTrait
{
    public function store(Store $request)
    {

        $user = Auth::user();
        $title = $request->name;
        $privacy = $request->privacy;
        $photos = $request->photos;
        $album = Album::create([
            'name' => $title,
            'privacy' => $privacy,
            'user_id' => $user->id
        ]);
        if (isset($request->photos)) {

            foreach ($photos as $photo) {
                $imagePath = Storage::disk('uploads')->put($user->name . '/albums/' . $album->id, $photo);
                Photo::create([
                    'photo_path' => '/uploads/' . $imagePath,
                    'album_id' => $album->id
                ]);
            }
        }
//        dump($album);
        return response()->json(['error' => false, 'data' => 'Album Created']);
    }


    public function update($id, Request $request)
    {
        $user = Auth::user();

        $album = Album::FindOrFail($id);
        $title = $request->name;
        $privacy = $request->privacy;
        $photos = $request->photos;


        $album->update(['name' => $title,
            'privacy' => $privacy,]);

        if (isset($request->photos)) {

            foreach ($photos as $photo) {
                $imagePath = Storage::disk('uploads')->put($user->name . '/albums/' . $album->id, $photo);
                Photo::create([
                    'photo_path' => '/uploads/' . $imagePath,
                    'album_id' => $album->id
                ]);
            }
        }

        return response()->json(['error' => false, 'data' => 'Album Updated ']);
    }

    public function destroyPhoto($id){
        Photo::FindOrFail($id)->delete();
        return response()->json(['error' =>false]);

    }
}
