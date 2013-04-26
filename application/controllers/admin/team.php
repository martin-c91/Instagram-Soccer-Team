<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends Admin_Controller {

        function __construct()
        {
                parent::__construct();
        }

        //redirect if needed, otherwise display the user list
        function index($data=NULL)
        {
          $this->load->view('header');
          $data['result'] = $this->_get_team();
          $this->load->view('admin/index', $data);
          $this->load->view('footer');
        }

        function edit($id=null)
        {
          $data['action']="edit";

          if($this->input->post('action'))
            {
              print "posted";
            }

          if($id){

            $query = $this->db->get_where('teams', array('team_id'=>$id));
            $data['form'] = $query->row();

              //load index and pass $data
            $this->index($data);
          }

        }

        private function _get_team($id='all')
        {
          $query = $this->db->get('teams');
          return $query->result();
        }

}