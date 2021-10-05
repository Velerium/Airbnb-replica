<?php

use App\Apartment;
use Illuminate\Database\Seeder;
use App\Data\ApartmentDataProvider;

class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $functions = new ApartmentDataProvider;

        for ($i = 0; $i < count($functions->apartmentData['title']) ; $i++) {
            $apt = new Apartment();
            $apt->title = $functions->getTitle($i);
            $apt->rooms_n = $functions->getRooms($i);
            $apt->beds_n = $functions->getBeds($i);
            $apt->bathrooms_n = $functions->getBaths($i);
            $apt->guests_n = $functions->getGuests($i);
            $apt->square_meters = $functions->getSize($i);
            $apt->summary = $functions->getDesc($i);
            $apt->address = $functions->getAddress($i);
            // $apt->image = $functions->getImage($i);
            $apt->latitude = $functions->getLat($i);
            $apt->longitude = $functions->getLong($i);
            $apt->price = $functions->getPrice($i);
            $apt->visible = $functions->getStatus();
            $apt->save();
        }
    }
}
