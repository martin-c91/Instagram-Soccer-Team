<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

        function __construct()
        {
                parent::__construct();
        }

        //redirect if needed, otherwise display the user list
        function index()
        {
          $this->load->view('header');
          $this->load->view('admin/index');
          $this->load->view('footer');
        }

}