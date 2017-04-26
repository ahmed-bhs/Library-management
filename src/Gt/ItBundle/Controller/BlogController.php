<?php

namespace Gt\ItBundle\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Gt\ItBundle\Entity\Blog;
use Utilisateurs\UtilisateursBundle\Entity\Utilisateurs;
use Gt\ItBundle\Entity\Comment;
use Gt\ItBundle\Entity\Image;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Gt\ItBundle\Form\CommentType;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\SecurityContextInterface;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;



class BlogController extends Controller
{
    
   public function addAction(Request $request)
  {
    // Création de l'entité
    $advert = new Blog();
    $advert->setTitle('Recherche développeur Symfony.');
    $advert->setAuthor('Alexandre');
    $advert->setContent("Nous recherchons un développeur Symfony débutant sur Lyon. Blabla…");
     
     $image = new Image();

    $image->setUrl('http://sdz-upload.s3.amazonaws.com/prod/upload/job-de-reve.jpg');
    $image->setAlt('Job de rêve');

    // On lie l'image à l'annonce
    $advert->setImage($image);

    // On peut ne pas définir ni la date ni la publication,
    // car ces attributs sont définis automatiquement dans le constructeur

    // On récupère l'EntityManager
    $em = $this->getDoctrine()->getManager();

    // Étape 1 : On « persiste » l'entité
    $em->persist($advert);

    // Étape 2 : On « flush » tout ce qui a été persisté avant
    $em->flush();

    // Reste de la méthode qu'on avait déjà écrit
    if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      // Puis on redirige vers la page de visualisation de cettte annonce
      return $this->redirectToRoute('gt_it_blog', array('id' => $advert->getId()));
    }

