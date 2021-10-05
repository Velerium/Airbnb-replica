<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
        // many to many relations between Visitor and Apartment
        public function apartment() {
            return $this->belongsToMany(Apartment::class);
        }
}
