<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Front extends CI_Controller
{
	function __construct(){
		parent::__construct();
	}

	function index(){
		$data = array(
			'title' => 'Pusat Data Tugas Akhir dan Kerja Praktek Teknik Informatika' 
			);
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_index');
		$this->load->view('v_mfooter');
	}

	function error(){
		$data = array(
			'title' => 'Error 404' 
			);
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_404');
		$this->load->view('v_mfooter');	
	}

	function login(){
		if ($this->session->userdata('level')=="Dosen") {
			redirect('c_dosen');
		}
		elseif ($this->session->userdata('level')=="Prodi") {
			redirect('prodi');	
		}
		elseif ($this->session->userdata('level')=="Admin") {
				redirect('admin');
		}
		$this->load->view('v_login');
	}

	public function proses_login(){
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$ceklogin = $this->m_model->login($user,$pass);

		if ($ceklogin) {
			foreach ($ceklogin as $row);
			$this->session->set_userdata('username' , $row->username);
			$this->session->set_userdata('level' , $row->level);
			$this->session->set_userdata('nama_user' , $row->nama_user);
			$this->session->set_userdata('id' , $row->id);
			$this->session->set_userdata('konsentrasi' , $row->konsentrasi);
			$this->session->set_userdata('jenis_bimbingan' , $row->jenis_bimbingan);
			$this->session->set_userdata('nid' , $row->nid);
			$this->session->set_userdata('foto' , $row->foto);
			$this->session->set_userdata('password' , $row->password);

			if ($this->session->userdata('level')=="Dosen") {
				redirect('c_dosen');
			}
			elseif ($this->session->userdata('level')=="Prodi") {
				redirect('prodi');	
			}
			elseif ($this->session->userdata('level')=="Admin") {
				redirect('admin');	
			}
			
		}else{
			$data['pesan'] = "Username dan Password tidak sesuai.";
			$this->load->view('v_login',$data);
		}

	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	function formkp(){
		$data = array(
			'title' => 'Formulir Pengajuan Kerja Praktek' 
			);

		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_fkp');
		$this->load->view('v_mfooter');
	}

	function getformkp(){
		$where['npm'] = $this->input->post('ceknpm');
		$data1['cek'] = $this->m_model->caridata($where,'t_datakp','t_pengajuankp');
		$data1['npm'] = $where['npm'];
		$data = array(
			'title' => 'Formulir Pengajuan Kerja Praktek' 
			);

		$where7['status'] = "Aktif";
		$data1['listdosen'] = $this->m_model->getdosen1($where7,'Both','Kerja Praktek')->result();
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_fkp',$data1);
		$this->load->view('v_mfooter');

	}

	function formta(){
		$data = array(
			'title' => 'Formulir Pengajuan Tugas Akhir' 
			);

		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_fta');
		$this->load->view('v_mfooter');
	}

	function getformta(){
		$where['npm'] = $this->input->post('ceknpm');
		$data1['cek'] = $this->m_model->caridata($where,'t_datata','t_pengajuanta');
		$data1['npm'] = $where['npm'];
		$data = array(
			'title' => 'Formulir Pengajuan Tugas Akhir' 
			);
		$where7['status'] = "Aktif";
		$data1['listdosen'] = $this->m_model->getdosen1($where7,'Both','Tugas Akhir')->result();
		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_fta',$data1);
		$this->load->view('v_mfooter');

	}

	function cekform(){
		$data = array(
			'title' => 'Cek Formulir Pengajuan' 
			);
		
		$data1['datakp'] = $this->m_model->ambil_data('t_frontkp')->result();
		$data1['datata'] = $this->m_model->ambil_data('t_frontta')->result();

		$this->load->view('v_mheader.php',$data);
		$this->load->view('v_cek',$data1);
		$this->load->view('v_mfooter');
	}

	function proses_inputkp(){
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$topik_kp = $this->input->post('topik_kp');
		$pemb1 = $this->input->post('pembimbing1');
		$pemb2 = $this->input->post('pembimbing2');
		$nama_perusahaan = $this->input->post('nama_perusahaan');
		$alamat_perusahaan = $this->input->post('alamat_perusahaan');
		$pembimbinglap = $this->input->post('pembimbinglap');
		$jumlah_sks = $this->input->post('jumlah_sks');

		if ($jumlah_sks < 120) {
			$data1['lempar'] = "(Jumlah SKS yang dimasukan kurang dari 120 SKS, anda belum bisa mengajukan kerja praktek)";
			$data = array(
			'title' => 'Formulir Pengajuan Kerja Praktek' 
			);

			$data1['npm'] = $npm;
			$data1['cek'] = false;
			$data1['listdosen'] = $this->m_model->getdosen('Both','Kerja Praktek')->result();
			$this->load->view('v_mheader.php',$data);
			$this->load->view('v_fkp',$data1);
			$this->load->view('v_mfooter');

		}else{
			$pembimbing1 = explode("|", $pemb1);
			$pembimbing2 = explode("|", $pemb2); 

			$config['upload_path'] = './files/pengajuankp';
			$config['allowed_types'] = 'jpg|png|pdf';

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran1');
			$file1 = $this->upload->data();
			$lampiran1 = $file1['file_name'];


			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran2');
			$file2 = $this->upload->data();
			$lampiran2 = $file2['file_name'];


			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran3');
			$file3 = $this->upload->data();
			$lampiran3 = $file3['file_name'];

			if (date('m')<= 7 || date('m')>=1) {
				$tahun1 = date('Y')-1;
				$tahun2 = date('Y');
			}
			else{
				$tahun1 = date('Y');
				$tahun2 = date('Y')+1;	
			}

			$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_kp' => $topik_kp,
				'nid1' => $pembimbing1[0], 
				'nid2' => $pembimbing2[0],
				'pembimbing1' => $pembimbing1[1],
				'pembimbing2' => $pembimbing2[1],
				'nidn1' => $pembimbing1[2], 
				'nidn2' => $pembimbing2[2],
				'nama_perusahaan' => $nama_perusahaan,
				'alamat_perusahaan' => $alamat_perusahaan,
				'pembimbinglap' => $pembimbinglap,
				'lampiran1' => $lampiran1,
				'lampiran2' => $lampiran2,
				'status' => 'Tunggu',
				'tanggal_peng' => date('Y-m-d'),
				'jumlah_sks' => $jumlah_sks,
				'pass' => 'Tunggu',
				'lampiran3' => $lampiran3,
				'tahun_akademik_peng' => $tahun1.'/'.$tahun2
			);

			$data3 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'topik_kp' => $topik_kp,
				'status' => 'Tunggu'
			);

			$this->m_model->input_data($data,'t_pengajuankp');
			$this->m_model->input_data($data3,'t_frontkp');
			redirect('cekform');
		}


	}

	function proses_inputta(){
		$nama_mahasiswa = $this->input->post('nama_mahasiswa');
		$npm = $this->input->post('npm');
		$semester = $this->input->post('semester');
		$alamat = $this->input->post('alamat');
		$telepon = $this->input->post('telepon');
		$email = $this->input->post('email');
		$tempat_lahir = $this->input->post('tempat_lahir');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$konsentrasi = $this->input->post('konsentrasi');
		$topik_ta = $this->input->post('topik_ta');
		$pemb1 = $this->input->post('pembimbing1');
		$pemb2 = $this->input->post('pembimbing2');
		$jumlah_sks = $this->input->post('jumlah_sks');

		if ($jumlah_sks < 139) {
			$data1['lempar'] = "(Jumlah SKS yang dimasukan kurang dari 139 SKS, anda belum bisa mengajukan tugas akhir)";
			$data = array(
			'title' => 'Formulir Pengajuan Tugas Akhir' 
			);
			$data1['npm'] = $npm;
			$data1['cek'] = false;
			$data1['listdosen'] = $this->m_model->getdosen('Both','Tugas Akhir')->result();
			$this->load->view('v_mheader.php',$data);
			$this->load->view('v_fta',$data1);
			$this->load->view('v_mfooter');
			
		}else{
			$pembimbing1 = explode("|", $pemb1);
			$pembimbing2 = explode("|", $pemb2); 

			$config['upload_path'] = './files/pengajuanta';
			$config['allowed_types'] = 'jpg|png|pdf|doc|docx';

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran1');
			$file1 = $this->upload->data();
			$lampiran1 = $file1['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran2');
			$file2 = $this->upload->data();
			$lampiran2 = $file2['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran3');
			$file3 = $this->upload->data();
			$lampiran3 = $file3['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran4');
			$file4 = $this->upload->data();
			$lampiran4 = $file4['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran5');
			$file5 = $this->upload->data();
			$lampiran5 = $file5['file_name'];

			$this->load->library('upload',$config);
			$this->upload->do_upload('lampiran6');
			$file6 = $this->upload->data();
			$lampiran6 = $file6['file_name'];

			if (date('m')<= 7 || date('m')>=1) {
				$tahun1 = date('Y')-1;
				$tahun2 = date('Y');
			}
			else{
				$tahun1 = date('Y');
				$tahun2 = date('Y')+1;	
			}

			$data = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'tanggal_lahir' => $tanggal_lahir,
				'tempat_lahir' => $tempat_lahir,
				'konsentrasi' => $konsentrasi,
				'semester' => $semester,
				'alamat' => $alamat,
				'telepon' => $telepon,
				'email' => $email,
				'topik_ta' => $topik_ta,
				'nid1' => $pembimbing1[0], 
				'nid2' => $pembimbing2[0],
				'pembimbing1' => $pembimbing1[1],
				'pembimbing2' => $pembimbing2[1],
				'nidn1' => $pembimbing1[2],
				'nidn2' => $pembimbing2[2],
				'lampiran1' => $lampiran1,
				'lampiran2' => $lampiran2,
				'lampiran3' => $lampiran3,
				'lampiran4' => $lampiran4,
				'lampiran5' => $lampiran5,
				'status' => 'Tunggu',
				'tanggal_peng' => date('Y-m-d'),
				'jumlah_sks' => $jumlah_sks,
				'pass' => 'Tunggu',
				'lampiran6' => $lampiran6,
				'tahun_akademik_peng' => $tahun1.'/'.$tahun2
			);

			$data3 = array(
				'nama_mahasiswa' => $nama_mahasiswa, 
				'npm' => $npm,
				'topik_ta' => $topik_ta,
				'konsentrasi' => $konsentrasi,
				'status' => 'Tunggu'
			);

			$this->m_model->input_data($data,'t_pengajuanta');
			$this->m_model->input_data($data3,'t_frontta');
			redirect('cekform');
		}

		

	}

	function test(){
		$date = date('m');
		if ($date <= 6) {
			$dt = "semester 1 ";
		}else{
			$dt = "semester 2 ";
		}

		echo $dt;

		$coba = "Diterima";

		if ($coba == "Diterima") {
			echo " Berhasil";
		}else{
			echo "Gagal";
		}

		echo date_indo(date('Y-m-d'));
		echo "<br>";

		if (date('m')<= 6) {
			$tanggal_awal = date('Y')."-02-10";
			$tanggal_akhir = date('Y')."-08-10";
		}
		else{
			$tanggal_awal = date('Y')."-08-10";
			$tanggal_akhir = (date('Y')+1)."-02-10";	
		}

		echo $tanggal_awal."    ".$tanggal_akhir;
		echo "<br>";

		$str = "08920031123|Arjun Yanuar";
		$str1 = explode("|", $str);
		echo $str.'<br><br>';
		echo $str1[1].'<br>';
		echo $str1[0];

		echo "<br>";
		echo md5('prodi');
		echo "<br>";
		echo md5('dosen');

		echo "<br>";

		//$data1['datakp'] = $this->m_model->ambil_dkp($id)->result();
		

		//print_r($data1);

		echo "<br>";

		//print_r($data2);

		echo "<br>";


		echo "<br>";

		$thn = 1999;

		$cthn = date('Y');

		while ($thn <= $cthn) {
			echo ($thn-1).'/'.$thn.'<br>';

			$thn=$thn+1;
		}

		for ($i=0; $i < 2 ; $i++) { 
			echo ($thn-1).'/'.$thn.'<br>';

			$thn=$thn+1;
		}

		echo "<br>";

		$str4 = 'Lol';
		$str5 = ' Loal';
		$strfull = $str4.$str5;

		echo $strfull;

		echo "<br>";

		//copy('./files/pengajuanta/latest.jpg', './files/latest.jpg');
		//rename('./files/latest.jpg', './files/ichking.jpg');

		$nilai = 85;

		if ($nilai >= 90) {
			$nilai_h = "A";
		}
		elseif ($nilai >= 80 && $nilai < 90) {
			$nilai_h = "B";
		}
		elseif ($nilai >= 70 && $nilai < 80) {
			$nilai_h = "C";
		}
		elseif ($nilai >= 60 && $nilai < 70) {
			$nilai_h = "D";
		}
		else{
			$nilai_h = "E";
		}

		echo $nilai_h;
		echo "<br>";

		$semester_akhir = 1230;

		if ($semester_akhir%2) {
			echo "Ganjil";
		}
		else{
			echo "Genap";
		}

		echo "<br>";

		$cobaf = true;

		if (isset($cobaf)) {
			if ($cobaf == true) {
				echo "Assassin";
			}
			else {
				echo "Templar";
			}
		}
		else{
			echo "Sage";
		}

		echo "<br>";
		

		echo "<br>";

		$data19 = $this->m_model->ambil_data('t_datata');
		foreach ($data19->result() as $row)
		{
		        echo $row->npm;
		        echo $row->nama_mahasiswa;
		        echo $row->topik_ta;
		}

		echo "<br>";

		$datec = date_indo("2017-08-12");

		echo 'Bandung, '.$datec;

	}

	function test2(){
		include APPPATH.'third_party/PHPWord/PHPWord.php';
		$PHPWord = new PHPWord(); // New Word Document
	    $section = $PHPWord->createSection(); // New portrait section
	    // Add text elements
	    $section->addText('Hello World!');
	    $section->addTextBreak(2);
	    $section->addText('Mohammad Rifqi Sucahyo.', array('name'=>'Verdana', 'color'=>'006699'));
	    $section->addTextBreak(2);
	    $PHPWord->addFontStyle('rStyle', array('bold'=>true, 'italic'=>true, 'size'=>16));
	    $PHPWord->addParagraphStyle('pStyle', array('align'=>'center', 'spaceAfter'=>100));
	    // Save File / Download (Download dialog, prompt user to save or simply open it)
		$section->addText('Ini Adalah Demo PHPWord untuk CI', 'rStyle', 'pStyle');
		
	    $filename='just_some_random_name.docx'; //save our document as this file name
	    header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document'); //mime type
	    header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
	    header('Cache-Control: max-age=0'); //no cache
	    $objWriter = PHPWord_IOFactory::createWriter($PHPWord, 'Word2007');
	    $objWriter->save('php://output');
	}

	function test3(){
		include APPPATH.'third_party/PHPWord/PHPWord.php';
		$PHPWord = new PHPWord();

		$where = array(
			'id_ta' => '2'
		);

		$data = $this->m_model->ambil_where($where,'t_datata');

		foreach ($data->result() as $ta) {
			$template = $PHPWord->loadTemplate('asset/Template.docx');
			$template->setValue('lol',$ta->nama_mahasiswa);
			$template->setValue('ufufu',$ta->npm);
			$template->setValue('sentolop',$ta->topik_ta);
			$template->save('asset/kartu '.$ta->npm.'.docx');
		}
		

		redirect(base_url().'asset/kartu '.$ta->npm.'.docx');

		unlink('asset/kartu '.$ta->npm.'.docx');
		
	}
	
}