# GRUB / GRUB2

GRUB(GRand Unified Bootloader)とGTUB2はLinuxを起動するためのブートローダ。

ブートローダはBIOS/UEFIによって起動され、最終的にOSのカーネルを読込んで起動する役割を持っている。

- OS選択: 複数のOSがインストールされている場合、どれを起動するか選択
- カーネルロード: 選択されたOSのカーネルをメモリにロード
- 初期RAMディスクのロード(initramfs): カーネルが利用する必要なドライバやモジュールを提供
- 制御の移譲: カーネルに制御を渡して、ブートローダの役割を終える。

## GRUB

GRUBの設定ファイルは`/boot/grub/menu.lst` => 手動で編集が可能。変更後は即座に反映。

ディストリビューションによっては`/boot/grub/grub.conf`の場合もあり。

## GRUB2

GRUB2の設定ファイルは`/boot/grub/grub.cfg` => このファイルを直接編集することはない。

設定内容は`/etc/default/grub`ファイルおよび`/etc/grub.d`ディレクトリ内のファイルに記述し、`grub-mkconfig`コマンドで設定内容を`/boot/grub/grub.cfg`ファイルに反映させる。

