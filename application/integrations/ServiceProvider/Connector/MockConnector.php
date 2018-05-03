<?php
namespace PaymentService\ServiceProvider\Connector;

use PaymentService\ServiceProvider\Response\ServiceProviderResponse;

class MockConnector implements ConnectorInterface {
    public function process() {
        return new ServiceProviderResponse;
    }
}