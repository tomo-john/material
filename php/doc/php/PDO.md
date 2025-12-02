# PDO

PHP Data Objectsの略で、PHPがデータベースを操作する為の公式な拡張機能(API)

## 接続情報の準備

どのデータベースの、どこにある、どのユーザー情報を利用するかをPDOに伝える。

```
// DSN (Data Source Name)
$dsn = 'mysql:dbname=dog_app;host=127.0.0.1;charset=utf8mb4';
$user = 'tomo';
$pass = 'password';
```

## データベースに接続

`new PDO`でPDOインスタンス(実体)を作成する。

エラーが出る可能性が高いので、必ず`try-catch`で囲む。

```
try {
  // 接続！
  $pdo = new PDO($dsn, $user, $password, [
    // オプション（エラーモードやデータの形式を設定）
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC 
  ]);
} catch (PDOException $e) {
  // 接続失敗時の処理
}
```

### PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

| 定数                     | 意味                                                                |
|--------------------------|---------------------------------------------------------------------|
| `PDO::ATTR_ERRMODE`      | エラーの処理方法(エラーモード)を設定する属性                        |
| `PDO::ERRMODE_EXCEPTION` | エラーが発生した場合に、PHP標準の 例外(PDOException)を投げる モード |

### PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

| 定数                           | 意味                                                     |
|--------------------------------|----------------------------------------------------------|
| `PDO::ATTR_DEFAULT_FETCH_MODE` | データベースからデータを取り出すときの形式を設定する属性 |
| `PDO::FETCH_ASSOC`             | データを 連想配列(Associative Array) の形式で取り出す    |

