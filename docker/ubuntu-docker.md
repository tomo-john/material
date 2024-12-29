# DockerでUbuntuを使うメモ

### Linuxイメージを取得

```
docker pull ubuntu
```

```
# 実行結果
Using default tag: latest
latest: Pulling from library/ubuntu
8bb55f067777: Download complete 
Digest: sha256:80dd3c3b9c6cecb9f1667e9290b3bc61b78c2678c02cbdae5f0fea92cc6734ab
Status: Downloaded newer image for ubuntu:latest
docker.io/library/ubuntu:latest
```

### イメージの確認

```
docker images

REPOSITORY   TAG       IMAGE ID       CREATED       SIZE
ubuntu       latest    80dd3c3b9c6c   5 weeks ago   139MB
```

### コンテナを作成して起動

```
docker run -it ubuntu
```

`root@74fcc6eab594:/# ` のシェルが表示された。

これでLinux(Ubuntu)の中に入れた状態。

抜ける時は`exit`。exitでログアウトするとコンテナは停止する。

### コンテナの再利用

`exit`で抜けた後、`docker ps -a`で停止中のコンテナを確認。

`docker start -ai [コンテナIDまたは名前]`で再起動できる。

```
docker ps -a

CONTAINER ID   IMAGE     COMMAND       CREATED         STATUS                      PORTS     NAMES
74fcc6eab594   ubuntu    "/bin/bash"   3 minutes ago   Exited (0) 18 seconds ago             hardcore_keldysh
```

```
docker start -ai 74fcc6eab594
```

これでまた`root@74fcc6eab594:/# ` のシェルが表示された。

## 停止中のコンテナの削除

```
docker rm 74fcc6eab594
```

