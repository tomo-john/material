<?php
// session_reset.php セッションリセット
session_start();
session_unset();
session_destroy();

session_start();
$notices = ['セッションをリセットしました🐶'];
$_SESSION['notices'] = $notices;
header('Location:test.php');
exit;

