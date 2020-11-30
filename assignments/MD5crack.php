<!DOCTYPE>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/use1.css">
  <title>MD5 Cracker</title>
</head>
<body class="body1">
  <pre class="pre">
  <?php
    $txt = '';
    $err = false;
    $out = false;
    set_time_limit(300);
    $start_time = microtime(true);
    if (empty($_GET['md5'])) {
      $err = "Nothing Found";
    }
    elseif(isset($_GET['md5'])) {
      $txt = $_GET['md5'];
      if (strlen($txt) > 32 || strlen($txt) < 32) {
        $err = "MD5 hash should be of 32 hexadecimal characters";
      }
      else {
        $pin_max = 1000000000;
        $count = 0;
        $cnt = 15;
        for ($i=1000; $i < $pin_max; $i++) {
          $ans = hash('md5', $i);
          if($ans == $txt) {
            $out = $i;
            break;
          }
          $count++;
        }
      }
    }
    $end_time = microtime(true);
    $time = $end_time - $start_time;
    ?>
  </pre>
  <h1 class="h1" style="text-align:center;">Avinash's MD5 PIN Cracker</h1>
  <h2 class="h2">This cracker only cracks PIN of length 4 to 8</h2>
  <form class="form" method="get">
    <label for="md5">Enter MD5 hash: </label>
    <input class="txt" name="md5" placeholder="Eg. ebbe5a39c21df62e8cac0767a3e531bd" value="<?= htmlentities($txt) ?>" size="60">
    <button type="submit" class="btn">Crack it</button>
  </form>
  <p class="para">
    <?php
      if ($err !== false) {
        echo htmlentities($err);
        echo "<br><br>";
        echo "Time elapsed: " . $time;
      }
      if($out !== false) {
        echo "PIN: ". htmlentities($out);
        echo "<br><br>";
        echo "Total checks:" . $count;
        echo "<br><br>";
        echo "Time elapsed: " . $time . "sec";
      }
    ?>
  </p>
  <nav class="nav">
    <li class="mn">Contents</li>
    <ul>
      <li class="li"><a href="encodeMD5.php" target="_self" style="font:18px sans;" class="a1">MD5 Encode</a></li>
      <li class="li"><a href="index.php" class="a1" target="_self">Back to main page</a></li>
    </ul>
  </nav>
</body>
</html>
