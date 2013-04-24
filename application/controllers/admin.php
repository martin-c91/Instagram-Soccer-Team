<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller {

        function __construct()
        {
                parent::__construct();
                $this->load->library('ion_auth');
                $this->load->library('form_validation');
                $this->load->helper('url');

                // Load MongoDB library instead of native db driver if required
                $this->config->item('use_mongodb', 'ion_auth') ?
                $this->load->library('mongo_db') :

                $this->load->database();

                $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

                $this->lang->load('auth');
                $this->load->helper('language');
        }

        //redirect if needed, otherwise display the user list
        function index()
        {

                if (!$this->ion_auth->logged_in())
                {
                        //redirect them to the login page
                        redirect('auth/login', 'refresh');
                }
                elseif (!$this->ion_auth->is_admin())
                {
                        //redirect them to the home page because they must be an administrator to view this
                        redirect('/', 'refresh');
                }
                else
                {
                        //set the flash data error message if there is one
                        $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

                        //list the users
                        $this->data['users'] = $this->ion_auth->users()->result();
                        foreach ($this->data['users'] as $k => $user)
                        {
                                $this->data['users'][$k]->groups = $this->ion_auth->get_users_groups($user->id)->result();
                        }

                        $this->_render_page('auth/index', $this->data);
                }
        }
