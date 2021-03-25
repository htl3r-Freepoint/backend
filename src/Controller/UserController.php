<?php


namespace App\Controller;

use App\Entity\Angestellte;
use App\Entity\LoginAuthentification;
use App\Entity\Verify;
use App\Service\clean;
use App\Service\DSGVO;
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
     * @Route("/api/sendEmail")
     * @param Request $request
     * @return Response
     */
    public function sendMail(Request $request, SerializerInterface $serializer, MailerInterface $mailer, Hash $jsonHash, clean $clean) {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (!$jsonHash->checkJsonCode($data['hash'])) return new Response('-1 invalid', 403);

            /** @var User $user */
            $user = $jsonHash->returnUserFromHash($data['hash'])['user'];
            $UserID = $user->getID();
            $email = $user->getEmail();

            $UserDB = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email]);
            if (count($UserDB) == 1) {
                $VerifyDB = $this->getDoctrine()->getRepository(Verify::class)->findBy(['FK_User_ID' => $UserID]);
                if (count($VerifyDB) == 1) {
                    $code = $VerifyDB[0]->getCode();

                    $this->sendEmail($email, $mailer, $code);
                    return new Response("", 200);
                } else {
                    return new Response("Verification Code not found", 404);
                }
            } else {
                return new Response("404 not found", 404);
            }
        } else {
            return new Response("", 404);
        }
    }


    private function sendEmail($email, $mailer, $code) {
        $clean = new clean();
        $text = $clean->returnHtmlFile($code);
        $email = (new Email())
            ->from('no-reply@freepoint.at')
            ->to($email)
            ->subject('Verify your FreePoint account')
            ->text("Please verify")
            ->html($text);

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
        $code = $jsonHash->generateJsonCode($id);

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
     * @Route("/api/registerUser")
     * @param Request $request
     * @return Response
     */
    public function POST_GET_User_API(Request $request, SerializerInterface $serializer, MailerInterface $mailer, Hash $jsonHash): Response {
        // Return JSON
//        if ($request->getRequestFormat() == 'json') {
        if ($request->getMethod() == 'GET') {
//                $data = $this->getDoctrine()->getRepository(User::class)->findAll();
//                return new Response($serializer->serialize($data, 'json'), 200);
//                return new Response($serializer->serialize($data, 'json'), 200);
            return new Response("forbidden", 403);
        }
        if ($request->getMethod() == 'POST') {
//                    return new Response("neinenienei", 202);
            $data = json_decode($request->getContent(), true);
//                echo count($data);

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
//                        if ($IsUser->getUsername() == $username) $exists = "-1 Username";
                    if ($IsUser->getEmail() == $email) $exists = "-1 Email";
                }

                if ($exists != 0) {
//                        if ($exists == "-1 Username") return new Response("-1 Username", 400);
                    if ($exists == "-1 Email") return new Response("Email already used", 400);
                } else {
                    if ($this->saveUser($username, $email, $vorname, $nachname, $password, $mailer, $loginType, $jsonHash) == true) {
                        $Users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email])[0];
                        $hash = $jsonHash->saveJsonCode($Users->getID());
//                            return new Response("1", 200);
                        $data = [
//                            'email' => $email,
                            'username' => $username,
                            'verified' => false,
//                            'id' => $Users->getID(),
                            'token' => $hash
                        ];
                        return new Response($serializer->serialize($data, 'json'), 200);

                    } else {
                        return new Response("-1", 400);
                    }
                }

            } else {
                return new Response("-1 Login not Accepted", 400);
            }
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/checkLogin")
     * @param Request $request
     * @return Response
     */
    public function Check_Login_API(Request $request, SerializerInterface $serializer, MailerInterface $mailer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            if (isset($data['hash'])) {
                $hash = $data['hash'];
            } else {
                return new Response(false);
            }
            if (!$jsonAuth->checkJsonCode($hash)) return new Response(false);
            $verified = $jsonAuth->returnUserFromHash($hash);
            $editRights = 0;
            $firmenname = $data['firmenname'] ?? null;
            if (isset($firmenname)) {
                $editRights = $jsonAuth->returnRechteFromHash($hash, $firmenname);
            }
            $erg = [
                'valid' => true,
                'verified' => $verified['user']->getVerified(),
                'editRights' => $editRights
            ];
            return new Response($serializer->serialize($erg, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/loginUser")
     * @param Request $request
     * @return Response
     */
    public function Login_User_API(Request $request, SerializerInterface $serializer, MailerInterface $mailer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $email = $data["email"] ?? null;
            $password = $data["password"] ?? null;
            $loginType = $data['type'] ?? null;
//            isset($data['hash']) ? $hash = $data['hash'] : $hash = $jsonAuth->generateJsonCode();
//            if(isset($data['hash'])){
//                $hash = $data['hash'];
//            } else {
//                $hash = $jsonAuth->generateJsonCode();
//            }

            //
            if (isset($data['hash'])) {
                $users = $this->getDoctrine()->getRepository(Verify::class)->findBy(['code' => $data['hash']]);
                if (count($users) < 1) {
                    if (isset($email) && $password) {
                        $users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email, 'loginType' => $loginType]);
                        if (count($users) < 1) {
                            return new Response("Username or Password is invalid");
                        }
                    } else {
                        return new Response("Insuficient login Informaition");
                    }
                }
                if (count($users) < 1) {
                    return new Response("Insuficient login Information");
                }
            } else {
                if (isset($email) && isset($password)) {
                    $users = $this->getDoctrine()->getRepository(User::class)->findBy(['email' => $email, 'loginType' => $loginType]);
                } else {
                    return new Response("Insufficient login Information");
                }
            }
            //

            $anz = 0;
            foreach ($users as $u) {
                if (password_verify($password, $u->getPassword()) && $email == $u->getEmail() && $loginType == $u->getLoginType()) {
                    /** @var User $user */
                    $user = $u;
                    $id = $u->getID();
                    $anz++;
                }
            }


            if ($anz > 1) return new Response("Too Many Users found:" . $anz, 400);
            if ($anz < 1) return new Response("User or Password not found", 400);
            $HASH = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(["FK_User_ID" => $user->getId()]);
            if (count($HASH) > 0) {
                $hash = $HASH[0]->getHash();
            } else {
                $hash = $jsonAuth->generateJsonCode();
                $jsonAuth->saveJsonCode($id, $hash);
            }
            if ($user->getLocked() == true) return new Response("Your account has been locked! Please contact us at: \"contact@freepoint.at\" to unlock your account.", 400);
            $data = [
//                    'email' => $email,
                'username' => $user->getUsername(),
                'verified' => $user->getVerified(),
//                    'id' => $id,
                'token' => $hash
            ];
            return new Response($serializer->serialize($data, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/changeUser")
     * @param Request $request
     * @return Response
     *
     */
    public function Change_User_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $entityManager = $this->getDoctrine()->getManager();

            $hash = $data['token'];
            $username = $data['username'] ?? null;
            $email = $data['email'] ?? null;
            $firstname = $data['firstName'] ?? null;
            $lastName = $data['lastName'] ?? null;
            $oldPassword = $data['oldPassword'] ?? null;
            $newPassword = $data['newPassword'] ?? null;

            if (!isset($username) && !isset($email) && !isset($firstname) && !isset($lastName) && !isset($oldPassword) && !isset($newPassword)) {
                return new Response("Insufficent login information", 400);
            }
            /**@var User $user */
            $user = $jsonAuth->returnUserFromHash($hash)['user'];
            if (isset($oldPassword) && isset($newPassword)) {
                if (password_verify($oldPassword, $user->getPassword())) {
                    $user->setPassword($newPassword);
                } else return new Response("Passwords dont match", 400);
            } elseif (isset($oldPassword) && !isset($newPassword)) return new Response("You have to set a new Password", 400);
            if (isset($username)) $user->setUsername($username);
            if (isset($email)) $user->setEmail($email);
            if (isset($firstname)) $user->setVorname($firstname);
            if (isset($lastName)) $user->setNachname($lastName);

            $entityManager->persist($user);
            $entityManager->flush();

            return new Response("successful", 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/getUser")
     * @param Request $request
     * @return Response
     *
     */
    public function Get_User_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);
            $hash = $data['hash'] ?? null;
            if (!isset($hash)) return new Response("please provide a User Token", 400);
            if (!$jsonAuth->checkJsonCode($data['hash'])) return new Response('Token invalid', 403);
            $entityManager = $this->getDoctrine()->getManager();


            $DataDB = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(['Hash' => $hash]);
            /** @var User $user */
            $user = $this->getDoctrine()->getRepository(User::class)->findBy(['id' => $DataDB[0]->getFKUserID()])[0];

            $erg = [
                'username' => $user->getUsername(),
                'firstName' => $user->getVorname(),
                'lastName' => $user->getNachname(),
                'email' => $user->getEmail(),
                'verified' => $user->getVerified(),
            ];

            return new Response($serializer->serialize($erg, 'json'), 200);
        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/deleteUser")
     * @param Request $request
     * @return Response
     *
     */
    public function DELETE_User_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth, DSGVO $dsgvo): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $hash = $data['hash'];
            if (!isset($hash)) return new Response("Please provide a token", 400);
            $passwort = $data['password'];

            /**@var User $user */
            $user = $jsonAuth->returnUserFromHash($hash)['user'];
            if (password_verify($passwort, $user->getPassword())) {
//                if ($dsgvo->deleteEverything($hash, $user->getEmail()) == 1) return new Response("successful", 200);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->remove($user);
                $ANGESTELLTER = $this->getDoctrine()->getRepository(Angestellte::class)->findBy(['FK_User_ID' => $user->getID()]);
                foreach ($ANGESTELLTER as $an) {
                    $entityManager->remove($an);
                }
                $HASH = $this->getDoctrine()->getRepository(LoginAuthentification::class)->findBy(['Hash' => $hash]);
                foreach ($HASH as $h) {
                    $entityManager->remove($h);
                }

                $entityManager->flush();
            }

            return new Response("", 200);

        } else {
            return new Response("", 404);
        }
    }

    /**
     * @Route("/api/getUserRights")
     * @param Request $request
     * @return Response
     *
     */
    public function GET_UserRights_API(Request $request, SerializerInterface $serializer, Hash $jsonAuth): Response {
        if ($request->getMethod() == 'POST') {
            $data = json_decode($request->getContent(), true);

            $hash = $data['hash'];
            $firmenname = $data['companyName'];
            if (!isset($hash)) return new Response("Please provide a token", 400);
            $RECHTE = $jsonAuth->returnRechteFromHash($hash, $firmenname);
            return new Response($RECHTE, 200);
        }
    }
}
