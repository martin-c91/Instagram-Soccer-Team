<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Player extends Admin_Controller {

  private $data = array();

  function __construct()
  {
    parent::__construct();
    error_reporting(E_ALL ^ (E_NOTICE));
  }

  function view($team_id)
  {
    $data['result'] = $this->_get_player($team_id);

    $this->load->view('header');
    $this->load->view('admin/all_player', $data);
    $this->load->view('footer');
  }


  //temp business logic here

  function _get_player($team_id, $player_id=NULL){
    //if no player_id, return all players
    if(!$player_id)
      {
        $query = $this->db->get('players', array('team_id'=>$team_id));
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