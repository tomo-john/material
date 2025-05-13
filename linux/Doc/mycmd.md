# How to create your own commands

自作したコマンド(シェルスクリプト)を引数なしに実行する手順。

- 1: コマンド(スクリプト)を書く
- 2: 作成したコマンドを任意のディレクトリに置く
- 3: コマンドの置いたディレクトリにパスを通す
- 4: ~/.bashrcの変更を反映

コマンド`john`を作成する。

```
#!bin/bash
echo 'じょーん'
```

作成した`john`に実行権を付与する。

```
chmod +x john
```

コマンドを任意のディレクトリに移動させる。(最初から任意そこで作成していれば不要)

```
# 今回は/home/mycmdに置く
mv john ~/mycmd
```

ディレクトリにパスを通す。(環境変数PATHに追加)

=> `~/.bashrc`に以下の行を追記する

```
export PATH="$HOME/mycmd/john:$PATH"
```

変更した`~/.bashrc`を反映させる。

```
source ~/.bashrc
```

