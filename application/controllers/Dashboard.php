<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for Dashboard
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Dashboard extends CI_Controller {

	/*
	 * constructor class
	 */
	public function __construct() {
		parent::__construct();

		//set module, enable for authentication
		//$this->auth->set_default_module('access');
		//$this->auth->validate(true);

		$this->lang->load('module/dashboard');
	}

	//work as redirector
	public function index(){
		$login_user = $this->auth->get_user();

		$dashboard = '';
		if($this->auth->is_root()){
			$dashboard = 'root';
		}else{
			//$dashboard = $login_user->usg_name; contoh
			$dashboard = 'root'; //samakan saja biar gampang
		}

		redirect("dashboard/$dashboard");
	}

	public function root(){
		$this->auth->validate(TRUE, TRUE);
		
		//set informasi halaman
		$this->site_info->set_page_title($this->lang->line('module_title'));
		//set breadcrumb
		$this->site_info->add_breadcrumb($this->lang->line('module_title'));

		$this->site_info->set_current_module('dashboard');

		// load models
		$this->load->model('m_dashboard');
		$this->load->model('m_fakultas');

		// load javascripts
		$this->asset_library->add_js('plugins/jquery-easypiechart/jquery.easypiechart.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.resize.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.categories.min.js');
		$this->asset_library->add_js('plugins/flot/jquery.flot.axislabels.js');
		$this->asset_library->add_js('js/pages/dashboard.js');

		$data = array();

		//$stats_pub_tarik_1 = $this->m_d->get('pub_deleted_at IS NULL');
		//$data['num_pub_tarik_1'] = count($stats_pub_tarik_1);

		$status_tarik_tahunan = $this->m_dashboard->get_status_tarik_tahunan();
		$data['status_per_tahun'] = $this->parse_status_tarik_tahunan($status_tarik_tahunan);
		
		$maxyear = $this->m_dashboard->get_max_pub_tahun();
		$yearnow = $maxyear[0]->tahun;
		$data['yearnow'] = $yearnow;
		$minyear = $maxyear[0]->tahun - 5;

		$data['minyear'] = $minyear;

		$num_publication_all = $this->m_dashboard->get_num_publication_all();
		$data['num_pub_all'] = $num_publication_all[0]->total;

		$num_publication_done = $this->m_dashboard->get_num_publication_done();
		$data['num_pub_done'] = $num_publication_done[0]->total;

		$num_dosen = $this->m_dashboard->get_num_dosen();
		$data['num_dosen'] = $num_dosen[0]->sudah . ' / ' . $num_dosen[0]->total;

		$num_masuk_pdt = $this->m_dashboard->get_masuk_pdt();
		$data['num_masuk_pdt'] = $num_masuk_pdt[0]->jumlah;

		$pub_fakultas_tahun = $this->m_dashboard->get_pub_fakultas_tahun();
		$data['pub_fak_tahun'] = /*$pub_fakultas_tahun;//*/ $this->parse_fakultas_tahun($pub_fakultas_tahun);
		$data['pub_fak_tahun_json'] = json_encode($data['pub_fak_tahun']);

		$data['list_fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id) = 1 AND fak_singkatan is not NULL", "fak_id asc");
		$data['list_fakultas_json'] = json_encode($data['list_fakultas']);

		$data['setting_autosyncpdt'] = setting_load("autosyncpdt_cb");

		$this->load->view('base/header');
		$this->load->view('dashboard/index', $data);
		$this->load->view('base/footer');
	}

	private function parse_status_tarik_tahunan($status_tarik_tahunan)
	{		
		$temp = 0;
		$maxyear = $this->m_dashboard->get_max_pub_tahun();
		$yearnow = $maxyear[0]->tahun;
		$retval = array();

		for ($i = 0; $i < 4; $i++)
			$retval[$yearnow - $i] = array("sudah" => 0, "total" => 0);

		for ($i = 0; $i < count($status_tarik_tahunan); $i++){
			$tahun = $status_tarik_tahunan[$i]->pub_tahun;

			if ($tahun < $yearnow - 3) {
				$retval[$yearnow - 3]["sudah"] += $status_tarik_tahunan[$i]->sudah;
				$retval[$yearnow - 3]["total"] += $status_tarik_tahunan[$i]->total;	
			} else {
				$retval[$tahun]["sudah"] += $status_tarik_tahunan[$i]->sudah;
				$retval[$tahun]["total"] += $status_tarik_tahunan[$i]->total;	
			}
			
		}

		return $retval;	
	}

	private function parse_fakultas_tahun($pub_fakultas_tahun)
	{
		$retval = array();

		$maxyear = $this->m_dashboard->get_max_pub_tahun();
		$minyear = $maxyear[0]->tahun - 5;

		$listfakultas = $this->m_fakultas->get("ISNUMERIC(fak_id)=1 AND fak_singkatan is not NULL", "fak_id asc");

		$ct = 0;
		$num = count($pub_fakultas_tahun);

		for ($fak = 0; $fak < count($listfakultas); $fak++) {
			$retval[] = array();
			for ($year = $minyear; $year <= $maxyear[0]->tahun; $year++) {
				$retval[$fak][] = 0;

				if ($ct < $num && $pub_fakultas_tahun[$ct]->peg_fakultas == $listfakultas[$fak]->fak_id && $pub_fakultas_tahun[$ct]->pub_tahun == $year) {
						$retval[$fak][$year-$minyear] = $pub_fakultas_tahun[$ct++]->jumlah;
				}
			}
		}

		return $retval;
	}

	public function download(){
		$this->auth->validate(TRUE, TRUE);
		$data = array();
		$this->load->model("m_dashboard");
		$this->load->model("m_fakultas");
		$status_tarik_tahunan = $this->m_dashboard->get_status_tarik_tahunan();
		$data['status_per_tahun'] = $this->parse_status_tarik_tahunan($status_tarik_tahunan);
		
		$maxyear = $this->m_dashboard->get_max_pub_tahun();
		$yearnow = $maxyear[0]->tahun;

		$data['yearnow'] = $yearnow;

		$num_publication_all = $this->m_dashboard->get_num_publication_all();
		$data['num_pub_all'] = $num_publication_all[0]->total;

		$num_publication_done = $this->m_dashboard->get_num_publication_done();
		$data['num_pub_done'] = $num_publication_done[0]->total;

		$num_dosen = $this->m_dashboard->get_num_dosen();
		$data['num_dosen'] = $num_dosen[0]->sudah . ' / ' . $num_dosen[0]->total;

		$num_masuk_pdt = $this->m_dashboard->get_masuk_pdt();
		$data['num_masuk_pdt'] = $num_masuk_pdt[0]->jumlah;

		$pub_fakultas_tahun = $this->m_dashboard->get_pub_fakultas_tahun();
		$data['pub_fak_tahun'] = $this->parse_fakultas_tahun($pub_fakultas_tahun);
		$data['pub_fak_tahun_json'] = json_encode($data['pub_fak_tahun']);

		$data['list_fakultas'] = $this->m_fakultas->get("ISNUMERIC(fak_id) = 1 AND fak_singkatan is not NULL", "fak_id asc");
		$data['list_fakultas_json'] = json_encode($data['list_fakultas']);

		$this->load->library('excel');

		$this->excel->setActiveSheetIndex(0);
		
		$this->excel->getActiveSheet()->setTitle("Sheet 1");

		$datenow = date("d-m-Y");
		$this->excel->getActiveSheet()->setCellValue('A1', "Laporan Rekap SI Pelacakan $datenow");	
		$this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->getStyle("A1")->getFont()->setSize(14);
		$this->excel->getActiveSheet()->mergeCells('A1:F1');

		$this->excel->getActiveSheet()->setCellValue('A3', $this->lang->line('stats_pub_tarik_1'));
		$this->excel->getActiveSheet()->setCellValue('A4', $this->lang->line('stats_pub_tarik_2'));
		$this->excel->getActiveSheet()->setCellValue('A5', $this->lang->line('stats_pegawai'));
		$this->excel->getActiveSheet()->setCellValue('A6', $this->lang->line('stats_pdt'));
		$this->excel->getActiveSheet()->getStyle('A3:A6')->getFont()->setBold(true);

		$this->excel->getActiveSheet()->setCellValue('B3', $data['num_pub_all']);
		$this->excel->getActiveSheet()->setCellValue('B4', $data['num_pub_done']);
		$this->excel->getActiveSheet()->setCellValue('B5', $data['num_dosen']);
		$this->excel->getActiveSheet()->getStyle('B5')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_RIGHT);
		$this->excel->getActiveSheet()->setCellValue('B6', $data['num_masuk_pdt']);

		$this->excel->getActiveSheet()->setCellValue('A8', "Jumlah Tarik Data Per Tahun Publikasi");	
		$this->excel->getActiveSheet()->getStyle('A8')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A8:D8');


		$this->excel->getActiveSheet()->setCellValue('A9', "Tahun");
		$this->excel->getActiveSheet()->setCellValue('B9', $this->lang->line('stats_keterangan_done'));
		$this->excel->getActiveSheet()->setCellValue('C9', $this->lang->line('stats_keterangan_all'));
		$this->excel->getActiveSheet()->setCellValue('D9', "Progres");
		$this->excel->getActiveSheet()->getStyle('A9:D9')->getFont()->setBold(true);

		for ($i = 3; $i >= 0; $i--) { 
        	$percentage = round($data['status_per_tahun'][$yearnow - $i]["sudah"] / $data['status_per_tahun'][$yearnow - $i]["total"] * 100, 1);
        	$this->excel->getActiveSheet()->setCellValueExplicit('A'.(10+$i), ($i==3 ? '<= ' : '' ) .''.($yearnow - $i), PHPExcel_Cell_DataType::TYPE_STRING);
			$this->excel->getActiveSheet()->setCellValue('B'.(10+$i), $data['status_per_tahun'][$yearnow - $i]["sudah"]);
			$this->excel->getActiveSheet()->setCellValue('C'.(10+$i), $data['status_per_tahun'][$yearnow - $i]["total"]);
			$this->excel->getActiveSheet()->setCellValue('D'.(10+$i), round($data['status_per_tahun'][$yearnow - $i]["sudah"] / $data['status_per_tahun'][$yearnow - $i]["total"], 3));
    	}

		$this->excel->getActiveSheet()->getStyle('D10:D13')->getNumberFormat()->setFormatCode("0.0%");

		$this->excel->getActiveSheet()->setCellValue('A15', "Jumlah Publikasi Per Unit Per Tahun");	
		$this->excel->getActiveSheet()->getStyle('A15')->getFont()->setBold(true);
		$this->excel->getActiveSheet()->mergeCells('A15:F15');

		$this->excel->getActiveSheet()->setCellValue('A16', "Tahun");
		$this->excel->getActiveSheet()->setCellValue('B16', "FMIPA");
		$this->excel->getActiveSheet()->setCellValue('C16', "FTI");
		$this->excel->getActiveSheet()->setCellValue('D16', "FTSP");
		$this->excel->getActiveSheet()->setCellValue('E16', "FTK");
		$this->excel->getActiveSheet()->setCellValue('F16', "FTIF");
		$this->excel->getActiveSheet()->getStyle('A16:F16')->getFont()->setBold(true);

		$daftar_tahun = array();
		for($i = 0; $i < 6; $i++){
			$this->excel->getActiveSheet()->setCellValue('A'.(17+$i), $yearnow - $i);
			$daftar_tahun[($yearnow - $i)] = (17+$i);
		}

		for($i = 0; $i < count($pub_fakultas_tahun); $i++){
			$row = $pub_fakultas_tahun[$i];
			$thn = $row->pub_tahun;
			$jumlah = $row->jumlah;
			$fakultas = $row->peg_fakultas;
			$kolom = chr(65+$fakultas);
			$this->excel->getActiveSheet()->setCellValue($kolom.$daftar_tahun[$thn], $jumlah);
		}

		foreach(range('A', 'F') as $columnID) {
		    $this->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}
		$file_name = "Rekap SI Pelacakan $datenow";
		$filename = $file_name . '.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		            
		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
		$objWriter->save('php://output');
	}

}