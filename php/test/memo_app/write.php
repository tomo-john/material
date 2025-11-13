<?php
$file_name = htmlspecialchars($_POST['file_name'], ENT_QUOTES, 'UTF-8');
$content = nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));

echo "保存フィアル名: " . $file_name . "<br>";
echo "メモ内容:<br> " . $content . "<br>";

