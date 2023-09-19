<?php

namespace App;

use Illuminate\Support\Facades\Http;

class RandomUser
{
    
    protected $apiUrl = 'https://randomuser.me/api/';

    public function getRandomUser()
    {
        $response = Http::get($this->apiUrl);

        if ($response->ok()) {
            return $response->json();
        }

        return null;
    }
}
