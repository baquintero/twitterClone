<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model{
    
    protected $table = 'tweets';
    
    public $timestamps = false;

    public function user(){
        return $this->belongsTo('App\User', 'fk_users_tweet');
    }
}
