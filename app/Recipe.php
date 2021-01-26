<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        	'title', 'body' ,'user_id','image'
    ];
    protected $date = [
        'created_at', 'updated at'
    ];
    public function author(){
        return $this->belongsTo('App\User','user_id');
    }
}
