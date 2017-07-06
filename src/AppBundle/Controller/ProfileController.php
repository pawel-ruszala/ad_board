<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class ProfileController extends Controller
{
    /**
     * @Route("/showProfile/{id}", name="showProfile")
     */
    public function showProfileAction($id)
    {
        $user = $this-> getDoctrine()->getRepository('AppBundle:User')->find($id);

        return $this->render('profile/show_profile.html.twig', array(
            'user'=>$user
        ));
    }

}
