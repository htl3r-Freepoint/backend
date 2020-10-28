<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DesignController extends AbstractController {
    /**
     * @Route("/design", name="design")
     */
    public function index() {
        return $this->render('design/index.html.twig', [
            'controller_name' => 'DesignController',
        ]);
    }

    /**
     * Checks if the user would like to receive HTML or JSON via manual inspection of the header
     *
     * @Route("/requestchecker/checkmanually")
     * @param Request $request
     * @return Response
     */
    public function checkManually(Request $request): Response {
        $accept = $request->headers->get('accept');

        if ($accept == "application/json") {
            return new Response('{ "response": "some json" }');
        }
        return new Response(
            '<html><body>Some HTML Response</body></html>'
        );
    }


    /**
     * Recommended: Checks the extension format that the user requested (e.g.: .json)
     *
     * @Route("/requestchecker/checkautomatic.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function checkAutomagic(Request $request): Response {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            return new Response('{ "response": ["some json", "more json"] }');
        }

        // Return HTML
        return new Response(
            '<html><body>Some HTML Response</body></html>'
        );
    }

}
