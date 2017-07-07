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
        $adverts = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->findBy(array(), array('creationDate' => 'DESC'), 2);

        return $this->render('default/index.html.twig', array('adverts'=>$adverts));
    }

    /**
     * @Route("/showByUser/{id}", name="userAdv")
     */
    public function showUserAds($id = null)
    {
        if ($id == null) {
            $user = $this->getUser();
        } else {
            $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        }

        $adverts = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->findBy(array('user' => $user), array('creationDate' => 'DESC'));

        return $this->render('default/showUsersAdv.html.twig', array('adverts'=>$adverts));
    }

    /**
     * @Route("/search", name="search")
     */
    public function searchAction(Request $request)
    {
        $phrase = $request->query->get('search');
        $adverts = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->search($phrase);

        return $this->render('default/search.html.twig', array(
            'adverts'=> $adverts,
            'phrase' => $phrase
        ));
    }
}
