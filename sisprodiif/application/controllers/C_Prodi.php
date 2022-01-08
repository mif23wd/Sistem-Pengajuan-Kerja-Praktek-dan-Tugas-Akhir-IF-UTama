<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Prodi extends CI_Controller
{

	function __construct(){
		parent::__construct();

		if ($this->session->userdata('level')!="Prodi") {
			if ($this->session->userdata('level')=="Dosen") {
				redirect('c_dosen');
			}
			elseif ($this->session->userdata('level')=="Admin") {
				redirect('admin');
			}
			else{
				redirect('login');
			}
		}
	}

	function index(){
		$data = array(
			'active_home' => 'active',
			'title' => 'Home - Prodi' 
			);

		$where = array(
			'status' => 'Tunggu',
			'pass' => 'Ya' 
		);

		$where1['status'] = 'Lulus';
		$where2['status'] = 'Tunggu';

		$data1['hitungtal'] = $this->m_model->hitung($where1,'t_datata');
		$data1['hitungkpl'] = $this->m_model->hitung($where1,'t_datakp');
		$data1['hitungtanl'] = $this->m_model->hitung_all('t_datata') - $data1['hitungtal'];
		$data1['hitungkpnl'] = $this->m_model->hitung_all('t_datakp') - $data1['hitungkpl'];
		$data1['datakp'] = $this->m_model->ambil_data_stat('t_pengajuankp',$where)->result();
		$data1['datata'] = $this->m_model->ambil_data_stat('t_pengajuanta',$where)->result();
		$data1['jpengkp'] = $this->m_model->hitung($where2,'t_pengajuankp');
		$data1['jpengta'] = $this->m_model->hitung($where2,'t_pengajuanta');
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_index',$data1);
		$this->load->view('prodi/v_footer');
	}


	function aformkp($id){
		$data = array(
			'title' => 'Menyetujui Pengajuan KP - Prodi' 
			);

		$where['id'] = $id;

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();
		$where7['status'] = "Aktif";
		$data1['listdosen'] = $this->m_model->getdosen1($where7,'Both','Kerja Praktek')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_afkp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function aformta($id){
		$data = array(
			'title' => 'Menyetujui Pengajuan TA - Prodi' 
			);

		$where['id'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();
		$where7['status'] = "Aktif";
		$data1['listdosen'] = $this->m_model->getdosen1($where7,'Both','Tugas Akhir')->result();
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_afta',$data1);
		$this->load->view('prodi/v_footer');
	}


	function datadosen(){
		$data = array(
			'active_ddosen' => 'active',
			'title' => 'Data Dosen - Prodi' 
			);
		$data1['datadosen'] = $this->m_model->ambil_data('t_dosen')->result();
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_ddosen',$data1);
		$this->load->view('prodi/v_footer');
	}

	function listpengajuankp(){
		$data = array(
			'active_list_peng' => 'active',
			'active_kp' => 'active',
			'title' => 'List Pengajuan Kerja Praktek - Prodi' 
			);

		$where = array(
			'pass' => 'Ya',
			'status' => 'Tunggu'
		);

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_pengkp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function listpengajuanta(){
		$data = array(
			'active_list_peng' => 'active',
			'active_ta' => 'active',
			'title' => 'List Pengajuan Tugas Akhir - Prodi' 
			);

		$where = array(
			'pass' => 'Ya' 
		);

		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_pengta',$data1);
		$this->load->view('prodi/v_footer');
	}

	function listkp(){
		$data = array(
			'active_list_takp' => 'active',
			'active_kp' => 'active',
			'title' => 'List Kerja Praktek - Prodi' 
			);

		$data1['datakp'] = $this->m_model->ambil_data('t_datakp')->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_kp',$data1);
		$this->load->view('prodi/v_footer');
	}

	function listta(){
		$data = array(
			'active_list_takp' => 'active',
			'active_ta' => 'active',
			'title' => 'List Tugas Akhir - Prodi' 
			);

		$data1['datata'] = $this->m_model->ambil_data('t_datata')->result();
		$data1['tahun'] = $this->m_model->ambil_thn_akademik()->result();

		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_list_ta',$data1);
		$this->load->view('prodi/v_footer');
	}

	function setting(){
		$data = array(
			'active_setting' => 'active',
			'title' => 'Setting - Prodi' 
			);
		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_setting');
		$this->load->view('prodi/v_footer');
	}

	function approvekp(){

		$id = $this->input->post('id');
		$status = $this->input->post('status');

		

		if ($status == "Diterima") {
			

			$data = array(
						'status' => $status, 
					);

			$where['id'] = $id;

			$this->m_model->update($where,$data,'t_pengajuankp');

			$nama_mahasiswa = $this->input->post('nama_mahasiswa');
			$npm = $this->input->post('npm');
			$semester = $this->input->post('semester');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$topik_kp = $this->input->post('topik_kp');
			$pembimbing_kp = $this->input->post('pembimbing');
			$tanggal_peng = $this->input->post('tanggal_peng');
			$nama_perusahaan = $this->input->post('nama_perusahaan');
			$alamat_perusahaan = $this->input->post('alamat_perusahaan');
			$pembimbinglap = $this->input->post('pembimbinglap');
			$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
			$lampiran3 = $this->input->post('lampiran3');

			if ($pembimbing_kp == "Dosen Lain") {
				$pembimbing_kp = $this->input->post('pembimbing_alt');
			}

			$pemb = explode("|", $pembimbing_kp);

			$nid = $pemb[0];
			$pembimbing = $pemb[1];
			$nidn = $pemb[2];

			copy('./files/pengajuankp/'.$lampiran3, './files/kp/'.$lampiran3);
			 

			if (date('m')<= 7 || date('m')>=1) {
				$tanggal_awal = date('Y')."-02-10";
				$tanggal_akhir = date('Y')."-08-10";
			}
			else{
				$tanggal_awal = date('Y')."-08-10";
				$tanggal_akhir = (date('Y')+1)."-02-10";
			}

			$data1 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_kp' => $topik_kp,
				'nid' => $nid,
				'pembimbing_kp' => $pembimbing,
				'nidn' => $nidn,
				'nama_perusahaan' => $nama_perusahaan,
				'alamat_perusahaan' => $alamat_perusahaan,
				'pembimbinglap' => $pembimbinglap,
				'tanggal_peng' => $tanggal_peng,
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir,
				'status' => "Dalam Bimbingan",
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'lampiran_foto' => $lampiran3
			);

			$this->m_model->input_data($data1,'t_datakp');
			$data2 = array('status' => 'Diterima' );
			$this->m_model->update($where,$data2,'t_frontkp');
			redirect('prodi/listkp');
		}else{

			$lampiran1 = $this->input->post('lampiran1');
			$lampiran2 = $this->input->post('lampiran2');
			$lampiran3 = $this->input->post('lampiran3');
			unlink('files/pengajuankp/'.$lampiran1);
			unlink('files/pengajuankp/'.$lampiran2);
			unlink('files/pengajuankp/'.$lampiran3);

			$where['id'] = $id;
			
			$this->m_model->hapus($where,'t_pengajuankp');
			$data2 = array('status' => 'Ditolak' );
			$where2['npm'] = $this->input->post('npm');
			$this->m_model->update($where2,$data2,'t_frontkp');

			redirect('prodi/listpengajuankp');
		}
	}

	function approveta(){

		$id = $this->input->post('id');
		$status = $this->input->post('status');

		$data = array(
			'status' => $status, 
		);

		$where['id'] = $id;

		$this->m_model->update($where,$data,'t_pengajuanta');

		if ($status == "Diterima") {
			

			$nama_mahasiswa = $this->input->post('nama_mahasiswa');
			$npm = $this->input->post('npm');
			$semester = $this->input->post('semester');
			$alamat = $this->input->post('alamat');
			$telepon = $this->input->post('telepon');
			$email = $this->input->post('email');
			$topik_ta = $this->input->post('topik_ta');
			$pembimbing_ta = $this->input->post('pembimbing');
			$tanggal_peng = $this->input->post('tanggal_peng');
			$tempat_lahir = $this->input->post('tempat_lahir');
			$tanggal_lahir = $this->input->post('tanggal_lahir');
			$konsentrasi = $this->input->post('konsentrasi');
			$tahun_akademik_peng = $this->input->post('tahun_akademik_peng');
			$lampiran6 = $this->input->post('lampiran6');
			$lampiran3 = $this->input->post('lampiran3');

			if ($pembimbing_ta == "Dosen Lain") {
				$pembimbing_ta = $this->input->post('pembimbing_alt');
			}

			$pemb = explode("|", $pembimbing_ta);

			$nid = $pemb[0];
			$pembimbing = $pemb[1];
			$nidn = $pemb[2];

			copy('./files/pengajuanta/'.$lampiran6, './files/ta/'.$lampiran6);
			 

			if (date('m')<= 7 || date('m')>=1) {
				$tanggal_awal = date('Y')."-02-10";
				$tanggal_akhir = date('Y')."-08-10";
			}
			else{
				$tanggal_awal = date('Y')."-08-10";
				$tanggal_akhir = (date('Y')+1)."-02-10";
			}

			$data1 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_ta' => $topik_ta,
				'nid' => $nid,
				'pembimbing_ta' => $pembimbing,
				'nidn' => $nidn,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'konsentrasi' => $konsentrasi,
				'tanggal_peng' => $tanggal_peng,
				'tanggal_awal' => $tanggal_awal,
				'tanggal_akhir' => $tanggal_akhir,
				'status' => "Dalam Bimbingan",
				'tahun_akademik_peng' => $tahun_akademik_peng,
				'lampiran_foto' => $lampiran6,
				'lampiran_proposal' => $lampiran3
			);
			$data2 = array('status' => 'Diterima' );
			$this->m_model->update($where,$data2,'t_frontta');
			$this->m_model->input_data($data1,'t_datata');

			redirect('prodi/listta');
		}else{
			$lampiran1 = $this->input->post('lampiran1');
			$lampiran2 = $this->input->post('lampiran2');
			$lampiran3 = $this->input->post('lampiran3');
			$lampiran4 = $this->input->post('lampiran4');
			$lampiran5 = $this->input->post('lampiran5');
			$lampiran6 = $this->input->post('lampiran6');
			unlink('files/pengajuanta/'.$lampiran1);
			unlink('files/pengajuanta/'.$lampiran2);
			unlink('files/pengajuanta/'.$lampiran3);
			unlink('files/pengajuanta/'.$lampiran4);
			unlink('files/pengajuanta/'.$lampiran5);
			unlink('files/pengajuanta/'.$lampiran6);

			$where['id'] = $id;
			$this->m_model->hapus($where,'t_pengajuanta');

			$data2 = array('status' => 'Ditolak' );
			$where2['npm'] = $this->input->post('npm');
			$this->m_model->update($where2,$data2,'t_frontta');
			redirect('prodi/listpengajuanta');
		}
	}


	function viewkp($id){
		$data = array(
			'title' => 'Lihat Data KP ID '.$id.' - Prodi' 
			);

		$where['id_kp'] = $id;
		$data1['datakp'] = $this->m_model->ambil_where($where,'t_datakp')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vkp',$data1);
		$this->load->view('prodi/v_footer');
	}





	function viewpkp($id){
		$data = array(
			'title' => 'Lihat Data Pengajuan KP ID '.$id.' - Prodi' 
			);

		$where['id'] = $id;

		$data1['datakp'] = $this->m_model->ambil_where($where,'t_pengajuankp')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vpkp',$data1);
		$this->load->view('prodi/v_footer');
	}



	function viewpta($id){
		$data = array(
			'title' => 'Lihat Data Pengajuan TA ID '.$id.' - Prodi' 
			);

		$where['id'] = $id;

		$data1['datata'] = $this->m_model->ambil_where($where,'t_pengajuanta')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vpta',$data1);
		$this->load->view('prodi/v_footer');
	}

	function viewta($id){
		$data = array(
			'title' => 'Lihat Data TA ID '.$id.' - Prodi' 
			);

		
		$where['id_ta'] = $id;
		$data1['datata'] = $this->m_model->ambil_where($where,'t_datata')->result();


		$this->load->view('prodi/v_header.php',$data);
		$this->load->view('prodi/v_vta',$data1);
		$this->load->view('prodi/v_footer');
	}

	function setting_akun(){
		$passwordlama = $this->input->post('passwordlama');
		$passwordbaru = $this->input->post('passwordbaru');
		$confirmpasswordbaru = $this->input->post('confirmpasswordbaru');
		$password_lm = $this->input->post('password_lm');
		$foto = $_FILES['foto']['name'];
		$foto_lm = $this->input->post('foto_lm');
		$id = $this->input->post('id');

		if ($passwordbaru!=''||$passwordlama!=''||$confirmpasswordbaru!='') {
			if ($password_lm==md5($passwordlama)) {
				if ($passwordbaru==$confirmpasswordbaru) {
					$data2['password'] = md5($passwordbaru);
					if ($foto!='') {
						unlink('./files/user/'.$foto_lm);

						$config['upload_path'] = './files/user';
						$config['allowed_types'] = 'jpg|png';

						$this->load->library('upload',$config);
						$this->upload->do_upload('foto');
						$file = $this->upload->data();
						$foto = $file['file_name'];
					}else{
						$foto = $foto_lm;
						
					}


					$data2['foto'] = $foto;
					$where['id'] = $id;
					$this->m_model->update($where,$data2,'t_user');

					redirect('prodi/setting');

				}else{
					$data1['notif'] = "Ganti password gagal";
					$data = array(
						'active_setting' => 'active',
						'title' => 'Setting - Admin' 
						);
					$this->load->view('prodi/v_header.php',$data);
					$this->load->view('prodi/v_setting',$data1);
					$this->load->view('prodi/v_footer');
				}
			}else{
				$data1['notif'] = "Ganti password gagal";
				$data = array(
					'active_setting' => 'active',
					'title' => 'Setting - Admin' 
					);
				$this->load->view('prodi/v_header.php',$data);
				$this->load->view('prodi/v_setting',$data1);
				$this->load->view('prodi/v_footer');
			}
		}

		else{
			if ($foto!='') {
				unlink('./files/user/'.$foto_lm);

				$config['upload_path'] = './files/user';
				$config['allowed_types'] = 'jpg|png';

				$this->load->library('upload',$config);
				$this->upload->do_upload('foto');
				$file = $this->upload->data();
				$foto = $file['file_name'];
			}else{
				$foto = $foto_lm;
				
			}


			$data2['foto'] = $foto;
			$where['id'] = $id;
			$this->m_model->update($where,$data2,'t_user');

			redirect('prodi/setting');
		}
		
	}

	function exportxlsta(){
		

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Prodi IF UTama')
							   ->setLastModifiedBy('Prodi IF UTama')
							   ->setTitle("Data Tugas Akhir")
							   ->setSubject("Dosen")
							   ->setDescription("Daftar Tugas Akhir Prodi IF Utama")
							   ->setKeywords("Data Tugas Akhir");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Mahasiswa"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "NPM/NIM"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "TTL");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Alamat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Telepon");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Email");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Konsentrasi");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Topik/Judul TA");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Pembimbing TA");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "NID");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "NIDN");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Tgl Pengajuan");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Tahun Akademik Pengajuan");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Tgl Awal Bimbingan");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Tgl Akhir Bimbingan");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "Semester");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "Tgl Perpanjang Bimbingan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "Batas Waktu");
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "IPK");
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "Penguji 1");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "Penguji 2");
		$excel->setActiveSheetIndex(0)->setCellValue('X1', "Tgl Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('Y1', "Tempat Sidang"); 
		$excel->setActiveSheetIndex(0)->setCellValue('Z1', "Waktu Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AA1', "Topik/Judul TA Sebelumnya");
		$excel->setActiveSheetIndex(0)->setCellValue('AB1', "Tgl Yudisium");
		$excel->setActiveSheetIndex(0)->setCellValue('AC1', "Tgl Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AD1', "Waktu Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AE1', "Status Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AF1', "Tempat Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AG1', "Penguji Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AH1', "Semester Akademik Lulus");
		$excel->setActiveSheetIndex(0)->setCellValue('AI1', "Tahun Akademik Lulus");
		$excel->setActiveSheetIndex(0)->setCellValue('AJ1', "Keterangan");
		$excel->setActiveSheetIndex(0)->setCellValue('AK1', "ID");

		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AD1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AE1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AF1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AG1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AH1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AI1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AJ1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AK1')->applyFromArray($style_col);

		$data = $this->m_model->ambil_data('t_datata');

		$no = 1;
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach($data->result() as $ta){ // Lakukan looping pada variabel siswa

			if ($ta->tanggal_panjang != null) {
				$tanggal_panjang =  date_indo($ta->tanggal_panjang);
			}else{
				$tanggal_panjang = '';
			}

			if ($ta->tanggal_sidang != null) {
				$tanggal_sidang =  date_indo($ta->tanggal_sidang);
			}else{
				$tanggal_sidang = '';
			}

			if ($ta->tanggal_yudisium != null) {
				$tanggal_yudisium =  date_indo($ta->tanggal_yudisium);
			}else{
				$tanggal_yudisium = '';
			}

			if ($ta->tanggal_pra_sid != null) {
				$tanggal_pra_sid =  date_indo($ta->tanggal_pra_sid);
			}else{
				$tanggal_pra_sid = '';
			}

			if ($ta->tanggal_lahir != null) {
				$tanggal_lahir =  date_indo($ta->tanggal_lahir);
			}else{
				$tanggal_lahir = '';
			}

			if ($ta->tanggal_peng != null) {
				$tanggal_peng =  date_indo($ta->tanggal_peng);
			}else{
				$tanggal_peng = '';
			}

			if ($ta->tanggal_awal != null) {
				$tanggal_awal =  date_indo($ta->tanggal_awal);
			}else{
				$tanggal_awal = '';
			}

			if ($ta->tanggal_akhir != null) {
				$tanggal_akhir =  date_indo($ta->tanggal_akhir);
			}else{
				$tanggal_akhir = '';
			}

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $ta->nama_mahasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $ta->npm);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $ta->tempat_lahir.', '.$tanggal_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $ta->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $ta->telepon);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $ta->email);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $ta->konsentrasi);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $ta->topik_ta);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $ta->pembimbing_ta);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $ta->nid);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $ta->nidn);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $tanggal_peng);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $ta->tahun_akademik_peng);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $tanggal_awal);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $tanggal_akhir);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $ta->semester);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $ta->status);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $tanggal_panjang);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $ta->batas_waktu);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $ta->ipk);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $ta->penguji1);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $ta->penguji2);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $tanggal_sidang);
			$excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $ta->tempat_sidang);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $ta->waktu_sidang);
			$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $ta->topik_ta_sebelum);
			$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $tanggal_yudisium);
			$excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $tanggal_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $ta->waktu_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $ta->status_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $ta->tempat_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $ta->penguji_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $ta->semesterh_lulus);
			$excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $ta->tahun_akademik_lulus);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $ta->keterangan);
			$excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $ta->id_ta);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AH'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AJ'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("List Tugas Akhir");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="List Tugas Akhir Terbaru.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}

	function exportxlstasort(){
		

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Prodi IF UTama')
							   ->setLastModifiedBy('Prodi IF UTama')
							   ->setTitle("Data Tugas Akhir")
							   ->setSubject("Dosen")
							   ->setDescription("Daftar Tugas Akhir Prodi IF Utama")
							   ->setKeywords("Data Tugas Akhir");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Mahasiswa"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "NPM/NIM"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "TTL");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Alamat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Telepon");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Email");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Konsentrasi");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Topik/Judul TA");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "Pembimbing TA");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "NID");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "NIDN");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Tgl Pengajuan");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Tahun Akademik Pengajuan");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Tgl Awal Bimbingan");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Tgl Akhir Bimbingan");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "Semester");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "Tgl Perpanjang Bimbingan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "Batas Waktu");
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "IPK");
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "Penguji 1");
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "Penguji 2");
		$excel->setActiveSheetIndex(0)->setCellValue('X1', "Tgl Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('Y1', "Tempat Sidang"); 
		$excel->setActiveSheetIndex(0)->setCellValue('Z1', "Waktu Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AA1', "Topik/Judul TA Sebelumnya");
		$excel->setActiveSheetIndex(0)->setCellValue('AB1', "Tgl Yudisium");
		$excel->setActiveSheetIndex(0)->setCellValue('AC1', "Tgl Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AD1', "Waktu Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AE1', "Status Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AF1', "Tempat Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AG1', "Penguji Pra Sidang");
		$excel->setActiveSheetIndex(0)->setCellValue('AH1', "Semester Akademik Lulus");
		$excel->setActiveSheetIndex(0)->setCellValue('AI1', "Tahun Akademik Lulus");
		$excel->setActiveSheetIndex(0)->setCellValue('AJ1', "Keterangan");
		$excel->setActiveSheetIndex(0)->setCellValue('AK1', "ID");

		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AD1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AE1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AF1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AG1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AH1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AI1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AJ1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AK1')->applyFromArray($style_col);

		$semesterh = $this->input->post('semesterh');
		$tahun_akademik = $this->input->post('tahun_akademik');

		$where = array(
			'semesterh_lulus' => $semesterh,
			'tahun_akademik_lulus' => $tahun_akademik 
		);

		$data = $this->m_model->ambil_where($where,'t_datata');

		$no = 1;
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach($data->result() as $ta){ // Lakukan looping pada variabel siswa

			if ($ta->tanggal_panjang != null) {
				$tanggal_panjang =  date_indo($ta->tanggal_panjang);
			}else{
				$tanggal_panjang = '';
			}

			if ($ta->tanggal_sidang != null) {
				$tanggal_sidang =  date_indo($ta->tanggal_sidang);
			}else{
				$tanggal_sidang = '';
			}

			if ($ta->tanggal_yudisium != null) {
				$tanggal_yudisium =  date_indo($ta->tanggal_yudisium);
			}else{
				$tanggal_yudisium = '';
			}

			if ($ta->tanggal_pra_sid != null) {
				$tanggal_pra_sid =  date_indo($ta->tanggal_pra_sid);
			}else{
				$tanggal_pra_sid = '';
			}

			if ($ta->tanggal_lahir != null) {
				$tanggal_lahir =  date_indo($ta->tanggal_lahir);
			}else{
				$tanggal_lahir = '';
			}

			if ($ta->tanggal_peng != null) {
				$tanggal_peng =  date_indo($ta->tanggal_peng);
			}else{
				$tanggal_peng = '';
			}

			if ($ta->tanggal_awal != null) {
				$tanggal_awal =  date_indo($ta->tanggal_awal);
			}else{
				$tanggal_awal = '';
			}

			if ($ta->tanggal_akhir != null) {
				$tanggal_akhir =  date_indo($ta->tanggal_akhir);
			}else{
				$tanggal_akhir = '';
			}

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $ta->nama_mahasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $ta->npm);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $ta->tempat_lahir.', '.$tanggal_lahir);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $ta->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $ta->telepon);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $ta->email);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $ta->konsentrasi);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $ta->topik_ta);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $ta->pembimbing_ta);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $ta->nid);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $ta->nidn);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $tanggal_peng);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $ta->tahun_akademik_peng);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $tanggal_awal);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $tanggal_akhir);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $ta->semester);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $ta->status);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $tanggal_panjang);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $ta->batas_waktu);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $ta->ipk);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $ta->penguji1);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $ta->penguji2);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $tanggal_sidang);
			$excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $ta->tempat_sidang);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $ta->waktu_sidang);
			$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $ta->topik_ta_sebelum);
			$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $tanggal_yudisium);
			$excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $tanggal_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AD'.$numrow, $ta->waktu_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AE'.$numrow, $ta->status_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AF'.$numrow, $ta->tempat_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AG'.$numrow, $ta->penguji_pra_sid);
			$excel->setActiveSheetIndex(0)->setCellValue('AH'.$numrow, $ta->semesterh_lulus);
			$excel->setActiveSheetIndex(0)->setCellValue('AI'.$numrow, $ta->tahun_akademik_lulus);
			$excel->setActiveSheetIndex(0)->setCellValue('AJ'.$numrow, $ta->keterangan);
			$excel->setActiveSheetIndex(0)->setCellValue('AK'.$numrow, $ta->id_ta);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AD'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AE'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AF'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AG'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AH'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AI'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AJ'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AK'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AE')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AF')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AG')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AH')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AI')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AJ')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AK')->setAutoSize(true); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("List Tugas Akhir");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="List Tugas Akhir Terbaru sort.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

		redirect('admin/listta');

	}

	function exportxlskp(){
		

		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		
		// Panggil class PHPExcel nya
		$excel = new PHPExcel();

		// Settingan awal fil excel
		$excel->getProperties()->setCreator('Prodi IF UTama')
							   ->setLastModifiedBy('Prodi IF UTama')
							   ->setTitle("Data Tugas Akhir")
							   ->setSubject("Dosen")
							   ->setDescription("Daftar Tugas Akhir Prodi IF Utama")
							   ->setKeywords("Data Tugas Akhir");

		// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
		$style_col = array(
			'font' => array('bold' => true), // Set font nya jadi bold
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);

		// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
			)
		);


		// Buat header tabel nya pada baris ke 3
		$excel->setActiveSheetIndex(0)->setCellValue('A1', "No"); 
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Nama Mahasiswa"); 
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "NPM/NIM"); 
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Alamat"); 
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Telepon");
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Email");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Semester");
		$excel->setActiveSheetIndex(0)->setCellValue('H1', "Topik/Judul KP");
		$excel->setActiveSheetIndex(0)->setCellValue('I1', "Pembimbing KP");
		$excel->setActiveSheetIndex(0)->setCellValue('J1', "NID");
		$excel->setActiveSheetIndex(0)->setCellValue('K1', "NIDN");
		$excel->setActiveSheetIndex(0)->setCellValue('L1', "Nama Perusahaan");
		$excel->setActiveSheetIndex(0)->setCellValue('M1', "Alamat Perusahaan");
		$excel->setActiveSheetIndex(0)->setCellValue('N1', "Pembimbing Lapangan");
		$excel->setActiveSheetIndex(0)->setCellValue('O1', "Tgl Pengajuan");
		$excel->setActiveSheetIndex(0)->setCellValue('P1', "Tahun Akademik Pengajuan");
		$excel->setActiveSheetIndex(0)->setCellValue('Q1', "Tgl Awal Bimbingan");
		$excel->setActiveSheetIndex(0)->setCellValue('R1', "Tgl Akhir Bimbingan");
		$excel->setActiveSheetIndex(0)->setCellValue('S1', "Status"); 
		$excel->setActiveSheetIndex(0)->setCellValue('T1', "Status Selesai"); 
		$excel->setActiveSheetIndex(0)->setCellValue('U1', "Semester Selesai");
		$excel->setActiveSheetIndex(0)->setCellValue('V1', "Nilai"); 
		$excel->setActiveSheetIndex(0)->setCellValue('W1', "Nilai (Angka)");
		$excel->setActiveSheetIndex(0)->setCellValue('X1', "Tanggal Penyerahan Laporan"); 
		$excel->setActiveSheetIndex(0)->setCellValue('Y1', "Topik/Judul KP Sebelumnya");
		$excel->setActiveSheetIndex(0)->setCellValue('Z1', "Perusahaan Sebelum");
		$excel->setActiveSheetIndex(0)->setCellValue('AA1', "Semester Akademik Lulus");
		$excel->setActiveSheetIndex(0)->setCellValue('AB1', "Tahun Akademik Lulus");
		$excel->setActiveSheetIndex(0)->setCellValue('AC1', "ID");

		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('H1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('I1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('J1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('K1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('L1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('M1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('N1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('O1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('P1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Q1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('R1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('S1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('T1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('U1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('V1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('W1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('X1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Y1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('Z1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AA1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AB1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('AC1')->applyFromArray($style_col);

		$data = $this->m_model->ambil_data('t_datakp');

		$no = 1;
		$numrow = 2; // Set baris pertama untuk isi tabel adalah baris ke 2
		foreach($data->result() as $kp){ // Lakukan looping pada variabel siswa			

			if ($kp->tanggal_peng != null) {
				$tanggal_peng =  date_indo($kp->tanggal_peng);
			}else{
				$tanggal_peng = '';
			}

			if ($kp->tanggal_awal != null) {
				$tanggal_awal =  date_indo($kp->tanggal_awal);
			}else{
				$tanggal_awal = '';
			}

			if ($kp->tanggal_akhir != null) {
				$tanggal_akhir =  date_indo($kp->tanggal_akhir);
			}else{
				$tanggal_akhir = '';
			}

			if ($kp->tanggal_laporan != null) {
				$tanggal_laporan =  date_indo($kp->tanggal_laporan);
			}else{
				$tanggal_laporan = '';
			}

			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $kp->nama_mahasiswa);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $kp->npm);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $kp->alamat);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $kp->telepon);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $kp->email);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $kp->semester);
			$excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $kp->topik_kp);
			$excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $kp->pembimbing_kp);
			$excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $kp->nid);
			$excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $kp->nidn);
			$excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $kp->nama_perusahaan);
			$excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $kp->alamat_perusahaan);
			$excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $kp->pembimbinglap);
			$excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $tanggal_peng);
			$excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $kp->tahun_akademik_peng);
			$excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $tanggal_awal);
			$excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $tanggal_akhir);
			$excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $kp->status);
			$excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $kp->status_selesai);
			$excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $kp->semester_akhir);
			$excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $kp->nilaih);
			$excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $kp->nilai);
			$excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $tanggal_laporan);
			$excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $kp->topik_kp_sebelum);
			$excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $kp->perusahaan_sebelum);
			$excel->setActiveSheetIndex(0)->setCellValue('AA'.$numrow, $kp->semesterh_lulus);
			$excel->setActiveSheetIndex(0)->setCellValue('AB'.$numrow, $kp->tahun_akademik_lulus);
			$excel->setActiveSheetIndex(0)->setCellValue('AC'.$numrow, $kp->id_kp);

			// Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AA'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AB'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('AC'.$numrow)->applyFromArray($style_row);

			$no++;
			$numrow++; // Tambah 1 setiap kali looping
		}

		// Set width kolom
		$excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('I')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('J')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('K')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('L')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('M')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('N')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('O')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('P')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('R')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('S')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('T')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('U')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('V')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('W')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('X')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true); 
		$excel->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true); 
		
		// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
		$excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

		// Set orientasi kertas jadi LANDSCAPE
		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		// Set judul file excel nya
		$excel->getActiveSheet(0)->setTitle("List Kerja Praktek");
		$excel->setActiveSheetIndex(0);

		// Proses file excel
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="List Kerja Praktek Terbaru.xlsx"'); // Set nama file excel nya
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');

	}


}