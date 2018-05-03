<?php
namespace PaymentService\ServiceProvider\Connector;


use PaymentService\ServiceProvider\Log\ServiceProviderLogger;
use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Request\Request;
use PaymentService\ServiceProvider\RequestType\RequestType;
use PaymentService\ServiceProvider\Response\ServiceProviderResponse;

/**
 * Class Connector
 *
 * @package PaymentService\ServiceProvider\Connector
 */
abstract class Connector implements ConnectorInterface
{

    /**
     * Stores a connector config
     *
     * @var array
     */
    protected $config;

    /**
     * Stores a Service Provider
     *
     * @var ServiceProvider
     */
    protected $provider;

    /**
     * Stores a Client Request Token
     *
     * @var $clientRequestToken
     */
    private $clientRequestToken;

    /**
     * Stores a Request Type, ie. search
     *
     * @var RequestType
     */
    private $requestType;

    /** Stores array of params
     *
     * @var $params
     */
    private $params;



	/**
     * Class constructor
     *
     * @param array $config
     */
    public function __construct(ServiceProvider $provider, RequestType $requestType,  $params)
    {
        $this->provider    = $provider;
        $this->requestType = $requestType;
        $this->params      = $params;
        $this->config      = $provider->getConfig('connector');
    }


    /**
     * Returns a Request Type
     *
     * @return RequestType
     */
    public function getRequestType()
    {
        return $this->requestType;
    }

    /**
     * Returns a  Client Request Token
     *
     * @return string
     */
    public function getClientRequestToken()
    {
        return $this->clientRequestToken;
    }

    /**
     * Processes a call to Service Provider
     *
     * @param  $params
     * @return \PaymentService\ServiceProvider\Response\ServiceProviderResponse
     */
    public function process($client_request_token = null)
    {
		$this->clientRequestToken = $client_request_token;

        // get and parse a response
        /** @var $response ServiceProviderResponse */
        $response = $this->{"$this->requestType"}($this->params);

        $response->parse();

        // log a response
        ServiceProviderLogger::logResponse($this->provider, $response, $this->requestType, $this->params, $this->clientRequestToken);

        return $response;
    }

    /**
     * Sends a request and returns the response
     * Logs provider RQ, RS
     *
     * @param  Request  $request
     * @return ServiceProviderResponse $response
     */
    protected function send(Request $request)
    {
        // log a request
        ServiceProviderLogger::logRequest($this->provider, $request, $this->requestType, $this->params, $this->clientRequestToken);

        // execute a request and returns a response
        return $this->execute($request);
    }

    /**
     * Executes a request
     *
     * @param Request $request
     * @return mixed
     */
    abstract protected function execute(Request $request);
}
