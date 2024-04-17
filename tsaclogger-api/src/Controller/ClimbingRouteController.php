<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\ClimbingRoute;
use Doctrine\ORM\EntityManager;

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

    #[Route('api/routes', name: 'app_climbing_routes')]
    public function get_routes(EntityManagerInterface $entityManager): JsonResponse
    {  
        $routes = $entityManager->getRepository(ClimbingRoute::class)->findAll();

        return $this->json($this->makeJson($routes));
    }

    #[Route('api/route/{id}', name: 'app_climbing_route')]
    public function get_route(EntityManagerInterface $entityManager, int $id): JsonResponse
    {
        $route = $entityManager->getRepository(ClimbingRoute::class)->findBy(['id' => $id])[0];
        
        return $this->json($this->makeJson($route));
    }

    #[Route('api/new_route', name: 'app_new_route', methods: ["PUT"])]
    public function set_route(EntityManagerInterface $entityManager, Request $request): JsonResponse
    {
        $this->denyAccessUnlessGranted('ROLE_ADMIN');

        $body = json_decode($request->getContent(), false);

        $croute = new ClimbingRoute();
        $croute->setName($body->name);
        $croute->setSetter($body->setter);
        $croute->setColor($body->color);
        $croute->setPosition($body->position);

        $entityManager->persist($croute);
        $entityManager->flush();

        return $this->json($body);
    }
}
