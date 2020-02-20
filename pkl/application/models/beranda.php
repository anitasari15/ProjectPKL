<?php
class Beranda extends CI_Model {

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $cari = $this->input->POST('cari', TRUE);
        $query = $this->db->query("SELECT DATE_FORMAT(re.tanggal, '%d-%m-%Y') as tanggal, re.waktu_mulai, re.waktu_selesai, re.keterangan, ru.nama_ruangan, u.nama, re.tamu from reservasi re inner join ruangan ru on re.id_ruangan = ru.id_ruangan inner join user u on re.id_user = u.id where re.id_ruangan like '%$cari%' and status = 'Disetujui' and tanggal = CURDATE()");
 
        if ($query->num_rows() > 0) 
        {
            foreach ($query->result() as $row) 
            {
                $data[] = $row;
            }
             
            return $data;
        }
 
        return false;
    }
     
    public function get_total() 
    {
        return $this->db->count_all("reservasi");
    }
}
?>