<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Punkte;
use App\Entity\User;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class FirmaController extends AbstractController {
    /**
     * @Route("/firma", name="firma")
     */
    public function index() {
        return $this->render('firma/index.html.twig', [
            'controller_name' => 'FirmaController',
        ]);
    }

    private function save($owner, $name, $kontakt, $XEuro, $datei, $domain) {
        if ($owner == "ADD_HERE" || isset($owner) || $owner == "undefined" || $owner == "null") $owner = null;
        if ($name == "ADD_HERE" || isset($name) || $name == "undefined" || $name == "null") $name = null;
        if ($kontakt == "ADD_HERE" || isset($kontakt) || $kontakt == "undefined" || $kontakt == "null") $kontakt = null;
        if ($XEuro == "ADD_HERE" || isset($XEuro) || $XEuro == "undefined" || $XEuro == "null") $XEuro = null;
        if ($datei == "ADD_HERE" || isset($datei) || $datei == "undefined" || $datei == "null") $datei = null;
        if ($domain == "ADD_HERE" || isset($domain) || $domain == "undefined" || $domain == "null") $domain = null;

        if ($name == null || $kontakt == null || $XEuro == null || $domain == null) return false;

        $entityManager = $this->getDoctrine()->getManager();

        $Firma = new Firma();
        $Firma->setFKUserIDOwner(null); //TODO !!!!!!!!!!
        $Firma->setFirmanname($name);
        $Firma->setKontaktEmail($kontakt);
        $Firma->setXEuroFuer1Punkt($XEuro);
        $Firma->setDatei($datei);
        $Firma->setDomain($domain);

        $entityManager->persist($Firma);
        $entityManager->flush();

        return true;
    }

    /**
     * @Route("/api/firma.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function POST_GET_FIRMA_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {
                $data = $this->getDoctrine()->getRepository(Firma::class)->findAll();
                return new Response($serializer->serialize($data, 'json'), 200);
//                return new Response("GET");
            }
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                if (!$jsonAuth->checkJsonCode($data['id'], $data['hash'])) return new Response('-1 invalid', 403);
                $owner = $data["owner"];
                $name = $data["Name"];
                $kontakt = $data["kontakt"];
                $XEuro = $data["XEuro"];
                $datei = $data["datei"];
                $domain = $data["domain"];


                $Firmen = $this->getDoctrine()->getRepository(Firma::class)->findAll();
                $exists = 0;
                foreach ($Firmen as $firm) {
                    if ($firm->getFirmanname() == $name) $exists = "-1 Firmenname";
                    if ($firm->getDomain() == $domain) $exists = "-1 Domain";

                }

                if ($exists != 0) {
                    if ($exists == "-1 Firmenname") return new Response("-1 Firmenname", 400);
                    if ($exists == "-1 Domain") return new Response("-1 Domain", 400);
                } else {
                    if ($this->save($owner, $name, $kontakt, $XEuro, $datei, $domain) == true) {
                        return new Response("1", 200);
                    } else {
                        return new Response("-1 Missing", 100);
                    }
                }
            }
        } else {
            return new Response("", 404);
        }
    }
}
