<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    public function categoriesMenuAction()
    {
        $categories = $this->getDoctrine()->getRepository('AppBundle:Category')->findAll();

        return $this->render('category/categories.html.twig', array('categories' => $categories));
    }

    /**
     * @Route("/category/{id}", name="showByCategory")
     */
    public function showByCategoryAction($id)
    {
        $adverts = $this->getDoctrine()->getRepository("AppBundle:Advertisment")->findBy(array('category'=>$id), array('creationDate' => 'DESC'));
        return $this->render('category/showByCategory.html.twig', array('adverts'=>$adverts));
    }
}
