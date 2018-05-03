<?php

namespace PaymentService\ServiceProvider\Log;


use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\Request\Request;
use PaymentService\ServiceProvider\RequestType\RequestType;
use PaymentService\ServiceProvider\Response\ServiceProviderResponse;



/**
 * Class ServiceProviderLogger
 *
 * @package PaymentService\ServiceProvider\Log
 */
class ServiceProviderLogger
{


	static $lastRequestId;

	/**
	 * @param ServiceProvider $provider
	 * @param Request $request
	 * @param RequestType $requestType
	 * @param  $params
	 */
	public static function logRequest(ServiceProvider $provider, Request $request, RequestType $requestType, $params, $clientRequestToken)
    {
       //@todo: save full log request based on settings by stripping out sensitive data
    }

	/**
	 * @param ServiceProvider $provider
	 * @param ServiceProviderResponse $response
	 * @param RequestType $requestType
	 * @param  $params
	 */
	public static function logResponse(ServiceProvider $provider, ServiceProviderResponse $response, RequestType $requestType,  $params, $clientRequestToken)
    {
        //@todo: save full log response based on settings by stripping out sensitive data
    }

}
