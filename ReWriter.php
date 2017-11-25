<?php
function rewriter_api($text,$quality=null, $pass)
{
isset( $quality ) ? $quality : 'Regular';
   if(isset($text) && isset($quality) && isset($pass))
	{
		$email = 'user@gmail.com';
		$ua	   = $_SERVER['HTTP_USER_AGENT'];
		$data  = "s=$text&";
		$data .= "quality=$quality&";
		$data .= "email=$email&";
		$data .= "pass=$pass&output=json";

      //curl_setopt ($ch, CURLOPT_POSTFIELDS, "");
				  
	$url = 'http://wordai.com/users/regular-api.php';
	
      $text = urlencode($text);
	  
	  $ch = curl_init();
	  
      curl_setopt($ch, CURLOPT_URL, $url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_POST, true);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	  curl_setopt($ch, CURLOPT_USERAGENT, $ua);
      $result = curl_exec($ch);
      curl_close ($ch);
      return stripslashes($result);

   }

   else

   {

      return 'Error: Not All Variables Set!';

   }

}

?>

<?php
//The variable quality can currently be 'Regular', 'Unique', 'Very Unique', 't', or 'Very Readable'

echo rewriter_api("Hotcellphonedeals.com --the best cell phone deals unleashed."),'Unique','PASSW0RD');

?>
