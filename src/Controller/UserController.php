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

}
