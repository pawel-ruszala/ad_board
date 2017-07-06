<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Advertisment;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Advertisment controller.
 *
 * @Route("advertisment")
 */
class AdvertismentController extends Controller
{
    /**
     * Lists all advertisment entities.
     *
     * @Route("/", name="advertisment_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $advertisments = $em->getRepository('AppBundle:Advertisment')->findAll();
        return $this->render('advertisment/index.html.twig', array(
            'advertisments' => $advertisments,
        ));
    }

    /**
     * Creates a new advertisment entity.
     *
     * @Route("/new", name="advertisment_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $advertisment = new Advertisment();
        $form = $this->createForm('AppBundle\Form\AdvertismentType', $advertisment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $advertisment->setUser($this->getUser());
            $em->persist($advertisment);
            $em->flush();

            return $this->redirectToRoute('advertisment_show', array('id' => $advertisment->getId()));
        }

        return $this->render('advertisment/new.html.twig', array(
            'advertisment' => $advertisment,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a advertisment entity.
     *
     * @Route("/{id}", name="advertisment_show")
     * @Method("GET")
     */
    public function showAction(Advertisment $advertisment)
    {
        $deleteForm = $this->createDeleteForm($advertisment);
        $images = $this->getDoctrine()->getRepository('AppBundle:Image')->findBy(array('advertisment'=>$advertisment->getId()));

        return $this->render('advertisment/show.html.twig', array(
            'advertisment' => $advertisment,
            'delete_form' => $deleteForm->createView(),
            'images' => $images
        ));
    }

    /**
     * Displays a form to edit an existing advertisment entity.
     *
     * @Route("/{id}/edit", name="advertisment_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Advertisment $advertisment)
    {
//        $userId = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->find($id)->getUser();
        $userId = $advertisment->getUser();
        $user = $this->getUser();

        if($user !== $userId){
            throw $this->createAccessDeniedException("That's not your advert.");
        }

        $deleteForm = $this->createDeleteForm($advertisment);
        $editForm = $this->createForm('AppBundle\Form\AdvertismentType', $advertisment);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('advertisment_edit', array('id' => $advertisment->getId()));
        }

        return $this->render('advertisment/edit.html.twig', array(
            'advertisment' => $advertisment,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a advertisment entity.
     *
     * @Route("/{id}", name="advertisment_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Advertisment $advertisment)
    {
        $form = $this->createDeleteForm($advertisment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($advertisment);
            $em->flush();
        }

        return $this->redirectToRoute('advertisment_index');
    }

    /**
     * Creates a form to delete a advertisment entity.
     *
     * @param Advertisment $advertisment The advertisment entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Advertisment $advertisment)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('advertisment_delete', array('id' => $advertisment->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

}
