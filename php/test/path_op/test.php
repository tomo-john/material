<?php
echo "path操作🐶<br>";

mkdir('tmp', 0777, true);

$path = '/var/www/html/uploads/dog.png';

echo basename($path);
echo "<br>";
echo dirname($path);
