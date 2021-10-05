<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    // many to many relations between Apartment and Service
    public function service() {
        return $this->belongsToMany(Service::class);
    }

    // many to many relations between Apartment and Visitor
    public function visitor() {
        return $this->belongsToMany(Visitor::class);
    }

    // many to many relations between Apartment and Sponsorship
    public function sponsorship() {
        return $this->belongsToMany(Sponsorship::class);
    }

    // one to many relations between Apartment and Image
    public function image() {
        return $this->hasMany(Image::class);
    }

    // one to many relations between Apartment and Message
    public function message() {
        return $this->hasMany(Message::class);
    }

    // one to many relations between Apartment and User
    public function user() {
        return $this->belongsTo(User::class);
    }



    
}
