# DockerでUbuntuを使うメモ2

Dockerfileを使用してGithub経由で複数台PCで環境を共有する。

## ディレクトリ構成

```
~/material/docker/
|--ubuntu/          # GitHubで共有するDockerfileのディレクトリ
|  |__Dockerfile    # Dockerfileをここに作成
|__vokumes/         # コンテナ内のデータを保存するボリューム用ディレクトリ
   |__data/         # データを保存するサブディレクトリ
```

## Dockerfileを作成

こんな感じで作ってみた。

```
# ~/material/docker/ubuntu/Dockerfile
FROM ubuntu:20.04

# パッケージインストール時にキャッシュをクリーンアップ
RUN apt-get update && apt-get install -y \
    vim\
    curl \
    git \
    sudo && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*

# ユーザーjohnを作成
RUN useradd -m -s /bin/bash john && \
    echo "john:password" | chpasswd && \
    adduser john sudo

# 作業ディレクトリを設定
WORKDIR /home/john

# johnユーザーで作業するように指定
USER john
```

## Dockerfileを使って新しいイメージをビルド

```
# Dockerfileが保存されている場所で実行する
docker build -t my-ubuntu .
```

- `-t`: 作成されるイメージに名前を付けるオプション
- `.`: 現在のディレクトリ(Dockerfileがある場所)を指定するため

## 新しいイメージを使ってコンテナを立ち上げる

```
docker run -it --name ubuntu-container v ~/material/docker/volumes/data:/data my-ubuntu
```

- `-i`: 標準入力を有効にする(対話的な操作)
- `-t`: 仮装端末を割り当てる(ターミナルを使えるようにする)
- `--name`: コンテナに名前を付ける
- `-v`: ボリュームをマウントする

## 停止した(exitで抜けた)コンテナに再度入る

```
docker start -ai ubuntu-container
```

- `-a`: コンテナの標準出力と標準エラー出力をターミナルに表示
- `-i`: インタラクティブに起動(ユーザーの入力を受け付ける・リアルタイムでの対話)

