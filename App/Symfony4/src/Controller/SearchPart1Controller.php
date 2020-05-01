<?php

namespace Sapar\Controller;

use FOS\ElasticaBundle\Finder\TransformedFinder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

/**
 * You know, for search.
 *
 * @Route("/", name="search_part1_")
 */
final class SearchPart1Controller extends AbstractController
{
    /**
     * @Route({"en": "/part1/search", "fr": "/partie1/recherche"}, name="main")
     */
    public function search(Request $request, SessionInterface $session, TransformedFinder $mediaFileFinder): Response
    {
        $q = (string) $request->query->get('q', '');
        $results = !empty($q) ? $mediaFileFinder->findHybrid($q) : [];
        $session->set('q', $q);

        return $this->render('search/search_part1.html.twig', compact('results', 'q'));
    }
}