# Dockerの基礎知識メモ

## Dockerイメージの取得

Docker Hubや他のイメージレジストリから既存のイメージをダウンロードする作業。

まず最初に環境構築したいイメージを取得するとこから始まる。

```
docker pull [オプション] イメージ:タグ
```

## Dockerイメージの作成

アプリケーションとその依存関係をパッケージ化するプロセスを指す。

アプリケーションがどの環境でも同じ動作をさせるための処理。

Dockerイメージは`Dockerfile`(テキストファイル)から作成する。

Dockerfileにはベースとなるイメージ、追加のソフトウェアのインストール、環境変数の設定などが記述されている。

```
docker build [オプション] パス | URL | -
```

## 保持しているイメージの確認

```
docker images [オプション] [リポジトリ[:タグ]]
```

## Dockerコンテナの起動

Dockerイメージから実際のアプリケーション環境を立ち上げる作業のこと。

Dockerで実際にアプリケーションや開発環境を動かす。

```
docker run [オプション] イメージ[:タグ|@ダイジェスト値] [コマンド] [引数...]
```

## 動作しているコンテナの確認

```
docker ps [オプション]
```

