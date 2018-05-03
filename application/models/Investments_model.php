<?php

/**
 * Created by PhpStorm.
 * User: gopal
 * Date: 03/05/2018
 * Time: 10:12
 */
class Investments_model extends CI_Model
{

    private $table = 'investments';
    private $id;
    private $pitch_id;
    private $user_id;
    private $amount;
    private $status;
    private $currency;
    private $payment_method_id;
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


    public function insert_entry($transaction)
    {

        $this->pitch_id              = $transaction['pitch_id'];
        $this->user_id               = $transaction['user_id'];
        $this->payment_method_id     = $transaction['payment_method_id'];
        $this->amount                = isset($transaction['amount']) ? $transaction['amount'] : 0.0;
        $this->status                = isset($transaction['status']) ? $transaction['status'] : '';
        $this->currency              = isset($transaction['currency']) ? $transaction['currency'] : 'GBP'; //@todo: should get this value from config
        $this->date_created          = time(); // UnixTimeStamp

        $this->mainDb->insert($this->table, $this);
        return $this;
    }


}