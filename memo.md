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

## コードレビュー用(Bash)

```
for f in *.php *.css; do echo "--- FILE: $f ---"; cat "$f"; echo -e "\n--- END OF $f ---\n"; done > review_code.txt
```

```
# 特定ファイル除外版
for f in $( ls *.php *.css | grep -v 'Parsedown.php' ); do echo "--- FILE: $f ---"; cat "$f"; echo -e "\n--- END OF $f ---\n"; done > review_code.txt
```

