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

### DSNの中身

- `mysql:` => MySQLを使うよ
- `dbname=dog_app` => 使用するデータベース名
- `host=127.0.0.1` => DBの場所(IP)
- `charset=utf8mb4` => 文字コード

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

| 定数                     | 意味                                                               |
|--------------------------|--------------------------------------------------------------------|
| `PDO::ATTR_ERRMODE`      | エラーの処理方法(エラーモード)を設定する属性                       |
| `PDO::ERRMODE_EXCEPTION` | エラーが発生した場合に、PHP標準の 例外(PDOException)を投げるモード |

### PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

| 定数                           | 意味                                                     |
|--------------------------------|----------------------------------------------------------|
| `PDO::ATTR_DEFAULT_FETCH_MODE` | データベースからデータを取り出すときの形式を設定する属性 |
| `PDO::FETCH_ASSOC`             | データを 連想配列(Associative Array) の形式で取り出す    |

## SQL実行の流れ(INSERT)

```
public function saveDog(string $name, int $age): bool {
  $pdo = $this->getPdoConnection(); 

  $sql = 'INSERT INTO dogs (name, age) VALUES (:name, :age)';
  $stmt = $pdo->prepare($sql);

  $stmt->bindParam(':name', $name, PDO::PARAM_STR);
  $stmt->bindParam(':age', $age, PDO::PARAM_INT);

  return $stmt->execute();
}
```

### 接続を取得

`getPdoConnection()`メソッドにはPDOオブジェクト生成を定義しておく。

=> SQLを実行する前に、まずデータベースとの通信路を確率しておく

### SQLの枠組みを用意(Prepare)

- `$sql = 'INSERT INTO dogs (name, age) VALUES (:name, :age)';`
- `$stmt = $pdo->prepare($sql);`

`$sql`変数に、データを挿入するSQL文を定義。

値を入れるべき場所を、`'じょん'`や`2`と直接書かずに、`:`で始まるプレースホルダ`(:name, :age)`で置換えている。

`$pdo->prepare($sql)`によって、この枠組みをデータベースサーバーに事前に送信し、実行準備をさせている。

この枠組み(`$stme` : ステートメント)を先に準備しておくことで、後から渡すデータがSQLの命令でなく、ただの値として扱われる。

=> これによりSQLインジェクションを防ぐことができる(これがプリペアドステートメントのメリット)

`$stmt`には、準備された状態のステートメント(PDOStatementオブジェクト)が格納されてる。

### 値を紐づける(Bind)

- `$stmt->bindParam(':name', $name, PDO::PARAM_STR);`
- `tmt->bindParam(':age', $age, PDO::PARAM_INT);`

準備されたステートメント`$stmt`に対して、`bindParam`メソッドを使って、プレースホルダとPHPの変数とを紐づけている。

- 1. `:name` : プレースホルダ名(SQL文に書いた目印)
- 2. `$name` : 実際に挿入したいPHPの変数(関数の引数でもらっている)
- 3. `PDO::PARAM_STR` : データ型の指定(`PARAM_STR`は文字列、`PARAM_INT`は整数値)

### SQLを実行する(Execute)

- `return $stmt->execute();`

紐づけが完了した後、`$stmt->execute()`でデータベースサーバーに「このSQLを実行してね」と命令する。

`execute()`は、実行が成功した場合は`true`、失敗した場合は`false`を返す。

このメソッドでは、その真偽値をそのまま呼び出し元に返している。

## SQL実行の流れ2(SELECT)

```
public function getDog(): array {
  $pdo = $this->getPdoConnection();
  
  $sql = 'SELECT * FROM dogs';
  $stmt = $pdo->prepare($sql);
  $stmt->execute();
  return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
```

### fetchALL()

実行結果から、すべてのデータ行を配列として取得するメソッド。

`PDO::FETCH_ASSOC`はデータ取得時の形式を`連想配列`に指定するオプション。

実行したSELECT文の結果がPHPの連想配列に変換されて`$stmt`から返される。

### query()

今回は使用していないが、固定されたSQL(可変データの埋め込みがない)を実行するときは`query()`メソッドも使用できる。

| メソッド              | 用途                                            | プリペアドステートメント |
|-----------------------|-------------------------------------------------|--------------------------|
| `$pdo->query($sql)`   | 固定されたSQLを実行するとき                     | 使われない               |
| `$pdo->prepare($sql)` | 可変データを埋め込む必要があるSQLを実行するとき | 使われる                 |

`$sql = 'SELECT * FROM dogs';`のように、外部の変数を一切使っていない固定のSQLであれば、`$pdo->query()`を使ってもセキュリティ上の問題はない。

一応Laravelでは安全性を最優先するために、たとえ固定のSQLでもほとんどの場合`$pdo->prepare()`を通すように設計されている。(らしい)

コードの統一性や拡張性の面からも、`$pdo->prepare($sql)`の書き方で統一しておくのがようさそう。

