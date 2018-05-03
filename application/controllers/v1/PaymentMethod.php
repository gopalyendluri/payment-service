<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/** @noinspection PhpIncludeInspection */
require APPPATH . '/libraries/REST_Controller.php';

// use namespace
use Restserver\Libraries\REST_Controller;
use PaymentService\ServiceProvider\Processor\ServiceProviderProcess;
use PaymentService\ServiceProvider\Provider\ServiceProvider;
use PaymentService\ServiceProvider\RequestType\RequestType;

class PaymentMethod extends REST_Controller {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();

    }

    function find_get()
    {
        $paymentMethodId = urldecode($this->get('id'));
        $paymentProvider = urldecode($this->get('paymentProvider'));

        try{
            //@todo: validate input params
            $requestParams = array('paymentMethodId'=>$paymentMethodId);

            // Call action.
            $process = new ServiceProviderProcess(
                new ServiceProvider(strtolower($paymentProvider)),
                new RequestType(RequestType::PAYMENT_METHOD_LIST),
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
        $paymentMethodRequest =  $this->post();

        //@todo: validate input and payment provider

        try{
            $paymentProvider = urldecode($paymentMethodRequest['paymentProvider']);

            // Call action.
            $process = new ServiceProviderProcess(
                new ServiceProvider(strtolower($paymentProvider)),
                new RequestType(RequestType::PAYMENT_METHOD_CREATE),
                $paymentMethodRequest
            );
            $serviceProviderResponse = $process->execute();
            $response = $serviceProviderResponse->getResponse();

            //@todo: validate resonse and process and format for the saving in database
            $this->load->model('paymentMethods_model');

            $paymentMethod = $this->paymentMethods_model->insert_entry($response);

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


    function update_put()
    {

        $paymentMethodRequest =  $this->post();

        //@todo: validate input and payment provider

        try{
            $paymentProvider = urldecode($paymentMethodRequest['paymentProvider']);

            // Call action.
            $process = new ServiceProviderProcess(
                new ServiceProvider(strtolower($paymentProvider)),
                new RequestType(RequestType::PAYMENT_METHOD_UPDATE),
                $paymentMethodRequest
            );
            $serviceProviderResponse = $process->execute();
            $response = $serviceProviderResponse->getResponse();

            //@todo: validate resonse and process and format for the saving in database
         //   $this->load->model('paymentMethods_model');

          //  $paymentMethod = $this->paymentMethods_model->update_entry($response);


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
