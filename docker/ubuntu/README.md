# 起動メモ

### ビルド

```
# Dockerfileがある場所で実行
docker build -t my-ubuntu-env .
```

### 起動

```
docker run -it my-ubuntu-env
```

```
# ボリュームをマウントする場合
docker run -it -v ~/material/docker/vokumes/data:/data my-ubuntu-env
```

