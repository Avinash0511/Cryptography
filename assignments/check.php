<?php
  //use ParagonIE\EasyRSA\KeyPair;
  //$text = "Peter Piper picked a peck of pickled peppers";
  //$keyPair = KeyPair::generateKeyPair(4096);
  //$secretKey = $keyPair->getPrivateKey();
  //$publicKey = $keyPair->getPublicKey();
  //$ciphertext = EasyRSA::encrypt($text, $publicKey);
  //$plaintext = EasyRSA::decrypt($ciphertext, $secretKey);
  $data = "hello avinash";
  $key = 'avinash12';
  $method = "DES-ECB";
  $ciphertext = openssl_encrypt($data,$method,$key);
  echo "$ciphertext" ."<br><br>";
  echo "$data". "<br>";
?>
