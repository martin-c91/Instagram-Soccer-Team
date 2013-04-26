<?PHP

class Team_model extends CI_Model{

  var $team_name = '';

    function __construct(){

    parent::__construct();
  }

  function get_team($id=NULL)
  {
    if(!$id)
      {
        $query = $this->db->get('teams');
        return $query->result();
      }else{
        $query = $this->db->get_where('teams', array('team_id'=>$id));
        return $query->row();
      }
  }

  function new_team($data)
  {
    $this->db->insert('teams', $data);
    return $this->db->insert_id();
  }

  function update_team($id, $data)
  {
    $this->db->update('teams', $data, array('team_id' => $id));

  }

  function delete_team($id)
  {
    $this->db->delete('teams', array('team_id' => $id));

  }

}