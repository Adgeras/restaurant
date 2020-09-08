<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    public $fillable = ['title', 'price', 'weight', 'meat', 'about'];

    public function restaurants()
    {
        return $this->hasMany('App\Restaurants');
    }
}
