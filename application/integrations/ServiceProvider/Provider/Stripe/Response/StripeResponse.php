<?php

namespace PaymentService\ServiceProvider\Provider\Stripe\Response;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Response\JsonResponse;


/**
 * Class StripeResponse
 *
 * @package PaymentService\ServiceProvider\Provider\Stripe\Response
 */
abstract class StripeResponse extends JsonResponse
{

    const MSG_SERVICE_UNAVAILABLE = 'SERVICE_UNAVAILABLE';


    /**
     * @var array
     */
    protected $inputParams;

    /**
     * Class constructor
     *
     * @param null $jsonData
     * @param array $inputParams
     */
    public function __construct($jsonData, $inputParams = null)
    {

        // set input params
        $this->inputParams = $inputParams;

        // handle an error in case a connection could not be made to the provider
        $this->validateServiceAvailable($jsonData);

        // load the provider response
        parent::__construct($jsonData);

        //@todo: process and format response to generic API response format

        // check for errors in the provider response
        $this->processErrors();
    }

    /**
     * Returns errors from parsed JSON
     *
     * @return array|mixed
     */
    public function processErrors()
    {
       //Todo: add error handling
    }

    private function validateServiceAvailable($jsonData)
    {
        if (false === $jsonData) {
            $this->addError(self::MSG_SERVICE_UNAVAILABLE, ServiceProvider::STRIPE);
            return;
        }

        return true;
    }




}
