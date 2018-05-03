<?php

/**
 * Created by PhpStorm.
 * User: gopal
 * Date: 02/05/2018
 * Time: 21:10
 */
class PaymentGateway_model extends CI_Model
{

    private $table = 'payment_gateways';

    function __construct()
    {
        /* Call the Model constructor */
        parent::__construct();
    }

    public function find($gatewayId) {
        if(!empty($gatewayId)) {
            return $this->db->get_where($this->table, array('gateway_id' => $gatewayId))->result();
        }
        else {
            return $this->db->get($this->table)->result();
        }
    }


}