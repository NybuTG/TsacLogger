<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use Doctrine\ORM\EntityManagerInterface;

use App\Entity\User;


class RegisterController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function index(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager): JsonResponse
    {
        $user = new User();
        $user->setUsername("test.user");
        $user->setRoles(['ROLE_USER']);
        $plaintext = "test";

        $hashed = $passwordHasher->hashPassword(
            $user,
            $plaintext,
        );
        $user->setPassword($hashed);

        $entityManager->persist($user);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();
        
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/RegisterController.php',
        ]);
    }
}
