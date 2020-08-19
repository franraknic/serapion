<?php
namespace App;

use GuzzleHttp\Client;
  
class OMDB
{

    public function queryAPI($name)
    {

        $client = new Client();

        $params = [
            'query' => [
                'apikey' => 'c3178602', // extract to config file, leave here for ease of presentation
                't' => $name // add additional parameters http://www.omdbapi.com/
            ]
        ];

        $response = $client->request('GET', 'http://www.omdbapi.com', $params);

        $movie = json_decode($response->getBody(), true);

        return $movie;

    }
}