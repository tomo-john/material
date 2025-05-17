# dockerでpsqlを試す

- macにて実施

## 1 docker-compose.ymlを準備する

```yaml
version: '3.8'

services:
  db:
    image: postgres:16
    container_name: postgres
    environment:
      POSTGRES_USER: john
      POSTGRES_PASSWORD: john
      POSTGRES_DB: john
    ports:
      - "5432:5432"
    volumes:
      - pgdata:/var/lib/postgresql/data

volumes:
  pgdata:
```

## 2 起動

```
docker-compose up -d
```

## 3 起動したコンテナに入る

```
docker exec -it postgres psql -U john -d john
```

---

### コンテナ停止

```
docker-compose down
```

=> コンテナの停止 + ネットワークの削除

### コンテナ再起動

```
docker-compose up -d
```

### コンテナ環境の削除

```
docker-compose down -v
```

=> ボリュームも消してくれる

