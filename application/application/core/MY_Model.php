<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
 * Author : Doni Setio Pambudi (donisp06@gmail.com)
 * MY_Model, model implementation for datatable and framework
 * don't change this file, create function or other helper in library or helper folder
 * in order to use masterdata function,
 * you must defined function called select, get_datatable
 */
class MY_Model extends CI_Model{
	/*
	 * if you want to detect last query used by parse datatable
	 * enable this variable to true, then parse_datatable will return last used query
	 * in variable $result->query
	 */
	private $_debug = FALSE;

	/*
	 * default constructor
	 */
	function __construct()
	{ parent::__construct(); }

	/*
	 * this function used by parse_datatable function
	 * in this version, count total moved from specific model file to base model file
	 * so all model extend this base model will have this function
	 * @param where = where query
	 * @param escape = enable or disable escape query on where by codeigniter, default null, by system it mean TRUE
	 * @output = integer, total data selected by where query / total data in select
	 */
	function count_total($where="", $escape=NULL, $selectcolumn=TRUE, $groupby=NULL){
		//select column, this function implemented by specified file used this model
		if ($selectcolumn==0)
			$this->select();
		else if ($selectcolumn==1)
			$this->from(false);
		else if ($selectcolumn==2)
			$this->fromucup();
		//check if where is empty or null, if not, we used where syntax
		if(!empty_or_null($where)) $this->db->where($where, NULL, $escape);
		//return number of data
		if (isset($groupby)) {
			$this->db->select("COUNT(*) AS numrows", false);
			$test = $this->db->get();
			return count($test->result());
		}
		else
			return $this->db->count_all_results();
	}

	/*
	 * this function used for custom query
	 * because the creator of this class always forget syntax for custom query
	 * then it will be added in this file
	 * @param query = custom query
	 * @output = array of object
	 */
	function custom_query($query){
		$query_result = $this->db->query($query);
		return $query_result->result();
	}

	/*
	 * this function used by parse_datatable function
	 * in this version, get moved from specific model file to base model file
	 * so all model extend this base model will have this function
	 * @param where = where query
	 * @param order = order query
	 * @param limit = number of data return by this function, type integer
	 * @param offset = number of first data ignored by this function
	 * @param escape = enable or disable escape query on order_by and where by codeigniter, default null, by system it mean TRUE
	 * @output = array of object, data selected
	 */
	function get($where="", $order="", $limit=NULL, $offset=NULL, $escape=NULL){
		//select, this function implemented by specified file used this model
		$this->select();
		//check order, if not empty, use order syntax
		if(!empty_or_null($order)) $this->db->order_by($order, '', $escape);

		//check and enable limit query
		if(!empty_or_null($limit) && !empty_or_null($offset)) $this->db->limit($limit, $offset);
		else if(!empty_or_null($limit)) $this->db->limit($limit);

		//check and enable where query
		if(!empty_or_null($where)) $this->db->where($where, NULL, $escape);

		//get data and return it
		$query = $this->db->get();
		return $query->result();
	}

	/*
	 * this function is modified from get_by_column
	 * but you can filter by more than one column and can return more than 1 row, joined by and
	 * @param column_definition = parameter must [column column 1 => column value 1, column column 2 => column value 2, ...]
	 * @param num_return (default = 1) = number row returned by this function
	 * @param order_by (default = empty) = custom order by query
	 * @param escape = enable or disable escape query on order_by only by codeigniter, default null, by system it mean TRUE
	 * @output = array object
	 */
	function get_by_multiple_column($column_definition, $num_return=1, $order_by='', $escape=NULL){
		//check parameter definition
		if(!is_array($column_definition)) return array();

		foreach($column_definition as $column_name => $column_val){
			$this->db->where($column_name, $column_val);
		}
		$this->select();
		if(!empty_or_null($order_by)) $this->db->order_by($order_by, '', $escape);
		if($num_return > 0) $this->db->limit($num_return);
		$query = $this->db->get();
		$result = $query->result();

		if($num_return == 1)
			return count($result) == 0 ? NULL : $result[0];

		return $result;
	}

