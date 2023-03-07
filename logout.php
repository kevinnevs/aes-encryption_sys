<!-- PHP script to log out of the session -->
<?php

session_start();

session_destroy();

header("Location: index.php");
exit;
?>