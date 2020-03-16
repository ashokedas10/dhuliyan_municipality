<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class CI_Mylib {

	public function __construct($config = array())
	{
		/*if (count($config) > 0)
		{
			$this->initialize($config);
		}*/

		
	}

	function content_html_encode($val){
		$str = htmlentities($val);
		$str = addslashes($str);
		return $str;
	}
	
	function content_html_decode($val){
		$str = stripslashes($val);
		$str = html_entity_decode($str);
		return $str;
	}

	function encoded($str)
	{
		return str_replace(array('=','+','/'),'',base64_encode(base64_encode($str)));
	}
	
	function decoded($str)
	{
		return base64_decode(base64_decode($str));
	}
	
	
}

/* Location: ./system/libraries/Ftp.php */