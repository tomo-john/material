<!DOCTYPE html>
<html>
<head><title>$_FILESの中身</title></head>
<body>
  <form action="print.php" method="post" enctype="multipart/form-data">
    <label>ファイルを選択:<label>
    <input type="hidden" name="MAX_FILE_SIZE" value="20000">
    <input type="file" name="file"><br><br>
    <input type="submit" value="ファイル送信">
  </form>
<body>
</html>
