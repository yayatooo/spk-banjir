<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_Model {

  public function update($data)
  {
    $this->db->update('user', $data, ['id'=>1]);
    return $this->db->affected_rows();
  }

}

/* End of file Profil_model.php */
