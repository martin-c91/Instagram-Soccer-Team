<?PHP

class MY_Controller extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
  }
}

require(APPPATH.'Core/Admin_Controller.php'); // load Admin_Controller class
