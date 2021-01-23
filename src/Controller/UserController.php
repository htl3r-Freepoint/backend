<?php

namespace App\Controller;

use App\Entity\Verify;
use Doctrine\DBAL\Types\IntegerType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
use App\Service\Hash;

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
//    public function showUser(): Response {
//        $userFINISH = $this->getDoctrine()->getRepository(User::class)->findAll();
//
//        return $this->render('user/Userprofile.html.twig', ["menus" => $userFINISH]);
//    }
//
//
//    // @Route("/user/new", name="new_user_Form")
//    private function addUser(Request $request): Response {
//        $USER = new User();
//        $form = $this->createForm(UserType::class, $USER)
//            ->add('Username', TextType::class)
//            ->add('email', TextType::class)
//            ->add('vorname', TextType::class)
//            ->add('nachname', TextType::class)
//            ->add('password', PasswordType::class)
//            ->add('save', SubmitType::class, ['label' => 'Create Task']);
//
//        $form->handleRequest($request);
//        if ($form->isSubmitted() && $form->isValid()) {
//            $input = $form->getData();
//
//            $allUsers = $this->getDoctrine()
//                ->getRepository(User::class)
//                ->findAll();
//
//            $exists = "false";
//            foreach ($allUsers as $us) {
//                if ($us->getEmail() == $input->getEmail()) {
//                    $exists = "true";
//                }
//            }
//
//            if ($exists == "true") {
//                //User schon vorhanden
//                return $this->render("user/failed.html.twig", ["mail" => $input->getEmail()]);
//            } else {
//
//                $entityManager = $this->getDoctrine()->getManager();
//
//                $dbUser = new User();
//                $dbUser->setEmail($input->getEmail());
//                $dbUser->setNachname($input->getnachname());
//                $dbUser->setVorname($input->getVorname());
//                $dbUser->setUsername($input->getUsername());
//                $dbUser->setPassword($input->getPassword());
//
//                $entityManager->persist($dbUser);
//                $entityManager->flush();
//
//
//                return $this->render('user/Userprofile.html.twig', [
//                    "menus" => $this->getDoctrine()->getRepository(USER::class)
//                        ->findBy(['email' => $input->getEmail()])
//                ]);
//            }
//        }
//        return $this->render('user/newForm.html.twig', ['form' => $form->createView()]);
//    }

    /**
     * @Route("/api/sendMail.{_format}", format="json", requirements={ "_format": "json" })
     * @param Request $request
     * @return Response
     */
    public function sendMail(Request $request, SerializerInterface $serializer, MailerInterface $mailer, Hash $jsonHash) {
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                if (!$jsonHash->checkJsonCode($data['UserID'], $data['hash'])) return new Response('-1 invalid', 403);

                $UserID = $data['UserID'];
                $email = $data['email'];
                $UserDB = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email]);
                if (count($UserDB) == 1) {
                    $VerifyDB = $this->getDoctrine()->getRepository(Verify::class)->findBy(['FK_User_ID' => $UserID]);
                    if (count($VerifyDB) == 1) {
                        $code = $VerifyDB[0]->getCode();

                        $this->sendEmail($email, $mailer, $code);
                        return new Response("1", 200);
                    }else {
                        return new Response("-1 Verification Code not found", 404);
                    }
                } else {
                    return new Response("-1 not found", 404);
                }
            }
        }
    }


    private function sendEmail($email, $mailer, $code) {
        $email = (new Email())
            ->from('no-reply@freepoint.at')
            ->to($email)
            ->subject('Verify your FreePoint account')
            ->text('Verification Link: https://127.0.0.1:8000/verify/' . $code);

        $mailer->send($email);
    }

    private function saveUser($username, $email, $vorname, $nachname, $password, $mailer, $loginType, $jsonHash) {
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
        $entityManager->flush();

        $id = $USER->getId();
        $code = $jsonHash->generateCode($id);

        $VERIFY = new Verify();
        $VERIFY->setFKUserID($id);
        $VERIFY->setCode($code);
        $VERIFY->setRegisterDate(new \DateTime());

        $entityManager->persist($VERIFY);
        $entityManager->flush();

        $this->sendEmail($email, $mailer, $code);
        return true;
    }

    /**
     * @Route("/api/RegisterUser.{_format}", format="json", requirements={ "_format": "json" })
     * @param Request $request
     * @return Response
     */
    public function POST_GET_User_API(Request $request, SerializerInterface $serializer, MailerInterface $mailer, Hash $jsonHash): Response {
        // Return JSON
        if ($request->getRequestFormat() == 'json') {
            if ($request->getMethod() == 'GET') {
//                $data = $this->getDoctrine()->getRepository(User::class)->findAll();
//                return new Response($serializer->serialize($data, 'json'), 200);
//                return new Response($serializer->serialize($data, 'json'), 200);
                return new Response("forbidden", 403);
            }
            if ($request->getMethod() == 'POST') {
                $data = json_decode($request->getContent(), true);
                echo count($data);

                $username = $data["username"];
                $email = $data["email"];
                $password = $data["password"];
                if (isset($data["vorname"])) $vorname = $data["vorname"]; else $vorname = null;
                if (isset($data["nachname"])) $nachname = $data["nachname"]; else $nachname = null;
                if (isset($data['type'])) $loginType = $data['type']; else $loginType = null;


                if ($loginType == "" || $loginType == "google" || $loginType == "null" || !isset($loginType)) {


                    $Users = $this->getDoctrine()->getRepository(User::class)->findAll();
                    $exists = 0;
                    foreach ($Users as $IsUser) {
                        if ($IsUser->getUsername() == $username) $exists = "-1 Username";
                        if ($IsUser->getEmail() == $email) $exists = "-1 Email";
                    }

                    if ($exists != 0) {
                        if ($exists == "-1 Username") return new Response("-1 Username", 400);
                        if ($exists == "-1 Username") return new Response("-1 Username", 400);
                    } else {
                        if ($this->saveUser($username, $email, $vorname, $nachname, $password, $mailer, $loginType, $jsonHash) == true) {
                            $Users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email])[0];
                            $hash = $jsonHash->saveJsonCode($Users->getID());
//                            return new Response("1", 200);
                            $data = [
                                'email' => $email,
                                'username' => $username,
                                'verified' => false,
                                'id' => $Users->getID(),
                                'hash' => $hash
                            ];
                            return new Response($serializer->serialize($data, 'json'), 200);

                        } else {
                            return new Response("-1", 400);
                        }
                    }

                } else {
                    return new Response("-1 Login not Accepted", 400);
                }
            }
        }
    }

    /**
     * @Route("/api/loginUser.{_format}", format="html", requirements={ "_format": "html|json" })
     * @param Request $request
     * @return Response
     */
    public function Login_User_API(Request $request, SerializerInterface $serializer, MailerInterface $mailer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $email = $data["email"];
            $password = $data["passwort"];
            $loginType = $data['type'];
            isset($data['hash']) ? $hash = $data['hash'] : $hash = $jsonAuth->generateJsonCode();

            $users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email, 'loginType' => $loginType]);

            $anz = 0;
            foreach ($users as $u) {
                if (password_verify($password, $u->getPassword()) && $email == $u->getEmail() && $loginType == $u->getLoginType()) {
                    $user = $u;
                    $id = $u->getID();
                    $anz++;
                }
            }


            if ($anz > 1) return new Response("-1 Too Many:" . $anz, 400);
            if ($anz < 1) return new Response("-1 Not found", 400);
            if ($jsonAuth->checkJsonCode($id, $hash) == false) $hash = $jsonAuth->saveJsonCode($id);
            $data = [
                'email' => $email,
                'username' => $user->getUsername(),
                'verified' => $user->getVerified(),
                'id' => $id,
                'hash' => $hash
            ];
            return new Response($serializer->serialize($data, 'json'), 200);
        }
        return new Response("RIP", 500);
    }

//    private function createRandomCode($id) {
//
//        $chars = "abcdefghijkmnopqrstuvwxyz023456789";
//        srand((double)microtime() * 1000000);
//        $i = 0;
//        $pass = '';
//
//        while ($i <= 40) {
//            $num = rand() % 33;
//            $tmp = substr($chars, $num, 1);
//            $pass = $pass . $tmp;
//            $i++;
//        }
//
//        $idStr = ($id * 37) . "";
//        $part1 = substr($pass, 0, 13);
//        $part2 = substr($pass, 13, strlen($pass));
//
//        $hash = password_hash($part1 . strrev($idStr) . $part2, PASSWORD_DEFAULT);
//
//        $noSpaces = str_replace(' ', '-', $hash); // Replaces all spaces with hyphens.
//        $noSpecialChars = preg_replace('/[^A-Za-z0-9\-]/', '', $noSpaces); // Removes special chars.
//        $erg = substr($noSpecialChars, 0, 3);
//
//        if (strlen($erg) >= 1000) $erg = substr($erg, 0, 800);
//
//
//        return $erg;
//    }

}
