<?php

namespace PaymentService\ServiceProvider\Provider\Braintree\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Braintree\Request\BraintreeRequest;

/**
 * Class FindPaymentMethods
 *
 * @package PaymentService\ServiceProvider\Braintree\Request
 */

class FindPaymentMethods extends BraintreeRequest
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