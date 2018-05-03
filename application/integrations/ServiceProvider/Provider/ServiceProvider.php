<?php
namespace PaymentService\ServiceProvider\Provider;

use PaymentService\ServiceProvider\Exception\ServiceProviderException;


/**
 * Class ServiceProvider
 *
 * @package PaymentService\ServiceProvider\Provider
 */
class ServiceProvider
{
    /**
     * Service Provider config
     *
     * @var array
     */
    private $config = null;

    /**
     * Stores a Service Provider name
     *
     * @var string
     */
    protected $name;

    /**
     * Service Providers names constants
     */
    const STRIPE = 'stripe';
    const BRIANTREE = 'braintree';
    const SAGEPAY = 'sagepay';


    /**
     * Service Providers list
     *
     * @var array
     */
    public static $PROVIDERS = array(
        self::STRIPE       => 1,
        self::BRIANTREE    => 2,
        self::SAGEPAY      => 3
    );

    public static function createFromId($id)
    {
        return new static(array_search($id, static::$PROVIDERS));
    }

    /**
     * Class constructor
     *
     * @param string $name
     */
    public function __construct($name)
    {
        if (!isset(static::$PROVIDERS[$name])) {
            throw new ServiceProviderException("Invalid or no Service Provider found: $name");
        }

        //@todo: replace this block by reading from config based on environment
        $config = array(
            'braintree' => array(
                'connector' => array(
                    'url' => 'https://api.braintreegateway.com',
                ),
                'request' => array(
                    'apikey' => 'sdsagdjksfgdskjfgsdkjfgsdakjfgasd', //@tooo: replace this with environment variable,  never save keys in source code
                    'clientid' => '12345678',
                    'publickey' => 'asdasdasd',
                    'privatekey' => 'asdasdasd',
                ),
            ),
            'stripe' => array(
                'connector' => array(
                    'url' => 'https://api.stripe.com',
                ),
                'request' => array(
                    'apikey' => 'sdsagdjksfgdskjfgsdkjfgsdakjfgasd', //@tooo: replace this with environment variable,  never save keys in source code
                    'clientid' => '12345678',
                ),
            ),
            'sagepay' => array(
                'connector' => array(
                    'url' => 'https://api.sagepay.com',
                ),
                'request' => array(
                    'apikey' => 'sdsagdjksfgdskjfgsdkjfgsdakjfgasd', //@tooo: replace this with environment variable,  never save keys in source code
                    'clientid' => '12345678',
                    'publickey' => 'asdasdasd',
                    'privatekey' => 'asdasdasd',
                ),
            ),
        );

        $this->config = null;
        if(isset($config[strtolower($name)])){
            $this->config = $config[strtolower($name)];
        }

        $this->name = $name;
    }

    /**
     * Returns a Service Provider config
     *
     * @return string
     */
    public function getConfig($key = null)
    {
        return !empty($key) && isset($this->config[$key]) ? $this->config[$key] : $this->config;
    }


    /**
     * Returns a Service Provider name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns a Service Provider id
     *
     * @return int
     */
    public function getId()
    {
        return self::$PROVIDERS[$this->name];
    }

    /**
     * Returns a Service Providers list
     *
     * @return array
     */
    public static function getProviders()
    {
        return static::$PROVIDERS;
    }

    public function __toString()
    {
        return "{$this->getName()}";
    }



    /**
     * Returns a provider name by id
     *
     * @param string $id
     * @return string
     */
    public static function getProviderById($id)
    {
        $serviceProviders = array_flip(ServiceProvider::getProviders());
        $provider = isset($serviceProviders[$id])?$serviceProviders[$id]:null;

        return $provider;
    }



}
