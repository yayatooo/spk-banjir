<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_model extends CI_Model {

  public function getAll()
  {
    $this->db->join('alternatif', 'alternatif.alternatif_id = penilaian.id_alternatif', 'left');
    $this->db->join('kriteria', 'kriteria.kriteria_id = penilaian.id_kriteria', 'left');
    $this->db->join('subkriteria', 'subkriteria.subkriteria_id = penilaian.id_subkriteria', 'left');
    $this->db->group_by('penilaian.id_alternatif');
    return $this->db->get('penilaian');
  }

  public function getAllAlternatif()
  {
    return $this->db->get('alternatif');
  }

  public function getById($id)
  {
    $this->db->join('alternatif', 'alternatif.alternatif_id = penilaian.id_alternatif', 'left');
    $this->db->join('kriteria', 'kriteria.kriteria_id = penilaian.id_kriteria', 'left');
    $this->db->join('subkriteria', 'subkriteria.subkriteria_id = penilaian.id_subkriteria', 'left');
    $alternatif = $this->db->get_where('penilaian', ['id_alternatif'=>$id])->row_array();
    $data['alternatif'] = $alternatif;
    $this->db->join('alternatif', 'alternatif.alternatif_id = penilaian.id_alternatif', 'left');
    $this->db->join('kriteria', 'kriteria.kriteria_id = penilaian.id_kriteria', 'left');
    $this->db->join('subkriteria', 'subkriteria.subkriteria_id = penilaian.id_subkriteria', 'left');
    $data['penilaian'] = $this->db->get_where('penilaian', ['id_alternatif'=>$id])->result_array();
    return $data;
  }

  public function insert($data)
  {
    return $this->db->insert('penilaian', $data);
  }

  public function update($id_alternatif, $penilaian_id, $data)
  {
    $this->db->update('penilaian', $data, ['id_alternatif'=>$id_alternatif, 'penilaian_id'=>$penilaian_id]);
    return $this->db->affected_rows();
  }

  public function delete($id)
  {
    $this->db->delete('penilaian', ['id_alternatif'=>$id]);
    return $this->db->affected_rows();
  }

  public function getAlternatif()
  {
    return $this->db->get('alternatif');
  }

  public function getKriteria()
  {
    return $this->db->get('kriteria');
  }

  public function getSubkriteriaByKriteria($id)
  {
    return $this->db->get_where('subkriteria', ['id_kriteria'=>$id]);
  }

}

/* End of file Siswa_model.php */
