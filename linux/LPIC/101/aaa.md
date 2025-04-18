# 作成中

## パーティション関連

| コマンド | 説明                                             |
|----------|--------------------------------------------------|
| fdisk    | パーティションの作成・削除・変更・確認 `MBR`     |
| gdisk    | パーティションの作成・削除・変更・確認 `GPT`     |
| parted   | MBRにもGPTにも対応したパーティション管理コマンド |

## ファイルシステム・作成

| コマンド | 説明                                                                 |
|----------|----------------------------------------------------------------------|
| mkfs     | ファイルシステムを作成(各ファイルシステムプログラムのフロントエンド) |
| mke2fs   | ext2, ext3, ext4ファイルシステムを作成                               |
| mkswap   | スワップ領域を作成                                                   |

## 利用状況確認

| コマンド | 説明                                                 |
|----------|------------------------------------------------------|
| df       | ファイルシステムの空き容量を確認                     |
| du       | ファイルシステムやディレクトリが占めている容量を確認 |

## ファイルシステム・チェック・修復・管理

| コマンド | 説明                                                                           |
|----------|--------------------------------------------------------------------------------|
| fsck     | ファイルシステムのチェック・修復(各ファイルシステムプログラムのフロントエンド) |
| e2fsck   | ext2, ext3, ext4ファイルシステムのチェック・修復                               |
| tune2fs  | ext2, ext3, ext4ファイルシステムのさまざまなパラメータを設定                   |

## XFSコマンド

| コマンド   | 説明                                |
|------------|-------------------------------------|
| mkfs.xfs   | XFSファイルシステムを作成           |
| xfs_info   | XFSファイルシステムの情報を表示     |
| xfs_db     | XFSファイルシステムのデバッグ       |
| xfs_check  | XFSファイルシステムをチェック       |
| xfs_admin  | XFSファイルシステムのパラメータ変更 |
| xfs_fsr    | XFSファイルシステムのデフラグ       |
| xfs_repair | XFSファイルシステムを修復           |

---

