# /etc/fstab

システム起動時に自動でマウントされるファイルシステムやスワップ領域の設定を記述したファイル。

```
# /etc/fstab
/dev/sda1  /home  ext4  defaults 1 1
```

```
# フォーマット
ファイルシステム  マウントポイント  ファイルシステムタイプ  オプション  ダンプ  fsck順序
```

### ファイルシステム

マウント対象のデバイスやファイルシステムを指定。

使用できる形式:

- デバイスファイル名: /dev/sda1など
- UUID: UUID=123e4567-e89b-12d3-a456-426614174000など
- LABEL: LABEL=mydisk
- 特殊な値: none(スワップ領域などで使用)

### マウントポイント

ファイルシステムをマウントするディレクトリ

例:

- /: ルートディレクトリ
- /home: ホームディレクトリ
- /mnt/usb: USBデバイス用の一時マウントポイント
- none: スワップ領域などで使用

### ファイルシステムタイプ

使用するファイルシステムの種類を指定。

- ext4: Linux標準のファイルシステム
- xfs: 高性能なLinuxファイルシステム
- vfat: USBメモリやSDカードでよく使われるファイルシステム
- ntfs: Windowsで使用されるファイルシステム
- swap: スワップ領域
- tmpfs: 揮発性のメモリ上に構築されるファイルシステム

### オプション

ファイルシステムのマウント動作を制御する設定。

複数のオプションをカンマで区切って記述。

`defaults`オプションでは次の設定を含む。

`rw`, `suid`, `dev`, `exec`, `auto`, `nouser`, `async`

### ダンプ

`dump`コマンドでファイルシステムのバックアップするかを指定。

- 0: バックアップしない(通常はほとんどこれ)
- 1: バックアップする

### fsck順序

システム起動時に`fsck`コマンドでファイルシステムをチェックする順序を指定。

- 0: チェックしない
- 1: 最優先でチェック(ルートファイルシステム)
- 2: その他のファイルシステム

## オプション

| オプション | 説明                                                             |
|------------|------------------------------------------------------------------|
| rw         | 読み書きを許可(デフォルト)                                       |
| ro         | 読み取り専用でマウント                                           |
| exec       | 実行可能なバイナリファイルを許可(デフォルト)                     |
| noexec     | 実行可能なバイナリファイルを禁止                                 |
| suid       | SUID(Set UID)ビットを有効化(デフォルト)                          |
| nosuid     | SUIDビットを無効化(スクリプトが他のユーザー権限で実行されない)   |
| dev        | デバイスファイルを有効化(デフォルト)                             |
| nodev      | デバイスファイルを無効化(デバイスファイルが存在しないtmpfsで使用 |
| auto       | システム起動時に自動的にマウント(デフォルト)                     |
| noauto     | 自動マウントを禁止(手動でマウントが必要な場合に使用)             |
| user       | 一般ユーザーがマウント可能                                       |
| nouser     | 一般ユーザーによるマウントを禁止(デフォルト)                     |
| async      | データ書き込みを非同期で行う(デフォルト)                         |
| sync       | データ書き込みを同期的に行う                                     |
