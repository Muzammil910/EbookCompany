<?php

session_start();
session_abort();
session_destroy();
// header("location:../project/index.php");
echo "<script> window.location.href='../project/index.php'</script>";

?>