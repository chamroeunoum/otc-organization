<?php

namespace App;

class Helper {

	public static function toKnumber($text){
		return str_replace(array("0","1","2","3","4","5","6","7","8","9"),array("០","១","២","៣","៤","៥","៦","៧","៨","៩"),$text);
	}
	public static function toLnumber($text){
		return str_replace(array("០","១","២","៣","៤","៥","៦","៧","៨","៩"),array("0","1","2","3","4","5","6","7","8","9"),$text);
	}
	public static function toKdate($string_date,$full=false){
		if($string_date==''||$string_date==null)return null ;
		$date = '' ;
		$days = array("Mon"=>"ច័ន្ទ","Tue"=>"អង្គារ៍","Wed"=>"ពុធ","Thu"=>"ព្រហស្បត៍","Fri"=>"សុក្រ","Sat"=>"សៅរ៍","Sun"=>"អាទិត្យ");
		$months = array("01"=>"មករា","02"=>"កុម្ភៈ","03"=>"មីនា","04"=>"មេសា","05"=>"ឧសភា","06"=>"មិថុនា","07"=>"កក្កដា","08"=>"សីហា","09"=>"កញ្ញា","10"=>"តុលា","11"=>"វិច្ឆិកា","12"=>"ធ្នូ");
		// $months = array("Jan"=>"មករា","Feb"=>"កុម្ភៈ","Mar"=>"មីនា","Apr"=>"មេសា","May"=>"ឧសភា","Jun"=>"មិថុនា","Jul"=>"កក្កដា","Aug"=>"សីហា","Sep"=>"កញ្ញា","Oct"=>"តុលា","Nov"=>"វិច្ឆិកា","Dec"=>"ធ្នូ");
		list($dayName,$dayNumber,$month,$year)=explode("-",date("D-d-m-Y",microtime($string_date)));
		if(!$full){
			$date = Helper::toKnumber($dayNumber) . " " . $months[$month] . " ". Helper::toKnumber($year);
		}else{
			list($dayName,$dayNumber,$month,$year)=explode("-",date("D-d-m-Y",microtime($string_date)));
			$date = "ថ្ងៃ".$days[$dayName]. " ទី" . Helper::toKnumber($dayNumber) . " ខែ" . $months[$month] . " ឆ្នាំ". Helper::toKnumber($year);
		}
		return $date ;
	}
	public static function toKdatetime($string_date,$full=false){
		if($string_date==''||$string_date==null)return 'Empty Date';
		$date = '' ;
		$days = array("Mon"=>"ច័ន្ទ","Tue"=>"អង្គារ៍","Wed"=>"ពុធ","Thu"=>"ព្រហស្បត៍","Fri"=>"សុក្រ","Sat"=>"សៅរ៍","Sun"=>"អាទិត្យ");
		$months = array("01"=>"មករា","02"=>"កុម្ភៈ","03"=>"មីនា","04"=>"មេសា","05"=>"ឧសភា","06"=>"មិថុនា","07"=>"កក្កដា","08"=>"សីហា","09"=>"កញ្ញា","10"=>"តុលា","11"=>"វិច្ឆិកា","12"=>"ធ្នូ");

		list($string_date,$string_time) = explode(' ',  $string_date);

		if(!$full){
			$date = Helper::toKnumber($string_date) . " " . Helper::toKnumber($string_time);
		}else{
			list($dayNumber,$month,$year)=explode("-",$string_date);
			$date = Helper::toKnumber($dayNumber) . " " . $months[$month] . " ". Helper::toKnumber($year) . ' ម៉ោង ' . Helper::toKnumber($string_time);
		}
		return $date ;
	}

	public static function getKhMonth($month)
	{
		$months = [
			0=>"មករា",1=>"កុម្ភៈ",2=>"មីនា",3=>"មេសា",4=>"ឧសភា",5=>"មិថុនា",6=>"កក្កដា",7=>"សីហា",8=>"កញ្ញា",9=>"តុលា",10=>"វិច្ឆិកា",11=>"ធ្នូ",
			"01"=>"មករា","02"=>"កុម្ភៈ","03"=>"មីនា","04"=>"មេសា","05"=>"ឧសភា","06"=>"មិថុនា","07"=>"កក្កដា","08"=>"សីហា","09"=>"កញ្ញា","10"=>"តុលា","11"=>"វិច្ឆិកា","12"=>"ធ្នូ"
		];
		return array_key_exists( $month, $months)?$months[$month]:false;
	}

	public static function getKhDay($day)
	{
		$days = [0=>"អាទិត្យ",1=>"ច័ន្ទ",2=>"អង្គារ៍",3=>"ពុធ",4=>"ព្រហស្បត៍",5=>"សុក្រ",6=>"សៅរ៍","Mon"=>"ច័ន្ទ","Tue"=>"អង្គារ៍","Wed"=>"ពុធ","Thu"=>"ព្រហស្បត៍","Fri"=>"សុក្រ","Sat"=>"សៅរ៍","Sun"=>"អាទិត្យ"];
		return array_key_exists( $day, $days)?$days[$day]:false;
	}

	public static function fileGetContentsCurl($url)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);

		$data = curl_exec($ch);
		curl_close($ch);

		return $data;
	}

	public static function urlExists($url){
		$array = get_headers($url);
		$string = $array[0];
		return strpos($string, "200")? true : false ;
	}

	public static function getFileErrorMessage($code){
		$phpFileUploadErrors = array(
			0 => 'There is no error, the file uploaded with success',
			1 => 'The uploaded file exceeds the upload_max_filesize. Only allow ' . ini_get("upload_max_filesize") ,
			2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
			3 => 'The uploaded file was only partially uploaded',
			4 => 'No file was uploaded',
			6 => 'Missing a temporary folder',
			7 => 'Failed to write file to disk.',
			8 => 'A PHP extension stopped the file upload.',
		);
		return array_key_exists( $code , $phpFileUploadErrors ) ? $phpFileUploadErrors[ $code ] : null ;
	}

}
