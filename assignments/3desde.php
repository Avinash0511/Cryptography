<?php
error_reporting(0);
function decrypt($data, $secret)
{
  $key = md5(utf8_encode($secret), true);
  $key .= substr($key, 0, 8);
  $data = base64_decode($data);
  $data = mcrypt_decrypt('tripledes', $key, $data, 'ecb');
  $block = mcrypt_get_block_size('tripledes', 'ecb');
  $len = strlen($data);
  $pad = ord($data[$len-1]);
  return substr($data, 0, strlen($data) - $pad);
}
$key = '';
$str = '';
$dectext = false;
$error = false;
if (!isset($_POST['key']) || !isset($_POST['msg'])) {
  $error = "Invalid Input";
}
elseif (isset($_POST['key']) || isset($_POST['msg'])) {
  $key = $_POST['key'];
  $str = $_POST['msg'];
  $dectext = decrypt($str, $key);
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/use5.css">
    <title>Triple DES</title>
  </head>
  <body class="body2">
    <h1 class="h1">Triple DES(3DES)</h1>
    <form class="form" method="post">
      <label for="key">Enter the key: </label>
      <input class="txt" name="key" placeholder="workhard" value="<?= htmlentities($key) ?>">
      <label for="msg">Enter the ciphertext: </label>
      <input class="txt" name="msg" placeholder="Be silent to hear everything" value="<?= htmlentities($str) ?>">
      <button class="btn" type="submit">Decode</button>
    </form>
    <p class="para">
      <?php
        if ($error !== false) {
          print "<span class=\"blinking\">";
          print "*".$error."<br>";
          print "</span>";
        }
        if ($dectext !== false) {
          echo "Entered Key: " . $key . "<br>";
          echo "Entered Plaintext: " . $str . "<br>";
          echo "Decypted Text: " . $dectext . "<br>";
        }
      ?>
    </p>
    <nav class="nav">
      <li class="mn">Contents</li>
      <ul>
        <li class="li"><a href="index.php" class="a1" target="_self">Back to main page</a></li>
      </ul>
    </nav>
  </body>
</html>
