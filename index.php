<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
  $mysqli = require __DIR__ . "/config.php";
  
  $sql = "SELECT * FROM users
          WHERE id = {$_SESSION["user_id"]}";
          
  $result = $mysqli->query($sql);
  
  $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <h1>AES IMAGE ENCRYPTION SYSTEM</h1>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  </head>
  <body>
    <h1>Home</h1>
    
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>

  </body>
</html>
