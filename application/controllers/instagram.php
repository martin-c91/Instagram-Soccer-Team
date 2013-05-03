<?php

class Instagram extends CI_Controller {

  function __construct()
        {
                parent::__construct();
                $this->load->library('instagram_api');
                // Set the instagram library access token variable

                $this->instagram_api->access_token = '362321667.3c9fdee.749faff3caf7463889e37d7aa710e1db';

        }

  function index() {

    echo '<h1>Instagram</h1>';

    // Load the Instagram api library
    $this->load->library('instagram_api');

    // Get popular media
    $popular_media =$this->instagram_api->getUserRecent('362321667');

    print_r($popular_media);


    // Loop through the popular media and display the images
    foreach($popular_media->data as $data) {

      // Display the thumbnail image
      echo '<img src="' . $data->images->thumbnail->url . '" />';

    }

  }

  function recent($user_id = FALSE)
  {

    if($user_id === FALSE) {
      $user_id = $this->session->userdata('instagram-user-id');
    }

    // Get the user data
    $data['user_data'] = $this->instagram_api->getUser($user_id);

    $data['user_recent_data'] = $this->instagram_api->getUserRecent($user_id);

    $data['main_view'] = 'user_recent';

    $this->load->vars($data);

    $this->load->view('template');

  }

}