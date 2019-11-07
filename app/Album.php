<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $fillable =
        [
            'name', 'user_id', 'privacy'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    static function privacy(){
        return Album::where('privacy',1);
    }
}
