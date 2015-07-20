<?php
namespace Air\BookishBundle\Lib;

/**
 * Extracts responses from the API
 *
 * Class NytApiHandler
 * @package Air\BookishBundle\Lib
 */
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
        $request = $this->guzzleClient->get('/svc/books/v2/lists/overview.json');
        $query = $request->getQuery();

        // Build query string
        $query->add('published_date', $date)
                ->add('api-key', $this->getNytApiKey());

        $response = $request->send();

        // Convert json to array
        $responseArray  = $response->json();

        return $responseArray;

    }

}