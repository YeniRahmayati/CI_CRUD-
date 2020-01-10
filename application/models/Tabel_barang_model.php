<?php 

class Tabel_barang_model extends CI_Model
{
	
	function get_all(){
		return $this->db->get('Tabel_barang')->result();
			}
	function insert($data){
        return $this->db->insert('tabel_barang',$data);
    }
    function getbyid($kode){
        $this->db->where('kode_barang',$kode); 
        return 
        $this->db->get('tabel_barang')->row();
        $this->db->get('merk')->row();
        $this->db->get('model')->row();
        $this->db->get('warna')->row();
        $this->db->get('serialnumber
        	')->row();
        $this->db->get('gambar')->row();
        $this->db->get('deskripsi')->row();
        $this->db->get('status')->row();
        $this->db->get('lokasi')->row();
    }
    function update($kode,$data){
        $this->db->where('kode_barang',$kode);
        $this->db->update('jenis_barang',$data);
        $this->db->update('merk',$data);
        $this->db->update('model',$data);
        $this->db->update('warna',$data);
        $this->db->update('serialnumber',$data);
        $this->db->update('gambar',$data);
        $this->db->update('deskripsi',$data);
        $this->db->update('status',$data);
        $this->db->update('lokasi',$data);
    }
    function delete($kode){
        $this->db->where('kode_barang',$kode);
        $this->db->delete('tabel_barang');
}
}

?>