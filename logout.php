<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();
session_write_close();

// Redirect to session check page, which will redirect to the login page
header("Location: check_session.php");
exit();
?>
