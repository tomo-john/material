# almalinux Dockerfile
# Lpic1, RHELベースの環境学習用

FROM almalinux:8

# パッケージのインストール
RUN yum -y update && yum install -y \
    vim \
    curl \
    git \
    sudo && \
    yum clean all && \
    rm -rf /var/cache/yum

# ユーザー作成とsudo権限を付与
RUN useradd -m -s /bin/bash john && \
    echo "john:password" | chpasswd && \
    usermod -aG wheel john

# デフォルトの作業ディレクトリ
WORKDIR /home/john

# johnになる
USER john
