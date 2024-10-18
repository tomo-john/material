# memo

## PostgreSQL

### 便利
```sql
-- テーブル一覧
\dt

-- 詳細表示
\x
```

### コピー
```sql
\copy table_name to file_name
```

## SQL

```sql
select * from table_name;
```

## psql(ubuntu)

PostgreSQLサービス
```
sudo service postgresql start  # 起動
sudo service postgresql stop   # 停止
sudo service postgresql status # 確認
```

PostgreSQLシェル
```
sudo -i -u postgres
psql
```

