<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * Show lasts 3 adverts
     *
     * @Route("/", name="homepage")
     */
    public function indexActionAction(Request $request)
    {
        // replace this example code with whatever you need
        $adverts = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->findBy(array(), array('creationDate' => 'DESC'), 3);

        return $this->render('default/index.html.twig', array('adverts'=>$adverts));
    }

    /**
     * Show adverts by user id
     *
     * @Route("/showByUser/{id}", name="userAdv")
     */
    public function showUserAdsAction($id = null)
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
