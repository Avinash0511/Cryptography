<!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/use2.css">
  <title>MD Encoder</title>
</head>
<body class="body2">
  <p class="p">
  <?php
    $txt = "";
    $md5 = false;
    $md2 = '';
    $md4 = '';
    $err = false;
    $time_pre = microtime(true);
    if(empty($_POST['val'])) {
      $err = "Nothing Found";
    }
    elseif(isset($_POST['val']))
    {
      $txt = $_POST['val'];
      $md5 = hash('md5',$txt);
      $md2 = hash('md2',$txt);
      $md4 = hash('md4',$txt);
    }
    $time_post = microtime(true);
    $time = $time_post-$time_pre;
  ?>
</p>
  <h1 class="h1" style="text-align:center;">MD Encoder</h1>
  <form class="form" method="post">
    <label for="val">Enter data to be encoded: </label>
    <input class="txt" name="val" placeholder="hello" value="<?= htmlentities($txt) ?>" size="20">
    <button class="btn" type="submit">Encode</button>
  </form>
  <p class="para">
  <?php
    if ($err !== false) {
      echo htmlentities($err);
      echo "<br><br>";
      print "Elapsed time: " . "$time";
    }
    if ($md5 !== false) {
      echo "MD2 Value: ".htmlentities($md2);
      echo "<br>";
      echo "MD4 Value: ".htmlentities($md4);
      echo "<br>";
      echo "MD5 Value: " . htmlentities($md5);
      echo "<br><br>";
      print "Elapsed time: " . "$time"."sec";
    }
  ?>
  </p>
  <nav class="nav">
    <li class="mn">Contents</li>
    <ul>
      <li class="li"><a href="MD5crack.php" class="a1" target="_self">MD5 Crack</a></li>
      <li class="li"><a href="index.php" class="a1" target="_self">Back to main page</a></li>
    </ul>
  </nav>
</body>
</html>
