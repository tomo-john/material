# Linux ブートプロセス

## 起動プロセスの流れ

- 1: BIOS/UEFI
- 2: ブートローダー
- 3: Linuxカーネルの初期化
- 4: initシステムの実行
- 5: ログインプロンプトの表示

## 1.BIOS/UEFI

電源投入後、BIOS(Basic Input/Output System)またはUEFI(Unified Extensible Firmware Interface)が最初に動作する。

- 動作内容:
  - ハードウェアの初期化(CPU, メモリ, ディスク, キーボードなど)
  - ブートデバイス(HDD, SSD, USBなど)を特定
  - ブートローダー(次のステージ)をロード

## 2.ブートローダー(Boot Loader)

OSのカーネルをメモリにロードして実行する。

GRUB, GRUB2が多くのLinuxディストリビューションで採用されている。

- 動作内容:
  - 設定ファイルを読込む
  - ユーザーにブートメニューを表示(複数のOSやカーネルの選択肢がある場合)
  - 選択したカーネルをロードし、カーネルに制御を渡す

### GRUB(GRUB Legacy)

バージョン番号は0.9x。

GRUBの設定ファイルは`/boot/grub/menu.lst` => 手動で編集が可能。変更後は即座に反映。

ディストリビューションによっては`/boot/grub/grub.conf`の場合もあり。

### GRUB2

バージョンは1.9x以降。

GRUB2の設定ファイルは`/boot/grub/grub.cfg` => このファイルを直接編集することはない。

設定内容は`/etc/default/grub`ファイルおよび`/etc/grub.d`ディレクトリ内のファイルに記述し、`grub-mkconfig`コマンドで設定内容を`/boot/grub/grub.cfg`ファイルに反映させる。

