<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_library 
{
 
 
//IMAGE FILE RESIZE FUNCTION 
function resize_image($file, $w, $h, $crop=false) {
    list($width, $height) = getimagesize($file);
    $r = $width / $height;
    if ($crop) {
        if ($width > $height) {
            $width = ceil($width-($width*abs($r-$w/$h)));
        } else {
            $height = ceil($height-($height*abs($r-$w/$h)));
        }
        $newwidth = $w;
        $newheight = $h;
    } else {
        if ($w/$h > $r) {
            $newwidth = $h*$r;
            $newheight = $h;
        } else {
            $newheight = $w/$r;
            $newwidth = $w;
        }
    }
    
    //Get file extension
    $exploding = explode(".",$file);
    $ext = end($exploding);
    
    switch($ext){
        case "png":
            $src = imagecreatefrompng($file);
        break;
        case "jpeg":
        case "jpg":
            $src = imagecreatefromjpeg($file);
        break;
        case "gif":
            $src = imagecreatefromgif($file);
        break;
        default:
            $src = imagecreatefromjpeg($file);
        break;
    }
    
    $dst = imagecreatetruecolor($newwidth, $newheight);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

    return $dst;
}

public function get_fin_yr_yyyy($givendate)
{

	$datemonth=substr($givendate,5,2);
	$finyear='';
	if($datemonth=='01' or $datemonth=='02' or $datemonth=='03')
	{
		$fromyear=substr($this->get_date($givendate,0,0,-1),0,4);
		$toyear=substr($givendate,0,4);
		$finyear=$fromyear.'-'.$toyear;
	}
	else
	{
		$fromyear=substr($givendate,0,4);
		$toyear=substr($this->get_date($givendate,0,0,1),0,4);
		$finyear=$fromyear.'-'.$toyear;
	}		
	return $finyear;

}

public function send_sms($mobileNumber,$message,$authKey,$senderId)
{
			//Your authentication key
			//$authKey = "83405AD0yvbHln5533cc60";
			//Multiple mobiles numbers separated by comma			
			//$mobileNumber = $mobno;			
			//Sender ID,While using route4 sender id should be 6 characters long.
			//$senderId = "FORBST";			
			
			//Your message to send, Add URL encoding here.
			//$message = urlencode($message);			
			$message = urldecode($message);		
			//Define route 
			$route = 4;
			//Prepare you post parameters
			$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
			);			
			//API URL
			$url="https://control.msg91.com/sendhttp.php";
			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postData
				//,CURLOPT_FOLLOWLOCATION => true
			));
			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);					
			//get response
			$output = curl_exec($ch);
			//Print error if any
			if(curl_errno($ch))
			{echo 'error:' . curl_error($ch);}			
			curl_close($ch);			
			//echo $output;
}

public function send_sms_flame($mobileNumber,$message,$authKey,$senderId)
{
			//Your authentication key
			//$authKey = "83405AD0yvbHln5533cc60";
			//Multiple mobiles numbers separated by comma			
			//$mobileNumber = $mobno;			
			//Sender ID,While using route4 sender id should be 6 characters long.
			//$senderId = "FORBST";			
			
			//Your message to send, Add URL encoding here.
			$message = urlencode($message);			
			//Define route 
			$route = 4;
			//Prepare you post parameters
			$postData = array(
				'authkey' => $authKey,
				'mobiles' => $mobileNumber,
				'message' => $message,
				'sender' => $senderId,
				'route' => $route
			);			
			//API URL
			$url="https://control.msg91.com/sendhttp.php";
			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true,
				CURLOPT_POSTFIELDS => $postData
				//,CURLOPT_FOLLOWLOCATION => true
			));
			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);					
			//get response
			$output = curl_exec($ch);
			//Print error if any
			if(curl_errno($ch))
			{echo 'error:' . curl_error($ch);}			
			curl_close($ch);			
			//echo $output;
}


