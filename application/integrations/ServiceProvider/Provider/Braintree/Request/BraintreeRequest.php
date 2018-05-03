<?php

namespace PaymentService\ServiceProvider\Provider\Braintree\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Request\RESTRequest;

/**
 * Class BraintreeRequest
 *
 * @package PaymentService\ServiceProvider\Provider\Braintree\Request
 */
abstract class BraintreeRequest extends RESTRequest
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
		$this->provider = new ServiceProvider(ServiceProvider::BRIANTREE);
		$this->config   = $this->provider->getConfig('request'); //@todo: get string from constant

		$this->prepare();
    }


    /**
     * Prepares a single request
     */
    abstract protected function prepare();
}
