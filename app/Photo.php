<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable =
        [
            'album_id' , 'photo_path'
        ];
    public function album(){
        return $this->belongsTo(Album::class);
    }
}
