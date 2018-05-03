<?php

namespace PaymentService\ServiceProvider\RequestType;

use PaymentService\ServiceProvider\Exception\ServiceProviderException;

/**
 * Class RequestType
 *
 * @package PaymentService\ServiceProvider\RequestType
 */
class RequestType
{

    /**
     * Stores a Request Type name
     *
     * @var string
     */
    protected $name;

    /**
     * Request Types constants
     */
    const
        PAYMENT_METHOD_CREATE       = 'createPaymentMethod',
        PAYMENT_METHOD_UPDATE       = 'updatePaymentMethod',
        PAYMENT_METHOD_DELETE       = 'deletePaymentMethod',
        PAYMENT_METHOD_REAUTHORISE  = 'reauthorisePaymentMethod',
        PAYMENT_METHOD_LIST         = 'findPaymentMethods',
        TRANSACTION_CREATE          = 'saleTransaction',
        TRANSACTION_REFUND          = 'refundTransaction',
        TRANSACTION_LIST            = 'findTransactions'
    ;

    /**
     * Request Types list
     *
     * @var array
     */
    protected static $TYPES = [
        self::PAYMENT_METHOD_CREATE       => 1,
        self::PAYMENT_METHOD_UPDATE       => 2,
        self::PAYMENT_METHOD_DELETE       => 3,
        self::PAYMENT_METHOD_REAUTHORISE  => 4,
        self::PAYMENT_METHOD_LIST         => 5,
        self::TRANSACTION_CREATE          => 6,
        self::TRANSACTION_REFUND          => 7,
        self::TRANSACTION_LIST            => 8
    ];

    /**
     * Class constructor
     *
     * @param string $name
     */
    public function __construct($name)
    {
        if (!isset(static::$TYPES[$name])) {
            throw new ServiceProviderException("Invalid or no Request Type found: $name");
        }

        $this->name = $name;
    }

    /**
     * Returns a Request Type name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns a Request Type id
     *
     * @return int
     */
    public function getId()
    {
        return self::$TYPES[$this->name];
    }

    /**
     * Returns a Request Types list
     *
     * @return array
     */
    public static function getTypes()
    {
        return static::$TYPES;
    }

    public function __toString()
    {
        return "{$this->getName()}";
    }

}
