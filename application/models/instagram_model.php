<?PHP

class Player_model extends CI_Model{

  function __construct()
  {
    parent::__construct();
  }

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
