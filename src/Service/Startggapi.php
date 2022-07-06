<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class Startggapi
{
//     private HttpClientInterface $client;

//     public function __construct(HttpClientInterface $client)
//     {
//         $this->client = $client;
//     }

//     public function fetchResultTournament(): array
//     {

//         $query = <<<'GRAPHQL'
//         query TournamentId($tourneySlug: String!) {
//             tournament(slug: $tourneySlug) {
//               id
//             }
//           },
//         GRAPHQL;

//         $rep = $this->graphql_query('https://api.start.gg/gql/alpha', $query, ['tourneySlug' => 'test-4510'],
//  '7b0c90d42b1fcdf13346421af9e949f3');

//         dd($rep);
//         exit;
//     }

//     public function graphql_query(string $endpoint, string $query,
//  array $variables = [], ?string $token = null): array
//     {
//         $headers = ['Content-Type: application/json', 'User-Agent: Dunglas\'s minimal GraphQL client'];
//         if (null !== $token) {
//             $headers[] = "Authorization: bearer $token";
//         }

//         if (false === $data = @file_get_contents($endpoint, false, stream_context_create([
//             'http' => [
//                 'method' => 'POST',
//                 'header' => $headers,
//                 'content' => json_encode(['query' => $query, 'variables' => $variables]),
//             ]
//         ]))) {
//             $error = error_get_last();
//             throw new \ErrorException($error['message'], $error['type']);
//         }

//         return json_decode($data, true);
//     }
}
