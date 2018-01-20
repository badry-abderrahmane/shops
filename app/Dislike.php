<?php

namespace App;

use Moloquent;

class Dislike extends Moloquent
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
