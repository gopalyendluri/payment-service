<?php
namespace PaymentService\ServiceProvider\Processor;

use PaymentService\ServiceProvider\Processor\ProcessInterface;

abstract class Process implements ProcessInterface {
    /** @var Request */
    protected $request;

    public function setRequest($request) {
        $this->request = $request;
    }

    public function getRequest() {
        return $this->request;
    }
}