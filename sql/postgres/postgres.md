# PostgresSQL
通称: Postgresはオープンソースのリレーショナルデータベース管理システム(RDBMS)

## 特徴
- オープンソース: 誰でも自由に利用、改変、再配布が可能
- ACID特性: トランザクションの信頼性を保障するACIDをサポートしている
- SQL標準準拠: ANSI SQL企画に準拠しており、SQL文法や機能が豊富
- 強力な拡張機能: ユーザー定義型や関数、演算子をサポートしている

### RDBMSとは？
データを構造化された形式で保存、管理、操作するためのソフトウェアシステム

リレーショナルという名前の通り、データはテーブル形式で格納され、これらのデータは相互に関連付けられる

RDBMSはデータの一貫性、整合性、効率的な検索および更新をサポートし、広範囲な文やで利用されている

- SELECT: データの検索
- INSERT: データの挿入
- UPDATE: データの更新
- DELETE: データの削除

```sql
-- データベースの作成
CREATE DATABASE sample_db;

-- テーブルの作成
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    username VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- データの挿入
INSERT INTO users (username) VALUES ('john_doe');

-- データの取得
SELECT * FROM users;

-- データの更新
UPDATE users SET username = 'jane_doe' WHERE id = 1;

-- データの削除
DELETE FROM users WHERE id = 1;
```

