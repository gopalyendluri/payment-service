<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;


class PaymentMethod extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function find_get()
    {
        $paymentTransactionId = urldecode($this->get('id'));
        //@todo:replace hardcoded JSON String with Database Values
        $paymentTransaction = '{
    "paymentTransaction": {
        "createdAt": 1525300353,
        "paymentTransactionId": "0669d5e0-f590-48e8-8e67-31797d45bb12",
        "amount": 1090,
        "currency": "GBP",
        "status": "Success"
    }
}';

        $paymentTransaction = json_decode($paymentTransaction);
        $this->set_response($paymentTransaction, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
    }


    function create_post()
    {
        $paymentMethodRequest =  $this->post();
        $this->set_response($paymentMethodRequest, REST_Controller::HTTP_CREATED);
    }


    function update_put()
    {
        $paymentMethodRequest =  $this->post();
        $this->set_response($paymentMethodRequest, REST_Controller::HTTP_OK);
    }

    function remove_delete()
    {
        $paymentMethodRequest =  $this->post();
        $this->set_response($paymentMethodRequest, REST_Controller::HTTP_ACCEPTED);
    }

    function refund_post()
    {
        $paymentMethodRequest =  $this->post();
        $this->set_response($paymentMethodRequest, REST_Controller::HTTP_OK);
    }

}
