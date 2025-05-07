# リモートデスクトップ

## VNC

VNC(Virtual Network Computing)はWindows, Linux, macOSなどクロスプラットフォーム対応のリモートデスクトップソフトウェア。

デスクトップを提供するコンピューター側でVNCサーバーを稼働させる。

```
vncserver :1
```

=> これでVNCサーバーを起動させる。`:1`はディスプレイ番号

```
vncserver -kill :1
```

=> これで終了

## RDP

RDP(Remote Desktop Protocol)はWindows標準のリモートデスクトッププロトコル。

Windowsのリモートデスクトップで標準的に利用可能。

WindowsのデスクトップをLinuxデスクトップに表示したい場合に利用する。

=> Windows側ではリモートデスクトップアクセスを許可する設定が必要

## SPICE

SPICE(Simple Protocol for Indenpendet Computing Environment)は、RDPと同様の画面転送プロトコル。

=> オープンソースで開発されている

VNCと異なり、通信の暗号化やマルチモニタなど、多数の機能に対応している。

### VNCがサポートしていない機能の例

- 4画面までのマルチモニタ
- ネットワーク経由でのUSB転送

## XDMCP

XDMCP(X Display Manager Control Protocol)は、ディスプレイマネージャーをネットワーク越しに利用できるプロトコル。

=> Xサーバーとディスプレイマネージャーの間で使われる

XDMCPは通信経路が暗号化されていないため安全性に問題あり。

=> SSHを介して利用するといった注意が必要

---

## VDI

VDI(Virtual Desktop Infrastructure)は`仮想デスクトップ環境`のこと。

## FTP

FTP(File Transfer Protocol)はファイル転送用のプロトコル。

