<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Framework_validation extends CI_Form_validation {

	function __construct()
	{
		parent::__construct();
		$this->CI->lang->load('framework_validation');
	}

	/**
	 * valid_datetime
	 *
	 * Check if the input value is valid datetime or not
	 *
	 * @param	string	$datetime = date string
	 * @return	bool
	 */
	public function valid_datetime($datetime){
		$format = 'd-m-Y';
		$check_date = DateTime::createFromFormat($format, $datetime);
    	return $check_date && $check_date->format($format) == $datetime;
	}


	/**
	 * valid_date
	 *
	 * Check if the input value is valid date or not
	 *
	 * @param	string	$date = date string, format must in standard iso (yyyy-MM-dd HH:mm:ss)
	 * @return	bool
	 */
	public function valid_date($date){
		return $this->valid_datetime($date, 'd-m-Y');
	}

	/* replace CI form helper validation_errors */
	/**
	 * Validation Error String
	 *
	 * Returns all the errors associated with a form submission. This is a helper
	 * function for the form validation class.
	 *
	 * @param	string
	 * @param	string
	 * @return	string
	 */
	function validation_errors($prefix = '', $suffix = '')
	{
		if (FALSE === ($OBJ =& $this->_get_validation_object()))
		{
			return '';
		}

		return $OBJ->error_string($prefix, $suffix);
	}

	/* replace CI form helper _get_validation_object */
	/**
	 * Validation Object
	 *
	 * Determines what the form validation class was instantiated as, fetches
	 * the object and returns it.
	 *
	 * @return	mixed
	 */
	function &_get_validation_object()
	{
		// We set this as a variable since we're returning by reference.
		$return = FALSE;

		if (FALSE !== ($object = $this->CI->load->is_loaded('Framework_validation')))
		{
			if ( ! isset($this->CI->$object) OR ! is_object($this->CI->$object))
			{
				return $return;
			}

			return $this->CI->$object;
		}

		return $return;
	}
}