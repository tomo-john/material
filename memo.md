# Git

## .gitignore

- 1.対象ファイルを`.gitignore`に追記
- 2.キャッシュからファイルを削除 => `git rm --cached file` (ディレクトリの場合は`-r`をつける)
- 3.変更をcommitしてpush

## コミットメッセージ

push前に直前のを修正したい:

```
git commit --amend
```

