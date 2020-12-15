<?php

class SlipGaji extends CI_Controller{

  public function __construct(){
    parent::__construct();
    
    if($this->session->userdata('hak_akses') != '1'){
      $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Anda belum login!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('welcome');
    }
  }

  public function index(){
    $data['title'] = "Filter Slip Gaji Pegawai";
    $data['pegawai'] = $this->penggajianModel->get_data('data_pegawai')->result();
    $this->load->view('templates_admin/header', $data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/filterSlipGaji', $data);
    $this->load->view('templates_admin/footer');
  }

  public function cetakSlipGaji(){
    $data['title'] = "Cetak Slip Gaji";
    $data['potongan'] = $this->penggajianModel->get_data('potongan_gaji')->result();
    $nama = $this->input->post('nama_pegawai');
    $bulan = $this->input->post('bulan');
    $tahun = $this->input->post('tahun');
    $bulanTahun = $bulan.$tahun;
    $data['print_slip'] = $this->db->query("SELECT data_pegawai.nik, data_pegawai.nama_pegawai, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok, data_jabatan.tj_transport, data_jabatan.uang_makan, data_kehadiran.alpha, data_kehadiran.bulan FROM data_pegawai INNER JOIN data_kehadiran ON data_kehadiran.nik=data_pegawai.nik INNER JOIN data_jabatan ON data_jabatan.nama_jabatan=data_pegawai.jabatan WHERE data_kehadiran.bulan='$bulanTahun' AND data_kehadiran.nama_pegawai='$nama'")->result();

    // var_dump($slip);
    // die;

    $this->load->view('templates_admin/header', $data);
    $this->load->view('admin/cetakSlipGaji', $data);

  }




}