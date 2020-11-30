<?php
  include 'rsa-in-php.php';
  $plainText = '';
  $enctext = false;
  $keys = '';
  $dectext = '';
  set_time_limit(300);
  if (isset($_POST['text'])) {
    $plainText = $_POST['text'];
    $RSA = new RSA_Handler();
    $keys = $RSA->generate_keypair(1024);
    $enctext = $RSA->encrypt($plainText,$keys[0]);
    $dectext = $RSA->decrypt($enctext,$keys[1]);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title class="h1" style="text-align:center;">RSA Algorithm</title>
    <link rel="stylesheet" href="assets/use4.css">
  </head>
  <body>
    <h1 class="h1">Rivest-Shamir-Adelmen Algorithm</h1>
    <form class="form" method="post">
      <label for="text">Enter Plain text</label>
      <input class="txt" name="text" placeholder="Eg. Hello I am text" value="<?= htmlentities($plainText) ?>" required>
      <button type="submit" class="btn">Submit</button>
    </form>
    <pre class="pre">
      <?php
        if ($enctext !== false) {
          echo "Plaintext: " . $plainText . "<br>";
          //echo "Public Key: " . $keys[0] . "<br>";
          //echo "Private Key: " . $keys[1] . "<br>";
          echo "Ecnrypted Text: " . $enctext . "<br>";
          echo "Decrypted Text" . $dectext . "<br>";
        }
      ?>
  </body>
</html>
