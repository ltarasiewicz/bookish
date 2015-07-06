<?php

namespace Air\BookishBundle\Lib;


class ApiResponseMapper
{
    private $bestSellerListForm;

    public function mapResponse($response)
    {
        $form = $this->bestSellerListForm;
        $form->submit($response);
    }

    public function __construct($bestSellerListForm)
    {
        $this->bestSellerListForm = $bestSellerListForm;
    }
}