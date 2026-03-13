<?php
session_start();

$_SESSION = [];
session_destroy();

header('Location: ../bai2/login.php');
exit;
