<?php

namespace PaymentService\ServiceProvider\Provider\Stripe\Response;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Stripe\Response\StripeResponse;



/**
 * Class FindPaymentTransactions
 *
 * @package PaymentService\ServiceProvider\Provider\Stripe\Response
 */
class FindPaymentTransactions extends StripeResponse
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

       //@todo: parse and format the response of find payment transactions and send it back to API
        $response = $this->getJSONResponse();
        $this->setResponse($response);
    }


}
