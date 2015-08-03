<?php

namespace Air\BookishBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Security\Acl\Exception\Exception;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        $bestSellerLists = $this->get('nyt_api_handler')->getBestSellersOverview('2015-07-01');

        try {
            $lists = $this->get('api_response_mapper')->mapResponse($bestSellerLists);
            $em = $this->getDoctrine()->getManager();
            $em->persist($lists[0]);
            $em->flush();
        } catch (\Exception $e) {
            throw new Exception('Mapping went wrong: ' . $e->getMessage());
        }

        return array('lukasz' => 'lukasz');
    }
}
