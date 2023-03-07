<!-- This PHP script enables the filled in credentials on the login form to be posted to the Database.
Then the if...else logic enables to further authenticate whether the provided email & password is correct.
From the already registered users.
-->
<?php

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/config.php";
    
    $sql = sprintf("SELECT * FROM users
                    WHERE email = '%s'",
                   $mysqli->real_escape_string($_POST["email"]));
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        if (password_verify($_POST["password"], $user["password_hash"])) {
            
            session_start();
            
            session_regenerate_id();
            
            $_SESSION["user_id"] = $user["id"];
            
            header("Location: index.php");
            exit;
        }
    }
    
    $is_invalid = true;
}

?>

<!-- The login form. This enables the user to type in their email and password credentials -->
<!DOCTYPE html>
<html>
<head>
<h1>AES IMAGE ENCRYPTION SYSTEM</h1>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    
    <h1>Login</h1>
    <!-- The login to display that an invalid login has happened, with the provided credentials -->
    <?php if ($is_invalid): ?>
        <em>Invalid login</em>
    <?php endif; ?>
    
    <form method="post">
        <label for="email">email</label>
        <input type="email" name="email" id="email"
               value="<?= htmlspecialchars($_POST["email"] ?? "") ?>">
        
        <label for="password">Password</label>
        <input type="password" name="password" id="password">
        
	<button>Log in</button>
    </form>
 <p>Not regisered yet? <a href="registration.html">Sign Up</p>
    
</body>
</html>
