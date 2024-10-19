# SQL

## テーブル作成

```sql
CREATE TABLE テーブル名 (
  列名 データ型 [制約],
  列名 データ型 [制約],
  ...
); 

```
```sql
CREATE TABLE users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  age INTEGER,
  date_of_birth DATE
);
```

## データ操作

1.データの挿入
```sql
INSERT INTO users (name, age, date_of_birth) VALUES ('john', 2, '2024-02-08');
```

2.データの取得
```sql
SELECT * FROM users;
```

3.データの更新
```sql
UPDATE users SET age = 1 WHERE name = 'john';
```

4.データの削除
```sql
DELETE FROM users WHERE name = 'john';
```

## テーブル変更

1.カラム追加
```sql
ALTER TABLE users ADD COLUMN power INTEGER;
```

2.カラム削除
```sql
ALTER TABLE users DROP COLUMN date_of_birth;
```

3.カラム名変更
```sql
ALTER TABLE users RENAME COLUMN power TO attack;
```

4.制約を追加
```sql
ALTER TABLE users ADD CONSTRAINT check_hp CHECK (hp >= 0 AND hp <= 10000);
```

5.その他
```sql
-- カラム追加と制限同時
ALTER TABLE users ADD COLUMN attack INTEGER CONSTRAINT check_attack CHECK (attack >= 0 AND attack <= 10000);
```

## テーブル削除

```sql
DROP TABLE users;
```

