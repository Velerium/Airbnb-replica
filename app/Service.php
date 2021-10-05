<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    // many to many relations between Service and Apartment
    public function apartment() {
        return $this->belongsToMany(Apartment::class);
    }
}
