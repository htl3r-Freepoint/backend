<?php

namespace App\Controller;

use App\Entity\Firma;
use App\Service\clean;
use App\Service\Hash;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class StatistikController extends AbstractController {
//    #[Route('/statistik', name: 'statistik')]
//    public function index(): Response
//    {
//        return $this->render('statistik/index.php.twig', [
//            'controller_name' => 'StatistikController',
//        ]);
//    }

    /**
     * @Route("/api/getStatistik")
     * @param Request $request
     * @return Response
     */
    public function GET_Statistik(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Hash Invalid', 403);

            $firmen = $jsonAuth->returnFirmenFromHash($data['hash']);
            $erg = [];
            /** @var Firma $firma */
            foreach ($firmen as $firma) {
                $erg[$firma->getFirmanname()] = [
                    'app starts' => $firma->getAppAufrufe(),
                    'coupons bought' => $firma->getKaeufeRabatte(),
                    'used coupons' => $firma->getGenutzteRabatte(),
                    'qr-codes scanned' => $firma->getGescannteRechnungen()
                ];
            }
            return new Response($serializer->serialize($erg, 'json'), 200);
        }
    }

}
