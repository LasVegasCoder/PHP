<?php


/*

	
//  get access token 
//$client_id= base64_encode("V1:user:group:AA");
//$client_id= base64_encode('V1:vfi6yjwxo1nderkk:DEVCENTER:EXT');
$client_id= 'VjE6dmZpNnlqd3hvMW5kZXJrazpERVZDRU5URVI6RVhU';
$client_secret = 'aTRMdEx5TDI=';
//$client_secret = base64_encode('i4LtLyL2=');
//$client_secret = 'aTRMdEx5TDI=';
$token = base64_encode($client_id.":".$client_secret);

$data='grant_type=client_credentials';



*/
	if( !class_alias('SabreClass') )
	{
		class SabreClass()
		{
			private $_link;
			private $_result = array();
			private $_ch = nulll
			private $_clientID;
			private $_secret;
			private $taken;
			private $data;
			
			public function _construct( $secret, $clientID )
			{	
				$_clientID = ( $clientID != '' ) ? $clientID : '' ;
				$_clientID = ( $secret != '' ) ? $secret : '' ;
				
				$token = base64_encode($client_id.":".$client_secret);
				$data='grant_type=client_credentials';

				
			}
			
			
			
			public function _doConnect( $endpoint=null )
			{
				
				$headers = array(
					'Authorization: Basic '.$token,
					'Accept: */*',
					'Content-Type: application/x-www-form-urlencoded'
				);
				    $ch = curl_init();
				   // curl_setopt($ch,CURLOPT_URL,"https://api.sabre.com/v2/auth/token");
					curl_setopt($ch,CURLOPT_URL,"https://api.test.sabre.com/v2/auth/token");
					curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
					curl_setopt($ch,CURLOPT_POST,1);
					curl_setopt($ch,CURLOPT_POSTFIELDS,$data);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					$res = curl_exec($ch);
					curl_close($ch);
					$resf = json_decode($res);
					//echo "Token " . $resf->access_token;
					//exit;
					
				   $access_token = $resf->access_token; // token provided from sabre
				   $expires_in_seconds = $resf->expires_in;
				   $token_type = $resf->token_type;
					// //  END get access token 
					
					
					$url = 'https://api.test.sabre.com/v1/shop/flights?origin=NYC&destination=LAS&departuredate=2017-07-10&returndate=2017-07-20&onlineitinerariesonly=N&limit=10&offset=1&eticketsonly=Y&sortby=totalfare&order=asc&sortby2=departuretime&order2=asc&pointofsalecountry=US';
					
					$headers2 = array(
						'Authorization: bearer '.$access_token,
						'protocol: HTTP 1.1 ',
						"Content-Type: application/json"
					 );
					 
					 
					 
					 $ch2 = curl_init();


					curl_setopt($ch2,CURLOPT_HTTPHEADER,$headers2);
					curl_setopt($ch2, CURLOPT_URL, $url);
					//curl_setopt($ch2, CURLOPT_POST, TRUE);
					//curl_setopt($ch2, CURLOPT_POSTFIELDS, $postData);
					//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
					curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);

					//var_dump( $results = json_decode(curl_exec($ch2),true));

					//echo $client_secret;
					$results = json_decode(curl_exec($ch2),true);
					echo '<pre>' . print_r( $results, 1 ) . '</pre>';
			}
			
			
			public function parseResult()
			{
				
			}


		} // end of classss
	} // end of checkdate
	
	
	$sabre = new SabreClass('aTRMdEx5TDI=', 'VjE6dmZpNnlqd3hvMW5kZXJrazpERVZDRU5URVI6RVhU');
	$sabre->_doConnect();
	
?>
