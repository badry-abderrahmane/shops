<?php

namespace App;

use Moloquent;

class Favorite extends Moloquent
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
