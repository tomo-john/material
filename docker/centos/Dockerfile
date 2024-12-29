# CnetOS
FROM centos:7

# パッケージのインストール
RUN yum -y update && yum install -y \
    vim \
    curl \
    git \
    sudo \

# ユーザー作成
RUN useradd -m -s /bin/bash john && \
    echo "john:password" | chpasswd && \
    usermod -aG wheel john

# デフォルトの作業ディレクトリ
WORKDIR /home/john

