<?php
$msg = '';
$error = false;
$s1 = false;
$s256 = '';
$s224 = '';
$s384 = '';
$s512 = '';
$time_pre = microtime(true);
if(empty($_POST['msg']))
{
  $error = "Invalid Input";
}
elseif (isset($_POST['msg'])) {
  $msg = $_POST['msg'];
  $s1 = hash('sha1', $msg);
  $s224 = hash('sha224', $msg);
  $s256 = hash('sha256', $msg);
  $s384 = hash('sha384', $msg);
  $s512 = hash('sha512', $msg);
}
$time_post = microtime(true);
$time = $time_post-$time_pre;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1" charset="utf-8">
    <link rel="stylesheet" href="assets/use2.css">
    <title>SHA</title>
  </head>
  <body class="body2">
    <h1 class="h1">SHA Encoding</h1>
    <form class="form" method="POST">
      <label for="msg">Enter data to encode:</label>
      <input class="txt" name="msg" placeholder="Eg. Message is this" value="<?= htmlentities($msg) ?>">
      <button type="submit" class="btn">Encode</button>
    </form>
    <p class="para" style="font-size:20px;">
<?php
if($error !== false)
{
  echo htmlentities($error);
}
if($s1 !== false)
{
  echo "SHA1 Value: " . htmlentities($s1);
  echo "<br>";
  echo "SHA224 Value: " . htmlentities($s224);
  echo "<br>";
  echo "SHA256 Value: " . htmlentities($s256);
  echo "<br>";
  echo "SHA384 Value: " . htmlentities($s384);
  echo "<br>";
  echo "SHA512 Value: " . htmlentities($s512);
  echo "<br><br>";
  echo "Time taken: " . htmlentities($time);
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
