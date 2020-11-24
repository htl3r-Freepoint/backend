<?php

namespace App\Controller;

use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
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
//    public function index() {
//        return $this->render('user/index.html.twig', [
//            'controller_name' => 'UserController',
//        ]);
//    }

    /**
     * @Route("/user/show", name="show_user")
     */
//    public function showUser(): Response {
//        $userFINISH = $this->getDoctrine()->getRepository(User::class)->findAll();
//
//        return $this->render('user/Userprofile.html.twig', ["menus" => $userFINISH]);
//    }


    // @Route("/user/new", name="new_user_Form")
    private function addUser(Request $request): Response {
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

    private function sendEmail($email, $mailer) {
        $email = (new Email())
            ->from('no-reply@freepoint.at')
            ->to('christopher.scherling@gmail.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!');

//        $mailer->send($email); //TODO
    }

    private function saveUser($username, $email, $vorname, $nachname, $password, $mailer, $loginType) {
        $entityManager = $this->getDoctrine()->getManager();

        $USER = new User();
        $USER->setUsername($username);
        $USER->setEmail($email);
        $USER->setVorname($vorname);
        $USER->setNachname($nachname);
        $USER->setPassword($password);
        $USER->setVerified(false);
        if ($loginType != null) {
            $USER->setLoginType($loginType);
        }

        $entityManager->persist($USER);
//        $entityManager->flush();  //TODO

        $this->sendEmail($email, $mailer);

        return true;
    }

    /**
     * @Route("/api/RegisterUser.{_format}", format="json", requirements={ "_format": "json" })
     * @param Request $request
     * @return JsonResponse
     */
    public function POST_GET_User_API(Request $request, SerializerInterface $serializer, MailerInterface $mailer): JsonResponse {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {
                $data = $this->getDoctrine()->getRepository(User::class)->findAll();
                return new JsonResponse($serializer->serialize($data, 'json'), 200);
//                return new Response("GET");
            }
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);

                $username = $data["username"];
                $email = $data["email"];
                $vorname = $data["vorname"];
                $nachname = $data["nachname"];
                $password = $data["passwort"];
                $loginType = $data['type'];

                if ($loginType == "" || $loginType == "google" || $loginType == "null" || !isset($loginType)) {


                    $Users = $this->getDoctrine()->getRepository(User::class)->findAll();
                    $exists = 0;
                    foreach ($Users as $IsUser) {
                        if ($IsUser->getUsername() == $username) $exists = "-1 Username";
                        if ($IsUser->getEmail() == $email) $exists = "-1 Email";
                    }

                    if ($exists != 0) {
                        if ($exists == "-1 Username") return new JsonResponse("-1 Username", 400);
                        if ($exists == "-1 Username") return new JsonResponse("-1 Username", 400);
                    } else {
                        if ($this->saveUser($username, $email, $vorname, $nachname, $password, $mailer, $loginType) == true) {
                            return new JsonResponse("1", 200);
                        } else {
                            return new JsonResponse("-1", 400);
                        }
                    }

                } else {
//                    $data = [
//                        'type' => 'validation_error',
//                        'title' => 'There was a validation error',
//                        'errors' => "Not Valid"
//                    ];
                    return new JsonResponse("-1 Login not Accepted", 400);
//                    return new Response("-1 Login not Accepted");
                }
            }
        }
    }

    /**
     * @Route("/api/loginUser.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function Login_User_API(Request $request, SerializerInterface $serializer, MailerInterface $mailer): JsonResponse {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $email = $data["email"];
            $password = $data["passwort"];
            $loginType = $data['type'];

            $user = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email, 'password' => $password, 'loginType' => $loginType]);

            if (count($user) != 1) return new JsonResponse("-1 Not found", 400);
            $data = [
                'email' => $email,
                'username' => $user->getUsername(),
                'verified' => $user->getVerified()
            ];
            return new JsonResponse($data, 200);
        }
        return new JsonResponse("RIP", 400);
    }

}
