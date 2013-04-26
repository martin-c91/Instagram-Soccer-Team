<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Team extends CI_Controller {

        function __construct()
        {
          parent::__construct();
          $this->load->model('Team_model', 'team');
          error_reporting(E_ALL ^ (E_NOTICE));
        }

        function index()
        {
          $data['result'] = $this->team->get_team();

          $this->load->view('header');
          $this->load->view('admin/all_team', $data);
          $this->load->view('footer');
        }

        function edit($id=NULL)
        {
          $this->load->library('form_validation');
          $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');

          $this->form_validation->set_rules('team_name', 'Team Name', 'required');
          $this->form_validation->set_rules('team_color1', 'Color1', 'required');
          $this->form_validation->set_rules('team_color2', 'Color2', 'required');

          //if we're editing, we must run query where id=$id
          if($id)
            {
              $data['values'] = $this->team->get_team($id);

              if($this->form_validation->run())
                {
                  $data['values'] = $this->input->post();
                  $this->team->update_team($id, $data['values']);
                  $this->session->set_flashdata('message', 'Team Successfully Updated');
                  redirect('admin/team');
                }
            }


          if($this->form_validation->run() && !$id)
            {

              $data['values'] = $this->input->post();

              $id = $this->team->new_team($data['values']);

              $this->session->set_flashdata('message', 'Team Successfully Added');
              redirect('admin/team/edit/'.$id);
            }

          $this->load->view('header');
          $this->load->view('admin/form', $data);
          $this->load->view('footer');

        }

        function delete($id, $confirmation='yes')
        {
          if($id)
            {
             $this->team->delete_team($id);
            }
          $this->session->set_flashdata('message', 'Team Successfully Deleted');
          redirect('admin');
        }

}