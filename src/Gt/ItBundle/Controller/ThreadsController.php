<?php

namespace Gt\ItBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Gt\ItBundle\Entity\Threads;
use Gt\ItBundle\Form\ThreadsType;

/**
 * Threads controller.
 *
 */
class ThreadsController extends Controller
{

    /**
     * Lists all Threads entities.
     *
     */
    public function indexAction($comment_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('GtItBundle:Threads')->findBy(array('thread'=>$comment_id));

        return $this->render('GtItBundle:Threads:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Threads entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Threads();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('admin_threads_show', array('id' => $entity->getId())));
        }

        return $this->render('GtItBundle:Threads:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Threads entity.
     *
     * @param Threads $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Threads $entity)
    {
        $form = $this->createForm(new ThreadsType(), $entity, array(
            'action' => $this->generateUrl('admin_threads_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Threads entity.
     *
     */
    public function newAction()
    {
        $entity = new Threads();
        $form   = $this->createCreateForm($entity);

        return $this->render('GtItBundle:Threads:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Threads entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GtItBundle:Threads')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Threads entity.');
        }

        $deleteForm = $this->createDeleteForm( $entity);

        return $this->render('GtItBundle:Threads:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Threads entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GtItBundle:Threads')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Threads entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($entity);

        return $this->render('GtItBundle:Threads:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Threads entity.
    *
    * @param Threads $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Threads $entity)
    {
        $form = $this->createForm(new ThreadsType(), $entity, array(
            'action' => $this->generateUrl('admin_threads_update', array('id' => $entity->getId(),'comment_id' => $entity->getThread())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Threads entity.
     *
     */
    public function updateAction(Request $request, $id,$comment_id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('GtItBundle:Threads')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Threads entity.');
        }

        $deleteForm = $this->createDeleteForm($entity);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('admin_threads_edit', array('id' => $id,'comment_id'=>$comment_id)));
        }

        return $this->render('GtItBundle:Threads:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),'comment_id'=>$comment_id,
        ));
    }
    /**
     * Deletes a Threads entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('GtItBundle:Threads')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Threads entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('admin_threads'));
    }

    /**
     * Creates a form to delete a Threads entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Threads $entity)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_threads_delete', array('id' => $entity->getId(),'comment_id' => $entity->getThread())))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
