## wsl2/ubuntu関連

### wsl2の現在のディレクトリをエクスプローラーで開く
```
explorer.exe .
```

### cドライブの指定exeを実行(例: Docker Desktop)
```
/mnt/c/Program\ Files/Docker/Docker/Docker\ Desktop.exe
```

### ~/.bashrc(プロンプトの設定)
```
export PS1='\u@\e[0;35m\][\W]\[\e[m\]$'
```

### ~/.zshrc(2024/8/15) 
```
# alias
alias ll='ls -lG'
alias ls='ls -G'

# prompt
PS1='%n@%F{magenta}[%1~]%f$ '
```
---

## Linux

### プロンプト
```
# 引数
$_ : 直前のコマンドの最後の引数
!! : 直前のコマンド全体の再実行
=> !!:2 で直前のコマンドの2番目の引数を指定もできる

# カーソル移動
ctrl + A : 左端へ
ctrl + E : 右端へ

# 削除系
ctrl + U : カーソルから行先頭まで削除
ctrl + K : カーソルから行終端まで削除
ctrl + W : カーソル左の単語を削除

```
---

