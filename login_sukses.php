<?php

session_start();
$_SESSION["myusername"];
if(empty($_SESSION["myusername"])){
    header("location:login.php");
}
?>
<html>
    <body>
    Login Successful
    <?php include("adminpanel.php")?>
    </body>
</html>

