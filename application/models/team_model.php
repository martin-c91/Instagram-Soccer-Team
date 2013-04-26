<?PHP

class Team_model extends CI_Model{

  var $team_name = '';
  var $team_slug = '';
  var $team_color = '';

  function __construct(){

    parent::__construct();
  }

  function add_team($data)
  {
    $this->db->insert('teams', $data);
  }

  function update_team($data)
  {

  }
}