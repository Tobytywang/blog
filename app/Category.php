<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Baum\Node;

class Category extends Node
{
    //
    public $timestamps = false;

    public function article()
    {
        return $this->hasMany(Article::class);
    }
}
