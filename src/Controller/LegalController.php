<?php

namespace App\Controller;

use App\Inc\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalController extends AbstractController
{
    /**
     * @param Service $service
     * @return Response
     * @Route("/mentions-legales", name="legales")
     */
    public function index (Service $service) :Response
    {
        return $service->RobotTag('pages/legale.html.twig');
    }
}