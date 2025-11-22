<?php 
if (isset($_GET['data'])) {
  $data = $_GET['data'];
}

if (isset($_POST['data'])) {
  $data = $_POST['data'];
}

var_dump($data);

?>
