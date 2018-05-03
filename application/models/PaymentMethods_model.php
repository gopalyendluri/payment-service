<?php

/**
 * Created by PhpStorm.
 * User: gopal
 * Date: 03/05/2018
 * Time: 10:12
 */
class PaymentMethods_model extends CI_Model
{

    private $table = 'payment_methods';
    private $id;
    private $payment_method_uuid;
    private $user_id;
    private $gateway_reference;
    private $provider;
    private $card_ending;
    private $card_holder_name;
    private $card_type;
    private $date_created;

    function __construct()
    {
        /* Call the Model constructor */
        parent::__construct();
    }

    public function find($investmentId, $userId = null) {
        if(!empty($gatewayId)) {
            return $this->db->get_where($this->table, array('id' => $investmentId))->result();
        }
        else if(!empty($userId)){
            return $this->db->get_where($this->table, array('user_id' => $userId))->result();
        }else{
            return false;
        }
    }


    public function insert_entry($paymentMethod)
    {

        $this->payment_method_uuid   = $paymentMethod['payment_method_uuid'];
        $this->user_id               = $paymentMethod['user_id'];
        $this->provider              = $paymentMethod['provider'];
        $this->gateway_reference     = isset($paymentMethod['gateway_reference']) ? $paymentMethod['gateway_reference'] : '';
        $this->card_ending           = isset($paymentMethod['card_ending']) ? $paymentMethod['card_ending'] : '';
        $this->card_holder_name      = isset($paymentMethod['card_holder_name']) ? $paymentMethod['card_holder_name'] : '';
        $this->card_type             = isset($paymentMethod['card_type']) ? $paymentMethod['card_type'] : '';
        $this->date_created          = time();

        $this->mainDb->insert($this->table, $this);
        return $this;
    }


}