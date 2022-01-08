<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Model extends CI_Model
{

	function login($user,$pass){

		$this->db->select('*');
		$this->db->from('t_user');
		$this->db->where('username',$user);
		$this->db->where('password',md5($pass));
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows()==1) {
			return $query->result();
		}else{
			return false;
		}
	}

	function input_data($data,$tabel){
		$this->db->insert($tabel,$data);
	}

	function ambil_data($tabel){

		return $this->db->get($tabel);
	}

	function ambil_data_stat($tabel,$where){
		$this->db->limit(4);
		$this->db->order_by('id','desc');
		return $this->db->get_where($tabel,$where);
	}

	function ambil_where($where,$tabel){

		return $this->db->get_where($tabel,$where);
	}

	function update($where,$data,$tabel){
		$this->db->where($where);
		$this->db->update($tabel,$data);
	}

	function hapus($where,$tabel){
		$this->db->where($where);
		$this->db->delete($tabel);
	}

	function getdosen($where1,$where2){
		$jenis_bimbingan = array($where1, $where2);
		$this->db->where_in('jenis_bimbingan',$jenis_bimbingan);
		return $this->db->get('t_dosen');

	}

	function caridata($where,$tabel1,$tabel2){
		$this->db->limit(1);
		$query1 = $this->db->get_where($tabel1,$where);
		$this->db->limit(1);
		$query2 = $this->db->get_where($tabel2,$where);
		if ($query1->num_rows()==1||$query2->num_rows()==1) {
			return true;
		}else{
			return false;
		}
	}

	function ambil_user($where){
		$not = array($where);
		$this->db->where_not_in('id',$not);
		return $this->db->get('t_user');

	}

	function ambil_thn_akademik(){
		return $this->db->query("SELECT DISTINCT tahun_akademik_lulus AS thn FROM t_datata WHERE NOT tahun_akademik_lulus = '' ORDER BY thn ASC");

	}

	function getdosen1($where,$where1,$where2){
		$jenis_bimbingan = array($where1, $where2);
		$this->db->where($where);
		$this->db->where_in('jenis_bimbingan',$jenis_bimbingan);
		return $this->db->get('t_dosen');

	}

	function getstatta2($nid,$stat){
		return $this->db->query('SELECT nid, COUNT(nid) AS jmlh FROM t_datata WHERE nid = '.$nid.' AND NOT status = "'.$stat.'" ORDER BY nid');
	}

	function getstatta1($nid,$stat){
		return $this->db->query('SELECT nid, COUNT(nid) AS jmlh FROM t_datata WHERE nid = '.$nid.' AND status = "'.$stat.'" ORDER BY nid');
	}

	function getstatkp1($nid,$stat){
		return $this->db->query('SELECT nid, COUNT(nid) AS jmlh FROM t_datakp WHERE nid = '.$nid.' AND status = "'.$stat.'" ORDER BY nid');
	}

	function getstatkp2($nid,$stat){
		return $this->db->query('SELECT nid, COUNT(nid) AS jmlh FROM t_datakp WHERE nid = '.$nid.' AND NOT status = "'.$stat.'" ORDER BY nid');
	}

	function hitung($where,$table){
		$this->db->where($where);
		return $this->db->count_all_results($table);
	}

	function hitung_all($table){
		return $this->db->count_all_results($table);
	}

}