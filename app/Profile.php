<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Profile extends Model
{
    //
   protected $guarded = [];

   public function followers() {
    return $this->belongsToMany(User::class);
}

    public function user() {
        return $this->belongsTo(User::class);
    }
}
