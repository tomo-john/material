<?php
$no_nl2br = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
$is_nl2br = nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));

var_dump($_POST['content']);
echo "<br>";

var_dump($no_nl2br);
echo "<br>";

var_dump($is_nl2br);
echo "<br>";
