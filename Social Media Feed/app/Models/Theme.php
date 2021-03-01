<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Theme extends Model
{
    use HasFactory;
    protected $guarded = [];

    function user(){
        
        return $this->belongsTo('\App\Models\User');
    }

}
