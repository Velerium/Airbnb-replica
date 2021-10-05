<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    // many to many relations between Sponsorship and Apartment
    public function apartment() {
        return $this->belongsToMany(Apartment::class);
    }
}
