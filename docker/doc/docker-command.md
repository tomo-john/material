# dockerコマンド

dockerコマンドは`docker`から始まり、`docker コマンド 対象`が基本系となる。

```
docker コマンド (オプション) 対象 (引数)
```

コマンドには上位コマンドと副コマンドがあり、上位コマンドでは「何に対して」、副コマンドでは「何をするか」を指定する。

```
# コンテナを起動
docker container run
```

上位コマンドは省略することもでき、慣例的にそっちを使う方が多い。

```
# これでもOK
docker run
```

## 上位コマンド

よく使用する上位コマンドは`container`, `image`, `volume`, `network`。

### container

コンテナの操作を行う上位コマンド。コンテナをどうするかはサブコマンドで指定する。

| 副コマンド | 説明                                       | 省略 | 主なオプション                 |
|------------|--------------------------------------------|------|--------------------------------|
| start      | コンテナを開始                             | ok   | -i                             |
| stop       | コンテナを停止                             | ok   | あまり指定しない               |
| create     | イメージからコンテナを作成                 | ok   | --name, -e, -p, -v             |
| run        | イメージのダウンロード、コンテナ作成・起動 | ok   | --name, -e, -p, -v, -d, -i, -t |
| rm         | 停止したコンテナを削除                     | ok   | -f, -v                         |
| exec       | 実行中のコンテナ内でプログラムを実行       | ok   | -i, -t                         |
| ls         | コンテナ一覧を表示                         | 別名 | -a                             |
| cp         | コンテナとホスト間でファイルをコピー       | ok   | あまり指定しない               |
| commit     | コンテナをイメージに変換                   | ok   | あまり指定しない               |

省略系のコマンドは上位コマンドの`container`を除いた形。

`docker container start`なら`docker start`。

`docker container ls`の省略形は`docker ps`で名前が違う。

`docker container run(docker run)`はdocker image pull, docker container create, docker container startをひとまとめにしたコマンド。

