# SQLテーブル操作

| 操作                   | SQL        |
|------------------------|------------|
| テーブル作成           | `CREATE `  |
| テーブル更新(構造変更) | `ALTER `   |
| テーブル削除           | `DROP `    |
| テーブル初期化         | `TRUNCATE` | 

`\d テーブル名`で指定したテーブルのカラムを表示できる。

# テーブル作成 : CREATE TABLE

```sql
CREATE TABLE テーブル名 ( カラム名 型式, ... );
```

```sql
CREATE TABLE users (
  id SERIAL PIMARY KEY,
  name TEXT
);
```

# テーブル更新(構造変更) : ALTER TABLE

## カラムの追加

```sql
ALTER TABLE users ADD COLUMNM age INTERGER;
```

## カラムの型を変更

```sql
ALTER TABLE users ALTER COLMUN age TYPE BIHINT;
```

## カラムの削除

```sql
ALTER TABLE users DROP COLMUN age;
```

## テーブル名の変更

```sql
ALTER TABLE users RENAME TO characters;
```

# テーブル削除 : DROP TABLE

```sql
DROP TABLE users;
```

# テーブル初期化(空にする) : TRUNCATE

```sql
TRUNCATE TABLE users;
```

