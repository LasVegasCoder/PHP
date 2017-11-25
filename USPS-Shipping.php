<?php

/*
<RateV4Request USERID="xxx">
    <Revision/>
    <Package ID="1ST">
        <Service>FIRST CLASS</Service>
        <FirstClassMailType>LETTER</FirstClassMailType>
        <ZipOrigination>44106</ZipOrigination>
        <ZipDestination>20770</ZipDestination>
        <Pounds>0</Pounds>
        <Ounces>3.5</Ounces>
        <Container/>
        <Size>REGULAR</Size>
        <Machinable>true</Machinable>
    </Package>
</RateV4Request>

USPSS SHOPPERSLANE API 2013
*/

class USPSShipping 
{
	public $origin;
	public $destination;
	
	public	$_usps_ID;
	public $_usps_PASS;
	
	public $_weight;
	
	public function __construct(){
		
	}
	
	public function _connect($id, $weight, $ori, $dest){
		$this->_usps_ID 	= $id;
		$this->_origin 		= $ori;
		$this->_desitnation = $dest;
		$this->_weight 		= $weight;
		
		$url = "http://Production.ShippingAPIs.com/ShippingAPI.dll";
		
		//$data = "API=RateV3&XML=<RateV3Request USERID=\"$this->_usps_ID\"><Package ID=\"1ST\"><Service>PRIORITY</Service><ZipOrigination>$this->_origin</ZipOrigination><ZipDestination>$this->_desitnation</ZipDestination><Pounds>$this->_weight</Pounds><Ounces>0</Ounces><Size>REGULAR</Size><Machinable>TRUE</Machinable></Package></RateV3Request>";

		
 		$data ='API=RateV3&XML=<RateV3Request USERID="$this->_uspsID">
					<Revision/>
					<Package ID="1ST">
						<Service>FIRST CLASS</Service>
						<FirstClassMailType>LETTER</FirstClassMailType>
						<ZipOrigination>$this->origin</ZipOrigination>
						<ZipDestination>$this->destination</ZipDestination>
						<Pounds>0</Pounds>
						<Ounces>3.5</Ounces>
						<Container/>
						<Size>REGULAR</Size>
						<Machinable>true</Machinable>
					</Package>
				</RateV3Request>'; 
		//$datas = urlencode($data);
		
		$ch = curl_init();
		// set the target url
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		
		//set the post data
		curl_setopt($ch, CURLOPT_POST, 1);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		
		$response = curl_exec($ch);
		
		$xml = new SimpleXmlElement($response);
		foreach($ele->entry as $entry)
		return $xml;
		
		
		
/* 		$rates = strstr($response, '<?');
		
		$xml_parser = xml_parser_create();
		xml_parse_into_struct($xml_parser, $rates, $vals, $index);
		xml_parser_free($xml_parser);
		
		$params = array();
		$level = array();

		foreach ($vals as $xml_elem) {
			if ($xml_elem['type'] == 'open') {
				if (array_key_exists('attributes',$xml_elem)) {
					list($level[$xml_elem['level']],$extra) = array_values($xml_elem['attributes']);
				} else {
				$level[$xml_elem['level']] = $xml_elem['tag'];
				}
			}
			if ($xml_elem['type'] == 'complete') {
			$start_level = 1;
			$php_stmt = '$params';
			while($start_level < $xml_elem['level']) {
				$php_stmt .= '[$level['.$start_level.']]';
				$start_level++;
			}
			$php_stmt .= '[$xml_elem[\'tag\']] = $xml_elem[\'value\'];';
			eval($php_stmt);
			}
		}		
		curl_close($ch);
		echo '<pre>'; print_r($params); echo'</pre>'; // Uncomment to see xml tags
		return $params['RATEV3RESPONSE']['1ST']['1']['RATE'];
	*/
	}
	
}

$shipping = new USPSShipping;

$result = $shipping->_connect('690DEVBL1739','33','89121','07102');
echo '<pre>';
print_r($result);
