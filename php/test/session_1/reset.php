<?php
session_start();

unset($_SESSION['visited_count']);

header('Location: page1.php');
exit;
