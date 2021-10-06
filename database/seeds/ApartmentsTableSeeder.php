<?php

use Illuminate\Database\Seeder;
use App\Data\ApartmentDataProvider;
use App\Apartment;
use App\Data\ImageDataProvider;
use App\Image;
use App\Data\MessageDataProvider;
use App\Message;
use App\Data\UserDataProvider;
use App\User;

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

        for ($i = 0; $i < count($functions->apartmentData['id']) ; $i++) {
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
            $apt->save();
        }

        $functions = new ImageDataProvider;

        for ($i = 0; $i < count($functions->imageData['id']) ; $i++) {
            $img = new Image();
            $img->url = $functions->getApartmentImage($i);
            $img->save();
        }

        $functions = new MessageDataProvider;

        for ($i = 0; $i < count($functions->messageData['id']) ; $i++) {
            $message = new Message();
            $message->first_name = $functions->getMessageFirstName($i);
            $message->last_name = $functions->geMessageLastName($i);
            $message->email = $functions->getMessageEmail($i);
            $message->content = $functions->getMessageContent($i);
            $message->save();
        }

        $functions = new UserDataProvider;

        for ($i = 0; $i < count($functions->userData['id']) ; $i++) {
            $message = new User();
            $message->first_name = $functions->getUserFirstName($i);
            $message->last_name = $functions->getUserLasttName($i);
            $message->email = $functions->getUserEmail($i);
            $message->content = $functions->getUserPassword($i);
            $message->content = $functions->getUserDateOfBirth($i);
            $message->save();
        }


    }
}
