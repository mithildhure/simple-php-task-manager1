<?php 

SESSION_START();
unset($_SESSION["u_id"]);

SESSION_DESTROY();
header("Location:login.php");

?>


