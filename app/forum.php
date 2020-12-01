<?php

namespace App;

use Eloquent;
use Illuminate\Database\Eloquent\Model;


class forum extends Model
{
    public function tags(){
        return $this->belongsToMany('App\tag');
    }

    public function comments(){
        return $this->morphMany('App\Comment','commentable');
    }
    
    public function user(){
        return $this->belongsTo('App\anggota');
    }
}
