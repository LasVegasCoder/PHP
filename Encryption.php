<?php

//Encryption:
$textToEncrypt = "My Text to Encrypt";
$encryptionMethod = "AES-256-CBC";
$secretHash = "encryptionhash";
$iv = mcrypt_create_iv(16, MCRYPT_RAND);
$encryptedText = openssl_encrypt($textToEncrypt,$encryptionMethod,$secretHash, 0, $iv);

//Decryption:
$decryptedText = openssl_decrypt($encryptedText, $encryptionMethod, $secretHash, 0, $iv);
print "My Decrypted Text: ". $decryptedText;


?>
