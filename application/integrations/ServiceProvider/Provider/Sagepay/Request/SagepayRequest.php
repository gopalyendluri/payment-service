<?php

namespace PaymentService\ServiceProvider\Provider\Sagepay\Request;

use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Request\RESTRequest;

/**
 * Class SagepayRequest
 *
 * @package PaymentService\ServiceProvider\Provider\Sagepay\Request
 */
abstract class SagepayRequest extends RESTRequest
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
		$this->provider = new ServiceProvider(ServiceProvider::Sagepay);
		$this->config   = $this->provider->getConfig('request'); //@todo: get string from constant

		$this->prepare();
    }


    /**
     * Prepares a single request
     */
    abstract protected function prepare();
}
