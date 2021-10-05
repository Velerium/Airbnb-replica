<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // one to many relations between Message and Apartment
    public function apartment() {
        return $this->hasMany(Apartment::class);
    }
}
