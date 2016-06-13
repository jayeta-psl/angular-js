<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customers extends CI_Controller {

    function __construct(){
        parent::__construct();
        $this->load->model(array('customer_m'));
    }

    public function index() {
        $customers = $this->customer_m->getAllCustomers();
        echo json_encode($customers);
    }

    //Insert customer record
    public function add() {
        try{
            $_POST = json_decode(file_get_contents('php://input'), true);
            $customerData = $this->input->post();
            $id = $this->customer_m->addCustomer($customerData);
            $output = (!empty($id) ? $this->setMessage(SUCCESS, 'Add', ADD_SUCCESS) : $this->setMessage(ERROR, 'Customer', ADD_ERROR));
            echo json_encode($output);
        }catch (Exception $e){
            echo json_encode($this->setMessage(WARNING, 'Add', $e->getMessage()));
        }
    }

    //Edit customer record
    public function edit($id) {
        try{
            $customer = $this->customer_m->getCustomer($id);
            echo json_encode($customer);
        }catch (Exception $e){
            echo json_encode($this->setMessage(WARNING, 'Edit', $e->getMessage()));
        }
    }

    //Update customer record
    public function update($id){
        try{
            $_POST = json_decode(file_get_contents('php://input'), true);
            $customerData = $this->input->post('data');
            extract($customerData);
            $customerData = array (
                'name' => $name,
                'email' => $email,
                'phone' => $phone,
                'address' => $address,
                'city' => $city
            );
            $isUpdated = $this->customer_m->updateCustomer($customerData, $id);
            $output = ($isUpdated ? $this->setMessage(SUCCESS, 'Edit', EDIT_SUCCESS) : $this->setMessage(ERROR, 'Edit', EDIT_ERROR));
            echo json_encode($output);
        }catch (Exception $e){
            echo json_encode($this->setMessage(WARNING, 'Edit', $e->getMessage()));
        }
    }

    //Delete customer record
    public function delete($id){
        try{
            $isDeleted = $this->customer_m->deleteCustomer($id);
            $output = ($isDeleted ? $this->setMessage(SUCCESS, 'Delete', DELETE_SUCCESS) : $this->setMessage(ERROR, 'Delete', DELETE_ERROR));
            echo json_encode($output);
        }catch (Exception $e){
            echo json_encode($this->setMessage(WARNING, 'Edit', $e->getMessage()));
        }
    }

    //View customer record
    public function view($id) {
        try{
            $customer = $this->customer_m->getCustomer($id);
            echo json_encode($customer);
        }catch (Exception $e){
            echo json_encode($this->setMessage(WARNING, 'Edit', $e->getMessage()));
        }
    }

    //Set messages
    public function setMessage($status, $title, $message){
        return array('status'=>$status, 'title'=>$title, 'message'=>$message);
    }
}