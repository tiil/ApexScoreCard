<?php

namespace Apex\ApexScoreCardBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Apex\ApexScoreCardBundle\Entity\Round;
use Apex\ApexScoreCardBundle\Form\RoundType;
use Apex\ApexScoreCardBundle\Entity\roundGolfer;
use Symfony\Component\HttpFoundation\Response;

/**
 * Round controller.
 *
 * @Route("/round")
 */
class RoundController extends BaseController
{
    /**
     * Lists all Round entities.
     *
     * @Route("/", name="round")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ApexScoreBundle:Round')->findAll();

        return array(
            'entities' => $entities,
        );
    }

    /**
     * Creates a new Round entity.
     *
     * @Route("/", name="round_create")
     * @Method("POST")
     * @Template("ApexScoreBundle:Round:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Round();
        $em = $this->getDoctrine()->getManager();
        //	$courseId = $request->get('course_Id');
//     	$courses = $em->getRepository('ApexScoreBundle:Course')->findAll();
        
        
        $form = $this->createForm(new RoundType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
        
 
        
            $em = $this->getDoctrine()->getManager();
            
         //   $course = $em->getRepository('ApexScoreBundle:Course')->find($courseId);
//			$entity->setCourse($course);            
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('round_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Round entity.
     *
     * @Route("/new", name="round_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Round();
       	
       	$em = $this->getDoctrine()->getManager();
       	
       	$courses = $em->getRepository('ApexScoreBundle:Course')->findAll();
       	
        $form   = $this->createForm(new RoundType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'course' => $courses,
        );
    }

    /**
     * Finds and displays a Round entity.
     *
     * @Route("/{id}", name="round_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApexScoreBundle:Round')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Round entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Round entity.
     *
     * @Route("/{id}/edit", name="round_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApexScoreBundle:Round')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Round entity.');
        }

        $editForm = $this->createForm(new RoundType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Round entity.
     *
     * @Route("/{id}", name="round_update")
     * @Method("PUT")
     * @Template("ApexScoreBundle:Round:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ApexScoreBundle:Round')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Round entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new RoundType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('round_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Round entity.
     *
     * @Route("/{id}", name="round_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ApexScoreBundle:Round')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Round entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('round'));
    }

    /**
     * Creates a form to delete a Round entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
    
   
    public function createNewRoundAction()
    {
    	$json = $this->getRequestJson();
    	$course_id = $json->data->course_id;
//    	$date = date('Y-m-d H:i:s');
    	
//    	error_log($course_id);
    	  
    	$datet = new \DateTime;
    	
    	$em = $this->getDoctrine()->getManager();
    	$entity = new Round();

	  	$course = $em->getRepository('ApexScoreBundle:Course')->find($course_id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Course entity.');
		}
    	
    	$entity->setCourse($course);
    	$entity->setStartTime($datet);
    	
    	$em->persist($entity);
    	$em->flush();
    	
    	$round_id = $entity->getId();

//    	$start_time = date('YYYY-MM-DD HH:mm:ss Z', time());

//		$start_time = $datet
    	
    	return new Response(json_encode(array('round_id' => $round_id, 'round_start_time' => $datet)));
    }
    
    public function endRoundAction()
    {
    	$json = $this->getRequestJson();
    	$round_id = $json->data->round_id;
    	$end_time = $json->data->end_time;
    	
    	$dated = new \DateTime($end_time);
    	
    	
    	$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('ApexScoreBundle:Round')->find($round_id);
		
		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Round entity.');
        }
		
		$entity->setEndTime($dated);
		
		$em->persist($entity);
		$em->flush();
		
		return new Response(json_encode(array('message' => 'OK')));
    }
    
    public function getRoundListAction()
    {
   		$user_id = $this->get('security.context')->getToken()->getUser()->getId();
       	$em = $this->getDoctrine()->getManager();
    	
		$g_rounds = $em->getRepository('ApexScoreBundle:roundGolfer')->findBy(array('golferId' => $user_id), array('id' => 'DESC'));

	   if (!$g_rounds) {
//               throw $this->createNotFoundException('Unable to find roundGolfer entity.');
			return new Response(json_encode(array('message' => 'fail')));
        }

		$rounds = array();
		$scores = array();

		
		foreach ($g_rounds as $g) {
			$round = $g->getRoundId();
			$rounds[] = $g->getRoundId();
			
			// laskee scoren kierrokselle
			
			$score = 0;
			$g_scores = $em->getRepository('ApexScoreBundle:roundScore')->findByRoundId($round);
			if (!$g_scores) {
				$score = 0;
				}
			else {
				foreach ($g_scores as $s) {
					$score += $s->getScore();
				}
			}
			$scores[] = $score;
		}
		
		$f_rounds = $em->getRepository('ApexScoreBundle:Round')->findById($rounds, array('id' => 'DESC')); 

		foreach ($f_rounds as $f) {
			$roundses[] = $f->getJson();
			$courses[] = $f->getCourse()->getJson();
			$pars[] = $f->getCourse()->getCoursePar();
		}

		return new Response(json_encode(array('rounds' => $roundses, 'courses' => $courses, 'scores' => $scores, 'pars' => $pars)));	
    }
    
    public function getRoundAction()
    {
    	$json = $this->getRequestJson();
    	$round_id = $json->data->round_id;

        error_log($round_id);
    	
		$em = $this->getDoctrine()->getManager();
    	$entity = $em->getRepository('ApexScoreBundle:Round')->find($round_id);
    	
        if (!$entity) {
			throw $this->createNotFoundException('Unable to find Round entity.');
		}
    	
    	$round = $entity->getJson();

        $rg = $em->getRepository('ApexScoreBundle:roundGolfer')->findByRoundId($round_id);

        if (!$rg) {
            throw $this->createNotFoundException('Unable to find roundGolfer entity.');
        }

        //$roundGolfer = $em->getRepository('ApexScireBundle:roundGolfer')->find($rg[0]->getId());

        $golfer_id = $rg[0]->getGolferId();


        //\Doctrine\Common\Util\Debug::dump($roundGolfer);


        //$golfer_id = $roundGolfer->getGolferId();
        $golfer = $em->getRepository('ApexScoreBundle:Golfer')->find($golfer_id)->getJson();
    	
    	//return new Response(json_encode(array('round' => $round, 'golfer' => $golfer->getJson())));


        return new Response(json_encode(array('round' => $round, 'golfer' => $golfer)));
    }

	public function deleteRoundAction()
	{
		$json = $this->getRequestJson();
		$round_id = $json->data->round_id;
		
		$em = $this->getDoctrine()->getManager();
		$entity = $em->getRepository('ApexScoreBundle:Round')->find($round_id);

		if (!$entity) {
			throw $this->createNotFoundException('Unable to find Round entity.');
		}

		$t_scores = $entity->getScore();
		
		foreach ($t_scores as $s) {
			$scores[] = $em->getRepository('ApexScoreBundle:roundScore')->find($s->getId());			
		}

		$r_golfer = $em->getRepository('ApexScoreBundle:roundGolfer')->findByRoundId($round_id);
		
		$round_golfer = $em->getRepository('ApexScoreBundle:roundGolfer')->find($r_golfer[0]->getId());

		foreach ($scores as $s) {
			$em->remove($s);
		}
		
/*		error_log($r_golfer[0]->getId());
		error_log($round_golfer->getId());
		error_log($round_golfer->getRoundId()); */
//		error_log($round_golfer[0]->getGolferId());

