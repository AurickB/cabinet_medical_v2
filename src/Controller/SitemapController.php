<?php

namespace App\Controller;

//use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SitemapController extends AbstractController
{
    /**
     * @Route("/sitemap.xml", name="sitemap", defaults={"_format"="xml"})
     * @param Request $request
     * @return Response
     */
    public function index(Request $request): Response
    {
        // Nous récupérons le nom d'hôte depuis l'URL
        $hostname = $request->getSchemeAndHttpHost();

        // On initialise un tableau pour lister les URLs
        $urls = [];

        // On ajoute les URLs "statiques"
        $urls[] = ['loc' => $this->generateUrl('home')];
        $urls[] = ['loc' => $this->generateUrl('osteopathe')];
        $urls[] = ['loc' => $this->generateUrl('infirmier')];
        $urls[] = ['loc' => $this->generateUrl('sage-femme')];
        $urls[] = ['loc' => $this->generateUrl('psychologue')];
//        $urls[] = ['loc' => $this->generateUrl('article.index')];
//        $urls[] = ['loc' => $this->generateUrl('contact')];

        // On ajoute les URLs "dynamique"
/*        foreach ($this->getDoctrine()->getRepository(Article::class)->findAll() as $article) {
            $created_at = $article->getCreatedAt();

            $images = [
                'loc' => '/media/articles'.$article->getPictureFiles(), // URL to image
                'title' => $article->getTitle()    // Optional, text describing the image
            ];

            $urls[] = [
                'loc' => $this->generateUrl('article.show', [
                    'slug' => $article->getSlug(),
                    'id' => $article->getId(),
                ]),
                'lastmod' => $article->getCreatedAt()->format('Y-m-d'),
                'image' => $images
            ];
        }*/
//        dump($urls);

        // Fabrication de la réponse XML
        $response = new Response(
            $this->renderView('sitemap/index.html.twig', [
                'urls' => $urls,
                'hostname' => $hostname
            ]), 200
        );

        // Ajout des entêtes
        $response->headers->set('Content-Type', 'text/xml');

        // On envoie la réponse
        return $response;
    }
}
