<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class SecurityController extends AbstractController
{
    // #[Route('/auth', name: 'app_login', methods: ['POST'])]
    // public function login(#[CurrentUser] $user = null): Response
    // {
    //     return $this->join([
    //         'user' => $user ? $user->getId() : null,
    //     ]);
    // }
}