<?php

namespace App\Controller;

use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\FormTypeInterface;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use App\Entity\User;
use \Symfony\Component\Form\Extension\Core\Type\PasswordType;
use App\Form\UserType;
use Symfony\Component\Serializer\SerializerInterface;

class UserController extends AbstractController {
    /**
     * @Route("/user", name="user")
     */
    public function index() {
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    /**
     * @Route("/user/show", name="show_user")
     */
    public function showUser(): Response {
        $userFINISH = $this->getDoctrine()->getRepository(User::class)->findAll();

        return $this->render('user/Userprofile.html.twig', ["menus" => $userFINISH]);
    }


    /**
     * @Route("/user/new", name="new_user_Form")
     */
    public function addUser(Request $request): Response {
        $USER = new User();
        $form = $this->createForm(UserType::class, $USER)
            ->add('Username', TextType::class)
            ->add('email', TextType::class)
            ->add('vorname', TextType::class)
            ->add('nachname', TextType::class)
            ->add('password', PasswordType::class)
            ->add('save', SubmitType::class, ['label' => 'Create Task']);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $input = $form->getData();

            $allUsers = $this->getDoctrine()
                ->getRepository(User::class)
                ->findAll();

            $exists = "false";
            foreach ($allUsers as $us) {
                if ($us->getEmail() == $input->getEmail()) {
                    $exists = "true";
                }
            }

            if ($exists == "true") {
                //User schon vorhanden
                return $this->render("user/failed.html.twig", ["mail" => $input->getEmail()]);
            } else {

                $entityManager = $this->getDoctrine()->getManager();

                $dbUser = new User();
                $dbUser->setEmail($input->getEmail());
                $dbUser->setNachname($input->getnachname());
                $dbUser->setVorname($input->getVorname());
                $dbUser->setUsername($input->getUsername());
                $dbUser->setPassword($input->getPassword());

                $entityManager->persist($dbUser);
                $entityManager->flush();


                return $this->render('user/Userprofile.html.twig', [
                    "menus" => $this->getDoctrine()->getRepository(USER::class)
                        ->findBy(['email' => $input->getEmail()])
                ]);
            }
        }
        return $this->render('user/newForm.html.twig', ['form' => $form->createView()]);
    }

    private function saveUser($username, $email, $vorname, $nachname, $password) {
        $entityManager = $this->getDoctrine()->getManager();

        $Firma = new User();
        $Firma->setUsername($username);
        $Firma->setEmail($email);
        $Firma->setVorname($vorname);
        $Firma->setNachname($nachname);
        $Firma->setPassword($password);

        $entityManager->persist($Firma);
        $entityManager->flush();

        return true;
    }

    /**
     * @Route("/api/user.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function POST_GET_User_API(Request $request, SerializerInterface $serializer): Response {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {
                $data = $this->getDoctrine()->getRepository(User::class)->findAll();
                return new Response($serializer->serialize($data, 'json'));
//                return new Response("GET");
            }
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);

                $username = $data["username"];
                $email = $data["email"];
                $vorname = $data["vorname"];
                $nachname = $data["nachname"];
                $password = $data["passwort"];


                $Users = $this->getDoctrine()->getRepository(User::class)->findAll();
                $exists = 0;
                foreach ($Users as $IsUser) {
                    if ($IsUser->getUsername() == $username) $exists = "-1";
                    if ($IsUser->getEmail() == $email) $exists = "-1";
                }

                if ($exists != 0) {
                    return new Response("-1");
                } else {
                    if ($this->saveUser($username, $email, $vorname, $nachname, $password) == true) {
                        return new Response("1");
                    } else {
                        return new Response("-1");
                    }
                }
            }

            // Return HTML
            return new Response(
                '<html><body>Some HTML Response</body></html>'
            );
        }
    }

}
