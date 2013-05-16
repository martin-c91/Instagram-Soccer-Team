<?php

class Instagram extends CI_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('instagram_api');
    // Set the instagram library access token variable
    $this->codeigniter_instance =& get_instance();
    $this->instagram_api->access_token = '362321667.3c9fdee.749faff3caf7463889e37d7aa710e1db';
    $this->load->database();

  }

  function index($url='https://api.instagram.com/v1/users/362321667/media/recent/?access_token=362321667.3c9fdee.749faff3caf7463889e37d7aa710e1db', $post_parameters = NULL) {

    //delete outdated cache

    $diff=strtotime('-'.$cachettl, time());
    $this->db->delete('ig_cache', array('CREATED <' => date("Y-m-d H:i:s", $diff)));


    //check if row for this $url exist
    $query = $this->db->get_where('ig_cache', array('CACHE_ID' => $url));

    //if this is a new query, execute curl and insert query
    if($query->result()){

      $row = $query->result();
      return json_decode($row[0]->CONTENT);

    }else{
      $contents = file_get_contents($url);

      //insert into database
      $data = array(
                    'CACHE_ID' => $url,
                    'CONTENT' => $contents,
                    'CREATED' => date("Y-m-d H:i:s"),
                    );
      $this->db->insert('ig_cache', $data);

      //return
      return json_decode($contents);

    }

  }

  function recent($user_id = '362321667')
  {

    if($user_id === FALSE) {
      $user_id = $this->session->userdata('instagram-user-id');
    }

    // Get the user data
    $data['user_data'] = $this->instagram_api->getUser($user_id);

    //    $data['user_recent_data'] = $this->instagram_api->getUserRecent($user_id);

    $data['main_view'] = 'user_recent';


    print_r($data['user_data']);


  }

  function check_ig_cache($url)
  {
    //delete any outdated row
    $q = sprintf("delete from ig_cache where created < SUBTIME(NOW( ), '%s')", $cacheTtl);
    mysql_query($q);

    //select from talbe
    $q = sprintf("select * from ig_cache where CACHE_ID='%s'", mysql_real_escape_string($url));
    $res = mysql_query($q);

    $content = "<empty>";

    $cacheHit = false;

    //if row exist
    if($res) {
      $r = mysql_fetch_assoc($res);

      if($r) {
        //fetch content
        $content = $r['CONTENT'];
        //update hit counter
        $q = sprintf("update ig_cache set HIT_COUNTER = HIT_COUNTER+1 where CACHE_ID='%s'", mysql_real_escape_string($url));
        mysql_query($q);

        $cacheHit = true;
      }
    }

    //if there's no cache, get content from $url and store cache
    if(!$cacheHit) {
      $content = file_get_contents($url);

      $response_header = implode("\n", $http_response_header);

      //store cache
      $q = sprintf(
                   "INSERT INTO ig_cache (CACHE_ID, CONTENT, RESPONSE_HEADER, CREATED) VALUES('%s', '%s', '%s', NOW())",
                   mysql_real_escape_string($url),
                   mysql_real_escape_string($content),
                   mysql_real_escape_string($response_header)
                   );

      mysql_query($q);
    }
  }

}