public function sms_balance_chk($authKey)
{
			//Define route 
			$route =4;
			//Prepare you post parameters
			$postData = array(
				'authkey' => $authKey,
				'type' => $route
			);			
			//API URL
			$url="https://control.msg91.com/api/balance.php?authkey=".$authKey."&type=".$route;
			//$url="https://control.msg91.com/api/balance.php?authkey=".$authKey."&type=1";
			// init the resource
			$ch = curl_init();
			curl_setopt_array($ch, array(
				CURLOPT_URL => $url,
				CURLOPT_RETURNTRANSFER => true,
				CURLOPT_POST => true
				//CURLOPT_POSTFIELDS => $postData
				//,CURLOPT_FOLLOWLOCATION => true
			));
			//Ignore SSL certificate verification
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);					
			//get response
			$output = curl_exec($ch);
			//Print error if any
			if(curl_errno($ch))
			{echo 'error:' . curl_error($ch);}			
			curl_close($ch);			
			//echo $output;
			return $output;
}
   
public function to_excel($excel_header,$query, $filename='exceloutput')
{
     $headers = ''; // just creating the var for field headers to append to below
     $data = ''; // just creating the var for field data to append to below
	 $footer = '';
    // $obj =& get_instance();
	//print_r($query);
	//$fields = $query->field_data();
	
     $fields = $query;
	  //echo count($fields);
	 
	 
     if (count($fields)== 0) 
	 {
          echo '<p>NO DATA FOUND !</p>';
     } 
	 else 
	 {		
	 
	 		//HEADER SECTION			
			  foreach ($excel_header as $field)
			   {
				$headers .= $field . "\t";
			  }
			  
			 //BODY SECTION
			  foreach ($fields as $row) 
			  {
				   $line = '';
				   foreach($row as $value) {                                            
						if ((!isset($value)) OR ($value == "")) 
						{
							 $value = "\t";
						} else 
						{
							 $value = str_replace('"', '""', $value);
							 $value = '"' . $value . '"' . "\t";
						}
						$line .= $value;
				   }
				   $data .= trim($line)."\n";
			  }

			  $data = str_replace("\r","",$data);
			 
			 //FOOTER SECTION
			  foreach ($excel_header as $field)
			   {
				$footer .= $field . "\t";
			  }
			  
			 
			 
			  header("Content-type: application/x-msdownload");
			  header("Content-Disposition: attachment; filename=$filename.xls");
			  echo "$headers\n$data\n$footer";  
     }
}
  

	
	
  //DATE FUNCTIONS
  public function get_date($givendate,$day=0,$mth=0,$yr=0)
	{
		$cd = strtotime($givendate);
		$newdate = date('Y-m-d', mktime(date('h',$cd),
		date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
		date('d',$cd)+$day, date('Y',$cd)+$yr));
		return $newdate;
	}
  
  
  public function monthcal($givendate,$day=0,$mth=0,$yr=0)
	{
	$cd = strtotime($givendate);
	$newdate = date('Y-m-d', mktime(date('h',$cd),
	date('i',$cd), date('s',$cd), date('m',$cd)+$mth,
	date('d',$cd)+$day, date('Y',$cd)+$yr));
				
	 if(substr($newdate,5,2)=='01'){ $month='JAN';}
	 if(substr($newdate,5,2)=='02'){ $month='FEB';}
	 if(substr($newdate,5,2)=='03'){ $month='MAR';}
	 if(substr($newdate,5,2)=='04'){ $month='APR';}
	 if(substr($newdate,5,2)=='05'){ $month='MAY';}
	 if(substr($newdate,5,2)=='06'){ $month='JUN';}
	 if(substr($newdate,5,2)=='07'){ $month='JUL';}
	 if(substr($newdate,5,2)=='08'){ $month='AUG';}
	 if(substr($newdate,5,2)=='09'){ $month='SEP';}
	 if(substr($newdate,5,2)=='10'){ $month='OCT';}
	 if(substr($newdate,5,2)=='11'){ $month='NOV';}
	 if(substr($newdate,5,2)=='12'){ $month='DEC';}
	 $monthyear=$month.'-'.substr($newdate,0,4); 
	 return $monthyear;
	}
	
	public function get_date_from_monthyr($tomonth)
	{
	 $tomn='';
	 if(substr($tomonth,0,3)=='APR'){ $tomn='04'; $todiff=1;}
	 if(substr($tomonth,0,3)=='MAY'){ $tomn='05'; $todiff=2;}
	 if(substr($tomonth,0,3)=='JUN'){ $tomn='06'; $todiff=3;}
	 if(substr($tomonth,0,3)=='JUL'){ $tomn='07'; $todiff=4;}
	 if(substr($tomonth,0,3)=='AUG'){ $tomn='08'; $todiff=5;}
	 if(substr($tomonth,0,3)=='SEP'){ $tomn='09'; $todiff=6;}
	 if(substr($tomonth,0,3)=='OCT'){ $tomn='10'; $todiff=7;}
	 if(substr($tomonth,0,3)=='NOV'){ $tomn='11'; $todiff=8;}
	 if(substr($tomonth,0,3)=='DEC'){ $tomn='12'; $todiff=9;}
	 if(substr($tomonth,0,3)=='JAN'){ $tomn='01'; $todiff=10;}
	 if(substr($tomonth,0,3)=='FEB'){ $tomn='02'; $todiff=11;}
	 if(substr($tomonth,0,3)=='MAR'){ $tomn='03'; $todiff=12;}
	 
	 return substr($tomonth,4,4).'-'.$tomn;
	 
	}

