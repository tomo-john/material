# CUPS

CUPS(Common Unix Printing System)は多くのLinuxディストリビューションで使用される印刷システム。

特徴:

- IPP(Internet Printer Protocol)の採用

  ネットワーク上のプリンタをサポート => ネットワーク経由の印刷も可能

- PPD(PostScript Printer Description)ファイルのサポート

  AdobeのPPD形式のファイル(テキストファイル)でデバイスドライバの設定ができる

- Webベースで設定可能

  Webブラウザから設定できるツールが組み込まれている

- プリンタクラスのサポート

  複数のプリンタを1台のプリンタに見せかける機能をサポートしている

---

## PPD

プリンタの機種依存情報が記述されるファイル。

アプリケーションへのプリンタ設定オプション、中間形式からの変換ルールを提供する。

=> `/etc/cups/ppd`ディレクトリ以下に格納

## フィルタ

印刷データを必要に応じて中間形式に変換するフィルタプログラム集。

=> 中間形式には`PDF`、`PostScript`が使われ、そこからPPDで定義されたルールに基づいてプリンタ固有の命令に変換される

## バックエンド

印刷データをプリンタに送信し、プリンタの状態情報をCUPSに返すプログラム。

## 631番ポート

Webブラウザで631番ポートに接続するとブラウザでCUPSの設定ができる。

```
http://localhost:631
```

## 設定ファイル

- /etc/cups/cupsd.conf : 印刷要求をネットワーク経由で受け付ける場合のポート番号、接続するクライアントのアクセス許可を設定
- /etc/printers.conf : プリンタに関する情報などを設定

## CUPSの起動

```
# SysVinit
/etc/init.d/cups start
```

```
# systemd
systemctl start cups.service
```

