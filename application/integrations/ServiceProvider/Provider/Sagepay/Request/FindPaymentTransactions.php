<?php

namespace PaymentService\ServiceProvider\Provider\Sagepay\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Provider\Sagepay\Request\SagepayRequest;

/**
 * Class FindPaymentTransactions
 *
 * @package PaymentService\ServiceProvider\Sagepay\Request
 */

class FindPaymentTransactions extends SagepayRequest
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