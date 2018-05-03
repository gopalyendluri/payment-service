<?php

namespace PaymentService\ServiceProvider\Provider\Braintree\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Braintree\Request\BraintreeRequest;

/**
 * Class UpdatePaymentMethod
 *
 * @package PaymentService\ServiceProvider\Braintree\Request
 */

class UpdatePaymentMethod extends BraintreeRequest
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