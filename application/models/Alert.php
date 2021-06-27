<?php

class Alert extends CI_Model
{
    function notif()
    {
        return $this->db->query("SELECT *,COUNT(IF(status=1 ,1,null))AS alert FROM material_keluar JOIN material ON material_keluar.kd_material=material.kd_material WHERE status=1")->row_array();
    }
    function notifikasi()
    {
        return $this->db->query("SELECT * FROM material_keluar JOIN material ON material_keluar.kd_material=material.kd_material WHERE status=1 ORDER BY kd_keluar DESC")->result();
    }
}
