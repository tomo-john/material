# CUPS

CUPS(Common Unix Printing System)はLinuxで使用されるプリントシステム。

| 項目       | 説明                                              |
|------------|---------------------------------------------------|
| 読み方     | カップス(Common UNIX Printing System)             |
| 主な機能   | プリンターの追加・削除・設定・ジョブ管理など      |
| 管理方法   | Webインターフェース・コマンドライン・設定ファイル |
| プロトコル | IPP(Internet Printing Protocol)                   |
| ポート     | 631(Web管理画面: http://localhost:631)            |

# 印刷関連コマンド

| 機能                                       | CUPS   | レガシー |
|--------------------------------------------|--------|----------|
| 印刷(印刷ジョブ作成・プリントキューに登録) | lp     | lpr      |
| 削除(プリントキューにある印刷ジョブを削除) | cancel | lprm     |
| 表示(プリントキューにある印刷ジョブを表示) | lpstat | lpq      |

```
# dog.txtを10部印刷
lp -n 10 dog.xt

# PrinterXのすべての印刷ジョブを削除
cancel -a PrinterX
```

### lpr

- `-#` : 印刷部数の指定
- `-P` : 指定したプリンタに出力

```
# PrinterAで10部印刷
lpr -#10 dog.txt -PPrinterA
```

### lprm

- `-P` : 指定プリンタの印刷ジョブを削除
- `-` : 自分の印刷ジョブをすべて削除(rootだと全ユーザーの印刷ジョブ消す)

```
# PrinterBの自分の印刷ジョブをすべて削除
lprm -PPrinterB -
```

### lpq

- `-P` : 指定プリンタの情報を表示

# CUPSの構成

| 要素                      | 役割                                   |
|---------------------------|----------------------------------------|
| `cupsd`                   | デーモン(CUPSのメインサービス)         |
| `/etc/cups`               | CUPS関連設定ディレクトリ               |
| `/etc/cups/cupsd.conf`    | cupsdのメイン設定ファイル              |
| `/etc/cups/printers.conf` | プリンター情報の設定ファイル           |
| `/var/spool/cups`         | プリントジョブのスプール(一時保存)場所 |
| `/var/log/cups`           | ログファイルディレ                     |

