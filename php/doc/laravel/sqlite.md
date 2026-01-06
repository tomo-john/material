# SQLite

Laravel 12だとプロジェクト作成時のデフォルトDBはSQLite🐶

## 確認

`.env`を見る:

```bash
DB_CONNECTION=sqlite
# DB_HOST=127.0.0.1
# DB_PORT=3306
# DB_DATABASE=laravel
# DB_USERNAME=root
# DB_PASSWORD=
```

`config/database.php`を見る:

```bash
    'connections' => [

        'sqlite' => [
            'driver' => 'sqlite',
            'url' => env('DB_URL'),
            'database' => env('DB_DATABASE', database_path('database.sqlite')),
            'prefix' => '',
            'foreign_key_constraints' => env('DB_FOREIGN_KEYS', true),
            'busy_timeout' => null,
            'journal_mode' => null,
            'synchronous' => null,
            'transaction_mode' => 'DEFERRED',
        ],
```

`'database' => env('DB_DATABASE', database_path('database.sqlite')),`

- `.env`の`DB_DATABASE`が設定されていればその値が使用される
- 設定されていなければ、`database/database.sqlite`が使用される

---

# sqlite3 コマンド

プロジェクトのルートで:

```bash
sqlite3 database/database.sqlite
```

=> `sqlite>`プロンプトが出ればOK

今回はWSL2/Ubuntuにsqlite3入ってなかったのでインストール:

```bash
sudo apt update
sudo apt install sqlite3
```

## SQLite専用コマンド

- `.`で始まるコマンド(SQLite用)
- 普通のSQL(SELECTとか)

の2種類がSQLiteにはある🐶

| SQLiteコマンド  | 内容             |
|-----------------|------------------|
| `.tables`       | テーブル一覧     |
| `.schema users` | テーブル構造     |
| `.database`     | 今いるDBファイル |
| `.help`         | コマンド一覧     |

### カラム表示モード

```sql
.mode column
.headers on
```

### 画面クリア

bashの`clear`は`sqlite>`プロンプトでは効かないので`Ctrl + L`

