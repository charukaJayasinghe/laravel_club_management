<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    public function nalanda_user(){
        return $this->belongsTo(nalanda_user::class);
    }
    public function post(){
        return $this->belongsTo(post::class);
    }

}
