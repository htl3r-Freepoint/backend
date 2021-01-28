<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Entity\Punkte;
use App\Entity\User;
use App\Service\clean;
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

    private function save($owner, $name, $kontakt, $XEuro, $logo, $domain) {
        $entityManager = $this->getDoctrine()->getManager();

        $Firma = new Firma();
        $Firma->setFKUserIDOwner(null);
        $Firma->setFirmanname($name);
        $Firma->setKontaktEmail($kontakt);
        $Firma->setXEuroFuer1Punkt($XEuro);
        $Firma->setDatei($logo);
        $Firma->setDomain($domain);

        $entityManager->persist($Firma);
        $entityManager->flush();

        return true;
    }

    /**
     * @Route("/api/registerCompany")
     * @param Request $request
     * @return Response
     */
    public function SAVE_FIRMA_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth, clean $clean): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);
            $user = $jsonAuth->returnUserFromHash($data['hash'])['user'];

            $owner = $user->getID();
            $name = $data["Name"];
            $kontakt = $data["email"] ?? null;
            $XEuro = $data["conversionRate"] ?? 10;
            $logo = $data["logo"] ?? null;
            $domain = strtolower($clean->cleanString($name));


            $Firmen = $this->getDoctrine()->getRepository(Firma::class)->findAll();
            $exists = 0;
            foreach ($Firmen as $firm) {
                if ($firm->getFirmanname() == $name) $exists = "-1 Firmenname";
                if ($firm->getDomain() == $domain) $exists = "-1 Domain";

            }

            if ($exists != 0) {
                if ($exists == "-1 Firmenname") return new Response("This name is already in use", 400);
                if ($exists == "-1 Domain") return new Response("This Domain is already in use", 400);
            } else {
                if ($this->save($owner, $name, $kontakt, $XEuro, $logo, $domain) == true) {
                    return new Response("1", 200);
                } else {
                    return new Response("Please fill out everything", 100);
                }
            }
        }
    }
}
