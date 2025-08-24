# リスト

- `<ul><li>` : unordered list => 項目の順序にイモを持たないリスト
- `<ol><li>` : ordered list => ランキングなど順番が変わると困るリスト
- `<dl><dt><dd>` : description list => 項目名とその説明がセットのリスト

=> `<li>`は`list items`

=> `<dt>`は`descritpion term`

=> `<dd>`は`description details`

```
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <title>list</title>
  </head>
  <body>
    <ul>
      <li>じょん</li>
      <li>ぴょんきち</li>
      <li>もこもか</li>
    </ul>
    <ol>
      <li>じょん</li>
      <li>ぴょんきち</li>
      <li>もこもか</li>
    </ol>
    <dl>
      <dt>じょん:</dt><dd>いぬです</dd>
      <dt>ぴょんきち:</dt><dd>うさぎです</dd>
      <dt>もこもか:</dt><dd>くまです</dd>
    </dl>
  </body>
</html>
```

