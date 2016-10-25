<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Asset_library {
	private $_js = [];
	private $_css = [];
	private $_asset_url = '';
	private $_asset_dir = './assets/';
	private $_merge_path = './assets/merge/';

	private $_merge = FALSE;

	private $_body_class = '';

	private $_header_js = [];

	public function __construct(){
		$this->_asset_url = base_url() . 'assets/';
	}

	public function add_masterpage_script(){
		$this->add_css('plugins/datatables/css/dataTables.bootstrap.min.css');

		$this->add_js('plugins/jquery-validation/jquery.validate.min.js', 'masterpage');
		$this->add_js('plugins/jquery-validation/additional-method.js', 'masterpage');
		$this->add_js('plugins/datatables/js/jquery.dataTables.min.js', 'masterpage');
		$this->add_js('plugins/datatables/js/dataTables.bootstrap.js', 'masterpage');
		$this->add_js('js/lang/masterpage/id.js', 'masterpage'); //change later
		$this->add_js('js/jquery.masterpage.js', 'masterpage');
	}

	/* header js always js from another domain */
	public function add_header_js($absolute_url){
		$this->_header_js[] = $absolute_url;
	}

	public function add_js($original_url, $group = '', $relative=TRUE){
		$url = $original_url;
		if($relative) $url = $this->_asset_url . $original_url;
		if($group == ''){
			if(!in_array($url, $this->_js))	$this->_js[] = $url;
		}else{
			if(!isset($this->_js[$group])) $this->_js[$group] = [];
			$this->_js[$group][] = $original_url;
		}
	}

	public function add_css($original_url, $group = '', $relative=TRUE){
		$url = $original_url;
		if($relative) $url = $this->_asset_url . $original_url;
		if($group == ''){
			if(!in_array($url, $this->_css)) $this->_css[] = $url;
		}else{
			if(!isset($this->_css[$group])) $this->_css[$group] = [];
			$this->_css[$group][] = $original_url;
		}
	}

	public function get_merged_js($group, $unset = TRUE){
		if(!isset($this->_js[$group])) return '';
		$merged = '';
		if($this->_merge){
			$all_js = md5(implode(",", $this->_js[$group])) . '.js';
			$new_merge = $this->_merge_path . $all_js;

			$generate = TRUE;

			if(file_exists($new_merge)){
				$merge_modified = filemtime($new_merge);
				$generate = FALSE;
				foreach($this->_js[$group] as $js){
					$full_path = $this->_asset_dir . $js;
					$js_modified = filemtime($full_path);
					if($js_modified > $merge_modified){
						//generate new file
						$generate = TRUE;
						break;
					}
				}
			}

			if($generate){
				//create file
				$_merge_file = fopen($new_merge,'w');
				flock($_merge_file, LOCK_EX);
				foreach($this->_js[$group] as $js){
					$full_path = $this->_asset_dir . $js;
					if(file_exists($full_path)){
						fputs($_merge_file, file_get_contents($full_path));
					}
				}
				flock($_merge_file,LOCK_UN);
				fclose($_merge_file);
			}
			$merged = '<script src="' . base_url() . 'assets/merge/' . $all_js . '" type="text/javascript"></script>';
		}else{
			foreach($this->_js[$group] as $js){
				$merged .= '<script src="' . base_url() . 'assets/' . $js . '" type="text/javascript"></script>';
			}
		}
		if($unset)
			unset($this->_js[$group]);
		return $merged;
	}

	public function get_all_js($merge=NULL){
		if($merge === NULL)
			$merge = $this->_merge;

		$retVal = '';
		foreach($this->_js as $js_k => $js_v){
			if(!is_array($js_v)){
				$retVal .= '<script src="' . $js_v . '" type="text/javascript"></script>';
			}else{
				if(!$merge){
					foreach($js_v as $m_js){
						$retVal .= '<script src="' . $this->_asset_url . $m_js . '" type="text/javascript"></script>';
					}
				}else
					$retVal .= $this->get_merged_js($js_k, FALSE);
			}
		}
		return $retVal;
	}

	public function get_merged_css($group, $unset = TRUE){
		if(!isset($this->_css[$group])) return '';
		$merged = '';
		if($this->_merge){
			$all_css = md5(implode(",", $this->_css[$group])) . '.css';
			$new_merge = $this->_merge_path . $all_css;

			$generate = TRUE;

			if(file_exists($new_merge)){
				$merge_modified = filemtime($new_merge);
				$generate = FALSE;
				foreach($this->_css[$group] as $css){
					$full_path = $this->_asset_dir . $css;
					$css_modified = filemtime($full_path);
					if($css_modified > $merge_modified){
						//generate new file
						$generate = TRUE;
						break;
					}
				}
			}

			if($generate){
				//create file
				$_merge_file = fopen($new_merge,'w');
				flock($_merge_file, LOCK_EX);
				foreach($this->_css[$group] as $css){
					$full_path = $this->_asset_dir . $css;
					if(file_exists($full_path)){
						fputs($_merge_file, file_get_contents($full_path));
					}
				}
				flock($_merge_file,LOCK_UN);
				fclose($_merge_file);
			}
			$merged = '<link href="' . base_url() . 'assets/merge/' . $all_css . '" rel="stylesheet" type="text/css" />';
		}else{
			foreach($this->_css[$group] as $css){
				$merged .= '<link href="' . base_url() . 'assets/' . $css . '" rel="stylesheet" type="text/css" />';
			}
		}
		if($unset)
			unset($this->_css[$group]);
		return $merged;
	}

	public function get_all_css($merge=NULL){
		if($merge === NULL)
			$merge = $this->_merge;

		$retVal = '';
		foreach($this->_css as $css_k => $css_v){
			if(!is_array($css_v)){
				$retVal .= '<link href="' . $css_v . '" rel="stylesheet" type="text/css" />';
			}else{
				if(!$merge){
					foreach($css_v as $m_css){
						$retVal .= '<link href="' . $this->_asset_url . $m_css . '" rel="stylesheet" type="text/css" />';
					}
				}else
					$retVal .= $this->get_merged_css($css_k, FALSE);
			}
		}
		return $retVal;
	}

	public function get_body_class(){
		return $this->_body_class;
	}

	public function set_body_class($class){
		$this->_body_class = $class;
	}

	public function get_header_js(){
		$retVal = '';
		foreach($this->_header_js as $header_js){
			$retVal .= '<script src="' . $header_js . '" type="text/javascript"></script>';
		}
		return $retVal;
	}
}