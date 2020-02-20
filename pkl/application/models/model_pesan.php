<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class model_pesan extends CI_Model {

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->query("select DATE_FORMAT(re.tanggal, '%d-%m-%Y') as tanggal, re.waktu_mulai, re.waktu_selesai, re.keterangan, ru.nama_ruangan, u.nama, re.tamu from reservasi re inner join ruangan ru on re.id_ruangan = ru.id_ruangan inner join user u on re.id_user = u.id where status = 'Disetujui' and tanggal = CURDATE()");
        //select DATE_FORMAT(tanggal, '%d-%m-%Y') as tanggal, waktu_mulai, waktu_selesai, keterangan, ruangan, pic,status from reservasi where tanggal = CURDATE() and waktu_selesai >= CURTIME()
 
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

    public function get_fasilitas($id_fasilitas=''){
        if ($id_fasilitas!='') {
            $this->db->where('id_fasilitas', $id_fasilitas);
        }
        $this->db->from('fasilitas f');
        $this->db->join('ruangan r', 'f.id_ruangan = r.id_ruangan');
        return $this->db->get()->result();
    }
	
	public function insert()
	{
        $tanggal       = $this->input->post('tanggal');
        $waktu_mulai   = $this->input->post('waktu_mulai');
        $waktu_selesai = $this->input->post('waktu_selesai');
        $data = array(
                    'tanggal' => $this->input->post('tanggal'),
                    'waktu_mulai' => $this->input->post('waktu_mulai'),
                    'waktu_selesai' => $this->input->post('waktu_selesai'),
                    'keterangan' => $this->input->post('keterangan'),
                    'id_ruangan' => $this->input->post('id_ruangan'),
                    'id_user' => $this->input->post('pic'),
                    'tamu' => $this->input->post('tamu'),
                    'status' => 'Tidak Disetujui' 
            );
          // Insert user
 	      return $this->db->insert('reservasi', $data);
	}
}