<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;

use GuzzleHttp\Client;

use App\Page;

class MessageController extends Controller
{
    
    public function index()
    {
        

        $client = new Client();

        $res = $client->request('GET', 'http://api.semaphore.co/api/v4/account', [
        'query' => ['apikey' => '8ca79d16ce10ed969cf8e2dbbb6bdfa2'] ]
        );

        // $res = $client->request('POST', 'http://api.semaphore.co/api/v4/messages', [
        // 'query' => ['apikey' => 'fbdb931a6c1387084f00f5ec3191f277',
        // 'sendername' => 'Maventech Solutions Inc.', 'number' => '09498858609','message'=> 'Maven text Blast!' ] ]);
        

        // echo $res->getStatusCode();
        // "200"

        $response = json_decode($res->getBody());

        dd($response);
        // return $response;

    }
  
}
