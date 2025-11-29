# JSON

PHPには配列があるが、JavaScriptや他の言語にPHPの配列なんて概念はない。

=> PHPの配列をそのまま渡しても、読んでもらえない

なので、JSONという世界共通のテキスト形式に変換して渡す必要がある。

## json_encode (PHP配列 => JSON文字列)

- エンコード(暗号化・変換)
- PHPの配列やオブジェクトを、JSON形式のただの文字列に変換する
- PHPからJavaScriptにデータを渡すとき
- 配列の中身をそのままファイルに保存するとき

### JSON_PRETTY_PRINT

JSONの出力に改行やインデントを加えて、人間が読みやすい形式に整形。

### JSON_UNESCAPED_UNICODE

日本語などのUnicode文字を、エスケープ(`\uXXX`の形式)せずにそのまま文字で出力する。

## json_decode (JSON文字列 => PHPの配列)

- デコード(復号・元に戻す)
- JSON形式の文字列をPHPが扱える形(配列など)に戻す
- JavaScritpから送られたデータを受け取るとき
- APIからデータを取得したとき

`json_decode`はそのまま使うと、オブジェクト(stdClass)という扱いづらい型で返ってくる。

連想配列で受け取りたい場合は、第2引数に`true`をつけてあげる。

## memo

```
// 配列 => JSON => ファイル書き込み
$array1 = ['じょん', 'ぴょんきち', 'もこもか'];
$file_name = 'test.json';
file_put_contents($file_name, json_encode($array1, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

// ファイル読み込み => JSON => 配列
$file_name = 'test.json';
$input_json = file_get_contents($file_name);
$array2 = json_decode($input_json, true);
var_dump($array2);
```

