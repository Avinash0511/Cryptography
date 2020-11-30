<?php
  $data = '';
  $key = '';
  $encrypted = false;
  $decrypted = '';
  $error = false;
  $method = "DES-ECB";
  if(!isset($_POST['data']) || !isset($_POST['key']))
  {
    $error = "Invalid Input";
  }
  elseif (isset($_POST['data']) && isset($_POST['key'])) {
    $data  = $_POST['data'];
    $key = $_POST['key'];
    $encrypted = openssl_encrypt($data,'DES-ECB',$key);
    $decrypted = openssl_decrypt($encrypted,'DES-ECB',$key);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/use5.css">
    <title>DES Algorithm</title>
  </head>
  <body class="body2">
    <h1 class="h1">DES Encryption & Decryption</h1>
    <form class="form" method="post">
      <label for="data">Enter the Message: </label>
      <input class="txt" name="data" placeholder="workhard" value="<?= htmlentities($data) ?>">
      <label for="key">Enter the Key: </label>
      <input class="txt" name="key" placeholder="Be silent to hear everything" value="<?= htmlentities($key) ?>">
      <button class="btn" type="submit">Encode</button>
    </form>
    <p class="para">
      <?php
        if ($error !== false) {
          print "<span class=\"blinking\">";
          print "*".$error."<br>";
          print "</span>";
        }
        if ($encrypted !== false) {
          echo "Entered Plaintext: " . $data . "<br>";
          echo "Entered Key: " . $key . "<br>";
          echo "Encrypted Text: " . $encrypted . "<br>";
          echo "Decrypted Text: " . $decrypted . "<br>";
        }
      ?>
    </p>
  </body>
</html>
