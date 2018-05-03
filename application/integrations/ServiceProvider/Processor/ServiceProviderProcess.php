<?php
namespace PaymentService\ServiceProvider\Processor;

use PaymentService\ServiceProvider\Exception\ServiceProviderInvalidInputException;
use PaymentService\ServiceProvider\Processor;
use PaymentService\ServiceProvider\Connector\Connector;
use PaymentService\ServiceProvider\Connector\ConnectorFactory;
use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\RequestType\RequestType;
use PaymentService\ServiceProvider\Response\ServiceProviderResponse;


class ServiceProviderProcess extends Process implements ServiceTypeInterface
{
    const EXCEPTION_ERROR_CODE = 'UNCAUGHT_ERROR';

    protected
        $provider,
        $requestType,
        $params,
        $serviceProviderConnector;

    /**
     * Class constructor
     * @param ServiceProvider $provider
     * @param RequestType $requestType
     * @throws \PaymentService\ServiceProvider\Exception\ServiceProviderInvalidInputException
     */
    public function __construct(ServiceProvider $provider, RequestType $requestType, $params)
    {
        $this->serviceProviderConnector = $connector = ConnectorFactory::create(
            $this->provider = $provider,
            $this->requestType = $requestType,
            $this->params = $params
        );

    }

    /**
     * @return ServiceProvider
     */
    public function getProvider() {
        return $this->provider;
    }

    /**
     * @return ServiceType
     */
    public function getServiceType() {
        return $this->serviceType;
    }

    /**
     * @return RequestType
     */
    public function getRequestType() {
        return $this->requestType;
    }

    /**
     * @return ServiceTypeParams
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * @return Connector
     */
    public function getConnector() {
        return $this->serviceProviderConnector;
    }

    /**
     * @return ServiceProviderResponse
     */
    public function execute() {
        try {
			$client_request_token = $this->getGUID(); //unique ID for each request to trace and save request and response
            $response = $this->serviceProviderConnector->process($client_request_token);
           // $responseData = $response->getResponse();

        }
        catch (\Exception $e) {

            return (new ServiceProviderResponse)->addError(get_class($e), self::EXCEPTION_ERROR_CODE);
        }

        return $response;
    }

    private function getGUID(){

            mt_srand((double)microtime()*10000);
            $charid = strtoupper(md5(uniqid(rand(), true)));
            $hyphen = chr(45);// "-"
            $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
            return $uuid;
    }
}
