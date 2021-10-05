<?php

namespace App\Data;

class ApartmentDataProvider
{
    public $apartmentData = [
        'title' => [
        'Splendida Casa sull\'Albero',
        'Frassino Chalet',
        'Villa Sarezzano',
        'Tiny but Spacious House',
        'Two-room apartment in vintage villa',
        'Casa albero',
        'Bilocale',
        'Splendido Loft',
        'Villa a Bari',
        'Monolocale',
        ],

        'description' => [
            'Chalet in the green heart of Tuscany, UNIQUE because of its location, surrounded by a dense forest and a creek.',
            'Chalet del Frassino is a typical mountain dwelling, the ground floor is made of masonry and stone while the two upper floors are entirely made of wood. Its location affords an unobstructed view of the Monte Rosa massif and enchanting views of the valley. Surrounded by a large fenced garden, it offers the opportunity to stay outdoors on pleasant sunny days.',
            'Historical manor house "Villa Sarezzano", built in 1930. 400 m from the centre of Sarezzano, 8 km from the centre of Tortona, 21 km from the centre of Alessandria, 75 km from the sea.',
            'Surrounded by greenery, in a small agricultural setting you can enjoy privacy and relaxation.',
            'Seafront, nice apartment in the Residence of the beautiful vintage Villa De Raymondi, in the centre of Finale Ligure. Your 4-legged friends are welcome! The Villa has a spacious solarium terrace on the top floor, accessible to all guests, where you can sunbathe on the sun loungers (free) and enjoy the breathtaking view!',
            'Assorbi l\' energia della natura vivendo in questa meravigliosa casa posta su di un albero. Confortevole e vintage, panoramica e intima, ti regalerà colori e istanti indimenticabili mentre i pini che la circondano ti sussurreranno storie secolari.',
            'Bilocale di nuovissima costruzione, ideale per due persone.',
            'Il mio loft e uno spazio ricavato in palazzo del XXVI secolo nel cuore di Roma.',
            'Splendida villa con pietra a vista.',
            'Elegante monolocale nel pieno centro di Torino.',
        ],

        'rooms_n' => [
            4, 11, 7, 5, 3, 1, 3, 3, 5, 3,
        ],

        'beds_n' => [
            3, 9, 6, 4, 1, 2, 2, 3, 3, 2,
        ],

        'bathrooms_n' => [
            1, 2, 4, 2, 1, 1, 1, 2, 3, 1, 
        ],

        'guests_n' =>[
            2, 9, 10, 4, 4, 2, 2, 3, 5, 2,
        ],

        'square_meters' => [
            50, 410, 290, 32, 70, 50, 120, 100, 230, 110,
        ],

        'address' => [
            'Florence, Tuscany, Italy',
            'Staffa, Piemonte, Italy',
            'Sarezzano, Italy',
            'Lazise, Veneto, Italy',
            'Finale Ligure, Liguria, Italy',
            'Via Volterrana 89, Firenze (FI)',
            'Corso Europa 18, Milano (MI)',
            'Via Margutta 33, Roma (RM)',
            'Via Nicolò Piccini 28, Bari (BA)',
            'Via Po 95, Torino (TO)', 
        ],

        'image' => [
            1 => [
                  'https://a0.muscache.com/im/pictures/c1ea79f7-f6ce-4cb9-939d-e6ccdcd5c0a5.jpg',
                  'https://a0.muscache.com/im/pictures/cccd2e57-4ec3-4444-bc6e-4f81a0dd0a86.jpg',
                  'https://a0.muscache.com/im/pictures/47bdb5a6-de21-4909-a1af-6ea4ee6507c7.jpg',
                  'https://a0.muscache.com/im/pictures/0a0b4bbf-b3e1-4aac-a612-5be3bde01120.jpg',
                  'https://a0.muscache.com/im/pictures/7932bbc7-bb95-49ab-b501-ce512708d77e.jpg'
                ],

            2 => [
                  'https://a0.muscache.com/im/pictures/b3585cc9-e890-40eb-8240-7a7ab7a09281.jpg',
                  'https://a0.muscache.com/im/pictures/6bbc0373-ec6d-48ca-a76d-d80f19b77de5.jpg',
                  'https://a0.muscache.com/im/pictures/506145bf-0ed1-49dd-9f36-73531e6ca88c.jpg',
                  'https://a0.muscache.com/im/pictures/678c8310-3a20-48cf-8d08-f53456e2f698.jpg',
                  'https://a0.muscache.com/im/pictures/d3b300ee-8acb-4352-9af0-32d32d72c717.jpg'
                ],
            3 => [
                  'https://a0.muscache.com/im/pictures/prohost-api/Hosting-19006655/original/56c61119-d56e-4f81-8eda-80afa1078170.jpeg',
                  'https://a0.muscache.com/im/pictures/prohost-api/Hosting-19006655/original/eaccc64c-34d4-489c-99de-1bd9c38d96eb.jpeg',
                  'https://a0.muscache.com/im/pictures/prohost-api/Hosting-19006655/original/6dfc776d-c131-43e4-b41e-ac2aa7d61b4d.jpeg',
                  'https://a0.muscache.com/im/pictures/prohost-api/Hosting-19006655/original/5aa53cb0-07b7-4b70-8450-0cc3a18b718b.jpeg',
                  'https://a0.muscache.com/im/pictures/prohost-api/Hosting-19006655/original/20a54d0c-9671-4bb6-aad8-e3fe6b1addbf.jpeg'
                ],
            4 => [
                  'https://a0.muscache.com/im/pictures/f5bcae2f-af87-4c33-b68a-def1aa5aa7df.jpg',
                  'https://a0.muscache.com/im/pictures/miso/Hosting-44275657/original/ce9e1340-13a5-4192-99e9-98611011e84e.jpeg',
                  'https://a0.muscache.com/im/pictures/9ed44e81-c264-4cfb-9479-47289a972353.jpg',
                  'https://a0.muscache.com/im/pictures/3333446e-af7d-4c3e-94cb-94c2fe33d9f7.jpg',
                  'https://a0.muscache.com/im/pictures/5997f845-3938-442e-ab81-a7b60fdfdb82.jpg'
                ],
            5 => [
                  'https://a0.muscache.com/im/pictures/934d736b-31c0-4f1c-8736-2e8ad5898cc5.jpg',
                  'https://a0.muscache.com/im/pictures/65bf19af-7612-4a35-b2e5-de519d643936.jpg',
                  'https://a0.muscache.com/im/pictures/f0955dc2-1341-4668-bb07-e8615b4afe93.jpg',
                  'https://a0.muscache.com/im/pictures/4a6d6334-59a3-415a-81d6-305c7c67d99b.jpg',
                  'https://a0.muscache.com/im/pictures/fe9834f3-9d2e-4635-adc4-0d55fa05ead3.jpg'
                ],
            6 => [
                  'https://a0.muscache.com/im/pictures/c1ea79f7-f6ce-4cb9-939d-e6ccdcd5c0a5.jpg',
                ],
            7 => [
                  'https://a0.muscache.com/im/pictures/871a423d-c66d-45fc-b8d0-f98718b61a1a.jpg',
            ],
            8 => [
                  'https://a0.muscache.com/im/pictures/c9db035f-7239-4b52-a8fa-b3e8622c8171.jpg',
            ],
            9 => [
                  'https://a0.muscache.com/im/pictures/35597864/3702e233_original.jpg',
            ],
            10 => [
                  'https://a0.muscache.com/im/pictures/3f4db92f-c393-484a-9b4d-7a3816fee26a.jpg',
            ],
        ],

        'latitude' => [
            43.7318, 45.9719, 44.8652, 45.4704, 44.1707, 43.7323, 45.4698, 41.9089, 41.1255, 45.0663, 
        ],

        'longitude' => [
            11.2104, 7.9572, 8.9189, 10.7741, 8.3505, 11.2165, 9.1968, 12.4792, 16.8706, 7.6935
        ],

        'visible' => true,

        'price' => [
            390.00, 190.00, 199.00, 135.00, 158.00, 240.00, 350.00, 410.00, 550.00, 220.00,
        ],
    ];

    public function getTitle($id)
    {
        return $this->apartmentData['title'][$id];
    }

    public function getDesc($id)
    {
        return $this->apartmentData['description'][$id];
    }

    public function getRooms($id)
    {
        return $this->apartmentData['rooms_n'][$id];
    }

    public function getBeds($id)
    {
        return $this->apartmentData['beds_n'][$id];
    }

    public function getBaths($id)
    {
        return $this->apartmentData['bathrooms_n'][$id];
    }

    public function getGuests($id)
    {
        return $this->apartmentData['guests_n'][$id];
    }

    public function getSize($id)
    {
        return $this->apartmentData['square_meters'][$id];
    }

    public function getAddress($id)
    {
        return $this->apartmentData['address'][$id];
    }

    // public function getImage($id)
    // {
    //     return $this->apartmentData['image'][$id+1][0];
    // }

    public function getLat($id)
    {
        return $this->apartmentData['latitude'][$id];
    }

    public function getLong($id)
    {
        return $this->apartmentData['longitude'][$id];
    }

    public function getStatus()
    {
        return $this->apartmentData['visible'];
    }

    public function getPrice($id)
    {
        return $this->apartmentData['price'][$id];
    }
}