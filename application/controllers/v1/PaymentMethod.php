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
        $paymentMethodId = urldecode($this->get('id'));
        //@todo:replace hardcoded JSON String with Database Values
        $paymentMethod = '{
                            "paymentMethod": {
                                "paymentMethodId": "6db5bd03-7f2f-46bf-8d89-035cdcf2c37f",
                                "gatewayReferenceId": "5ec37c16-6912-4b91-ae5a-5435158db5c9",
                                "paymentProvider": "braintree",
                                "userId": "de18a241-4aa7-4c5b-a8bd-133a0112911e",
                                "cardEnding": "1881",
                                "cardholderName": "Gopal Yendluri",
                                "cardType": "Visa",
                                "paymentType": "Card",
                                "nonce": null,
                                "createdAt": "2018-04-23T12:54:44.169Z",
                                "updatedAt": null,
                                "deletedAt": null,
                                "lastAuthorized": "2018-04-23T12:54:43.000Z",
                                "useableOnce": false,
                                "usedOnce": false,
                                "requiresReauthorization": false,
                                "billingAddress": {
                                    "postCode": "W93EF"
                                }
                            }
                          }';

        $paymentMethod = json_decode($paymentMethod);
        $this->set_response($paymentMethod, REST_Controller::HTTP_OK); // CREATED (201) being the HTTP response code
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

    function reauthorise_post()
    {
        $paymentMethodRequest =  $this->post();
        $this->set_response($paymentMethodRequest, REST_Controller::HTTP_OK);
    }

}
