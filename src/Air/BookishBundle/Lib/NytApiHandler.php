<?php
namespace Air\BookishBundle\Lib;

class NytApiHandler
{
    private $nytApiKey;
    private $guzzleClient;

    public function __construct($nytApiKey, $guzzleClient)
    {
        $this->nytApiKey = $nytApiKey;
        $this->guzzleClient = $guzzleClient;
    }

    public function getNytApiKey()
    {
        return $this->nytApiKey;
    }

    public function getBestSellersOverview($date = '2014-01-01')
    {
        $request = $this->guzzleClient->get('/svc/books/v2/lists/overview.json?published_date=' . $date . '&api-key=' . $this->getNytApiKey());
        $response = $request->send();
        $responseArray  = $response->json();
        $responseArray  = $this->convertKeysToCamelCase($responseArray);
        var_dump($responseArray);
        return $responseArray;
    }

    private function convertKeysToCamelCase($apiResponseArray)
    {
        array_walk_recursive($apiResponseArray, 'self::convertKeys');
    }

    private static function convertKeys(&$item, &$key)
    {
        if (preg_match('/_/', $key)) {
            echo $key;
            $key = str_replace('_', '',  $key);
            $key = lcfirst($key);
        }
    }

}