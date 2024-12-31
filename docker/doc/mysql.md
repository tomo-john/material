# MySQLとWordPressテスト

## オプション値memo

ネットワークを作成 → mysqlをrun → wordpressをrun

### ネットワーク作成

```
docker network create nettest
```

### mysqlをrun

```
doucker run --name mysqltest \
            -dit \
            --net=nettest \
            -e MYSQL_ROOT_PASSWORD=root \
            -e MYSQL_DATABASE=testdb \
            -e MYSQL_USER=testuser \
            -e MYSQL_PASSWORD=password \
            mysql:8.1 \
            --character-set-server=utf8mb4 \
            --collation-server=utf8mb4_unicode_ci \
            --default-authentication-plugin=mysql_native_password
```

| オプション              | 内容                    | 値        |
|-------------------------|-------------------------|-----------|
| --name                  | mysqlのコンテナ名       | mysqltest |
| -dit                    | runの実行オプション     |           |
| --net=                  | ネットワーク名          | nettest   |
| -e MYSQL_ROOT_PASSWORD= | mysqlのルートパスワード | root      |
| -e MYSQL_DATABASE=      | データベースの領域名    | testdb    |
| -e MYSQL_USER=          | mysqlのユーザー名       | testuser  |
| -e MYSQL_PASSWORD=      | mysqlのパスワード       | password  |

### wordpressをrun

```
docker run --name wordpresstest \
           -dit \
           --net=nettest \
           -p 8080:80 \
           -e WORDPRESS_DB_HOST=mysqltest \
           -e WORDPRESS_DB_NAME=testdb \
           -e WORDPRESS_DB_USER=testuser \
           -e WORDPRESS_DB_PASSWORD=password \
           wordpress:5.5
```

| オプション               | 内容                     | 値            |
|--------------------------|--------------------------|---------------|
| --name                   | wordpressのコンテナ名    | wordpresstest |
| -dit                     | runの実行オプション      |               |
| --net=                   | ネットワーク名           | nettest       |
| -p                       | ポート番号を指定         | 8080:80       |
| -e WORDPRESS_DB_HOST=    | データベースのコンテナ名 | mysqltest     |
| -e WORDPRESS_DB_NAME=    | データベースの領域名     | testdb        |
| -e WORDPRESS_DB_USER=    | データベースのユーザー名 | testuser      |
| -e WORDPRESS_DB_PASSWORD | データベースのパスワード | password      |

