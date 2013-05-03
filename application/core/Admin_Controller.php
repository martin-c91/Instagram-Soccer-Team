<?PHP

class Admin_Controller extends MY_Controller{


  function __construct()
  {
    parent::__construct();

    //load library
    $this->load->library('ion_auth');
    $this->load->library('instagram_api');
    $this->instagram_api->access_token = '362321667.3c9fdee.749faff3caf7463889e37d7aa710e1db';

    if(!$this->ion_auth->is_admin())
      {
        $this->session->set_flashdata('message', 'You must be an admin to view this page.');
        redirect('admin/auth/login');

      }
  }

}