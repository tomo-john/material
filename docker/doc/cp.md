# コンテナとホスト間でファイルをコピー

コンテナとホストの間ではファイルをコピーすることが可能。

### ホスト → コンテナへコピー

```
docker cp ホスト側パス コンテナ名:コンテナ側パス
```

### コンテナ → ホストへコピー

```
docker cp コンテナ名:コンテナ側パス ホスト側パス
```

つまり、`cp`コマンドに続いて、`コピー元 コピー先`の順番で記述する。

```
docker cp コピー元 コピー先
```

## memo

- index.htmlファイルを作成
- Apacheコンテナを作成・起動
- 作成したhtmlをコンテナへコピー

```
docker run --name apa000test -d -p 8089:80 httpd

docker cp ~/material/docker/index.html apa000test:/usr/local/apache2/htdocs/
```

### コンテナからホストにファイルをコピー

```
docker cp apa000test:/usr/local/apache2/htdocs/index.html .
```

