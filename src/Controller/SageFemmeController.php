<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Inc\Service;

class SageFemmeController extends AbstractController
{

    /**
     * @param Service $service
     * @return Response
     * @Route("/sage-femme", name="sage-femme")
     */
    public function index(Service $service) :Response
    {
        return $service->RobotTag('pages/sage-femme.html.twig');


  /*      $response = new Response ($this-> renderView ('pages/sage-femme.html.twig'));

        $response->headers->set('X-Robots-Tag', 'index');

        return $response;*/
    }
}