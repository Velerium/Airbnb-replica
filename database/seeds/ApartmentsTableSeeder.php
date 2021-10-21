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

        #USER TABLE
        $functions = new UserDataProvider;

        for ($i = 0; $i < 15; $i++) {
            $user = new User();
            $user->first_name = $faker->firstName($gender = null);
            $user->last_name = $faker->lastName();
            $user->date_of_birth = $faker->dateTimeBetween('-50 years', '-18 years');
            $user->email = $faker->safeEmail();
            $user->password = $faker->password();
            $user->save();
        }


        #SERVICE TABLE
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


        #SPONSORSHIP TABLE
        $functions = new SponsorshipDataProvider;
        $listSponsorId = [];

        for($i = 0; $i < 3; $i++) {
            $sponsorObj = new Sponsorship();
            $sponsorObj->type = $functions->getType($i);
            $sponsorObj->cost_sponsorship = $functions->getCost($i);
            $sponsorObj->duration = $functions->getDuration($i);
            $sponsorObj->save();
            $listSponsorId[] = $sponsorObj->id;
        }

        #VISITOR TABLE
        $functions = new VisitorDataProvider;
        $listVisitorId = [];

        for($i = 0; $i < 100; $i++) {
            $visitorObj = new Visitor();
            $visitorObj->IP_address = $faker->localIpv4();
            $visitorObj->save();
            $listVisitorId[] = $visitorObj->id;
        }

        #APARTMENT TABLE
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
            $apt->cover = $functions->getCover($i);
            $apt->address = $functions->getAddress($i);
            $apt->latitude = $functions->getLat($i);
            $apt->longitude = $functions->getLong($i);
            $apt->price = $functions->getPrice($i);
            $apt->visible = $functions->getStatus();
            $apt->user_id = rand(1, 15);
            $apt->save();

            // PIVOT TABLE apartament_service
            $randServiceKey = array_rand($listServiceId, 2);
            $service1 = $listServiceId[$randServiceKey[0]];
            $service2 = $listServiceId[$randServiceKey[1]];
            $apt->service()->attach($service1);
            $apt->service()->attach($service2);

            // PIVOT TABLE apartament_visitor
            $randVisitorKey = array_rand($listVisitorId, 2);
            $visitor1 = $listVisitorId[$randVisitorKey[0]];
            $visitor2 = $listVisitorId[$randVisitorKey[1]];
            $apt->visitor()->attach($visitor1);
            $apt->visitor()->attach($visitor2);

            // PIVOT TABLE apartament_sponsorship
            $randSponsorKey = array_rand($listSponsorId, 3);
            $visitor1 = $listVisitorId[$randSponsorKey[0]];
            // $visitor2 = $listVisitorId[$randSponsorKey[1]];
            $apt->sponsorship()->attach($visitor1);
            // $apt->sponsorship()->attach($visitor2);
        }


        #MESSAGE TABLE
        $functions = new MessageDataProvider;

        for ($i = 0; $i < 10; $i++) {
            $message = new Message();
            $message->content = $faker->paragraph(2);
            $message->apartment_id = rand(1, 41); // 41 apartments
            $message->user_id = rand(1, 15);
            $message->save();
        }

        #IMAGE TABLE
        $functions = new ImageDataProvider;

        for($i = 0; $i < count($functions->imageData); $i++) {
            foreach($functions->imageData[$i] as $imageElement) {
                $img = new Image();
                $img->url = $imageElement;
                $img->apartment_id = $i+1;
                $img->save();
            }
        }
    }
}
