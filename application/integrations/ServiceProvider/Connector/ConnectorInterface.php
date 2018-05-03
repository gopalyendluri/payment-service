<?php
namespace PaymentService\ServiceProvider\Connector;

interface ConnectorInterface {
    public function process();
}