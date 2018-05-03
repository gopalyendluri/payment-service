<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;
use PaymentService\ServiceProvider\Processor\ServiceProviderProcess;
use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\RequestType\RequestType;

class PaymentTransaction extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function find_get()
    {

        $paymentTransactionId = urldecode($this->get('id'));
        $paymentProvider = urldecode($this->get('paymentProvider'));

        try{
            //@todo: validate input params
            $requestParams = array('paymentTransactionId'=>$paymentTransactionId);

            // Call action.
            $process = new ServiceProviderProcess(
                new ServiceProvider(strtolower($paymentProvider)),
                new RequestType(RequestType::TRANSACTION_LIST),
                $requestParams
            );
            $serviceProviderResponse = $process->execute();
            $response = $serviceProviderResponse->getResponse();
            $this->set_response($response, REST_Controller::HTTP_OK);
        }
        catch (\Exception $e){
            //@todo: handle excetion to build proper error codes
            $response = array(
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            );
            $this->set_response($response, REST_Controller::HTTP_NOT_FOUND);
        }

    }


    function create_post()
    {
        $paymentTransactionRequest =  $this->post();
        try{
            //@todo: validate input params
            $paymentProvider = urldecode($paymentTransactionRequest['paymentProvider']);

            // Call action.
            $process = new ServiceProviderProcess(
                new ServiceProvider(strtolower($paymentProvider)),
                new RequestType(RequestType::TRANSACTION_CREATE),
                $paymentTransactionRequest
            );
            $serviceProviderResponse = $process->execute();
            $response = $serviceProviderResponse->getResponse();


            // Process response and save the information in investments model here
            //@todo: validate resonse and process and format for the saving in database
            $this->load->model('investments_model');

            $investment = $this->investments_model->insert_entry($response);

            $this->set_response($response, REST_Controller::HTTP_CREATED);
        }
        catch (\Exception $e){
            //@todo: handle excetion to build proper error codes
            $response = array(
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            );
            $this->set_response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }


    function refund_post()
    {
        $paymentTransactionRequest =  $this->post();
        try{
            //@todo: validate input params
            $paymentProvider = urldecode($paymentTransactionRequest['paymentProvider']);

            // Call action.
            $process = new ServiceProviderProcess(
                new ServiceProvider(strtolower($paymentProvider)),
                new RequestType(RequestType::TRANSACTION_REFUND),
                $paymentTransactionRequest
            );
            $serviceProviderResponse = $process->execute();
            $response = $serviceProviderResponse->getResponse();
            $this->set_response($response, REST_Controller::HTTP_OK);
        }
        catch (\Exception $e){
            //@todo: handle excetion to build proper error codes
            $response = array(
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            );
            $this->set_response($response, REST_Controller::HTTP_NOT_FOUND);
        }
    }

}
