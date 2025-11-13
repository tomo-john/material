# Path操作関連

Linuxの`mkdir`, `basename`などのコマンドを同じ働きをする関数がPHPにも存在する。

| 関数名                            | 役割                             | Linuxコマンド |
|-----------------------------------|----------------------------------|---------------|
| `mkdir($path, $mode, $recursive)` | ディレクトリを作成               | `mkdir`       |
| `basename($path)`                 | パスの末尾部分(ファイル名)を取得 | `basename`    |
| `dirname($path)`                  | パスのディレクトリ部分を取得     | `dirname`     |

## mkdir()

```
mkdir($directory, $permissions, $recursive)
```

- `$directory`: 作成するディレクトリ(名)
- `$permissions`: ディレクトリのパーミッション値(数値)
- `$recursive`: 再帰的にディレクトリ作るか(true/false)

ディレクトリ作成に成功した場合は`true`、失敗すると`false`を返す。

作成しようとするディレクトリが既に存在する場合はエラーとなり、`false`が返る。

=> `is_dir()`や`file_exists()`でチェックする

`$permissions`には先頭に0を付ける。(`0777`) => umaskの影響受ける。

`$recursive`がtrueであれば、指定されたディレクトリ名の親ディレクトリがなければ同じパーミッションで作成する。

```
mkdir('/storage/app/public/images/dogs', 0777, true);
```

=> 存在しないディレクトリも含め全部作ってくれる

## basename(), dirname()

```
$path = '/var/www/html/uploads/dog.png';

echo basename($path); // dog.png
echo dirname($path);  // /var/www/html/uploads
```

