<?php

namespace App\Traits;

use GuzzleHttp\Client;

trait RainTrait // use trait keyword no class
{

  protected $baseuri = 'https://api.open-meteo.com/v1/';

  public function getResponse ($endpoints) {

    $client  = new Client();

    $res = $client->request('GET', $this->baseuri.$endpoints);

    $data = json_decode($res->getBody()->getContents());

    return $data;
  }
}