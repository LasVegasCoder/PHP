<?php
/**
	Author:  Prince Adeyemi
	Date: 11/28/2016
*/
class SignUp {

	private $_cookieFile;
	private $_ch;
	private $_ch2;
	private $_url;
	private $_apiKey;
	private $_acct;
	
	public function __construct() {
		$this->_cookieFile = 'supCookies.txt';
		$this->_url = 'https://www.imsendpoint.com/index.php';
		//$this->url = 'http://afrtv.com';
		
		$data = array(
			'first_name' => 'Firstname',
			'last_name' => 'Lastname',
			'company' => 'company',
			'email' => "emsD12999essmaibvcls.com",
			'pass' => 'password123',
			'confirm_pass' => 'password123',			
			'submit_account_form' => " Get Your API Trial Key!  "
		);
		
		$postData = http_build_query( $data );

		$this->_ch = curl_init();
		curl_setopt($this->_ch, CURLOPT_COOKIEJAR, $this->_cookieFile);
		curl_setopt($this->_ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($this->_ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->_ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)");
		curl_setopt($this->_ch, CURLOPT_URL, $this->_url );
		curl_setopt($this->_ch, CURLOPT_POST, count( $postData ) );
		curl_setopt($this->_ch, CURLOPT_POSTFIELDS, $postData );
		curl_setopt($this->_ch, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt($this->_ch, CURLOPT_SSL_VERIFYPEER, FALSE );
		
		$webpage = curl_exec( $this->_ch ) or die( curl_error( $this->_ch ));
		
		//echo $postData;
		//print_r($webpage);
		curl_close( $this->_ch );
		//exit;
		
		if( $webpage !='' )
		{
				$this->_doStepTwo();
			// parse returned webpage
			if( preg_match( '/name="pass"\s*placeholder="Password"\s*title="Password"\s*value=""/', $webpage, $match ) )
			{
				//print_r($match);
			}
			
		}
		
	}
	
	
	public function _doStepTwo() {
		$this->_cookieFile = 'supCookies.txt';
		$this->_url = 'https://www.endpoint.com/index.php';
		
		$data2 = array(
			'first_name' => 'Firstname',
			'last_name' => 'Lastname',
			'company' => 'company',
			'email' => "PXAAma2@eX00slv.com",
			'pass' => 'password123',
			'confirm_pass' => 'password123',
			'submit_account_password' => ' Get Your API Trial Key!  '
		);
		
		$postData2 = http_build_query( $data2 );

		$this->_ch2 = curl_init();
		curl_setopt($this->_ch2, CURLOPT_COOKIEJAR, $this->_cookieFile);
		curl_setopt($this->_ch2, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($this->_ch2, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->_ch2, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)");
		curl_setopt($this->_ch2, CURLOPT_URL, $this->_url );
		curl_setopt($this->_ch2, CURLOPT_POST, count( $postData2 ) );
		curl_setopt($this->_ch2, CURLOPT_POSTFIELDS, $postData2 );
		curl_setopt($this->_ch2, CURLOPT_SSL_VERIFYHOST, FALSE );
		curl_setopt($this->_ch2, CURLOPT_SSL_VERIFYPEER, FALSE );
		
		$webpage2 = curl_exec( $this->_ch2 ) or die( curl_error( $this->_ch2 ));
		curl_close( $this->_ch2 );
		
		if( $webpage2 !='')
		{	
			if( preg_match_all( '/<td\s*class="text">([^<|>]+)<\/td>/', $webpage2, $match ) ) 
			{
				$this->_apiKey = $match[1][1];
				$this->_acct = $match[1][0];
			}
		print_r($match );
			
			if( $logfile = 'log.txt' );
			
			
			if( ( $this->_acct !='' && $this->_apiKey !='')  )
			{
			$msg = "\naccountID:$this->_acct, Key:$this->_apiKey";
				error_log( $msg, 3, $logfile );
			}
		}
		else{
			echo "Error occurred";
		}
	}
	
}//end of class

$signup = new SignUp();
	
?>
