<?php

namespace App\Controller;

use App\Inc\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OsteopatheController extends AbstractController
{

    /**
     * @param Service $service
     * @return Response
     * @Route("/osteopathe", name="osteopathe")
     */
    public function index(Service $service) :Response
    {
        return $service->RobotTag('pages/osteo.html.twig');

/*        $response = new Response ($this-> renderView ('pages/osteo.html.twig'));

        $response->headers->set('X-Robots-Tag', 'index');

        return $response;*/
    }
}