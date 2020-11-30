<?php
  $prime = '';
  $last = false;
  $txt = false;
  $ans = '';
  $flag = 0;
  $privateA = '';
  $privateB = '';
  $ya = '';
  $yb = '';
  $gen = '';
  $gene = '';
  $keyA = '';
  $keyB = '';
if (isset($_POST['prime'])) {
  $prime = $_POST['prime'] + 0;
  $temp = $prime;
  if ($prime < 2) {
    $last = "Enter number greater than 1";
  }
  elseif ($prime > 16 ) {
    $last = "Enter a number less than 15";
  }
  else {
    $m = $prime/2;
    for ($i=2; $i<=$m ; $i++) {
      if($prime%$i == 0) {
        $last = "Not a Prime Number";
        $flag = 1;
        break;
      }
    }
    if($flag == 0)
    {
      $ans = array();
      $txt = "It is a Prime Number";
      if($prime == 2) {
        $ans[] = 1;
      }
      elseif ($prime == 3) {
        $ans[] = 2;
      }
      else {
        $a = $prime-1;
        while ($a >= 2) {
          for ($j=1; $j < $prime; $j++) {
            $gen = (pow($a,$j) % $prime);
            $ar[$j] = $gen;
          }
          sort($ar);
          for ($j=1; $j < $prime; $j++) {
            if ($j == $ar[$j]) {
              $temp = 1;
            }
            else {
              $temp = 0;
              break;
            }
          }
          if ($temp == 1) {
            $ans[] = $a;
          }
          $a--;
        }
      }
      if (count($ans) == 1) {
        $gene = $ans[0];
        if(isset($_POST['pri']) && isset($_POST['pra'])) {
          $privateA = $_POST['pri'] + 0;
          $privateB = $_POST['pra'] + 0;
          if($privateA >= $prime || $privateB >= $prime)
          {
            $last = "Please enter correct key(less than Prime number provided)";
          }
          else {
            $ya = (pow($gene,$privateA) % $prime);
            $yb = (pow($gene,$privateB) % $prime);
            $keyA = (pow($ya,$privateB) % $prime);
            $keyB = (pow($yb,$privateA) % $prime);
          }
        }
      }
      else {
        $cn = count($ans)-1;
        if($cn >=0) {
          $temp = random_int(0,$cn);
        }
        $gene = $ans[$temp];
        if(isset($_POST['pri']) && isset($_POST['pra'])) {
          $privateA = $_POST['pri'] + 0;
          $privateB = $_POST['pra'] + 0;
          if($privateA >= $prime || $privateB >= $prime)
          {
            $last = "Please enter correct key(less than Prime number provided)";
          }
          else {
            $ya = (pow($gene,$privateA) % $prime);
            $yb = (pow($gene,$privateB) % $prime);
            $keyA = (pow($ya,$privateB) % $prime);
            $keyB = (pow($yb,$privateA) % $prime);
          }
        }
      }
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/use3.css">
  <title>Diffie-Helman Key Exchange</title>
</head>
<body class="body3">
  <h1 class="h1" style="text-align:center;">Diffie-Helman Key Exchange</h1>
  <form class="form" method="post">
    <label for="prime">Enter a Prime number between 2 to 15: </label>
    <input class="txt" name="prime" type="number" placeholder="eg. 2" value="<?= htmlentities($prime) ?>" required>
    <br>
    <label for="pri">Enter Private Key for user A(less then Prime above)</label>
    <input class="txt" name="pri" type="number" placeholder="eg. 4" value="<?= htmlentities($privateA) ?>" required>
    <br>
    <label for="pra">Enter Private Key for user B(less then Prime above)</label>
    <input class="txt" name="pra" type="number" placeholder="eg. 4" value="<?= htmlentities($privateB) ?>" required>
    <br>
    <button type="submit" class="btn">Submit</button>
  </form>
  <pre class="para">
    <?php
      if ($last !== false) {
        echo "<br>"."$last"."<br>";
      }
      if ($txt !== false) {
        echo "<br>"."$txt"."<br>";
        echo "Generators for above Prime number: "."<br>";
        for ($t=0; $t < count($ans); $t++) {
          echo $ans[$t]."<br>";
        }
        echo "<br>" . "Prime Number: " . $prime . "<br>";
        echo  "Generator: ". $gene ."<br>";
        echo "Private Key(user A): " . $privateA . "<br>";
        echo "Private Key(user B): " . $privateB . "<br>";
        echo "Public Key(user A): " . $ya . "<br>";
        echo "Public Key(user B): " . $yb . "<br>";
        echo "Key(user A): " . $keyA . "<br>";
        echo "Key(user B): " . $keyB . "<br>";
      }
     ?>
   </pre>
   <nav class="nav">
     <li class="mn">Contents</li>
     <ul>
       <li class="li"><a href="MD5crack.php" class="a1" target="_self">MD5 Crack</a></li>
       <li class="li"><a href="encodeMD5.php" class="a1" target="_self">MD5 Encode</a></li>
       <li class="li"><a href="index.php" class="a1" target="_self">Back to main page</a></li>
     </ul>
   </nav>
</body>
</html>
