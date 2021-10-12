<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // one to many relations between Image and Apartment
    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }
    
    protected $fillable = [
        'url',
    ];
}
