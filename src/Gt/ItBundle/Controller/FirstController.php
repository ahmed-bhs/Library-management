<?php

namespace Gt\ItBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Gt\ItBundle\Entity\Contact;
use Gt\ItBundle\Form\ContactType;
class FirstController extends Controller
{
    public function firstAction()
    {$em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GtItBundle:Emp')->findBy(array('status'=>0));

        
        return $this->render('GtItBundle:First:first.html.twig', array('a'=>$entities));
    }
      public function articleAction()
    {
        return $this->render('GtItBundle:First:article.html.twig' );
    }



      public function confAction()
    {
        return $this->render('GtItBundle:First:conf.html.twig');
    }
      public function innoAction()
    {
        return $this->render('GtItBundle:First:inno.html.twig');
    }
          public function innooAction()
    {
        return $this->render('GtItBundle:First:innoo.html.twig');
    }  
        public function contactAction(Request $request)
    {



$contact = new Contact();
           $form = $this->createForm(ContactType::class, $contact);
           $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($contact);$em->flush();

        $this->get('session')->getFlashBag()->add(
        'notice',
        'Ton message est bien envoyé!'
    );}




            return $this->render('GtItBundle:First:contact.html.twig',
            array('form' => $form->createView()));
        
    }  
}
