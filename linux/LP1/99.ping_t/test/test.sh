#!/bin/bash

name=john
cmd=ls

echo $name    # 変数展開         john
echo '$name'  # 変数展開されない $name
echo "$name"  # 変数展開         john

echo          # 空行

echo $cmd     # 変数展開         ls
echo '$cmd'   # 変数展開されない $cmd
echo "$cmd"   # 変数展開         ls
echo `$cmd`   # 変数展開+コマンド実行 => lsの実行結果が表示

