<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Admin_Controller {

  private $data = array();

  function __construct()
  {
    parent::__construct();
    error_reporting(E_ALL ^ (E_NOTICE));
  }

  function view_team($team_id)
  {
    //get Team title
    $this->load->model('Team_model', 'team');
    $data['team'] = $this->team->get_team($team_id);

    //get player query
    $data['players'] = $this->get_all_players($team_id);

    //automaticall load add
    $this->add($team_id);

    //load views
    $this->load->view('header');
    $this->load->view('admin/form_player', $data);
    $this->load->view('admin/all_player', $data);
    $this->load->view('footer');
  }

  function edit($player_id)
  {
    //validate form first
    $this->validate();

    //get player query
    $data['player'] = $this->get_player($player_id);

    //if form is validated, edit player and set redirect
    if($this->form_validation->run())
      {
        $data['player'] = $this->input->post();
        $player_id = $this->update_player($player_id, $data['player']);

        //redirect and set message
        $this->session->set_flashdata('message', 'Player Successfully Edited');
        redirect('admin/player/view_team/'.$data['player']['team_id']);
      }

    //load views
    $this->load->view('header');
    $this->load->view('admin/form_player', $data);
    $this->load->view('footer');
  }

  function add($team_id)
  {
    $this->validate();

    //if form is validated, then add new player and redirect
    if($this->form_validation->run())
      {
        $data['player'] = $this->input->post();
        $data['player']['team_id'] = $team_id;

        $player_id = $this->insert_player($data['player']);

        $this->session->set_flashdata('message', 'Player Successfully Added');
        redirect('admin/player/view_team/'.$team_id);
      }

  }

  function delete($player_id, $team_id=NULL){
    if($player_id)
      {
        $this->delete_player($player_id);

        $this->session->set_flashdata('message', 'Player Successfully Deleted');
        redirect('admin/player/view_team/'.$team_id);
      }

  }


  //temp business logic here

  function get_all_players($team_id)
  {
    $query = $this->db->get_where('players', array('team_id'=>$team_id));
    return $query->result();
  }

  function get_player($player_id)
  {
    $query = $this->db->get_where('players', array('player_id'=>$player_id));
    return $query->row();
  }

  function insert_player($data){
    $this->db->insert('players', $data);
    return $this->db->insert_id();
  }

  function update_player($player_id, $data){
    $this->db->update('players', $data, array('player_id' => $player_id));
    return $this->db->insert_id();
  }


  function delete_player($player_id)
  {
    $this->db->delete('players', array('player_id' => $player_id));

  }

  private function validate(){
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');

    $this->form_validation->set_rules('player_name', 'Player Name', 'required');
    $this->form_validation->set_rules('player_instagram', 'Player Instagram ID', 'required');

  }
}