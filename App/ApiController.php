<?php

namespace App;

use GuzzleHttp\Client;

class ApiController
{
    protected $accessToken;

    public function __construct($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    public function getCities()
    {
        $http = new Client;
        $response = $http->request('GET', 'http://management.test/api/cityList', [
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $this->accessToken,
            ]
        ]);
        $cities = json_decode((string)$response->getBody(), true);
        return $cities;
    }

    public function addLead($request)
    {
        $http = new Client;
        $response = $http->request('POST', 'http://management.test/api/addLead', [
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