<?php

namespace Air\BookishBundle\Lib;

use Air\BookishBundle\Entity\Book;
use Air\BookishBundle\Entity\BestsellerList;

/**
 * Maps the response extracted from the API onto the entities
 *
 * @package Air\BookishBundle\Lib
 */
class ApiResponseMapper
{
    private $formFactory;
    private $bestSellerListFormType;
    private $bookFormType;

    public function __construct($formFactory, $bestSellerListFormType, $bookFormType)
    {
        $this->formFactory = $formFactory;
        $this->bestSellerListFormType = $bestSellerListFormType;
        $this->bookFormType = $bookFormType;
    }

    public function mapResponse($response)
    {
        $response = $this->convertKeysToCamelCase($response);

        $bestellerLists = $this->extractLists($response);

        $i = 0;
        $x = 0;
        foreach ($bestellerLists[0] as $bestsellerList) {
            $lists[$i] = new BestsellerList();
            $lists[$i]->setListId($bestsellerList['listId']);
            $lists[$i]->setListName($bestsellerList['listName']);
            $lists[$i]->setDisplayName($bestsellerList['displayName']);
            $lists[$i]->setUpdated($bestsellerList['updated']);
            $lists[$i]->setListImage($bestsellerList['listImage']);
            foreach ($bestsellerList['books'] as $book) {
                $books[$x] = new Book();
                $bookForm = $this->formFactory->create($this->bookFormType);
                $bookForm->setData($books[$x]);
                $bookForm->submit($book);
                $lists[$i]->addBook($books[$x]);
                $x = $x + 1;
            }
            $i = $i+ 1;
        }

        return $lists;

    }

    /**
     * @param $responseArray array Api response
     * @return array $books array Bestseller lists extracted from the response
     */
    private function extractBooks($responseArray)
    {
        return $bestsellerLists = array_column($responseArray, 'lists');
    }

    /**
     * @param $responseArray array Api response
     * @return array $bestsellerLists array Bestseller lists extracted from the response
     */
    private function extractLists($responseArray)
    {
        return $bestsellerLists = array_column($responseArray, 'lists');
    }

    /**
     * Convert underscore_case array keys to camelCase
     *
     * @param $apiResponseArray array Api response data in the form of an array
     * @return array
     */
    private function convertKeysToCamelCase($apiResponseArray = array())
    {
        $arr = [];
        foreach ($apiResponseArray as $key => $value) {
            if (preg_match('/_/', $key)) {
                $key = preg_replace_callback('/_([^_]*)/', function($matches) {
                    return ucfirst($matches[1]);
                }, $key);
            }

            if (is_array($value))
                $value = $this->convertKeysToCamelCase($value);

            $arr[$key] = $value;
        }
        return $arr;
    }
}