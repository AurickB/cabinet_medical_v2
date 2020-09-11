<?php

namespace App\Controller;

use App\Inc\Service;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @param Service $service
     * @return Response
     * @Route("/", name="home")
     */
    public function index(Service $service): Response
    {

        return $service->RobotTag('pages/home.html.twig');

        /*return $this->render('pages/home.html.twig');*/

/*        $response = new Response ($this-> renderView ('pages/home.html.twig'));

        $response->headers->set('X-Robots-Tag', 'index');

        return $response;*/
    }
}