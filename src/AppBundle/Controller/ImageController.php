<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ImageController extends Controller
{
    /**
     * @Route("/addImage/{id}", name="addImage")
     * @Method("GET")
     */
    public function formImageAction($id)
    {
        $userId = $this->getDoctrine()->getRepository('AppBundle:Advertisment')->find($id)->getUser();
        $user = $this->getUser();

        if($user !== $userId){
            throw $this->createAccessDeniedException("That's not your advert.");

        }

        $form = $this->createFormBuilder()->add('image', 'file')->add('add', 'submit')->getForm();

        return $this->render('image/imageNew.html.twig', array('form' => $form->createView()));
    }

    /**
     * @Route("/addImage/{id}", name="newImage")
     * @Method("POST")
     */
    public function newImage(Request $request, $id)
    {
        $form = $this->createFormBuilder()->add('image', 'file')->add('add', 'submit')->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            /**
             * @var $image UploadedFile
             */
            $values = $form->getData();
            $file = $values['image'];
            $filepath = 'upload/' . date("Ymd") . '/' . $this->getUser()->getUsername() . '/';
            $filename = uniqid() . '-' . $file->getClientOriginalName();
            $file->move($filepath, $filename);

            $em = $this->getDoctrine()->getManager();
            $path = new Image();
            $path->setPathImage($filepath . $filename);
            $advert = $em->getRepository('AppBundle:Advertisment')->find($id);
            $path->setAdvertisment($advert);
            $em->persist($path);
            $em->flush();

            return $this->redirectToRoute('advertisment_show', array('id' => $id));
        }
    }
}
