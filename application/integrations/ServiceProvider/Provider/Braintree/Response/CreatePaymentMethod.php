<?php

namespace PaymentService\ServiceProvider\Provider\Braintree\Response;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Stripe\Response\StripeResponse;



/**
 * Class CreatePaymentMethod
 *
 * @package PaymentService\ServiceProvider\Provider\Braintree\Response
 */
class CreatePaymentMethod extends BraintreeResponse
{
    public function __construct($responseData, $inputParams = null)
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
