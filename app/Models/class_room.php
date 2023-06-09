<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class class_room extends Model
{
    use HasFactory;
    public function grade()
    {
        return $this->belongsTo(grade::class);
    }

    public function admin()
    {
        return $this->belongsTo(admin::class);
    }
}
