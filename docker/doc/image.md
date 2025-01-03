# コンテナのイメージ化

コンテナをイメージにする。

コンテナを別の環境にコピーしたいときなどに使用する。

イメージの作成方法は2つあり、`commit`でイメージの書き出しをする方法と、`Dockerfile`でイメージを作る方法。

### commitでイメージを書き出す

コンテナを用紙して、それをイメージに書き出す。

コンテナがあれば、コマンド1つで作成できるので手軽だが、コンテナを作り込む必要がある。

すでにあるコンテナを複製したい、移動したいなどの用途に便利。

```
docker commit コンテナ名 作成するイメージ名
```

### Dockerfileでイメージを作成する

`Dockerfile`という名前のファイルを用意して、それを`build`することでイメージにする。

Dockerfileはあくまでイメージを作ることしかできないファイル。

Dockerfileには元となるイメージや、実行したいコマンドなどを記載する。

```
docker build -t 作成するイメージ名 材料ディレクトリ
```

材料ディレクトリには、Dockerfileやコンテナに入れたいファイル類を置いてあるディレクトリ。(実際にコンテナを作り必要はない)

### Dockerfile

Dockerfileは`FROM`い続いてイメージ名を記載し、その後はコピーやコマンドの実行など、コンテナに対して行たいことを記述する。