    // Si on n'est pas en POST, alors on affiche le formulaire
      return $this->render('GtItBundle:Blog:blog.html.twig', array('advert' => $advert));
    
  }




  public function blogAction(Request $request)

  {  
  // On récupère le repository

include 'config.php';
    $user_ip = $_SERVER['REMOTE_ADDR'];
    $pageID = '50'; // The ID of the page, the article or the video ...

    //function to calculate the percent
    function percent($num_amount, $num_total) {
      if( $num_total!=0)  {$count1 = $num_amount / $num_total;
        $count2 = $count1 * 100;
        $count = number_format($count2, 0);} else $count =0;
        return $count;
    }

    // check if the user has already clicked on the unlike (rate = 2) or the like (rate = 1)
       












    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('GtItBundle:Blog')
    ;
     $repository4 = $this->getDoctrine()
      ->getManager()
      ->getRepository('GtItBundle:Tag');
     $repository2 = $this->getDoctrine()
      ->getManager()
      ->getRepository('GtItBundle:Comment');
  

  // On récupère l'entité correspondante à l'id $id
 $advert = $repository->byTime();
  $tags = $repository4->findAll();

$arr=array();

foreach ($advert as $key => $value) {
$arr1=array();

$pageID=$value->getId();

 $dislike_sql = mysql_query('SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 2 ');
        $dislike_count = mysql_result($dislike_sql, 0); 

        $like_sql = mysql_query('SELECT COUNT(*) FROM  wcd_yt_rate WHERE ip = "'.$user_ip.'" and id_item = "'.$pageID.'" and rate = 1 ');
        $like_count = mysql_result($like_sql, 0);  

        // count all the rate 
        $rate_all_count = mysql_query('SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'"');
        $rate_all_count = mysql_result($rate_all_count, 0);  

        $rate_like_count = mysql_query('SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 1');
        $rate_like_count = mysql_result($rate_like_count, 0);  
        $rate_like_percent = percent($rate_like_count, $rate_all_count);

        $rate_dislike_count = mysql_query('SELECT COUNT(*) FROM  wcd_yt_rate WHERE id_item = "'.$pageID.'" and rate = 2');
        $rate_dislike_count = mysql_result($rate_dislike_count, 0);  
        $rate_dislike_percent = percent($rate_dislike_count, $rate_all_count);



array_push($arr1,$rate_like_count,$rate_dislike_count,$rate_all_count,$rate_like_percent,$rate_dislike_percent,$like_count,$dislike_count);


    $arr[$pageID] = $arr1;






}



















 $paginator  = $this->get('knp_paginator');

 $pagination = $paginator->paginate(
         $advert,
        $request->query->get('page', 1)/*page number*/,
        2/*limit per page*/
    );

 $comment= $repository2->findAll();
    // $advert est donc une instance de OC\PlatformBundle\Entity\Advert
    // ou null si l'id $id  n'existe pas, d'où ce if :
    if (null === $advert) {
      throw new NotFoundHttpException("L'annoncddde d'id 'existe pas.");
    }

  $comment2= new Comment;
$div=$request->request->get('div');
  
$em = $this->getDoctrine()->getManager();

  if ($request->getMethod() == 'POST')
        {
$page=$request->get('page');
             $id= $request->get('id');
                 
$securityContext = $this->container->get('security.authorization_checker');
if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) 

{
$utilisateur = $this->container->get('security.context')->getToken()->getUser(); $comm= $request->get('comment');

if($comm!=NUll){$comment2->setBlog_id($id);

              $comment2->setComment($comm);
          
    
               $blog = $repository->find($id);
                $em = $this->getDoctrine()->getManager();

                  $comment2->setBlog($blog);
                      $comment2->setUser($utilisateur);
                $em->persist($comment2);
                $em->flush();}

 }else{   $request->getSession()
        ->getFlashBag()
        ->add('success', 'Sorry you need to login first!');
           $div= 'alert';    }

                        
                                $url = $this->generateUrl('gt_it_blog', array('page' => $page));

// concatination & redirect
return $this->redirect(
sprintf('%s#%s', $url, $div)
);
                }







    // Le render ne change pas, on passait avant un tableau, maintenant un objet
    return $this->render('GtItBundle:Blog:blog.html.twig', array(
      'comment' => $comment ,'advert' => $pagination,'tags'=>$tags,


      'arr'=>$arr
    ));
  }



  public function blogSingleAction($id,$format,Request $request)


  { 






   $repository4 = $this->getDoctrine()
      ->getManager()
      ->getRepository('GtItBundle:Blog');  $tags = $repository4->byLimit();
  // On récupère le repository
    $repository = $this->getDoctrine()
      ->getManager()
      ->getRepository('GtItBundle:Blog') ;
       $repository2 = $this->getDoctrine()
      ->getManager()
      ->getRepository('GtItBundle:Comment') ;
 $advert = $repository->find($id);
 $comment=$repository2->byId($id);




$comment2= new Comment;

  
$em = $this->getDoctrine()->getManager();


  if ($request->getMethod() == 'POST')
        {    

          //   $id= $request->get('id');
                 


$comm= $request->get('comment');

if($comm!=NUll){$comment2->setBlog_id($id);

              $comment2->setComment($comm);
          
    
               $blog = $repository->find($id);
                $em = $this->getDoctrine()->getManager();

                  $comment2->setBlog($blog);


$securityContext = $this->container->get('security.authorization_checker');
if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) 

{
$utilisateur = $this->container->get('security.context')->getToken()->getUser();

 $comment2->setUser($utilisateur);}

          else   {

          $name= $request->get('name');
          $mail=$request->get('mail');
          $comment2->setName($name);
           $comment2->setMail($mail);


          }





                     
                $em->persist($comment2);
                $em->flush(); }

                   
                                $url = $this->generateUrl('gt_it_blogSingle',array('id'=> $id));

// concatination & redirect
return $this->redirect(
 $url
);
                }














    return $this->render('GtItBundle:Blog:blogSingle.html.twig', array(
      'advert' => $advert,'comments' => $comment,'tags'=>$tags
    ));
    }





  public function addcommentAction($id)//id du blog
  {


 $repository1 = $this->getDoctrine()
      ->getManager()
      ->getRepository('GtItBundle:Blog')
    ;
 $blog = $repository1->find($id);
   


    $comment= new Comment;
    $comment->setIdblog($id)->setUser('admin');
  
   
   $em = $this->getDoctrine()->getManager();

   $form = $this->createForm(new CommentType(), $comment);
  if ($this->get('request')->getMethod() == 'POST')
        {
            $form->handleRequest($this->getRequest());
            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                  $blog->setComment($comment);
                $em->persist($blog);
                $em->flush();
                
                return $this->redirect($this->generateUrl('gt_it_blog'));
        }}
     


    return $this->render('GtItBundle:Blog:blog.html.twig', array(
      'form' => $form->createView(),
    ));
  }









    
  }




















