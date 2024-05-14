<?php 

namespace App\HttpClient;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ApiHttpClient extends AbstractController
{
    private $httpClient;

    public function __construct(HttpClientInterface $jph)
    {
        $this->httpClient = $jph;
    }

    public function getUsers(){
        //utilise le service HttpClient pour effectuer une requête GET à l'API avec un endpoint
        // spécifié et des options, notamment la désactivation de la vérification SSL (verify_peer) et
        // le nombre de résultats à renvoyer (ici 15)
        $response = $this->httpClient->request('GET', "?results=15", [
            'verify_peer' => false,
        ]);
        return $response->toArray(); //retourne les données de la réponse converties en tableau associatif
    }
}