# memo

```
# イメージのビルド
docker build -t my-centos .

# コンテナ起動
docker run -it --name centos-container -v ~/material/docker/cnetos/volumes/data:/data my-centos

# 停止中コンテナ一覧
docker ps -a

# コンテナ再起動
docker start -ai centos-container
```


