<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'name', 'profile_pic' 
];
protected $date = [
    'created_at', 'updated at'
];
public function user(){
    return $this->belongsTo('App\User','user_id');
}
} 

