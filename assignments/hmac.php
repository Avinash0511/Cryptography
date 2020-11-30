<?php
  function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
    return $randomString;
  }
  $error = false;
  $mesg = '';
  $ans = false;
  $n=10;
  if(empty($_POST['msg'])) {
    $error = "Please enter the Message.";
  }
  elseif (isset($_POST['msg'])) {
    $str = getName($n);
    $mesg = $_POST['msg'];
    $ans = hash_hmac('sha256',$mesg,$str,false);
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="assets/use4.css">
    <meta charset="utf-8">
    <title>HMAC</title>
  </head>
  <body>
    <h1 class="h1">Hash Based Message Authentication Code(HMAC)</h1>
    <form class="form" method="post">
      <label for="msg">Enter the Message: </label>
      <input class="txt" name="msg" placeholder="Let's start our work" value="<?= htmlentities($mesg) ?>">
      <button class="btn" type="submit">Encode</button>
    </form>
    <p class="para">
      <?php
        if ($error !== false) {
          print "<span class=\"blinking\">";
          print "*".$error."<br>";
          print "</span>";
        }
        if ($ans !== false) {
          echo "HMAC Message digest of given message: " . $ans . "<br>";
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
