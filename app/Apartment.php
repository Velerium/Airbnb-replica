<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{

    protected $fillable = [
        'title',
        'summary',
        'rooms_n',
        'beds_n',
        'bathrooms_n',
        'guests_n',
        'square_meters',
        'address',
        'latitude',
        'longitude',
        'visible',
        'price',
    ];

    // many to many relations between Apartment and Service
    public function service() {
        return $this->belongsToMany(Service::class, 'apartment_service');
    }

    // many to many relations between Apartment and Visitor
    public function visitor() {
        return $this->belongsToMany(Visitor::class, 'apartment_visitor');
    }

    // many to many relations between Apartment and Sponsorship
    public function sponsorship() {
        return $this->belongsToMany(Sponsorship::class, 'apartment_sponsorship');
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
