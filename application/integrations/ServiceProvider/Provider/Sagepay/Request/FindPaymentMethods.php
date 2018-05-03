<?php

namespace PaymentService\ServiceProvider\Provider\Sagepay\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Sagepay\Request\SagepayRequest;

/**
 * Class FindPaymentMethods
 *
 * @package PaymentService\ServiceProvider\Sagepay\Request
 */

class FindPaymentMethods extends SagepayRequest
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