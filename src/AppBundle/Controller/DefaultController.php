<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use WallPosterBundle\Post\Post;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        #$twitter = $this->get('endroid.twitter');
        #$test = $twitter->query('statuses/update', 'POST', 'json', array('status' => "Hello World"));
        #dump($test);

        $post = new Post();

        $post->setMessage("Hallo Welt 2");

        $provider = $this->get('wall_poster.facebook');

        try
        {
            $post = $provider->publish($post);

            dump($post);
        }
        catch(Exception $ex)
        {
            //Handle errors
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }
}
