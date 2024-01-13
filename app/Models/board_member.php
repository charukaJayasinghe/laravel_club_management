<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class board_member extends Model
{
    use HasFactory;
    public function admin()
    {
        return $this->belongsTo(admin::class);
    }
    public function board_position()
    {
        return $this->belongsTo(board_position::class);
    }



}
