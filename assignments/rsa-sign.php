<?php

//Passed data as POST request from User
$data = '';
$priKey='';
$puKey='';
$sign='';
$ans=false;
if(isset($_POST['msg']))
{
  $data = $_POST['msg'];
  //Public and Private keys generator
  $key_pairs = openssl_pkey_new(array(
      "digest_alg" => "sha512",
      "private_key_bits" => 4096,
      "private_key_type" => OPENSSL_KEYTYPE_RSA,
  ));

   //Creating Private key for signing
   openssl_pkey_export($key_pairs,$privKey);
   $priKey = $privKey;

   $pubkey = openssl_pkey_get_details($key_pairs);
   $pubkey = $pubkey['key'];
   $puKey = $pubkey;

  //create signature
  openssl_sign($data, $signature, $privKey, "sha256WithRSAEncryption");
  $sign = $signature;

  //verify signature
  $ok = openssl_verify($data, $signature, $pubkey, OPENSSL_ALGO_SHA256);
  if ($ok == 1) {
      $ans = "Verified";
  } elseif ($ok == 0) {
      $ans = "Invalid";
  } else {
      $ans = "Verification failed";
  }
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Digital Signature</title>
    <link rel="stylesheet" href="assets/use2.css">
  </head>
  <body class="body2">
    <h1 class="h1">Digital Signature</h1>
    <form class="form" method="POST">
      <label for="msg">Enter the message you want to sign: </label>
      <input class="txt" name="msg" placeholder="Eg. Message Here" value="<?= htmlentities($data) ?>" required>
      <button type="submit" class="btn">Sign</button>
    </form>
    <pre class="para" style="font-size:18px;">
      <?php
        if($ans !== false)
        {
          var_dump($priKey);
          echo "<br><br><br>";
          var_dump($puKey);
          echo "<br><br><br>";
          echo $sign;
          echo "<br><br><br>";
          echo $ans;
        }
       ?>
     </pre>
     <nav class="nav">
       <li class="mn">Contents</li>
       <ul>
         <li class="li"><a href="index.php" class="a1" target="_self">Back to main page</a></li>
       </ul>
     </nav>
  </body>
</html>
