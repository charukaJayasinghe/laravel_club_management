<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news_comment extends Model
{
    use HasFactory;
    public function nalanda_user(){
        return $this->belongsTo(nalanda_user::class);
    }
}
