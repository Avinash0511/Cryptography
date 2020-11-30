<?php
  $error = false;
  $msg = '';
  $ans = false;
  $verify='';
  $sttime = microtime(true);
  if(empty($_POST['msg']))
  {
    $error = "Invalid Input";
  }
  elseif (isset($_POST['msg'])) {
    $msg = $_POST['msg'];
    $ans = password_hash($msg, PASSWORD_BCRYPT);
    if(password_verify($msg,$ans))
    {
      $verify = "Password Verified";
    }
    else {
      $verify = "Not Verified";
    }
  }
  $edtime = microtime(true);
  $time = $edtime - $sttime;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="assets/use5.css">
    <title>Blowfish Algorithm</title>
  </head>
  <body class="body2">
    <h1 class="h1">Blowfish Algorithm</h1>
    <form class="form" method="post">
      <label for="msg">Enter the Password you want to encrypt: </label>
      <input class="txt" name="msg" placeholder="*4v1n4sh*" value="<?= htmlentities($msg) ?>">
      <button class="btn" type="submit">Encode</button>
    </form>
    <p class="para">
    <?php
      if ($error !== false) {
        echo htmlentities($error);
        echo "<br><br>";
        print "Elapsed time: " . "$time";
      }
      if ($ans !== false) {
        echo "Original Password: ".htmlentities($msg);
        echo "<br>";
        echo "Password Encrypted using Blowfish Algorithm: ".htmlentities($ans);
        echo "<br>";
        echo "Verification: " . htmlentities($verify);
        echo "<br><br>";
        print "Elapsed time: " . "$time"."sec";
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
