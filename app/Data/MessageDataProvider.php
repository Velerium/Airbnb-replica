<?php

namespace App\Data;


class MessageDataProvider  
{
    public $messageData = [
        'first_name' => [],

        'last_name' => [],

        'email' => [],

        'content' => [],
    ];

    public function getMessageFirstName($id) {
        return $this->messageData['first_name'][$id+1];
    }

    public function geMessageLastName($id) {
        return $this->messageData['last_name'][$id+1];
    }

    public function getMessageEmail($id) {
        return $this->messageData['email'][$id+1];
    }

    public function getMessageContent($id) {
        return $this->messageData['content'][$id+1];
    }
} 
