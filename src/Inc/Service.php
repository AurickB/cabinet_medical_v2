<?php

namespace App\Inc;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class Service extends AbstractController
{
    public function RobotTag(String $url)
    {
        $response = new Response ($this-> renderView ($url));

        $response->headers->set('X-Robots-Tag', 'index');

        return $response;
    }
}