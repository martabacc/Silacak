<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for handling publikasi_dosen module
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Report extends CI_Controller {

	/*
	 * constructor class
	 */
	public function __construct() {
		parent::__construct();

		//set module, enable for authentication
		//$this->auth->set_default_module('publikasi_dosen');
		//enable dibawah ini jika divalidasi semua
		//$this->auth->validate(TRUE);
		//enable dibawah ini jika divalidasi user telah login saja
		//$this->auth->validate(TRUE, TRUE);

		//load this page model
		$this->load->model('m_publikasi_dosen');
		$this->load->model('m_log_sistem');

		//load foregin lang if exist
		$this->lang->load('module/detil_kode_publikasi');
		$this->lang->load('module/anggota');
		$this->lang->load('module/pegawai');
		$this->lang->load('module/report');

		//load lang, place this module after foreign lang, so module_ not overriden by foreign lang
		$this->lang->load('module/publikasi_dosen');
  	}

	/*
	 * method penarikan_data
	 * controller untuk menampilkan laporan jumlah penarikan data per bulan
	 *
	 * @author: Rizki
	 * @access: public
	 * @return: no return, view a page
	 */
	public function penarikan_data($year = false, $is_download = false){
		//$this->auth->set_access('view');
		$this->auth->validate(TRUE, TRUE);

		//set informasi halaman
		$this->site_info->set_page_title($this->lang->line('report_penarikan'), '');
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('report_penarikan'));
		//add menu highlight
		$this->site_info->set_current_module('report');
		$this->site_info->set_current_submodule('report_penarikan_data');

		//add page javascript
		$this->asset_library->add_js('js/reports/penarikan_data.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.resize.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.categories.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.axislabels.js');
		
        
        $data = array();
		if($year === false) $year = date("Y");
		$data['result'] = $this->m_log_sistem->report_by_year($year);
		// var_dump($this->db->last_query());exit();
		// for($i = 1; $i <=12; $i++){
		// 	if($result[$i])
		// }
		$data['year'] = $year;

		if($is_download == false){
			//load view
			$this->load->view('base/header');
			$this->load->view('report/penarikan_data', $data);
			$this->load->view('base/footer');
		}else{
			$title = array("No", "Bulan", "Tahun", "Jumlah Penarikan Data");
			$result = array();
			foreach ($data['result'] as $key => $value) {
				$row = array();
				$row[] = $key + 1;
				foreach ($value as $key2 => $value2) {
					if($key2 == 'month')
						$row[] = get_month_name($value2);
					else
						$row[] = $value2;
				}
				$result[] = $row;
			}

			$datenow = date("d-m-Y");
			download_excel("Laporan Penarikan Data per Bulan Tahun $year - $datenow" , $title, $result);
		}
	}

	/*
	 * method penarikan_data
	 * controller untuk menampilkan laporan jumlah penarikan data per tahun
	 * dengan filter fakultas/jurusan
	 *
	 * @author: Rizki
	 * @access: public
	 * @return: no return, view a page
	 */
	public function penarikan_data_tahunan($fakultas = false, $jurusan = false, $is_download = false){
		//$this->auth->set_access('view');
		$this->auth->validate(TRUE, TRUE);
		$this->load->model('m_fakultas');
		$this->load->model('m_jurusan');

		//set informasi halaman
		$this->site_info->set_page_title($this->lang->line('report_penarikan_yearly'), '');
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('report_penarikan_yearly'));
		//add menu highlight
		$this->site_info->set_current_module('report');
		$this->site_info->set_current_submodule('report_penarikan_data_tahunan');

		//add page javascript
		$this->asset_library->add_js('js/reports/penarikan_data_tahunan.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.resize.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.categories.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.axislabels.js');
		
        
        $data = array();
        $year = false;
		if($year === false) $year = date("Y");
		$data['result'] = $this->m_log_sistem->report_yearly_by_unit($fakultas, $jurusan);
		$data['fakultas'] = $fakultas == 0 ? '' : $fakultas;
		$data['filter_fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id)=1 AND fak_singkatan is not null", "fak_singkatan asc");
		$data['jurusan'] = $jurusan == 0 ? '' : $jurusan;

		if($jurusan && !$fakultas){
			$data['fakultas'] = $this->m_jurusan->get_by_column($jurusan)->jur_fakultas;
		}

		$data['filter_jurusan']	 = $this->m_jurusan->get("jur_nama_inggris is not NULL", "jur_id asc");
		$data['list_jurusan'] = json_encode($data['filter_jurusan']);
		$data['year'] = $year;
		//load view
		if($is_download == false){
			$this->load->view('base/header');
			$this->load->view('report/penarikan_data_tahunan', $data);
			$this->load->view('base/footer');
		}else{
			$title = array("No", "Tahun", "Jumlah Penarikan Data");
			$result = array();
			foreach ($data['result'] as $key => $value) {
				$row = array();
				$row[] = $key + 1;
				foreach ($value as $key2 => $value2) {
					$row[] = $value2;
				}
				$result[] = $row;
			}
			
			$filter = "";
			if($jurusan != 0){
				$jur = $this->m_jurusan->get_by_column($jurusan);
				$filter = " Jurusan " . $jur->jur_nama_indonesia;
			}else if($fakultas != 0){
				$fak = $this->m_fakultas->get_by_column($fakultas);
				$filter = " " . $fak->fak_nama_indonesia;
			}
		$datenow = date("d-m-Y");
			download_excel("Laporan Penarikan Data per Tahun - $datenow".$filter, $title, $result);
		}
	}

	public function unit($fakultas = false, $tahun_mulai = -1, $tahun_selesai = -1, $is_download=false){

		error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

		//$this->auth->set_access('view');
		$this->auth->validate(TRUE, TRUE);
		$this->load->model('m_fakultas');
		//set informasi halaman
		$this->site_info->set_page_title($this->lang->line('report_unit'), '');
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('report_unit'));
		//add menu highlight
		$this->site_info->set_current_module('report');
		$this->site_info->set_current_submodule('report_unit');

		//add page javascript
		$this->asset_library->add_js('js/reports/unit.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.resize.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.categories.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.axislabels.js');
		
        
        $data = array();
        $result[] = array();
        $result['all'][] = array();
        $result['jurnal'][] = array();
        $result['seminar'][] = array();
        $result['unknown'][] = array();

        $data['all'] = $this->m_publikasi_dosen->report_by_unit($fakultas, false, $tahun_mulai,$tahun_selesai);
        foreach([JIT,JITT,JNT,JNTT] as $key=>$value){
        	$temp = $this->m_publikasi_dosen->report_by_unit($fakultas, $value ,$tahun_mulai,$tahun_selesai);	

        	if($key == 0){
        		$data['result_jurnal'] = $temp;
        	}
        	else{
        		foreach($temp as $key2=>$x){
        			$data['result_jurnal'][$key2]->jumlah +=  $x->jumlah;
        		}
        	}
        }

        $arrayOfNewClassifier = [
        		SNL => 'SNL',
        		JIT => 'JIT',
        		SIT => 'SIT',
        		SITT => 'SITT',
        		JITT => 'JITT',
        		JNT => 'JNT',
        		JNTT => 'JNTT',
        		L => 'Lainnya'
        	];
        $data['newClassifier'] = [];
        $data['classifier'] = $arrayOfNewClassifier;

        foreach($arrayOfNewClassifier as $key=>$ac){
        	$data['newClassifier'][$ac] = $this->m_publikasi_dosen->report_by_unit($fakultas, $key ,$tahun_mulai,$tahun_selesai);
        }


        //kenapa SNL duluan? Karena kalau SIT duluan, datanya jadi 0, error, ngga ada :(
        foreach([SNL,SITT, SIT] as $key=>$value){
        	$temp = $this->m_publikasi_dosen->report_by_unit($fakultas, $value ,$tahun_mulai,$tahun_selesai);	

        	if($key == 0){
        		$data['result_seminar'] = $temp;
        	}
        	else{
        		foreach($temp as $key2=>$x){
        			$data['result_seminar'][$key2]->jumlah +=  $x->jumlah;	
        		}
        	}
        }
		
		// $data['result_seminar'] = $this->m_publikasi_dosen->report_by_unit($fakultas, KODE_SEMINAR,$tahun_mulai,$tahun_selesai);

		$data['result_unknown'] = $this->m_publikasi_dosen->report_by_unit($fakultas, KODE_UNKNOWN,$tahun_mulai,$tahun_selesai);

		// echo json_encode($data['all']);
		// die();
		foreach ($data['all'] as $value) {
        	 $result['all'][$value->kode]=$value->jumlah;
        }
        foreach ($data['result_jurnal'] as $value) {
        	 $result['jurnal'][$value->kode]=$value->jumlah;
        }
        foreach ($data['result_seminar'] as $value) {
        	 $result['seminar'][$value->kode]=$value->jumlah;
        }
        foreach ($data['result_unknown'] as $value) {
        	 $result['unknown'][$value->kode]=$value->jumlah;
        }
		$data['fakultas'] = $fakultas;
		$data['awal'] = $tahun_mulai;
		$data['akhir'] = $tahun_selesai;
		$data['result'] = $result;
		$data['filter_fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id)=1 AND fak_singkatan is not null", "fak_id asc");

		if($is_download == false){
			//load view
			$this->load->view('base/header');
			$this->load->view('report/unit', $data);
			$this->load->view('base/footer');
		}
		else{
			$title = array("No", "Kode Unit", "Fakultas", "Jumlah Penarikan Data", "Jumlah Data Jurnal", "Jumlah Data Seminar","Jumlah Data BUuan Jurnal/Seminar","Jumlah Data Belum Terklasifikasi");
			$result_excel = array();
			foreach ($data['all'] as $key => $value) {
				$row = array();
				$row[] = $key + 1;
				foreach ($value as $key2 => $value2) {
					$row[] = $value2;
				}
				if(!isset($result['jurnal'][$value->kode])) $result['jurnal'][$value->kode] = 0;
				if(!isset($result['seminar'][$value->kode]))  $result['seminar'][$value->kode] = 0;
				if(!isset($result['unknown'][$value->kode]))  $result['unknown'][$value->kode] = 0;
				$row[] = $result['jurnal'][$value->kode];
				$row[] = $result['seminar'][$value->kode];
				$row[] = $result['unknown'][$value->kode];
				$row[] = $value->jumlah - ( $result['jurnal'][$value->kode] + $result['seminar'][$value->kode] + $result['unknown'][$value->kode] );
				$result_excel[] = $row;
			}
			
			$filter = "";
			if($fakultas != 0){
				$fak = $this->m_fakultas->get_by_column($fakultas);
				$filter = " " . $fak->fak_nama_indonesia;
			}
		$datenow = date("d-m-Y");
			download_excel("Laporan Penarikan Data Per Unit - $datenow".$filter, $title, $result_excel);
		}
	}
	
	private function report_by_keterangan($fakultas = false, $jurusan = false, $tahun = false, $kode = KODE_JURNAL) {
		//$this->auth->set_access('view');
		$this->auth->validate(TRUE, TRUE);
		$this->load->model('m_fakultas');
		$this->load->model('m_jurusan');
		$this->load->model('m_detil_kode_publikasi');

		$this->asset_library->add_masterpage_script();
		//add page javascript
		$this->asset_library->add_js('js/reports/jurnal.js');
        
		$tahun = (!$tahun) ? date("Y") : $tahun;

        $data = array();
		$data['result'] = $this->m_publikasi_dosen->report_by_keterangan($fakultas, $jurusan, $tahun, $kode);
		$data['jurusan'] = ($jurusan == 0) ? '' : $jurusan;
		$data['tahun'] = $tahun;
		$data['kode'] = $kode;

		if ($jurusan == 0) {
			$data['fakultas'] = ($fakultas == 0) ? '' : $fakultas;
		} else {
			$data['fakultas'] = $this->m_jurusan->get_by_column($jurusan)->jur_fakultas;
		}

		$data['list_fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id)=1 AND fak_singkatan is not null", 'fak_singkatan asc');
		$data['list_jurusan'] = $this->m_jurusan->get("jur_nama_inggris is not NULL", 'jur_id asc');
		$data['list_jurusan_json'] = json_encode($data['list_jurusan']);
		$data['detil_kode_publikasi'] = $this->m_detil_kode_publikasi->get('', 'dkp_keterangan asc');

		//load view
		$this->load->view('base/header');
		$this->load->view('report/jurnal', $data);
		$this->load->view('base/footer');
	}

	public function personal(){
		if ($this->input->server('REQUEST_METHOD') == 'GET'){
			//$this->auth->set_access('view');
			$this->auth->validate(TRUE, TRUE);

			//set informasi halaman
			$this->site_info->set_page_title('Laporan Pengunduhan per Pegawai');
			//set breadcrumb
			$this->site_info->add_breadcrumb('Laporan');
			$this->site_info->add_breadcrumb('Laporan Pengunduhan per Pegawai');
			//add menu highlight
			$this->site_info->set_current_module('report');
			$this->site_info->set_current_submodule('report_personal');

			//add masterpage script
			$this->asset_library->add_masterpage_script();
			//add page javascript
			$this->asset_library->add_js('js/pages/reportPersonal.js');
			$this->asset_library->add_js('js/jquery.csv-0.71.js');

			//filter pegawai
			$pegawai = -1;
	        $pegawai_name = "";
	        if($this->input->get("pegawai") != null){
	        	$pegawai_id = $this->input->get("pegawai");
	        	$pegawai = $this->m_pegawai->get_by_column($pegawai_id);

	        }

			$data = array();
			$this->load->model('m_fakultas');
			$data['fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id)=1 AND fak_singkatan is not NULL", "fak_id asc");
			$this->load->model('m_jurusan');
			$data['jurusan'] = $this->m_jurusan->get("jur_nama_inggris is not NULL", 'jur_id asc');
			$data["pegawai"] = json_encode($pegawai);

			//load view
			$this->load->view('base/header');
			$this->load->view('report/personal', $data);
			$this->load->view('base/footer');
		}
		else{
			$peg_id = $this->input->post('peg_id');
			$peg_name = $this->input->post('peg_name');
			header('Content-Type: application/json');
			$result = $this->m_publikasi_dosen->reportByPersonal($peg_id);
			echo json_encode($result);
		}




	}

	public function peneliti()
	{
		//$this->auth->set_access('view');
		$this->auth->validate(TRUE, TRUE);
		$this->load->model('m_fakultas');
		$this->load->model('m_jurusan');
		$this->load->model('m_pegawai');
		$this->load->model('m_anggota');
		$this->load->model('m_publikasi_dosen');
		//set informasi halaman
		$this->site_info->set_page_title($this->lang->line('report_peneliti'), '');
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('report_peneliti'));
		//add menu highlight
		$this->site_info->set_current_module('report');
		$this->site_info->set_current_submodule('report_peneliti');

		//add masterpage script
		$this->asset_library->add_masterpage_script();
		//add page javascript
		$this->asset_library->add_js('js/reports/peneliti.js');

        $data = array();

		$data['list_fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id)=1 AND fak_singkatan is not null", 'fak_singkatan asc');
		$data['list_jurusan'] = $this->m_jurusan->get("jur_nama_inggris is not NULL", 'jur_id asc');
		$data['list_jurusan_json'] = json_encode($data['list_jurusan']);

		//load view
		$this->load->view('base/header');
		$this->load->view('report/peneliti', $data);
		$this->load->view('base/footer');
	}

	public function get_datamaster_peneliti(){
		//only ajax is allowed
		if(!$this->input->is_ajax_request()) show_404();

		//$this->auth->set_access('view');
		//$this->auth->validate();

		$filter_cols = array('peg_fakultas' => $this->input->post('peg_fakultas'),
					'peg_jurusan' => $this->input->post('peg_jurusan'));

		//set default where query
		$add_where = "peg_status_aktivitas_pegawai in ('A','DP','TB','TI','DK','DT','MP') and peg_is_dosen=1 and peg_ikatan_kerja_pegawai in (1,2,3) and peg_deleted_at is NULL";
		$where = build_masterpage_filter($filter_cols, $add_where);

		$this->load->model('m_pegawai');
		//get data
		$this->m_pegawai->get_datatable_tarik($where);
	}

	public function download_peneliti($fakultas = 0, $jurusan = 0){
		$data = array();
		$this->load->model('m_pegawai');
		
		$data['result'] = $this->m_pegawai->get_rekap_tarik_data($fakultas, $jurusan);
		
		$title = array("No", "Nama Pengarang", "Fakultas", "Jurusan", "Penarikan 1", "Penarikan 2");
		$result = array();
		foreach ($data['result'] as $key => $value) {
			$row = array();
			$row[] = $key + 1;
			foreach ($value as $key2 => $value2) {
				if($key2 == "peg_tarik_2_done" )
					$row[] = ($value2 == '' ? 0 : $value2) . "/" . $value->peg_tarik_2_all;
				else
					$row[] = $value2;
			}
			$result[] = $row;
		}
		$datenow = date("d-m-Y");
		$file_name = "Laporan Penarikan Data Pengarang " . $datenow;
		
		download_excel($file_name, $title, $result);
	
	}

	public function get_datamaster_keterangan(){
		//only ajax is allowed
		// if(!$this->input->is_ajax_request()) show_404();

		//$this->auth->set_access('view');
		//$this->auth->validate();

		//$filter_cols = array('peg_fakultas' => $this->input->post('peg_fakultas'),
					//'peg_jurusan' => $this->input->post('peg_jurusan'));

		//set default where query
		//$where = build_masterpage_filter($filter_cols);

		$this->load->model('m_publikasi_dosen');
		//get data
		
		$this->m_publikasi_dosen->get_datatable_by_keterangan(
			$this->input->post('filter_fakultas'), 
			$this->input->post('filter_jurusan'), 
			$this->input->post('filter_tahun'), 
			$this->input->post('filter_keterangan')
		);
	}

	public function download_by_keterangan($fakultas = 0, $jurusan = 0, $tahun = 0, $kode = KODE_JURNAL){
		$data = array();
		$this->load->model('m_publikasi_dosen');
		
		$data['result'] = $this->m_publikasi_dosen->report_by_keterangan($fakultas, $jurusan, $tahun, $kode);
		
		$title = array("No", ($kode == KODE_JURNAL) ? "Nama Jurnal" : "Nama Seminar", "Jumlah");
		$result = array();
		foreach ($data['result'] as $key => $value) {
			$row = array();
			$row[] = $key + 1;
			foreach ($value as $key2 => $value2) {
				$row[] = $value2;
			}
			$result[] = $row;
		}
		
		$filter = "";
		if($jurusan != 0){
			$this->load->model('m_jurusan');
			$jur = $this->m_jurusan->get_by_column($jurusan);
			$filter = " Jurusan " . $jur->jur_nama_indonesia;
		}else if($fakultas != 0){
			$this->load->model('m_fakultas');
			$fak = $this->m_fakultas->get_by_column($fakultas);
			$filter = " " . $fak->fak_nama_indonesia;
		}

		$filter .= " Tahun " . $tahun;
		$keterangan = ($kode == KODE_JURNAL) ? " Jurnal" : " Seminar";

		$datenow = date("d-m-Y");
		$file_name = "Laporan Rekapitulasi Data".$keterangan.$filter." ".$datenow;
		
		download_excel($file_name, $title, $result);
	
	}

	public function tahun_publikasi($fakultas = false, $jurusan = false, $is_download = false){
		//$this->auth->set_access('view');
		$this->auth->validate(TRUE, TRUE);
		$this->load->model('m_fakultas');
		$this->load->model('m_jurusan');
		$this->load->model('m_publikasi_dosen');

		//set informasi halaman
		$this->site_info->set_page_title($this->lang->line('report_year_publikasi'), '');
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('report_year_publikasi'));
		//add menu highlight
		$this->site_info->set_current_module('report');
		$this->site_info->set_current_submodule('tahun_publikasi');

		//add page javascript
		$this->asset_library->add_js('js/reports/tahun_publikasi.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.resize.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.categories.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.axislabels.js');
		
        
        $data = array();
        $year = false;
		if($year === false) $year = date("Y");
		$data['result'] = $this->m_publikasi_dosen->report_by_tahun_publikasi($fakultas, $jurusan);
		$data['fakultas'] = $fakultas == 0 ? '' : $fakultas;
		$data['filter_fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id)=1 AND fak_singkatan is not null", "fak_singkatan asc");
		$data['jurusan'] = $jurusan == 0 ? '' : $jurusan;

		if($jurusan && !$fakultas){
			$data['fakultas'] = $this->m_jurusan->get_by_column($jurusan)->jur_fakultas;
		}

		$data['filter_jurusan']	 = $this->m_jurusan->get("jur_nama_inggris is not NULL", "jur_id asc");
		$data['list_jurusan'] = json_encode($data['filter_jurusan']);
		$data['year'] = $year;
		//load view
		if($is_download == false){
			$this->load->view('base/header');
			$this->load->view('report/tahun_publikasi', $data);
			$this->load->view('base/footer');
		}else{
			$title = array("No", "Tahun", "Jumlah Publikasi");
			$result = array();
			foreach ($data['result'] as $key => $value) {
				$row = array();
				$row[] = $key + 1;
				foreach ($value as $key2 => $value2) {
					$row[] = $value2;
				}
				$result[] = $row;
			}
			
			$filter = "";
			if($jurusan != 0){
				$jur = $this->m_jurusan->get_by_column($jurusan);
				$filter = " Jurusan " . $jur->jur_nama_indonesia;
			}else if($fakultas != 0){
				$fak = $this->m_fakultas->get_by_column($fakultas);
				$filter = " " . $fak->fak_nama_indonesia;
			}
			$datenow = date("d-m-Y");
			download_excel("Laporan Jumlah Publikasi per Tahun $datenow".$filter, $title, $result);
		}
	}
}