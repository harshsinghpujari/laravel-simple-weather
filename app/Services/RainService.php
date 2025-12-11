<?php

namespace App\Services;

use App\Traits\RainTrait;


class RainService 
{
  use RainTrait;

  public function getRain($city)
  {
    $city = strtolower($city);

    $coordinates = [
      'london' =>  ['lat' => '51.5074', 'long' => '-0.1278'],
      'tokyo' => ['lat' => '35.6762', 'long' => '139.6503'],
      'newYork' => ['lat' => '40.7128', 'long' => '-74.0060']
    ];

    if(!isset($coordinates[$city]))
    {
      return ['error' => 'Invalid City Name!'];
    }

    $lat = $coordinates[$city]['lat'];
    $long = $coordinates[$city]['long'];

    $endpoints = "forecast?latitude={$lat}&longitude={$long}&current_weather=true";

    $data = $this->getResponse($endpoints);

    return $data;

  }
}