# nl2br

改行文字の文字の前に改行タグ(`<br>`など)を挿入して返してくれる。

対象の改行文字は、`\r\n`, `\n\r`, `\n`, `\r`

`<textarea>`などどセットで使用すること多し。

## サンプル

```
<!DOCTYPE html>
<html>
<head><title>nl2br🐶</title></head>
<body>
  <h2>nl2br🐶</h2>

  <form action="nl2br.php" method="post">
    <label>テキスト入力:</label><br>
    <textarea name="content" rows="20" cols="120" placeholder="改行してね🐶"></textarea><br>
    <input type="submit" value="送信🐶">
  </form>
</html>
```

```
<?php
$no_nl2br = htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8');
$is_nl2br = nl2br(htmlspecialchars($_POST['content'], ENT_QUOTES, 'UTF-8'));

var_dump($_POST['content']);
echo "<br>";

var_dump($no_nl2br);
echo "<br>";

var_dump($is_nl2br);
echo "<br>";
```

