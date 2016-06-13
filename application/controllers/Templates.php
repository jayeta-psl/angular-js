<?php

class Templates extends CI_Controller {
    public function view($view){
        $this->load->view('templates/'.$view);
    }
}
