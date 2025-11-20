# JSON

PHPには配列があるが、JavaScriptや他の言語にPHPの配列なんて概念はない。

=> PHPの配列をそのまま渡しても、読んでもらえない

なので、JSONという世界共通のテキスト形式に変換して渡す必要がある。

## json_encode (PHP配列 => JSON文字列)

- エンコード(暗号化・変換)
- PHPの配列やオブジェクトを、JSON形式のただの文字列に変換する
- PHPからJavaScriptにデータを渡すとき
- 配列の中身をそのままファイルに保存するとき

## json_decode (JSON文字列 => PHPの配列)

- デコード(復号・元に戻す)
- JSON形式の文字列をPHPが扱える形(配列など)に戻す
- JavaScritpから送られたデータを受け取るとき
- APIからデータを取得したとき

`json_decode`はそのまま使うと、オブジェクト(stdClass)という扱いづらい型で返ってくる。

連想配列で受け取りたい場合は、第2引数に`true`をつけてあげる。

## memo

```
// 登録処理
if (file_exists('todos.json')) {
  $todos = json_decode(file_get_contents('todos.json'), true);
} else {
  $todos = [];
}

if (empty($todos)) {
  $new_id = 1;
} else {
  $new_id = $todos[array_key_last($todos)]['id'] + 1;
}

$todos[] = [
  'id' => $new_id, 'task' => $todo, 'done' => false
];

file_put_contents('todos.json', json_encode($todos, JSON_PRETTY_PRINT));
```

