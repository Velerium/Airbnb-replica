<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApartmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return [
        //     'title' => $this->title,
        //     'summary' => $this->summary,
        //     'rooms_n' => $this->rooms_n,
        //     'beds_n' => $this->beds_n,
        //     'bathrooms_n' => $this->bathrooms_n,
        //     'guests_n' => $this->guests_n,
        //     'square_meters' => $this->square_meters,
        //     'address' => $this->address,
        //     'latitude' => $this->latitude,
        //     'longitude' => $this->longitude,
        //     'visible' => $this->visible,
        //     'price' => $this->price,
        // ];
    }
}
