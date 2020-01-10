<?php

class Excel_export_model extends CI_Model
{

    function fetch_data()
    {

        $this->db->order_by("kode_barang", "ASC");

        $query = $this->db->get("tabel_barang");

        return $query->result();
    }
}
