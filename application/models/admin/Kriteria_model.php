<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria_model extends CI_Model {

  public function getAll()
  {
    return $this->db->get('kriteria');
  }

  public function getById($id)
  {
    return $this->db->get_where('kriteria', ['kriteria_id'=>$id]);
  }

  public function insert($data)
  {
    return $this->db->insert('kriteria', $data);
  }

  public function update($id, $data)
  {
    $this->db->update('kriteria', $data, ['kriteria_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete('kriteria', ['kriteria_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function getAllBobot()
  {
    $this->db->join('kriteria', 'kriteria.kriteria_id = bobot_kriteria.id_kriteria', 'left');
    $this->db->join('alternatif', 'alternatif.alternatif_id = bobot_kriteria.id_alternatif', 'left');
    return $this->db->get('bobot_kriteria');
  }

  // Subkriteria

  public function getAllSubkriteria()
  {
    $this->db->join('kriteria', 'kriteria.kriteria_id = subkriteria.id_kriteria', 'left');
    return $this->db->get('subkriteria');
  }

  public function getKriteria()
  {
    return $this->db->get('kriteria');
  }

  public function getSubkriteriaById($id)
  {
    $this->db->join('kriteria', 'kriteria.kriteria_id = subkriteria.id_kriteria', 'left');
    return $this->db->get_where('subkriteria', ['subkriteria_id'=>$id]);
  }

  public function insertSubkriteria($data)
  {
    $this->db->insert('subkriteria', $data);
    return $this->db->affected_rows();
  }

  public function updateSubkriteria($id, $data)
  {
    $this->db->update('subkriteria', $data, ['subkriteria_id'=>$id]);
    return $this->db->affected_rows();
  }

  public function deleteSubkriteria($id)
  {
    $this->db->delete('subkriteria', ['subkriteria_id'=>$id]);
    return $this->db->affected_rows();
  }

}

/* End of file Siswa_model.php */
