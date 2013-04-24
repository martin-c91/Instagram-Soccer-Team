<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller {

        function __construct()
        {
          parent::__construct();

        }

        public function index(){

          echo "login page";
        }
}