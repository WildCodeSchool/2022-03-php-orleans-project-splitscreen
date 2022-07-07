<?php

namespace App\Service;

use GuzzleHttp\Client;

class Startggapi
{
  // public function fetchResultTournament(string $slug): array
  // {
    // $query = <<<GQL
    //         query EventQuery(\$slug: String, \$page: Int!, \$perPage: Int!) {
    //             event(slug: \$slug){
    //         id
    //         name
    //         videogame {
    //           name
    //         }
    //         standings(query: {
    //           perPage: \$perPage,
    //           page: \$page
    //                 }){
    //                   nodes {
    //                     placement
    //                     entrant {
    //                       id
    //                       name
    //                     }
    //                   }
    //                 }
    //               }
    //             },
    //       GQL;
    // $graphqlEndpoint = 'https://api.start.gg/gql/alpha';
    // $client = new Client();
    // $accessToken = '7b0c90d42b1fcdf13346421af9e949f3';
    // $response = $client->request('POST', $graphqlEndpoint, [
    //   'headers' => [
    //     'Content-Type' => 'application/json',
    //     'Authorization' => 'Bearer ' . $accessToken,
    //   ],
    //   'json' => [
    //     'query' => $query,
    //     'variables' => [
    //       'slug' => $slug,
    //       'page' => 1,
    //       "perPage" => 10
    //     ]
    //   ]
    // ]);
  //   $json = $response->getBody()->getContents();
  //   $body = json_decode($json);
  //   $data = $body->data;
  //   $rankings = $data->event->standings->nodes;
  //   return $rankings;
  // }
  // public function extractSlug(string $fullSlug): string
  // {
  //   $slug = explode('/', $fullSlug);
  //   return $slug[0];
  // }
}
