<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_status extends Model
{
    use HasFactory;

    public function nalanda_users(){
        return $this->hasMany(nalanda_user::class);
    }

}
