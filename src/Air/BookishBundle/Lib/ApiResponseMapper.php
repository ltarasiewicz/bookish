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
    private $bestSellerListForm;
    private $bookForm;

    public function __construct($bestSellerListForm, $bookForm)
    {
        $this->bestSellerListForm = $bestSellerListForm;
        $this->bookForm = $bookForm;
    }

    public function mapResponse($response)
    {
        $response = $this->convertKeysToCamelCase($response);

        $bestellerLists = $this->extractLists($response);

        $i = 0;
        $x = 0;
        foreach ($bestellerLists[0] as $bestsellerList) {
            $List[$i] = new BestsellerList();
            foreach ($bestsellerList['books'] as $book) {
                $Book[$x] = new Book();
                $bookForm = clone($this->bookForm);
                $bookForm->setData($Book[$x]);
                $bookForm->submit($book);
                $List[$i]->addBook($Book[$x]);
                //unset($Book);
                unset($bookForm);
                $x = $x + 1;
            }
            $i = $i+ 1;
        }

        return true;

//        $Book = new Book();
//        $form = $this->bookForm;
//        $form->setData($Book);
//        $form->submit($response['results']['lists'][0]['books'][0]);
//        return $Book;

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