<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    //protected $with = ['likes'];
    use Likable;
    protected $guarded = [];
    

    public function user(){
        return $this->belongsTo(User::class);
    }

    
}
