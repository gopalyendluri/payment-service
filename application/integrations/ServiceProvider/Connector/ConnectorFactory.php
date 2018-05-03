<?php

namespace PaymentService\ServiceProvider\Connector;

use PaymentService\ServiceProvider\Exception\ServiceProviderException;
use PaymentService\ServiceProvider\Connector\Connector;
use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\RequestType\RequestType;


/**
 * Class ConnectorFactory
 *
 * @package PaymentService\ServiceProvider\Connector
 */
class ConnectorFactory
{

    /**
     * Stores a class file path
     *
     * @var string
     */
    private static $classFile;


    /**
     * Creates a specific Service Provider Service Connector object
     *
     * @param ServiceProvider $serviceProvider
     * @param RequestType $requestType
     * @param $params
     * @return Connector
     * @throws \PaymentService\ServiceProvider\Exception\ServiceProviderException
     */
    public static function create(ServiceProvider $serviceProvider, RequestType $requestType, $params)
    {
        $obj = self::createConnector($serviceProvider, $requestType, $params);

        null === $obj && $obj = self::createConnector($serviceProvider, $requestType, $params);

        if (is_null($obj) || !$obj instanceof ConnectorInterface) {
            throw new ServiceProviderException('Class file not found: ' . self::$classFile, 100);
        }

        return $obj;
    }

    /**
     * Creates a Service Provider Connector object
     *
     * @param ServiceProvider $provider
     * @param RequestType $requestType
     * @param  $params
     * @param string $type
     * @return Connector
     * @throws \PaymentService\ServiceProvider\Exception\ServiceProviderException
     */
    private static function createConnector(ServiceProvider $provider, RequestType $requestType,  $params)
    {
        // build a class name and namespace
        $class = sprintf("PaymentService\\ServiceProvider\\Provider\\%s\\Connector\\%sConnector",
            ucfirst($provider->getName()),
            ucfirst($provider->getName())
        );

        /*
        @todo: Check if requested provider and connector exists

        // return if a class file doesn't exist
        if (!file_exists(self::$classFile))
            return null;

        */


        return new $class($provider, $requestType, $params);
    }

}
