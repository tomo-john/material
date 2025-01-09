# GRUB / GRUB2

ブートローダ

## GRUB2

GRUB2の設定ファイルは`/boot/grub/grub.cfg` => このファイルを直接編集することはない。

設定内容は`/etc/default/grub`ファイルおよび`/etc/grub.d`ディレクトリ内のファイルに記述し、`grub-mkconfig`コマンドで設定内容を`/boot/grub/grub.cfg`ファイルに反映させる。

