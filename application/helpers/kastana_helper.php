<?php
function konfigurasi($title, $c_des=null)
{
  $CI = get_instance();
  $CI->load->model('Konfigurasi_model');
  $site = $CI->Konfigurasi_model->listing();
  $data = array(
    'title'        => $title.' | '.$site['nama_aplikasi'],
    'site'         => $site,
    'jumlahKolom'  => $CI->Konfigurasi_model->getKriteria()->num_rows() + 2,
    'alternatif'    => $CI->db->get('alternatif')->num_rows(),
    'kriteria'    => $CI->db->get('kriteria')->num_rows(),
    'subkriteria'    => $CI->db->get('subkriteria')->num_rows(),
  );
  return $data;
}

function tanggal()
{
    date_default_timezone_set('Asia/Jakarta');
    return date('Y-m-d');
}

function tanggal_indo()
{
    date_default_timezone_set('Asia/Jakarta');
    return date('d-m-Y H:i:s');
}

function tanggal_new()
{
    date_default_timezone_set('Asia/Jakarta');
    /* script menentukan hari */
    $array_hr= array(1=>"Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu");
    $hr = $array_hr[date('N')];
    /* script menentukan tanggal */
    $tgl= date('j');
    /* script menentukan bulan */
    $array_bln = array(1=>"Januari","Februari","Maret", "April", "Mei","Juni","Juli","Agustus","September","Oktober", "November","Desember");
    $bln = $array_bln[date('n')];
    /* script menentukan tahun */
    $thn = date('Y');
    /* script perintah keluaran*/
    return $hr . ", " . $tgl . " " . $bln . " " . $thn . " " . date('H:i');
}

function rupiah($angka)
{
    $rupiah = number_format($angka, 0, ',', '.');
    return $rupiah;
}

function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);
    $time = substr($tgl, 11, 5);
    return $tanggal . ' ' . bulan($bulan) . ' ' . $tahun;
}

function tgl_lengkap($tanggals)
{
    $tanggal = substr($tanggals, 8, 2);
    $bulan = substr($tanggals, 5, 2);
    $tahun = substr($tanggals, 0, 4);
    $time = substr($tanggals, 11, 5);
    return $tanggal . ' ' . bulan($bulan) . ', ' . $tahun . ' ' . $time;
}

function bulan($bln)
{
    switch ($bln) {
      case 1:
      return "Januari";
      break;
      case 2:
      return "Februari";
      break;
      case 3:
      return "Maret";
      break;
      case 4:
      return "April";
      break;
      case 5:
      return "Mei";
      break;
      case 6:
      return "Juni";
      break;
      case 7:
      return "Juli";
      break;
      case 8:
      return "Agustus";
      break;
      case 9:
      return "September";
      break;
      case 10:
      return "Oktober";
      break;
      case 11:
      return "November";
      break;
      case 12:
      return "Desember";
      break;
    }
}

function nama_hari($tanggal)
{
    $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
    $pecah = explode("-", $ubah);
    $tgl = $pecah[2];
    $bln = $pecah[1];
    $thn = $pecah[0];
    $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
    $nama_hari = "";
    if ($nama == "Sunday") {
        $nama_hari = "Minggu";
    } elseif ($nama == "Monday") {
        $nama_hari = "Senin";
    } elseif ($nama == "Tuesday") {
        $nama_hari = "Selasa";
    } elseif ($nama == "Wednesday") {
        $nama_hari = "Rabu";
    } elseif ($nama == "Thursday") {
        $nama_hari = "Kamis";
    } elseif ($nama == "Friday") {
        $nama_hari = "Jumat";
    } elseif ($nama == "Saturday") {
        $nama_hari = "Sabtu";
    }
    return $nama_hari;
}

function xTimeAgo($oldTime, $newTime, $timeType)
{
    $timeCalc = strtotime($newTime) - strtotime($oldTime);
    if ($timeType == "x") {
        if ($timeCalc = 60) {
            $timeType = "m";
        }
        if ($timeCalc = (60*60)) {
            $timeType = "h";
        }
        if ($timeCalc = (60*60*24)) {
            $timeType = "d";
        }
    }
    if ($timeType == "s") {
        $timeCalc .= " seconds ago";
    }
    if ($timeType == "m") {
        $timeCalc = round($timeCalc/60) . " menit yang lalu";
    }
    if ($timeType == "h") {
        $timeCalc = round($timeCalc/60/60) . " jam yang lalu";
    }
    if ($timeType == "d") {
        $timeCalc = round($timeCalc/60/60/24) . " hari yang lalu";
    }
    return $timeCalc;
}

function timeAgo2($timestamp)
{
    date_default_timezone_set('Asia/Jakarta');
    $skrg=date("Y-m-d H:i:s");
    $isi= str_replace("-", "", xTimeAgo($skrg, $timestamp, "m"));
    $isi2= str_replace("-", "", xTimeAgo($skrg, $timestamp, "h"));
    $isi3= str_replace("-", "", xTimeAgo($skrg, $timestamp, "d"));
    $go="";
    if ($isi > 60) {
        $go=$isi2;
    } elseif ($isi2 > 24) {
        $go=$isi3;
    } elseif ($isi < 61) {
        $go=$isi;
    }
    return $go;
}

// Perhitungan
function matrix($kriteria_nilai, $maxNilai){
	return $kriteria_nilai/$maxNilai;
}

function normalisasi($kriteria_nilai, $sumNilai){
	return $kriteria_nilai/$sumNilai;
}

function nilaiAlternatif($kriteria_nilai, $sumNilai, $nilaiNormalisasi){
    $a = $kriteria_nilai/$sumNilai;
    $b = $nilaiNormalisasi/$sumNilai;
    return $a*$b;
}

function dd(...$params){
    echo "<pre>";
    var_dump($params);
    echo "</pre>";
    die;
}