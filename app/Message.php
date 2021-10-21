<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    protected $fillable = [
        'content',
        'apartment_id',
    ];

    // one to many relations between Message and Apartment
    public function apartment() {
        return $this->belongsTo(Apartment::class);
    }

    public function user()
    {
      return $this->belongsTo(Apartment::class);
    }
}
