<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    use HasFactory;
    public function class_rooms(){
      return $this->hasMany(class_room::class);
    }
    public function board_positions(){
        return $this->hasMany(board_position::class);
    }

    public function board_members(){
        return $this->hasMany(board_member::class);
    }


    public function news(){
        return $this->hasMany(news::class);
      }
}
