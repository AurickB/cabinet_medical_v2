<?php

namespace App\Controller;

use App\Inc\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InfirmierController extends AbstractController
{

    /**
     * @param Service $service
     * @return Response
     * @Route("/infirmier", name="infirmier")
     */
    public function index(Service $service) :Response
    {
        return $service->RobotTag('pages/infirmier.html.twig');

/*        $response = new Response ($this-> renderView ('pages/infirmier.html.twig'));

        $response->headers->set('X-Robots-Tag', 'index');

        return $response;*/
    }
}