	/*
	 * this function replaced default get_by_id
	 * and increase scalability of replaced function
	 * this function can select by one column data and return only first data
	 * in previous version this function only select by primary key,
	 * so if we want select by another column we create identical function but different where query
	 * @param data = data used by where query
	 * @param column = column selected for where query, default is empty, if this param empty function will replace with pk
	 * @param num_return (default = 1) = number row returned by this function, 0 = return all row
	 * @param order_by (default = empty) = custom order by query
	 * @param escape = enable or disable escape query on order_by only by codeigniter, default null, by system it mean TRUE
	 * @output = null if empty, object if found
	 */
	function get_by_column($data, $column='', $num_return=1, $order_by='', $escape=NULL){
		if($column === '')
			$column = $this->pk_col;

		//if no data supplied, return null
		if(empty_or_null($data)) return NULL;

		//get data call other method
		return $this->get_by_multiple_column(array($column => $data), $num_return, $order_by, $escape);
	}

	/*
	 * this function used for masterdata framework
	 * @param cols = column defined in specific models
	 * @param where = additional where query from controller
	 * @output = json
	 */
	public function parse_datatable($cols, $where="", $selectcolumn=0, $groupby=NULL){
		$keyword = '';
		if(isset($_POST['search'])){
			$keyword = $this->db->escape_like_str($_POST['search']);
		}

		// 		select top {LIMIT HERE} * from (
		//       select *, ROW_NUMBER() over (order by {ORDER FIELD}) as r_n_n 
		//       from {YOUR TABLES} where {OTHER OPTIONAL FILTERS}
		// ) xx where r_n_n >={OFFSET HERE}
		$select_column = "SELECT ";
		$is_search = !empty_or_null($keyword);

		$where_query = '';
		$like_query = array();
		foreach($cols as $col){
			$this->db->select($col['db'] . (empty_or_null($col['alias']) ? '' : ' as ' . $col['alias']), FALSE);

			if($is_search && $col['searchable']){
				$like_query[] = $col['db']." like '%$keyword%'";
			}
		}
		if($is_search && count($like_query) > 0){
			$where_query = '(' . implode(' or ', $like_query) . ')';
		}

		if(!empty_or_null($where)){
			$where_query .= (empty_or_null($where_query) ? '' : ' and ' ) . $where;
		}

		/* order always contain 2 data, column, and direction */
		$order_by = '';
		$order_params = $_POST['order'];
		if(isset($order_params['column']) || isset($order_params['dir'])){
			$order_by = $cols[$order_params['column']]['db'] . ' ' . $order_params['dir'];
		}

		$limit = NULL;
		$offset = NULL;

		if(isset($_POST['length'])){
			$limit = intval($_POST['length']);
		}

		if(isset($_POST['start'])){
			$offset = intval($_POST['start']);
		}
		if (isset($groupby)) {
			$this->db->group_by($groupby);
			$record_total = $this->count_total($where_query, NULL, $selectcolumn, $groupby);
			//---
			foreach($cols as $col){
				$this->db->select($col['db'] . (empty_or_null($col['alias']) ? '' : ' as ' . $col['alias']), FALSE);

				if($is_search && $col['searchable']){
					$like_query[] = $col['db']." like '%$keyword%'";
				}
			}
			if($is_search && count($like_query) > 0){
				$where_query = '(' . implode(' or ', $like_query) . ')';
			}

			if(!empty_or_null($where)){
				$where_query .= (empty_or_null($where_query) ? '' : ' and ' ) . $where;
			}

			$order_by = '';
			$order_params = $_POST['order'];
			if(isset($order_params['column']) || isset($order_params['dir'])){
				$order_by = $cols[$order_params['column']]['db'] . ' ' . $order_params['dir'];
			}

			$limit = NULL;
			$offset = NULL;

			if(isset($_POST['length'])){
				$limit = intval($_POST['length']);
			}

			if(isset($_POST['start'])){
				$offset = intval($_POST['start']);
			}

			if (isset($groupby)) {
				$this->db->group_by($groupby);
			}
			//---
		}
		else
			$record_total = $this->count_total($where_query, NULL, $selectcolumn, $groupby);

		if($this->_debug) $query_used = array($this->db->last_query());

		//$query = $this->get($where_query, $order_by, $limit, $offset);
		if ($selectcolumn==0) {
			$this->select();	
		} else if ($selectcolumn==1) {
			$this->from();
		} else if ($selectcolumn==2) {
			$this->fromucup();
		}
		$this->db->select("ROW_NUMBER() over (order by $order_by) as r_n_n", FALSE);
		//check order, if not empty, use order syntax
		//if(!empty_or_null($order_by)) $this->db->order_by($order_by, '', NULL);
		if(!empty_or_null($where_query)) $this->db->where($where_query);
		
		$select_query = $this->db->get_compiled_select();
		$select_column = "select top $limit * from ( " . $select_query .
							" ) xx where r_n_n > $offset";
		$query = $this->custom_query($select_column);
		if($this->_debug) $query_used[] = $this->db->last_query();

		$record_filtered = $query == NULL ? 0 : count($query);

		$result = new stdClass();
		// $result->tes = $select_query;
		$result->draw = intval($_POST['draw']);
		$result->recordsTotal = $record_filtered;
		$result->recordsFiltered = $record_total;
		$result->data = array();
		if($this->_debug) $result->query = $query_used;

		foreach($query as $row){
			$new_row = array();
			foreach($cols as $col){
				$new_row[] = empty_or_null($col['db']) ? '' : $row->$col['alias'];
			}
			$result->data[] = $new_row;
		}

		$this->output->set_content_type('application/json');
		echo json_encode($result);
	}