		$em->remove($round_golfer);

		$em->remove($entity);
		$em->flush();
		
		return new Response(json_encode(array('message' => 'OK')));
	}
	
	public function getRecentCoursesAction()
	{
	
		$golfer_id = $this->get('security.context')->getToken()->getUser()->getId();
		$em = $this->getDoctrine()->getManager();
		
		$g_rounds = $em->getRepository('ApexScoreBundle:roundGolfer')->findBy(array('golferId' => $golfer_id), array('id' => 'DESC'));
		
		if (!$g_rounds) {
			return new Response(json_encode(array('message' => 'fail')));

		}
		
		$rounds = [];
		foreach ($g_rounds as $g) {
			$rounds[] = $g->getRoundId();
		}

		$f_rounds = $em->getRepository('ApexScoreBundle:Round')->findById($rounds, array('id' => 'DESC')); 
		
		$recent = [];
		$i = 0;
		
		foreach ($f_rounds as $f) {
			if (count($recent) < 3) {
				if ($i > 0) {
					if (!in_array ($f->getCourse()->getJson(), $recent))
					{
						$recent[] = $f->getCourse()->getJson();
					}
				}
				else $recent[] = $f->getCourse()->getJson();
			}
			else break;
			$i++;
		}
	
		return new Response(json_encode(array('courses' => $recent)));
	}
}
