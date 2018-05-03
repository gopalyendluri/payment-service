<?php

namespace PaymentService\ServiceProvider\Provider\Stripe\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Request\RESTRequest;

/**
 * Class StripeRequest
 *
 * @package PaymentService\ServiceProvider\Provider\Stripe\Request
 */
abstract class StripeRequest extends RESTRequest
{

	/**
	 * Stores Application Config
	 *
	 * @var $config
	 */
	protected $config;

	/**
	 * @var ServiceProvider
	 */
	protected $provider;

    /**
     * Class init
     */
    public function init()
    {
		$this->provider = new ServiceProvider(ServiceProvider::STRIPE);
		$this->config   = $this->provider->getConfig('request'); //@todo: get string from constant

		$this->prepare();
    }


    /**
     * Prepares a single request
     */
    abstract protected function prepare();
}
