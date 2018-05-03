<?php

namespace PaymentService\ServiceProvider\Provider\Braintree\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Braintree\Request\BraintreeRequest;

/**
 * Class CreatePaymentMethod
 *
 * @package PaymentService\ServiceProvider\Braintree\Request
 */

class CreatePaymentMethod extends BraintreeRequest
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