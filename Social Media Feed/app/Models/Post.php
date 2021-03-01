<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{   
    protected $guarded = [];

    use HasFactory;

    function user(){
        //return $this->belongsToMany('\App\Models\Role');

        return $this->belongsTo('\App\Models\User');
    }


}
