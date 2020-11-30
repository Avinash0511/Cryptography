<?php
$nm = '';
$pss = '';
if ( isset($_POST['cancel'] ) ) {
    header("Location: index.php");
    return;
}
$salt = 'XyZzy12*_';
$stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';
$failure = false;
if ( isset($_POST['who']) && isset($_POST['pass']) )
{
  $nm = $_POST['who'];
  $pss = $_POST['pass'];
  if ( strlen($nm) < 1 || strlen($pss) < 1 ) {
    $failure = "User name and password are required";
  }
  else {
    $check = hash('md5', $salt.$pss);
    if ( $check == $stored_hash ) {
      header("Location: game.php?name=$nm",true,303);
      return;
    }
    else {
      $failure = "Incorrect password";
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<?php require_once "bootstrap.php"; ?>
<title>Avinash Kumar Login Page</title>
</head>
<body>
  <div class="container">
    <h1>Please Log In</h1>
    <?php
    if ( $failure !== false ) {
      echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
    }
    ?>
  <form method="post">
    <label for="nam">User Name</label>
    <input type="text" name="who" id="nam" value="umsi@umich.edu"><br/>
    <label for="id_1723">Password</label>
    <input type="password" name="pass" id="id_1723" value="<?= htmlentities($pss) ?>"><br/>
    <input type="submit" value="Log In">
    <input type="submit" name="cancel" value="Cancel">
  </form>
  <p>
    For a password hint, view source and find a password hint in the HTML comments.
    <!-- Hint: The password is the four character sound a cat makes (all lower case) followed by 123. -->
  </p>
  </div>
</body>
</html>
