<?php

class customer_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    //Get list for all customers with search term, if added any
    public function getAllCustomers(){
        $query = "SELECT * FROM customers";
        $result = $this->db->query($query);
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return array();
    }

    //Get a specific customer
    public function getCustomer($id){
        return $this->db->get_where('customers', array('id' => $id))->row();
    }

    //Insert a customer record
    public function addCustomer($customer) {
        $this->db->insert('customers', $customer);
        return $this->db->insert_id();
    }

    //Update a customer record
    public function updateCustomer($customer, $id){
        $this->db->update('customers', $customer, array('id' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }

    //Delete a customer record
    public function deleteCustomer($id){
        $this->db->delete('customers', array('id' => $id));
        return ($this->db->affected_rows() > 0) ? TRUE : FALSE;
    }
}
