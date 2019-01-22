<?php

namespace App;

use GuzzleHttp\Client;

class ApiController
{
    protected $accessToken = 'your token';


    public function getCities()
    {
        $http = new Client;
        $response = $http->request('GET', 'https://leads.likedengi.ru/api/cityList', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ]
        ]);
        return json_decode((string)$response->getBody(), true);
    }

    public function addLead($request)
    {
        $http = new Client;
        $response = $http->request('POST', 'https://leads.likedengi.ru/api/addLead', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ],
            'form_params' => [
                'phone' => $request['phone'],
                'collateral' => $request['collateral'],
                'city_id' => $request['city_id'],
            ],
        ]);
        return json_decode((string)$response->getBody(), true);
    }
}