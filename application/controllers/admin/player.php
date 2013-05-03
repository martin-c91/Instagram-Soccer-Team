<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Admin_Controller {

  private $data = array();

  function __construct()
  {
    parent::__construct();
    error_reporting(E_ALL ^ (E_NOTICE));
    $this->load->model('Player_model', 'player');
  }

  function view_team($team_id)
  {
    //get Team title
    $this->load->model('Team_model', 'team');
    $data['team'] = $this->team->get_team($team_id);

    //get player query
    $data['players'] = $this->player->get_all_players($team_id);

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
    $data['player'] = $this->player->get_player($player_id);

    //if form is validated, edit player and set redirect
    if($this->form_validation->run())
      {
        $data['player'] = $this->input->post();
        $data['player']['player_instagram_id'] = $this->data['player']['player_instagram_id'];

        $player_id = $this->player->update_player($player_id, $data['player']);

        //redirect and set message
        $this->session->set_flashdata('message', 'Player Successfully Edited');
        //redirect('admin/player/view_team/'.$data['player']['team_id']);
      }
    print_r($data);
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
        $data['player']['player_instagram_id'] = $this->data['player']['player_instagram_id'];

        $player_id = $this->player->insert_player($data['player']);

        $this->session->set_flashdata('message', 'Player Successfully Added');
        redirect('admin/player/view_team/'.$team_id);
      }

  }

  function delete($player_id, $team_id=NULL){
    if($player_id)
      {
        $this->player->delete_player($player_id);

        $this->session->set_flashdata('message', 'Player Successfully Deleted');
        redirect('admin/player/view_team/'.$team_id);
      }

  }

  /*
   * Validate form
   */
  public function validate(){
    $this->load->library('form_validation');
    $this->form_validation->set_error_delimiters('<div class="alert">', '</div>');

    $this->form_validation->set_rules('player_name', 'Player Name', 'required');
    $this->form_validation->set_rules('player_instagram', 'Player Instagram Username', 'callback_ig_username_check|required');
  }

  /**
   * Function to check if IG username exist
   * @instagram_username var
   * @return bool
   **/
  public function ig_username_check($instagram_username)
  {
    $result = $this->instagram_api->userSearch($instagram_username);

    if(strcasecmp($result->data[0]->username, $instagram_username) == 0)
      {
       $this->data['player']['player_instagram_id'] = $result->data[0]->id;
       return true;
      }
    else
      {
        $this->form_validation->set_message('ig_username_check', 'Instagram username can not be verified.');
        return false;
      }
  }
}