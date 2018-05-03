<?php

namespace PaymentService\ServiceProvider\Provider\Sagepay\Response;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Sagepay\Response\SagepayResponse;



/**
 * Class CreatePaymentMethod
 *
 * @package PaymentService\ServiceProvider\Provider\Sagepay\Response
 */
class CreatePaymentMethod extends SagepayResponse
{
    public function __construct($responseData, $inputParams = null, $rootNode = 'response')
    {
        parent::__construct($responseData, $inputParams);

    }

    public function processErrors() {

        return parent::processErrors();
    }

    /**
     * @return array|mixed
     */
    public function parse()
    {

       //@todo: parse and format the response of create payment method and send it back to API
        $response = $this->getJSONResponse();
        $this->setResponse($response);
    }


}
