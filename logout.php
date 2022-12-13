<?php
session_start();
session_unset($_SESSION['email']);

echo "<script>window.location.href='index.php'</script>";

?>