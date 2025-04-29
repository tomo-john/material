# Docker

LPIC学習用でLinux環境が必要なときに使用する。使い方めも :dog:

## MAC PCの場合

### 初回のみコンテナ作成

1 : Docker Desktopアプリを起動する。

2 : ターミナルで以下のコマンド。

```
docker run -it --name ubuntu --hostname ubu-john ubuntu:latest /bin/bash
```

- `-it` : インタラクティブモード(シェル操作)
- `--name my-ubuntu` : コンテナに任意の名前(管理のため)
- `--hostname ubu-host` : 任意のホスト名をつける(プロンプトに表示される) ＊必須ではなす
- `ubuntu:latest` : 最新のUbuntuイメージ
- `/bin/bash` : bashを起動(念のため)

3 : 抜けるときは`exit`。

### 2回目以降(コンテナ作成済)

```
docker start -ai ubuntu
```

- `-a` : コンテナの出力をアタッチ(表示)
- `-i` : インタラクティブ
- `my-ubuntu` : `docker run ...`のときに指定した任意の名称を指定

### RedHat環境も作ってみる

```
docker run -it --name alma --hostname red-john almalinux:8 /bin/bash
```

### めも

```
# コンテナ一覧(停止中も)
docker ps -a
```

---

