# memo

### テスト用のDB作成(scp)
```sql
CREATE DATABASE scp OWNER tomo;
```

### シェルスクリプトを作成(bash)
`test_db.sh`

作成したスクリプトには実行権限を付与する
```
chmod +x test_db.sh
```

### psqlで確認
```
# -d で接続するデータベースを指定
psql -d scp
```

### テーブル消す
```sql
-- test の箇所はテーブル名
DROP TABLE test;
```

### バックアップメモ
```
file.sql file_sql.$(date +%Y%m%d_%H:%M:%S)
```

### -c
```
psql -d scp -c "SELECT * FROM test;"
```

