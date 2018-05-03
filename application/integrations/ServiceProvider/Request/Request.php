<?php

namespace PaymentService\ServiceProvider\Request;


/**
 * Class Request
 *
 * @package PaymentService\ServiceProvider\Request
 */
abstract class Request
{

    /**
     * Stores params
     *
     * @var array
     */
    protected $inputParams;

    /**
     * Stores a request name
     *
     * @var string
     */
    protected $name;


    /**
     * Class constructor
     *
     * @param $inputParams
     */
    public function __construct($inputParams)
    {
        $this->inputParams = $inputParams;

        $this->init();
    }

    /**
     * Returns input params
     *
     * @return array
     */
    public function getInputParams()
    {
        return $this->inputParams;
    }

    /**
     * Returns a request name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets a request name
     *
     * @param string $name
     */
    public function setName($name)
    {
        return $this->name = $name;
    }

    /**
     * Sets an input param key, value.
     *
     * @param string $key
     * @param mixed $value
     */
    public function setInputParam($key, $value)
    {
        $this->inputParams[$key] = $value;
    }

    /**
     * Initialize method
     *
     * @return mixed
     */
    public function init() {}
}