	/*
	 * permanent delete data from table,
	 * this function equivalent with delete on previous generated model
	 * @param value = value of updated column
	 * @param column = updated column name, default is primary key column
	 * @output = delete result
	 */
	function permanent_delete($value, $column=''){
		//set default column ke primary key
		if(empty_or_null($column)) $column = $this->pk_col;
		//standard from previous function
		$this->db->where($column, $value);
		return $this->db->delete($this->table_name);
	}

	/*
	 * this function accept custom query for deleting row/s
	 * @param where = custom where query, query must be escaped
	 * @output = delete result
	 */
	function permanent_delete_custom($where){
		$this->db->where($where, NULL, FALSE);
		return $this->db->delete($this->table_name);
	}

	/*
	 * this function used for updating single column
	 * for example change status, deleted, or change password, etc
	 * @param change_column = updated column name
	 * @param change_value = value of updated column
	 * @param id_val = where column value of updated row
	 * @param id_col = where column name of updated row, default is primary key column
	 * @param is_custom_where = bool, if true then id_val must contain custom query
	 * @output = delete result
	 */
	function update_single_column($change_column, $change_value, $id_val, $id_col='', $is_custom_where = FALSE){
		return $this->update_multiple_column(array($change_column => $change_value), $id_val, $id_col, $is_custom_where);
	}

	/*
	 * this function used for updating more than one column
	 * for example change username and password
	 * usage : $this->update_multiple_column(array('col_name'=>'col_data'), '3', 'pk_col');
	 * @param column_data = updated column data, format array('col_name'=>'col_data', 'col_name2'=>'col_data2')
	 * @param id_val = where column value of updated row
	 * @param id_col = where column name of updated row, default is primary key column
	 * @param is_custom_where = bool, if true then id_val must contain custom query
	 */
	function update_multiple_column($column_data, $id_val, $id_col='', $is_custom_where = FALSE){
		if(empty_or_null($id_col)) $id_col = $this->pk_col;
		return $this->db->update($this->table_name, $column_data, $is_custom_where ? $id_val : "$id_col = '$id_val'");
	}

	/*
	 * this function used for updating more than one column, value of updated column can be function, ex : increment
	 * for example change username and password
	 * usage : $this->update_with_function(array(array('col_name','col_name+1',FALSE)), '3', 'pk_col');
	 * @param column_data = updated column data, format array(('col_name','col_data',TRUE), ('col_name 2','col_data 2',FALSE))
	 * @param id_val = where column value of updated row
	 * @param id_col = where column name of updated row, default is primary key column
	 * @param is_custom_where = bool, if true then id_val must contain custom query
	 */
	function update_with_function($column_data, $id_val, $id_col='', $is_custom_where = FALSE){
		if(empty_or_null($id_col)) $id_col = $this->pk_col;
		foreach($column_data as $update_data){
			$this->db->set($update_data[0], $update_data[1], $update_data[2]);
		}
		$this->db->where($is_custom_where ? $id_val : "$id_col = '$id_val'");
		return $this->db->update($this->table_name);
	}
}