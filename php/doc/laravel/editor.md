# EditorConfig

Laravelのプロジェクトには最初から、`.editorconfig`という設定ファイルが入っている。

Vimにプラグインを入れるだけで、そのプロジェクトのごとの正解の設定を読み取ってくれる。

=> `.vimrc`を修正しなくてもいい

```bash
# .vimrc
call plug#begin('~/.vim/plugged')
  Plug 'jwalton512/vim-blade'
  Plug 'editorconfig/editorconfig-vim' # これを追加
call plug#end()

...
```

`vimrc`にプラグインを記述したら、再度vimを起動し、ノーマルモードで`:PlugInstall`でインストールされる。

