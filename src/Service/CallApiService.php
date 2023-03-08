<?php

namespace App\Service;

use DateTime;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class CallApiService
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }
    public function getAllData(): array
    {
        return $this->getApi('api');
    }

    public function getId($id,$images): array
    {
        return $this->getApi(('api/' . $id) + ('/'. $images)  );
    }

    private function getApi(string $var)
    {
        $response = $this->forward('App\Controller\MainController::getAllData');
        $content = $response->getContent(); 

        /*$response = $this->client->request(
            'GET',
            'http://127.0.0.1:8000/place_dispo/' . $var
        );*/

        return $response->toArray();
    }
}
