# MACのDockerでpostgreSQL試す

## 準備

Docker Desktopは起動させとく。

```
docker run -d --name postgrejohn -e POSTGRES_PASSWORD=john -p 5432:5432 postgres:latest
```

- `docker run -d`: コンテナをバックグラウンドで起動
- `--name postgrejohn`: コンテナに`postgrejohn`という名前をつける
- `-e POSTGRES_PASSWORD=...`: PostgreSQLのスーパーユーザー(postgres)のパスワード設定(`john`)
- `-p 5432:5432`: Macのポート5432番を、コンテナのポート5432万に接続(これでMacからコンテナ内のPostgreSQLにアクセス可)
- `postgres:latest`: Docker Hubにある公式の最新版PosgtreSQLイメージを利用

## コンテナに入る & PostgreSQLに接続

```
docker exec -it postgrejohn bash
```

```
psql -U postgres
```

## 停止と削除

コンテナ停止:

```
docker stop postgrejohn
```

コンテナ削除:

```
docker rm postgrejohn
```

---

## SQL(PostgreSQL)めも

```
CREATE TABLE employees (id INT PRIMARY KEY, name VARCHAR(100), d_code CHAR(2), job VARCHAR(50));
```

```
INSERT INTO employees (id, name, d_code, job) VALUES (1, 'じょん', 1, 'いぬ');
```

