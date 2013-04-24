<?PHP

class Admin_Controller extends MY_Controller{


  function __construct()
  {
    parent::__construct();

    $this->load->library('ion_auth');

    if(!$this->ion_auth->is_admin())
      {
        $this->session->set_flashdata('message', 'You must be an admin to view this page.');
        redirect('auth/login');

      }

  }

}