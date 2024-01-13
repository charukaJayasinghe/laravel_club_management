<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_position extends Model
{
    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(admin::class);
    }
    public function board_members(){
        return $this->hasMany(board_member::class);
    }



}
