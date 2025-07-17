# WSL関連

Windows Subsystem for Linux :dog:

## Cドライブからwslのubuntuへ

パス : `\\wsl$\Ubuntu`

=> `\\wsl$`直下は見れず、その下のディストリビューション名以下を確認できる

```
cd \\wsl$\Ubuntu\home\tomo
```

## wsl2の現在のディレクトリをエクスプローラーで開く

```
explorer.exe .
```

## cドライブの指定exeを実行(例: Docker Desktop)

```
/mnt/c/Program\ Files/Docker/Docker/Docker\ Desktop.exe
```

## Chrome開く(URL付与)

```
cmd.exe /c start chrome https://www.google.com
```
---

## ~/.bashrc(プロンプトの設定)

```
export PS1='\u@\e[0;35m\][\W]\[\e[m\]$'
```

