<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    public $fillable =
        [
            'name', 'user_id', 'privacy'
        ];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }
    public function privacy(){
        return $this->where('privacy',1);
    }
}
