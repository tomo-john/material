# Linuxでハードディスクを使用する流れ

- 1: パーティション作成(fdiskやparted)
- 2: ファイルシステム作成(mkfs)
- 3: マウント(mount)

## 1 パーティション作成

ハードディスクはパーティションと呼ばれる部分に分割して利用する。

ディスク全体をひとつの領域とする場合にも、全容量を割り当てたひとつのパーティションを作る必要がある。

ハードディスク全体のパーティション情報をパーティションテーブルと呼ぶ。

パーティションテーブルの管理方式は従来の`MBR`と新しい`GPT`の2種類がある。

### MBR (Master Boot Record)

MBRではパーティションには基本(Primary)パーティションと拡張(Extended)パーティションがあり、基本パーティションは4個までしか作成することができない。

それ以上の数に分割するためには、基本パーティションの1つを拡張パーティションとして割り当て、そのパーティションをさらに論理(Logical)パーティションに分割する。

これらのパーティションに関する操作には`fdisk`というコマンドを使用する。

### GPT (GUID Partition Table)

GPTでは基本パーティションが128個作成できるようになっている。

=> 拡張パーティション、論理パーティションという考え方はなくなった

MBRではハードディスク容量が2.2TB(2TiB: デビバイト)までしか管理ができなかったが、GPTではその制限はなくなり、論理上9.4ZB(8ZiB: ゼビバイト)までの容量が管理できる。

GPT方式のハードディスクでは`fdisk`は使用できない。

=> `gdisk`や`parted`コマンドを使用する

| 特徴                    | MBR       | GPT              |
|-------------------------|-----------|------------------|
| パーティションの最大数  | 4個(基本) | 128個            |
| 1パーティションのサイズ | 2TiB      | ほぼ無制限(8ZiB) |
| BIOS / UEFI             | BIOS向け  | UEFI向け         |
| コマンド                | fdisk     | gdiskやparted    |

## 2 ファイルシステム作成

各パーティションはただの領域であり、それだけではデータの読み書きをすることはできない。

パーティションをファイルシステムで`フォーマット`することでファイル単位としたデータの管理が行えるようになる。

この操作には`mkfs`などのファイルシステムを作成するコマンドを使用する。

## 3 マウント

ファイルシステム作成後、実際にファイルの読み書きを行うためには、さらにそのファイルシステムを現在のルートファイルシステム上のどこかにマウントする必要がある。

=> ルート(/)からのパスを使ってアクセス可能にする

この操作にはmountコマンドを使用する。

---

# パーティションの種類

## 基本パーティション

基本パーティションは1つのハードディスクにMBRだと4個、GPTだと128個作成することができる。

それぞれのパーティションにはファイルシステムを作成することができ、ファイルシステムを作成することでファイルやディレクトリのようなデータを扱うことができる。

1番目のSCSIハードディスクの基本パーティションは以下のように表す。

- /dev/sda1 : 1番目のパーティション
- /dev/sda2 : 2番目のパーティション
- /dev/sda3 : 3番目のパーティション
- /dev/sda4 : 4番目のパーティション

カーネル2.6.18より前のIDE接続のハードディスクでは`sda`が`hda`(sdbならhdb, sdcならhdc)になる。

MBRでは基本パーティションのうち1つを拡張パーティションにすることができる。

# 拡張パーティション

論理パーティションを作成するためのパーティション。

拡張パーティションにファイルシステムを作成することはできない。

拡張パーティションは基本パーティションの1つに割り当てるので、表記は/dev/sda1から/dev/sda4までのどれかになる。

# 論理パーティション

論理パーティションは拡張パーティション内に作成する。

MBRで管理するハードディスクにおいて、基本パーティションのみでは足りない場合(パーティションが5つ以上必要な場合)に論理パーティションを利用する。

それぞれのパーティションにはファイルシステムを作成することができる。

論理パーティションは作成された基本パーティションの数に関わらず、5番目のパーティションからの表記となる。(sda5からなど)

---

# 関連コマンド

## fdisk

MBR方式のパーティションの操作(作成・削除・変更・情報表示など)をおこなうコマンド。

```
# 基本構文
fdisk [オプション] [デバイス名]

# /dev/sdbのパーティションを操作
fdisk /dev/sdb
```

| オプション    | 説明                                    |
|---------------|-----------------------------------------|
| -l            | ディスク情報を表示(MBR/GPTどちらも可能) |
| -s <デバイス> | パーティションのサイズを表示            |
| -t            | パーティションのタイプコードを表示      |
| -v            | バージョン情報を表示                    |

