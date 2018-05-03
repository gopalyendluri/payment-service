<?php

namespace PaymentService\ServiceProvider\Provider\Stripe\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Stripe\Request\StripeRequest;

/**
 * Class FindPaymentMethods
 *
 * @package PaymentService\ServiceProvider\Stripe\Request
 */

class FindPaymentMethods extends StripeRequest
{

	/**
	 * Request end point
	 *
	 * @var string
	 */
	protected $requestEndPoint = '';


	/**
	 * Prepares a request from input params
	 */
	public function prepare()
	{

     //@todo: prepare request params based on provider

	}


}