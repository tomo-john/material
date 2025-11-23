<?php
// test_js.php JavaScript検証用
$id = $_POST['id'];
$answer = $_POST['answer'];

echo 'このページに辿り着いたあなたは、素晴らしい選択です🐶';

echo '<br><br>';
echo 'デバッグ用:<br>';
echo '$_POSTで受け取った$id: ' . $id  . '<br>';
echo '$_POSTで受け取った$answer: ' . $answer  . '<br>';

?>
