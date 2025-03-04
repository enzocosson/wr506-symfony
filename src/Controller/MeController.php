<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;

class MeController
{
    #[Route("/api/me", name:"get_current_user", methods:["GET"])]
    public function getCurrentUser(UserInterface $user): JsonResponse
    {
        $userData = [
            'id' => $user->getId(),
            'firstName' => $user->getFirstName(),
            'lastName' => $user->getLastName(),
            'email' => $user->getEmail(),
            'photo' => $user->getPhoto(),
        ];

        return new JsonResponse($userData);
    }
}