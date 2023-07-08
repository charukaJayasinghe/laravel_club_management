<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nalanda_user extends Model
{
    use HasFactory;

  public function class_room(){
      return $this->belongsTo(class_room::class);
  }

  public function user_status(){
    return $this->belongsTo(user_status::class);
}


}
