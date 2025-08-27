# LIKE句

あいまい検索をする際に使われるクエリ。

## ワイルドカード

- `%(パーセント)`: 任意の文字列(0文字以上)を示す
- `_(アンダースコア)`: 任意の1文字を示す

これらを組み合わせて前方一致、後方一致、部分一致、完全一致などさまざま検索を行う。

## 例

### 基本

WHERE句内で使用、シングルクォーテーション注意。

```
SELECT * FROM users WHERE name LIKE '%dog';
```

=> 後方一致。xxxdogで終わるものがマッチする

### 任意の文字数

```
SELECT * FROM users WHERE name LIKE 'dog_';
```

=> dog1, dogA, doggなど`dog`の後に任意の1文字があるものにマッチ

=> dogやdog11などはマッチしない

### 組み合わせ

```
SELECT * FROM logs WHERE title LIKE '%dog%.log_';
```

=> dogを含み.log+任意の1文字のものにマッチ

=> マッチする: super_dog.log1, dog_hot.logA

=> マッチしない: sample.log1, hotdog.log

