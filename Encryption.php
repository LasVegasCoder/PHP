<?php
    /**
		Name:		PHP Encryption:
		Desc:		Encrypt and Decrypt data.
		Version:	V1.0
		Date:		3/11/2017
		Author:		Prince Adeyemi
		Contact:	prince@vegasnewspaper.com
		Facebook:	fb.com/YourVegasPrince
	*/

// Encryption setup:
    $dataToEncrypt = "My Secret Telegram: Hakuna matata!";
    $encryptMethod = "AES-256-CBC"; //MCRYPT_RIJNDAEL_128
    $mySecretHash = "somethingRandom12!)!)I!@1U2 goes gere";
	
    //$iv = mcrypt_create_iv(16, MCRYPT_RAND);
    
    // php versopm 5.x/7.x compability;
    
    If( phpversion() >= 7)
    {
        $bytes = random_bytes(8);
        $iv = (bin2hex($bytes));
    }
    elseif( phpversion() < 7 )
    {
        $ivLen = 16; 
        $iv = str_repeat("\0", $ivLen);   
    }
	else {
	    $iv = mcrypt_create_iv(16, MCRYPT_DEV_URANDOM);
	}
    
    //Encrypt data:
    $encryptedData = openssl_encrypt($dataToEncrypt,$encryptMethod,$mySecretHash, 0, $iv);
    
    //Decrypt data:
    $decryptedData = openssl_decrypt($encryptedData, $encryptMethod, $mySecretHash, 0, $iv);
    
    //OUTPUT:
    echo ("RandomIV : " . $iv . "\n");
    echo ( "Secret message : " . $dataToEncrypt ."\n" );
    echo ( "Encrypted message : ". $encryptedData ."\n" );
    echo ( "Decrypted message: ". $decryptedData ."\ln");
?>
