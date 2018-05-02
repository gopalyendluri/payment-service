<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class PaymentGateway extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function find_get()
    {
        //@todo:replace hardcoded JSON String with Database Values
        $gateways = json_decode('{"paymentGateways":[{"paymentGatewayId":"8421d76e-1196-4f8d-a3bb-a81283bc8ed1","paymentProvider":"braintree","supportedPaymentMethodTypes":["ApplePay","GooglePay"]},{"paymentGatewayId":"5ff57ab7-d066-44cd-a0ca-9eb542bd6fc1","paymentProvider":"stripe","supportedPaymentMethodTypes":["Card","Paypal"]}]}');
        $this->set_response($gateways, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
    }

}
