<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Picture extends MY_Controller {

  private $data = array();

  function __construct()
  {
    parent::__construct();
    error_reporting(E_ALL ^ (E_NOTICE));
    $this->load->model('Player_model', 'player');
  }

  function index()
  {
    //get Team title
    $this->load->model('Team_model', 'team');
    $data['team'] = $this->team->get_team($team_id);

    //get player query
    $data['players'] = $this->player->get_all_players($team_id);

    //load views
    $this->load->view('picture', $data);
  }

}