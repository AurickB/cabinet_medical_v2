<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Inc\Service;
use App\Notification\ContactNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @param Request $request
     * @param ContactNotification $notification
     * @param Service $service
     * @return Response
     * @Route("/contact", name="contact")
     */
    public function index (Request $request, ContactNotification $notification, Service $service) :Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $notification->notify($contact);
            $this->addFlash('success', 'Votre email a bien été envoyé');
            return $this->redirectToRoute('contact');
        }

        $response = new Response ($this-> renderView ('pages/contact.html.twig',[
            'form' =>$form->createView()
        ]));

        $response->headers->set('X-Robots-Tag', 'index');

        return $response;
    }
}