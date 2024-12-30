# memo

```
# イメージのビルド
docker build -t my-almalinux .

# コンテナ起動
docker run -it --name almalinux-container -v ~/material/docker/cnetos/volumes/data:/data my-almalinux

# 停止中コンテナ一覧
docker ps -a

# コンテナ再起動
docker start -ai almalinux-container
```


