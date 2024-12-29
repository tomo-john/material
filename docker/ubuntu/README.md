# 起動メモ

### ビルド

```
# Dockerfileがある場所で実行
docker build -t my-ubuntu .
```

### イメージ確認

```
docker images
```

### イメージの削除

```
docker rmi 名前orイメージID
```

### 起動

```
docker run -it --name ubuntu-container my-ubuntu
```

```
# ボリュームをマウントする場合
docker run -it --name ubuntu-container -v ~/material/docker/volumes/data:/data my-ubuntu
```

### 停止

`exit`で抜ける

### 停止中のコンテナ一覧

```
docker ps -a
```

### 再起動

```
docker start -ai 名前orコンテナID
```

### 別端末から入る

```
docker exec -it 名前orコンテナID bash
```

