# WSL

Windows Subsystem for Linux

## memo

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

