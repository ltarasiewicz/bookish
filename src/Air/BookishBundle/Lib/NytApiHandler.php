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
        return $this->convertKeysToCamelCase($responseArray);

    }

    private function convertKeysToCamelCase($apiResponseArray)
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