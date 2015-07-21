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
        $bestSellerLists = $this->get('nyt_api_handler')->getBestSellersOverview('2014-01-01');

        try {
            $object = $this->get('api_response_mapper')->mapResponse($bestSellerLists);
        } catch (\Exception $e) {
            throw new Exception('Mapping went wrong: ' . $e->getMessage());
        }

        $o = $object;

        return array('lukasz' => 'lukasz');
    }
}
