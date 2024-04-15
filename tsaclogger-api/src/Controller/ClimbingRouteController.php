<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ClimbingRoute;

class ClimbingRouteController extends AbstractController
{

    private function makeJson($object)
    {
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, $encoders);
        $jsonContent = $serializer->serialize($object, 'json');
        return json_decode($jsonContent, true);
    }

    #[Route('/routes', name: 'app_climbing_routes')]
    public function get_routes(EntityManagerInterface $entityManager): JsonResponse
    {  
        $routes = $entityManager->getRepository(ClimbingRoute::class)->findAll();

        return $this->json($this->makeJson($routes));
    }

    #[Route('/route/{id}', name: 'app_climbing_route')]
    public function get_route(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $route = $entityManager->getRepository(ClimbingRoute::class)->findBy(['id' => $id])[0];
        
        return $this->json($this->makeJson($route));
    }
}