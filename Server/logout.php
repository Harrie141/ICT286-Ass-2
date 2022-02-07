<?php
session_start();
session_destroy();
header("location:../WebClient/login.html");
?>