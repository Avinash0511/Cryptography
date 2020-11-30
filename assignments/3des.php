<?php
error_reporting(0);
function encrypt($data, $secret)
{
  $key = md5(utf8_encode($secret), true);
  $key .= substr($key, 0, 8);
  $blockSize = mcrypt_get_block_size('tripledes', 'ecb');
  $len = strlen($data);
  $pad = $blockSize - ($len % $blockSize);
  $data .= str_repeat(chr($pad), $pad);
  $encData = mcrypt_encrypt('tripledes', $key, $data, 'ecb');
  return base64_encode($encData);
}
$key = '';
$str = '';
$enctext = false;
$error = false;
if (!isset($_POST['key']) || !isset($_POST['msg'])) {
  $error = "Invalid Input";
}
elseif (isset($_POST['key']) || isset($_POST['msg'])) {
  $key = $_POST['key'];
  $str = $_POST['msg'];
  $enctext = encrypt($str, $key);
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
      <label for="msg">Enter the message: </label>
      <input class="txt" name="msg" placeholder="Be silent to hear everything" value="<?= htmlentities($str) ?>">
      <button class="btn" type="submit">Encode</button>
    </form>
    <p class="para">
      <?php
        if ($error !== false) {
          print "<span class=\"blinking\">";
          print "*".$error."<br>";
          print "</span>";
        }
        if ($enctext !== false) {
          echo "Entered Key: " . $key . "<br>";
          echo "Entered Plaintext: " . $str . "<br>";
          echo "Encypted Text: " . $enctext . "<br>";
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
