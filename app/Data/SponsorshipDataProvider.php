<?php

namespace App\Data;

class SponsorshipDataProvider 
{
    public $sponsorData = [

        'type' => [
            'Basic',
            'Premium',
            'Gold'
        ],
    
        'cost_sponsorship' => [
            '2.99',
            '5.99',
            '9.99'
        ],

        'duration' => [
            '24',
            '72',
            '144'
        ]

    ];

    public function getType($id) {
        return $this->sponsorData['type'][$id];
    }

    public function getCost($id) {
        return $this->sponsorData['cost_sponsorship'][$id];
    }

    public function getDuration($id) {
        return $this->sponsorData['duration'][$id];
    }
}
