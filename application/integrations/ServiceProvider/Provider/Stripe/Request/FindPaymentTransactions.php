<?php

namespace PaymentService\ServiceProvider\Provider\Stripe\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Stripe\Request\StripeRequest;

/**
 * Class FindPaymentTransactions
 *
 * @package PaymentService\ServiceProvider\Stripe\Request
 */

class FindPaymentTransactions extends StripeRequest
{

	/**
	 * Request end point
	 *
	 * @var string
	 */
	protected $requestEndPoint = ''; //@todo: need to update with actual endpoint


	/**
	 * Prepares a request from input params
	 */
	public function prepare()
	{

     //@todo: prepare request params based on provider

	}


}