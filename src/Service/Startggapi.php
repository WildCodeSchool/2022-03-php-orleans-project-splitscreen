<?php

// namespace App\Service;

// use Doctrine\Common\Collections\ArrayCollection;
// use Symfony\Contracts\HttpClient\HttpClientInterface;
// use GuzzleHttp\Client;

// class Startggapi
// {
//     private HttpClientInterface $client;

//     public function __construct(HttpClientInterface $client)
//     {
//         $this->client = $client;
//     }

//     public function fetchResultTournament()
//     {

//         $query = <<<GQL
//         query TournamentQuery(\$slug: String) {
//             tournament(slug: \$slug){
//             id
//           }
//         }
//       GQL;

//       $graphqlEndpoint = 'https://api.start.gg/gql/alpha';
//       $client = new Client;
//       $accessToken = '7b0c90d42b1fcdf13346421af9e949f3';
//       $response = $client->request('POST', $graphqlEndpoint, [
//         'headers' => [
//           'Content-Type' => 'application/json',
//           'Authorization' => 'Bearer '.$accessToken,
//               ],
//         'json' => [
//           'query' => $query,
//           'variables' => ['slug' => 'split-screen-joystick-cup-1']
//         ]
//       ]);
//       $json = $response->getBody()->getContents();
//       dump($json);
//       exit;
//       $body = json_decode($json);
//       $data = $body->data;
//     }
// }
