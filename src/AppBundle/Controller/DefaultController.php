<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        $adverts = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->findAll();

        return $this->render('default/index.html.twig', array('advertisments'=>$adverts));
    }

    /**
     * @Route("/showByUser", name="userAdv")
     */
    public function showUserAds()
    {
        $user = $this->getUser();
        $adverts = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->findBy(array('user' => $user));

        return $this->render('default/showUsersAdv.html.twig', array('adverts'=>$adverts));
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
        $title = $request->query->get('search');
        $adverts = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->search($title);

        return $this->render('default/showUsersAdv.html.twig', array(
            'adverts'=> $adverts
        ));
    }
}
