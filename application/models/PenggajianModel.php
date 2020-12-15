<?php

class PenggajianModel extends CI_Model{

  public function get_data($table){
    return $this->db->get($table);
  }

  public function insert_data($data, $table){
    $this->db->insert($table, $data);
  }

  public function update_data($table, $data, $where){
    $this->db->update($table, $data, $where);
  }

  public function delete_data($where, $table){
    $this->db->where($where);
    $this->db->delete($table);
  }

  public function insert_batch($table=null, $data=array()){
    $jumlah = count($data);
    if($jumlah > 0){
      $this->db->insert_batch($table, $data);
    }
  }

  public function cek_login(){
    $username = set_value('username');
    $password = set_value('password');

    $result = $this->db->where('username', $username)
                       ->where('password', md5($password))
                       ->limit(1)
                       ->get('data_pegawai');

    if($result->num_rows() > 0){
      return $result->row();
    }
    else{
      return FALSE;
    }
  }


}