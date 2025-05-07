# john

:dog: 自作コマンド置き場 :dog:

---

## パスの追加(永続的に追加)

- 1 : シェルの設定ファイル(`~/.bashrc`など)を編集
- 2 : 設定ファイルの末尾に追加したいパスを追加(例: `export PATH="$PATH:$HOME/material/john"`)
- 3 : 設定を反映(`source ~.bashrc`)

## exportコマンドについて

- `export PATH="$HOME/material/john:$PATH"`

  :point_right: `先頭`に追加 : 新しいパスを優先的に使いたいとき

- `export PATH="$PATH:$HOME/material/john"`

  :point_right: `末尾`に追加 : 既存のパスを優先したいとき

---

