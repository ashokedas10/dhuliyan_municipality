<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/


/*
//localhost
define("BASE_PATH_FRONT", "http://localhost/dhuliyannew/"); 
define("BASE_PATH_ADMIN", "http://localhost/dhuliyannew/admin/");
define("BASE_PATH_RETAILER", "http://localhost/dhuliyanmunicipality.in/");

define("ADMIN_BASE_URL", "http://localhost/dhuliyannew/admin/index.php/");
define("BASE_URL", "http://localhost/dhuliyannew/index.php/");
define("RETAILER_BASE_URL", "http://localhost/dhuliyannew/index.php/");

define("ENC_KEY", "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84");

define("HEARD_PATH", "F:\ALL_WEBSITES\xampp\htdocs\pocketbazar.net\source");
define("FCKEDITOR_BASEPATH", "/codeignitor_parijat/azhar_ncc/fckeditor/");

define("HOST","localhost");
define("USER", "root");
define("PWD","");
define("DATABASE", "dhuliyan");

*/


define("BASE_PATH_FRONT", "http://dhuliyanmunicipality.in/dhuliyannew/");
define("BASE_PATH_ADMIN", "http://dhuliyanmunicipality.in/dhuliyannew/admin/");
define("BASE_PATH_RETAILER", "http://dhuliyanmunicipality.in/dhuliyannew/");
define("ADMIN_BASE_URL", "http://dhuliyanmunicipality.in/dhuliyannew/admin/index.php/");
define("BASE_URL", "http://dhuliyanmunicipality.in/dhuliyannew/index.php/");
define("RETAILER_BASE_URL", "http://dhuliyanmunicipality.in/dhuliyannew/index.php/");
define("ENC_KEY", "APANtByIGI1BpVXZTJgcsAG8GZl8pdwwa84");
define("HEARD_PATH", "F:\ALL_WEBSITES\xampp\htdocs\pocketbazar.net\source");
define("FCKEDITOR_BASEPATH", "/codeignitor_parijat/azhar_ncc/fckeditor/");

define("HOST","localhost");
define("USER", "dhuliyan_demo");
define("PWD","1800-209-8833");
define("DATABASE", "dhuliyan_demo");



define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');


/* End of file constants.php */
/* Location: ./application/config/constants.php */