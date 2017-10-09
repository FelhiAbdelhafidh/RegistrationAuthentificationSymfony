<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends Controller {

    /**
     * @Route("/register")
     */
    public function registerAction(Request $request, UserPasswordEncoderInterface $encoder) {
        $em = $this->getDoctrine()->getManager();
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //creation user
            $user->setPassword($encoder->encodePassword($user, $user->getPassword()));
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute('login');
        }


        return $this->render('AppBundle:Register:register.html.twig', array(
                    'form' => $form->createView()
        ));
    }

}
