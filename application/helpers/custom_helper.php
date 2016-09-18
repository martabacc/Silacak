<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
	add custom helper function here

	if you want preload helper, add custom to config/autoload.php
*/

// input misspelled word
// array of words to check against

if (!function_exists('check_similarity'))
{
	function check_similarity($input, $words){
		// no shortest distance found, yet
		$shortest = -1;

		// loop through words to find the closest
		foreach ($words as $key => $word) {
			// calculate the distance between the input word,
			// and the current word
			$input = substr($input, 0,254);
			$word = substr($word, 0,254);
			$lev = levenshtein($input, $word);

			// check for an exact match
			if ($lev == 0) {

				// closest word is this one (exact match)
				$closest = $key;
				$shortest = 0;

				// break out of the loop; we've found an exact match
				break;
			}

			// if this distance is less than the next found shortest
			// distance, OR if a next shortest word has not yet been found
			if ($lev <= $shortest || $shortest < 0) {
				// set the closest match, and shortest distance
				$closest  = $key;
				$shortest = $lev;
			}
		}
		return $closest;
	}
}

// input misspelled word
// array of words to check against

if (!function_exists('count_similarity'))
{
	function count_similarity($str1, $str2){
		$str1 = substr($str1, 0,254);
		$str2 = substr($str2, 0,254);
		$lev = (1 - levenshtein($str1, $str2) / max( strlen($str1), strlen($str2) ) ) * 100;
		return $lev;
	}
}
/*
 * Helper for downloading excel report
 * @file_name string, the excel file name 
 * @column_header array, the table column header 
 * @data 2-dimensional array, the data to export in excel 
 *
 */
if(!function_exists('download_excel'))
{
	function download_excel($file_name, $column_header, $data, $type=array()){
		$CI =& get_instance();
		$CI->load->library('excel');

		$CI->excel->setActiveSheetIndex(0);
		
		$CI->excel->getActiveSheet()->setTitle("Sheet 1");

		//set column title
		$col = 'A';
		foreach ($column_header as $value) {
			$CI->excel->getActiveSheet()->setCellValue($col.'2', $value);	
			$CI->excel->getActiveSheet()->getStyle($col.'2')->getFont()->setBold(true);
			$col++;
		}
		$max_col = $col;
		//set content table
		//set column title
		$col = 'A';
		$index = 0;
		$row = 3;
		foreach ($data as $rows) {
			foreach ($rows as $value) {
				if($col >= $max_col) break;
				if($index < count($type) && $type[$index] == "string")
					$CI->excel->getActiveSheet()->setCellValueExplicit($col.$row, $value, PHPExcel_Cell_DataType::TYPE_STRING);	
				else if($index < count($type) && $type[$index] == "date")
				{
					$date = date('d-m-Y', strtotime($value));
					$CI->excel->getActiveSheet()->setCellValue($col.$row, $date);	
				}
				else
					$CI->excel->getActiveSheet()->setCellValue($col.$row, $value);	
				$col++;
				$index++;

			}
			$row++;
			$index = 0;
			$col = 'A';
		}
		
		foreach(range('A', $max_col) as $columnID) {
		    $CI->excel->getActiveSheet()->getColumnDimension($columnID)
		        ->setAutoSize(true);
		}

		//set title in A1
		$CI->excel->getActiveSheet()->setCellValue('A1', $file_name);	
		$CI->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);

		$CI->excel->getActiveSheet()->mergeCells('A1:'.$max_col.'1');
		$filename = $file_name . '.xls'; //save our workbook as this file name
		header('Content-Type: application/vnd.ms-excel'); //mime type
		header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
		header('Cache-Control: max-age=0'); //no cache
		             
		//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
		//if you want to save it as .XLSX Excel 2007 format
		$objWriter = PHPExcel_IOFactory::createWriter($CI->excel, 'Excel5');  
		//force user to download the Excel file without writing it to server's HD
		$objWriter->save('php://output');
	}
}

/*
 * Helper to get month name in Bahasa
 * @month month in integer (1 = Januari)
 * return month name
 */
if (!function_exists('get_month_name'))
{
	function get_month_name($month = false){
		if($month === false || $month < 1 || $month > 12)
			return false;
		$month_name = array(1 => "Januari", 2 => "Februari", 3 => "Maret", 4 => "April", 5 => "Mei", 6 => "Juni",
		 7 => "Juli", 8 => "Agustus", 9 => "September", 10 => "Oktober", 11 => "November", 12 => "Desember");
		return $month_name[$month];
	}
}