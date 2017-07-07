<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Opinion;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class OpinionController extends Controller
{
    /**
     * @Route("/showProfile/{id}/opinion/new", name="newOpinion")
     * @Method("GET")
     */
    public function newOpinionAction($id)
    {
        $opinion = new Opinion();
        $form = $this->createForm('AppBundle\Form\OpinionType', $opinion);

        return $this->render('opinion/newOpinion.html.twig', array(
            'opinion' => $opinion,
            'form' => $form->createView(),
            'id' => $id
        ));
    }

    /**
     * @Route("/showProfile/{id}/opinion/new", name="userOpinion")
     * @Method("POST")
     */
    public function addOpinionAction(Request $request, $id)
    {
        $opinion = new Opinion();
        $form = $this->createForm('AppBundle\Form\OpinionType', $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $opinion->setUser($em->getRepository('AppBundle:User')->find($id));
            $opinion->setDate(new \DateTime());
            $opinion->setByUser($this->getUser());
            $em->persist($opinion);
            $em->flush();

            return $this->redirectToRoute('showProfile', array('id' => $id));
        }

        return $this->render('opinion/newOpinion.html.twig', array(
            'opinion' => $opinion,
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/showProfile/{id}/opinions", name="showOpinions")
     */
    public function showOpinionAction($id)
    {
        $user = $this->getDoctrine()->getRepository('AppBundle:User')->find($id);
        $opinions = $this->getDoctrine()->getRepository('AppBundle:Opinion')->findBy(array('user' => $user), array('date' => 'DESC'));

        return $this->render('opinion/showOpinions.html.twig', array(
            'opinions' => $opinions,
            'user'=>$user
            )
        );

    }

}
