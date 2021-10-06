<?php

namespace App\Data;

class UserDataProvider {
    public $userData = [
        'first_name' => [],
        'last_name' => [],
        'email' => [],
        'password' => [],
        'date_of_birth' => [],
    ];

    public function getUserFirstName($id) {
        return $this->userData['first_name'][$id];
    }

    public function getUserLasttName($id) {
        return $this->userData['last_name'][$id];
    }

    public function getUserEmail($id) {
        return $this->userData['email'][$id];
    }

    public function getUserPassword($id) {
        return $this->userData['password'][$id];
    }

    public function getUserDateOfBirth($id) {
        return $this->userData['date_of_birth'][$id];
    }
}
