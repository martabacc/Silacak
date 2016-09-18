<?php defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * Controller for Home
 * @author : Doni Setio Pambudi (donisp06@gmail.com)
 */
class Home extends CI_Controller {

	public function index(){
		
		//if($this->auth->is_login()){
			//redirect('dashboard');
		//}
		//$this->load->view('home/index');
	}
	public function get_data()
	{
		$this->load->model('m_journal');
		$this->load->model('m_nextcron');
		$this->load->model('m_user');
		
		$nextcron = $this->m_nextcron->get_by_column(1);

		$url_front = "https://scholar.google.co.id/citations?user=";
		$url_end = "&hl=en&oi=sra&cstart=".$nextcron->nxc_start."&pagesize=100";
		$id_user = $nextcron->nxc_user;
		$user = $this->m_user->get_by_column($id_user);
		/*$user = array(
			'ekvoWE4AAAAJ'
		);*/
		

		$html = array();
		//foreach($user as $u){
		$temp = $this->htmldomhelper->file_get_html($url_front.$user->usr_url.$url_end);
		//echo $temp->find('div[id*=gsc_prf_in]',0).'<br/>';
		$i=1;
		foreach($temp->find('a[class*=gsc_a_at]') as $j){
			$temp2 = $this->htmldomhelper->file_get_html('https://scholar.google.co.id/citations?view_op=view_citation&hl=en&user=ekvoWE4AAAAJ&citation_for_view='.explode('citation_for_view=', $j->href)[1]);
			$title = $temp2->find('a[class*=gsc_title_link]',0)->plaintext;
			$desc = $temp2->find('div[class*=gsc_value]',0)->plaintext;

			/*echo $i.'<br />';
			echo  'Judul : '.$temp2->find('a[class*=gsc_title_link]',0)->plaintext.'<br/>';
			echo  'Penulis : '.$temp2->find('div[class*=gsc_value]',0).'<br/>';
			echo  'Desc : '.$temp2->find('div[id*=gsc_descr]',0).'<br/>';*/
			$this->m_journal->insert($title, $desc, $i);
			//echo $temp2;
			$i++;
		}
				
		//}
		if($nextcron->nxc_end < 100){
			$next_start = $nextcron->nxc_start + 20;
			$next_end = $nextcron->nxc_end + 20;
		}
		else{
			$id_user++;
			if($id_user >= $this->m_user->count_all()){
				$id_user = 1;
			}
			$next_start = 0;
			$next_end = 20;
		}
		$nextcron = $this->m_nextcron->update(1, $id_user, $next_start, $next_end);
		echo 'sukses';
		
	}

	
}