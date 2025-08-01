# FTP

File Transfer Protocol(ファイル転送プロトコル)は、インターネット上でファイルを転送するための通信プロトコル。

FTPクライアントとFPTサーバー間でファイルを送受信するために使用される。

標準のFTPは通信内容が暗号化されていないため、セキュリティ上のリスクがある。

## ポート番号

主に20番、21番が使用される。

- 20 : データ転送用 => ファイル転送用ポート
- 21 : 制御用ポート => クライアントとサーバー間のコマンド送受信

20番ポートはアクティブとパッシブモードで使用方法が異なる。

### アクティブモード

アクティブモードは、サーバーがクライアントの指定したポートに接続してデータ転送を行う。

サーバー側からクライアント側に接続を試みるため、クライアント側のファイアウォールに通信が拒否されることがある。

アクティブモードを利用するには、ファイアウォールのポート解放する必要があるため、セキュリティ的には危険。

### パッシブモード

パッシブモードは、クライアントがサーバーの指定したポートに接続してデータ転送を行う。

クライアント側から接続するデータ転送用のポートは毎回ランダムに決まるのが特徴。

このデータ転送用のポートはサーバー側が指定したものを通知される。

## FTPコマンド

### オプション

- -v : FTPサーバー処理後のメッセージを表示する
- -i : 確認を行わない

`-iv`と同時に指定すると、FPTサーバーからの情報も表示し、複数ファイル転送時は確認メッセージを出さない。

### モード

- asc : アスキーモード(初期値)
- bin : バイナリモード

| モード   | 対象ファイル                               | 特徴                     |
|----------|--------------------------------------------|--------------------------|
| ASCII    | テキストファイル(.txt, .html, .csvなど)    | 改行コードの自動変換あり |
| バイナリ | 画像、実行、圧縮ファイル(.jpg, .zip, .exe) | そのままのデータで転送   |

実行ファイルや画像、圧縮ファイルはバイナリモードを使用しないと壊れる。

テキストファイルをバイナリモードで転送したら、読めるけど改行コードが合わない可能性がある。

現在どちらのモードなのかは、`status`コマンドで確認可能。

### 基本

| コマンド     | 説明                        |
|--------------|-----------------------------|
| prompt(prom) | 対話モードオンオフ切替      |
| open         | サーバーに接続              |
| close        | サーバーから切断            |
| put          | アップロード                |
| mput         | アップロード(複数ファイル)  |
| get          | ダウンロード                |
| mget         | ダウンロード(複数ファイル)  |

