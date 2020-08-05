<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif_model extends CI_Model {

  public function getAll()
  {
    return $this->db->get('alternatif');
  }

  public function getById($id)
  {
    return $this->db->get_where('alternatif', ['alternatif_id'=>$id]);
  }

  public function insert($data)
  {
    return $this->db->insert('alternatif', $data);
  }

  public function update($id, $data)
  {
    $this->db->update('alternatif', $data, ['alternatif_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete('alternatif', ['alternatif_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function verifikasi($id, $data)
  {
    return $this->db->update('alternatif', $data, ['alternatif_id'=>$id]);
  }

}

/* End of file Siswa_model.php */
