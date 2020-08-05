<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_model extends CI_Model {

  public function get()
  {
    $this->db->select('*, sum(subkriteria.subkriteria_nilai) as sumNilai');
    $this->db->join('alternatif', 'alternatif.alternatif_id = penilaian.id_alternatif', 'left');
    $this->db->join('kriteria', 'kriteria.kriteria_id = penilaian.id_kriteria', 'left');
    $this->db->join('subkriteria', 'subkriteria.subkriteria_id = penilaian.id_subkriteria', 'left');
    $this->db->group_by('alternatif.alternatif_id');
    // $this->db->order_by('sumNilai', 'desc');
    return $this->db->get('penilaian');
  }

  public function getPenilaianByKriteria($id)
  {
    $this->db->select('*, max(subkriteria.subkriteria_nilai) as maxKriteria');
    $this->db->join('subkriteria', 'subkriteria.subkriteria_id = penilaian.id_subkriteria', 'left');
    $this->db->where('subkriteria.id_kriteria', $id);
    $query = $this->db->get('penilaian')->row_array();
    return $query['maxKriteria'];
  }

  public function getKriteria()
  {
    return $this->db->get('kriteria');
  }

  public function getSubkriteriaById($id)
  {
    $this->db->select('*');
    $this->db->from('penilaian');
    $this->db->join('alternatif', 'alternatif.alternatif_id = penilaian.id_alternatif', 'left');
    $this->db->join('subkriteria', 'subkriteria.subkriteria_id = penilaian.id_subkriteria', 'left');
    $this->db->where('id_alternatif', $id);
    $this->db->order_by('subkriteria_nilai', 'desc');
    
    return $this->db->get();
  }

  public function getKriteriaById($id)
  {
    return $this->db->get_where('kriteria', ['kriteria_id'=>$id]);
  }

  public function getAlternatif()
  {
    return $this->db->get('alternatif');
  }

  public function getAlternatifById($id)
  {
    return $this->db->get_where('alternatif', ['alternatif_id'=>$id]);
  }

}

/* End of file Hasil_model.php */
