<!-- This PHP script gets to validate the following registration process :
1. Validating if the email address has been provided.
2. Validating the password provided has at least 8 characters.
3. Validating the password provided contains at least one letter.
4. Validating the password must containt at least one number.
5. Validating the confirmation password section matches the inital password provided.
After validating the credential, it inserts the information to the database.
-->
<?php

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Valid email is required");
}

if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["confirm-password"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require __DIR__ . "/config.php";

$sql = "INSERT INTO users (username, password, email)
        VALUES (?, ?, ?)";
        
$stmt = $mysqli->stmt_init();

if ( ! $stmt->prepare($sql)) {
    die("SQL error: " . $mysqli->error);
}

$stmt->bind_param("sss",
                  $_POST["username"],
                  $password_hash,
                  $_POST["email"]);
                  
if ($stmt->execute()) {

    header("Location: registered-success.html");
    exit;
    
} else {
    
    if ($mysqli->errno === 1062) {
        die("email already taken");
    } else {
        die($mysqli->error . " " . $mysqli->errno);
    }
}
?>
