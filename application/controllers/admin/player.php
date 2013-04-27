<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Admin_Controller {

  private $data = array();

  function __construct()
  {
    parent::__construct();
    error_reporting(E_ALL ^ (E_NOTICE));
  }

  function view_team($team_id, $action=NULL, $player_id=NULL)
  {
    //get Team title
    $this->load->model('Team_model', 'team');
    $data['team'] = $this->team->get_team($team_id);

    //get player query
    $data['player'] = $this->_get_player($team_id);

    //actions: Edit
    if($action=="edit" && $player_id != NULL){

    }

    print_r($data->player);
    //load views
    $this->load->view('header');
    $this->load->view('admin/form_player', $data);
    $this->load->view('admin/all_player', $data);
    $this->load->view('footer');
  }

  function edit($player_id){
  }


  //temp business logic here

  function _get_player($team_id, $player_id=NULL){
    //if no player_id, return all players
    if(!$player_id)
      {
        $query = $this->db->get_where('players', array('team_id'=>$team_id));
        return $query->result();
      }
    //else return only one player
    else
      {
      $query = $this->db->get_where('teams', array('team_id'=>$id));
      return $query->row();
      }

  }
}