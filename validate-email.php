<!-- This PHP script gets to check in the db whether if the email provided when registering,
does exist. Or it's a new one -->
<?php

$mysqli = require __DIR__ . "/config.php";

$sql = sprintf("SELECT * FROM user
                WHERE email = '%s'",
                $mysqli->real_escape_string($_GET["email"]));
                
$result = $mysqli->query($sql);

$is_available = $result->num_rows === 0;

header("Content-Type: application/json");

echo json_encode(["available" => $is_available]);
?>