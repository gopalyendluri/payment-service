<?php

namespace PaymentService\ServiceProvider\Provider\Sagepay\Connector;

use PaymentService\ServiceProvider\Connector\RESTConnector;
use PaymentService\ServiceProvider\Provider\Sagepay\Request;
use PaymentService\ServiceProvider\Provider\Sagepay\Response;



/**
 * Class SagepayConnector
 *
 * @package PaymentService\ServiceProvider\Provider\Sagepay\Connector
 */
class SagepayConnector extends RESTConnector
{

    /**
     * Provides a createPaymentMethod
     *
     * @return Response\CreatePaymentMethod
     */
    public function createPaymentMethod($paymentMethodParams)
    {
        $request = new Request\CreatePaymentMethod($paymentMethodParams);
		$response = $this->send($request);

		return new Response\CreatePaymentMethod($response, $request->getInputParams());
    }


    /**
     * Provides a updatePaymentMethod
     *
     * @return Response\updatePaymentMethod
     */
    public function updatePaymentMethod($paymentMethodParams)
    {
        $request = new Request\updatePaymentMethod($paymentMethodParams);
        $response = $this->send($request);

        return new Response\updatePaymentMethod($response, $request->getInputParams());
    }


    /**
     * Provides a findPaymentMethod
     *
     * @return Response\FindPaymentMethods
     */
    public function findPaymentMethod($paymentMethodParams)
    {
        $request = new Request\FindPaymentMethods($paymentMethodParams);
        $response = $this->send($request);

        return new Response\FindPaymentMethods($response, $request->getInputParams());
    }


    /**
     * Provides a CreatePaymentTransaction
     *
     * @return Response\CreatePaymentTransaction
     */
    public function CreatePaymentTransaction($paymentParams)
    {
        $request = new Request\CreatePaymentTransaction($paymentParams);
        $response = $this->send($request);

        return new Response\CreatePaymentTransaction($response, $request->getInputParams());
    }


    /**
     * Provides a updatePaymentMethod
     *
     * @return Response\RefundPaymentTransaction
     */
    public function refundPaymentTransaction($paymentParams)
    {
        $request = new Request\RefundPaymentTransaction($paymentParams);
        $response = $this->send($request);

        return new Response\RefundPaymentTransaction($response, $request->getInputParams());
    }


    /**
     * Provides a PaymentMethodTransactions
     *
     * @return Response\FindPaymentTransactions
     */
    public function findPaymentTransactions($paymentParams)
    {
        $request = new Request\FindPaymentTransactions($paymentParams);
        $response = $this->send($request);

        return new Response\FindPaymentTransactions($response, $request->getInputParams());
    }

}
