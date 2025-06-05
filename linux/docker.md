# Dockerめも :dog:

windows PC WSL2/Ubuntu上にDockerインストール済み(Docker Desktopではない)

## 作る

```
docker run -it --name alma --hostname red-john almalinux:8 /bin/bash
```

- `docker run` : 新しいコンテナを作って実行
- `-it` : 対話モード(ターミナル操作)
- `--name alma` : コンテナに名前を付ける
- `--hostname red-john` : ホスト名と付ける
- `almalinux:8` : 使うイメージ(今回はRedHat系のalimalinuxのバージョン8)
- `/bin/bash` : 起動時に実行するコマンド

## 入る

```
docker start -ai alma
```

- `start` : コンテナを再起動
- `-a` : attach : 標準出力をつなげる
- `-i` : interactive : 対話的な操作を可能にする

