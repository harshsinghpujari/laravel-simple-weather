<?php

namespace App\Http\Controllers;

use App\Services\RainService;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class RainController extends Controller
{
    protected $rainService;

    public function __construct(RainService $service)
    {
        $this->rainService = $service;
    }


    public function makeRain($city)
    {
        $data = $this->rainService->getRain($city);

        return response()->json([
            'status' => 200,
            'data' => $data,
        ]);
    }

}

    // public function makeRain($city)
    // {
    //     $coordinates = [
    //         'london' => ['lat' => '51.5074', 'long' => '-0.1278'],
    //         'tokyo' => ['lat' => '35.6762', 'long' => '139.6503'],
    //         'new_york' => ['lat' => '40.7128', 'long' => '-74.0060']
    //     ];

    //     $city = strtolower($city);

    //     if(!isset($coordinates[$city])){
    //         return response()->json([
    //             'status' => 400,
    //             'message' => 'Please Enter valid city'
    //         ]);
    //     }

    //     $baseuri = 'https://api.open-meteo.com/v1/';

    //     $lat = $coordinates[$city] ['lat'];
    //     $long = $coordinates[$city] ['long'];

    //     $endpoints = "forecast?latitude={$lat}&longitude={$long}&current_weather=true";

    //     $client = new Client();

    //     $res = $client->request('GET',$baseuri.$endpoints);

    //     $data = json_decode($res->getBody()->getContents());

    //     return response()->json([
    //         'status' => 200,
    //         '$data' => $data,
    //     ]);
    
    // }

