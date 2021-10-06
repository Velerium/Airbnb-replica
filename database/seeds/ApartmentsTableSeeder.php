<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Data\ApartmentDataProvider;
use App\Apartment;
use App\Data\ImageDataProvider;
use App\Image;
use App\Data\MessageDataProvider;
use App\Message;
use App\Data\UserDataProvider;
use App\User;
use App\Data\ServiceDataProvider;
use App\Service;
use App\Data\SponsorshipDataProvider;
use App\Sponsorship;
use App\Data\VisitorDataProvider;
use App\Visitor;
class ApartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
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
            $apt->latitude = $functions->getLat($i);
            $apt->longitude = $functions->getLong($i);
            $apt->price = $functions->getPrice($i);
            $apt->visible = $functions->getStatus();
            $apt->user_id = 1;
            $apt->save();
        }

        $functions = new ImageDataProvider;

        for ($i = 0; $i < count($functions->imageData['url']) ; $i++) {
            $img = new Image();
            $img->url = $functions->getApartmentImage($i);
            $img->save();
        }

        $functions = new MessageDataProvider;

        for ($i = 0; $i < count($functions->messageData['email']) ; $i++) {
            $message = new Message();
            $message->first_name = $faker->firstName($gender = null);
            $message->last_name = $faker->lastName();
            $message->email = $faker->safeEmail();
            $message->content = $faker->paragraph(2);
            $message->save();
        }

        $functions = new UserDataProvider;

        for ($i = 0; $i < count($functions->userData['email']) ; $i++) {
            $user = new User();
            $user->first_name = $faker->firstName($gender = null);
            $user->last_name = $faker->lastName();
            $user->email = $faker->safeEmail();
            $user->password = $faker->password();
            $user->date_of_birth = $faker->dateTimeBetween('-50 years', '-18 years');
            $user->save();
        }

        $functions = new ServiceDataProvider;
        // create an empty array of service which will be populated by every name service id
        $listServiceId = [];

        // cicle inside serviceData array to go inside service_name and create a new object Service
        foreach($functions->serviceData['service_name'] as $service) {
            $serviceObj = new Service();
            $serviceObj->service_name = $service;
            $serviceObj->save();
            // saving every service name id in this array
            $listServiceId[] = $serviceObj->id;
        }

        $functions = new SponsorshipDataProvider;

        foreach($functions->sponsorData as $sponsor) {
            $i = 0;
            $sponsorObj = new Sponsorship();
            $sponsorObj->type = $sponsor['type'][$i];
            $sponsorObj->cost_sponsorhip = $sponsor['cost_sponsorship'][$i];
            $sponsorObj->duration = $sponsor['duration'][$i];
            $i++;
            $sponsorObj->save();
        }

        $functions = new VisitorDataProvider;

        for($x = 0; $x < 100; $x++) {
            $visitorObj = new Visitor();
            $visitorObj->IP_address = $faker->localIpv4();
            $visitorObj->save();
        }

    }
}
