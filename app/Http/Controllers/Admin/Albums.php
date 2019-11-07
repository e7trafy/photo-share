<?php

namespace App\Http\Controllers\Admin;

use App\Album;
use App\Http\Requests\Admin\Albums\Store;
use App\Photo;


class Albums extends AdminController
{
    public function __construct(Album $model)
    {
        parent::__construct($model);
    }
use AlbumsTrait;
    protected function with()
    {
        return ['photos', 'user'];
    }

    protected function append()
    {
        $array = [

        ];

        return $array;
    }

}
