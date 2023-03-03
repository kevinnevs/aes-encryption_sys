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
    <style>
     header {
        background-color: #333;
        color: #fff;
        display: flex;
        justify-content: space-between;
        padding: 10px;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
      }
    </style>
  </head>
  <body>
    <header>
      <nav>
        <a href="index.php">Home</a>
        <a href="encrypt.html">Encrypt</a>
        <a href="decrypt.html">Decrypt</a>
      </nav>
      <a href="login.php">Log Out</a>
    </header>
    <?php if (isset($user)): ?>
        
        <p>Hello <?= htmlspecialchars($user["name"]) ?></p>
        
        <p><a href="logout.php">Log out</a></p>
        
    <?php else: ?>

    <div class="container">
      <p>Encrypting images when submitting them online is important for maintaining privacy and protecting sensitive information. AES (Advanced Encryption Standard) is a widely-used encryption algorithm that can help keep your data secure.</p>
    </div>
        
        <p><a href="login.php">Log in</a> or <a href="signup.html">sign up</a></p>
        
    <?php endif; ?>

  </body>
</html>