public function IntervalDays($CheckIn,$CheckOut)
{ 
$date1=$date2='';
$CheckInX = explode("-", $CheckIn); 
$CheckOutX =  explode("-", $CheckOut); 
$date1 =  mktime(0, 0, 0, $CheckInX[1],$CheckInX[2],$CheckInX[0]); 
$date2 =  mktime(0, 0, 0, $CheckOutX[1],$CheckOutX[2],$CheckOutX[0]); 
$interval =($date2 - $date1)/(3600*24); 

// returns numberofdays 
return  $interval ; 

} 
	
public function dateDifference($startDate, $endDate)
{
           			
			$startDate = strtotime($startDate);
            $endDate = strtotime($endDate);
            if ($startDate === false || $startDate < 0 || 
			$endDate === false || $endDate < 0 || $startDate > $endDate)
                return false;
               
            $years = date('Y', $endDate) - date('Y', $startDate);
            $endMonth = date('m', $endDate);
            $startMonth = date('m', $startDate);
           
            // Calculate months
            $months = $endMonth - $startMonth;
            if ($months <= 0)  {
                $months += 12;
                $years--;
            }
            if ($years < 0)
                return false;
           
            // Calculate the days
                        $offsets = array();
                        if ($years > 0)
                            $offsets[] = $years . (($years == 1) ? ' year' : ' years');
                        if ($months > 0)
                            $offsets[] = $months . (($months == 1) ? ' month' : ' months');
                       $offsets = count($offsets) > 0 ? '+' . implode(' ', $offsets) : 'now';

                        $days = $endDate - strtotime($offsets, $startDate);
                        $days = date('z', $days);   
                      
					   //echo $days;
					   //return $months;
					   //return $days;
					   
           	 return array($years, $months, $days);
			
} 
  
  public function get_fin_yr($givendate)
	{
	
		$datemonth=substr($givendate,5,2);
		$finyear='';
		if($datemonth=='01' or $datemonth=='02' or $datemonth=='03')
		{
			$fromyear=substr($this->get_date($givendate,0,0,-1),2,2);
			$toyear=substr($givendate,2,2);
			$finyear=$fromyear.'-'.$toyear;
		}
		else
		{
			$fromyear=substr($givendate,2,2);
			$toyear=substr($this->get_date($givendate,0,0,1),2,2);
			$finyear=$fromyear.'-'.$toyear;
		}		
		return $finyear;
	
	}
  
  
}
