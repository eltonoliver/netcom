<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Email_model extends CI_Model {

		public function listEmail(){
				   $this->db->select('email');
			return $this->db->get('contato')->result();
		}

}

/* End of file email_model.php */
/* Location: ./application/models/email_model.php */


 ?>