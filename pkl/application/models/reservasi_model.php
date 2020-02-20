<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reservasi_model extends CI_Model {

	public function get_current_page_records($limit, $start) 
    {
        $this->db->limit($limit, $start);
        $query = $this->db->query("select re.id_reservasi, DATE_FORMAT(re.tanggal, '%d-%m-%Y') as tanggal, re.waktu_mulai, re.waktu_selesai, re.keterangan, ru.nama_ruangan, u.nama, re.tamu, re.status from reservasi re inner join ruangan ru on re.id_ruangan = ru.id_ruangan inner join user u on re.id_user = u.id");
 
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

	public function get_file(){
		$query = $this->db->query('select * from reservasi');
		return $query->result();
		// $query = $this->db->get('reservasi');
		// return $query->result();
	}

	public function get_reservasi($id)
	{
		$query = $this->db->query('SELECT * from reservasi WHERE id_reservasi='.$id);
		return $query->result();
	}

	public function insert()
	{
	
		$data = array(
     		'tanggal' => $this->input->post('tanggal'),
     		'waktu_mulai' => $this->input->post('waktu_mulai'),
     		'waktu_selesai' => $this->input->post('waktu_selesai'),
     		'keterangan' => $this->input->post('keterangan'),
     		'id_ruangan' => $this->input->post('id_ruangan'),
			'id_user' => $this->input->post('pic'),
			'status' => $this->input->post('status')
 	      );
 // Insert user
 	      return $this->db->insert('reservasi', $data);
	}

	public function edit($id){
		if($this->input->post('id_ruangan')=="" && $this->input->post('pic')==""){
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'waktu_mulai' => $this->input->post('waktu_mulai'),
     			'waktu_selesai' => $this->input->post('waktu_selesai'),
				'keterangan' => $this->input->post('keterangan'),
				'status' => $this->input->post('status')
			);	
		} else {
			$data = array(
				'tanggal' => $this->input->post('tanggal'),
				'waktu_mulai' => $this->input->post('waktu_mulai'),
     			'waktu_selesai' => $this->input->post('waktu_selesai'),
				'keterangan' => $this->input->post('keterangan'),
				'id_ruangan' => $this->input->post('id_ruangan'),
				'id_user' => $this->input->post('pic'),
				'status' => $this->input->post('status')
			);
		}
		
		$this->db->where('id_reservasi',$id);
		$this->db->update('reservasi', $data);
	}

	public function hapus($id){
		$query = $this->db->query('DELETE from reservasi WHERE id_reservasi='.$id);
	}

	public function countallreservasi()
	{
		$query = $this->db->query('select count(*) as jumlah from reservasi');
		return $query->result();
	}

}