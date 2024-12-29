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
