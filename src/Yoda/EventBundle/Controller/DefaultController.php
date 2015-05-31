<?php

namespace Yoda\EventBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
  /* 1-4  public function indexAction($firstName, $count)
    {
    	$data = array(
    		'count' =>$count,
    		'firstName' => $firstName,
    		'actbar' => 'haha');
    	$json = json_encode($data);
    	//return new Response($json);

    	//Or
    	$response = new Response($json);
    	$response->headers->set('Content-Type','application/json');
    	return $response;


    	//var_dump($firstName, $count);die;
        //return $this->render('YodaEventBundle:Default:index.html.twig', array('name' => $firstName));
    }*/

    /* RAW METHOD

    public function indexAction($firstName, $count)
    {
    	$templating = $this->container->get('templating');
    	//$content = 
    	return $templating->renderResponse(
    		'EventBundle:Default:index.html.twig',
    		array('name' => $firstName)
    		);
    	//return new Response($content);
    }*/


public function indexAction($count, $firstName)
{

	$em = $this ->getDoctrine()->getManager();
	$repo = $em->getRepository('YodaEventBundle:Event');
	$event = $repo->findOneBy(array(
		'name' => 'Party!'))
    return $this->render(
        'YodaEventBundle:Default:index.html.twig',
        array('name' => $firstName, 'count' => $count, 'event' => $event)
    );
}
}
