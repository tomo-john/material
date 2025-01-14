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

Dockerfileは`FROM`に続いてイメージ名を記載し、その後はコピーやコマンドの実行など、コンテナに対して行たいことを記述する。

| コマンド    | 内容                                                                                  |
|-------------|---------------------------------------------------------------------------------------|
| FROM        | 元にするイメージを指定する                                                            |
| ADD         | イメージにファイルやフォルダを追加する                                                |
| COPY        | イメージにファイルやフォルダを追加する                                                |
| RUN         | イメージをビルドするときにコマンドを実行する                                          |
| CMD         | コンテナを起動するときに実行する規定のコマンドを指定する                              |
| ENTRYPOINT  | イメージを実行するときのコマンドを強要する                                            |
| ONBUILD     | ビルドが完了したときに任意の命令を実行する                                            |
| EXPOSE      | 通信を想定するポートをイメージの利用者に伝える                                        |
| VOLUME      | 永続データが保存される場所をイメージの利用者に伝える                                  |
| ENV         | 環境変数を定義する                                                                    |
| WORKDIR     | RUN, CMD, ENTRYPOINT, ADD, COPYの際の作業ディレクトリを指定する                       |
| SHELL       | ビルド時のシェルを指定する                                                            |
| LABEL       | 名前やバージョン番号、製作者情報などを設定する                                        |
| USER        | RUN, CMD, ENTRYPOINTで指定するコマンドを実行するユーザーやグループを設定する          |
| ARG         | docker buildする際に指定できる引数を宣言する                                          |
| STOPSIGNAL  | docker stopする際にコンテナで実行しているプログラムに対して送信するシグナルを変更する |
| HEALTHCHECK | コンテナの死活活動を確認するヘルスチェックの方法をカスタマイズする                    |

COPYとADDの違い:

- COPY: 単純にホストのファイルやディレクトリをイメージにコピー
- ADD: URLからファイルを取得して追加、圧縮ファイルを解凍しながら追加もできる

RUNとCMDの違い:

- RUN: イメージをビルドする段階で実行するコマンド(ソフトウェアのインストールなど)
- CMD: コンテナを起動するときにデフォルトで実行されるコマンド(webサーバーの起動など)

CMDはENTRYPOINTで上書きされる点に注意。

ENTRYPOINTとCMDの違い:

ENTRYPOINT: 「このイメージでは必ず実行すべきコマンド」を定義
CMD: 「デフォルトで実行されるコマンド」を定義

