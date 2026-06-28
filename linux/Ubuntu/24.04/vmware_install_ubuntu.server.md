# VMwareにUbuntu Serverを入れる

## ISO用意

=> `ubuntu-24.04.4-live-server-amd64.iso`

## Create New Virtual Machine

- Typical(recommended)
- use ISO image => ダウンロードしたisoを指定
- Linux
- Name: => ubuntu-server-01
- ディスク容量は20GB(Store virtual disk as single fileにチェック)
- メモリは自動で2048MB(2GB)になってた
- processors: 1, core: 2
- NetworkはNAT(既定だった)

=> これでFinish

## Error出た

```
Could note open /dev/vmmon: ??????....

please make sure that the kernel module 'vmmon' is loaded.
```

```
Faild to initialize monitor device.
```

=> `lsmod | grep vm` で`vmmon`, `vmnet`がでない

=> VMwareのカーネルモジュールがロードされていない

Secure Bootがunsigned(未署名)の`vmmon/vmnet`モジュールを拒否している。

=> `sudo dmesg | tail -50`などで確認

=> モジュールの作成自体はできているけど、ロードができない

## Secure Boot編

- 1. 秘密鍵と公開鍵を作成
- 2. 署名
- 3. MOKに公開鍵を登録(再起動)
- 4. 青いMOK Manager画面でパスワード入力(再起動)

=> これで vmmonとvmnetがロードされるはず

## VMwareは特殊なアプリ

通常のアプリ(VSCodeやChrome)は`ユーザー -> アプリ -> OS`みたいに動く。

VMwareは、`ユーザー -> VMware -> Linuxカーネル -> CPU/メモリ/ディスク`とかなり深いとこまで触る。

そのために`vmmon`というカーネルモジュールが必要になる。(Linuxカーネルの中で動くVMwareの部品)

Secure Bootでは信頼できるプログラムしかカーネルの中で動かさないので、署名なしの`vmmon`が拒否されている。

- 鍵を作る(公開鍵/秘密鍵) -> 印鑑を作るイメージ
- `vmmon.ko`に署名する -> これは私が認めたモジュールですというハンコを押す
- 公開鍵をMOKに登録 -> Linuxにこの印鑑の持ち主は信頼していいよと教える

## 鍵の作成

作業ディレクトリ(`/home/ubuntu-dev/wk/vmware-signing`)で実行:

```bash
openssl req -new -x509 -newkey rsa:2048 \
-keyout MOK.priv \
-outform DER \
-out MOK.der \
-nodes \
-days 36500 \
-subj "/CN=VMware Module Signing/"
```

`MOK.priv`, `MOK.der`の2つができあがる。

- `MOK.priv`: 秘密鍵 -> 絶対に人に渡さない
- `MOK.der` : 公開鍵 -> Linuxに登録する鍵

## モジュールがどこにあるか探す

```bash
find /lib/modules/$(uname -r) -name "vmmon.ko*" -o -name "vmnet.ko*"

# /lib/modules/6.17.0-35-generic/misc/vmnet.ko
# /lib/modules/6.17.0-35-generic/misc/vmmon.ko
```

## sign-fileがどこにあるか探す

Linuxカーネルには`scripts/sign-file`というカーネルモジュールに電子署名するための道具が用意されている。

```bash
find /usr/src -name sign-file

# /usr/src/linux-header-6.17.0-35-generic/script/sign-file
```

こんな感じ:

```bash
~/wk/vmware-signing/
  |---- MOK.priv # 秘密鍵(ハンコ)
  |---- MOK.der  # 公開鍵(見本)

/lib/modules/6.17.0-35-generic/misc
  |---- vmmon.ko  # VMwareのカーネルモジュール
  |---- vmnet.ko  # VMwareのネットワークモジュール

/usr/src/linux-header-6.17.0-35-generic/scripts/
  |---- sign-file  # 署名専用プログラム
```

## 署名する

```
sudo /usr/src/linux-headers-$(uname -r)/scripts/sign-file \
sha256 \
~/wk/vmware-signing/MOK.priv \
~/wk/vmware-signing/MOK.der \
/lib/modules/$(uname -r)/misc/vmmon.ko
```

## 署名されたか確認

```bash
modinfo /lib/modules/$(uname -r)/misc/vmmon.ko | grep signer
```

成功していれば:

```bash
signer: VMware Module Signing
```

=> `vmnet.ko`も同様に署名する

## 公開鍵をLinuxに信頼してもらう

```bash
sudo mokutil --import ~/wk/vmware-signing/MOK.der
```

- `mokutil`: MOK(Machine Owner Key)を管理するためのツール
- `--import`: この公開鍵を登録したいですの意味

実行すると、sudoのパスワード入力後に`input password:`が出てくるが、これはUbuntuのログインパスではない。

次回再起動時に本人確認するための一時的なパスワード。

今回は、`vmware1234`にしてみた。

コマンドが成功しても、まだ登録自体は完了していない。

再起動すると`MOK Manager`(青い画面)の画面が出てくるので、`Enroll MOK` => `Continue`を選択し、上記で設定したパスワードを入力する。(最後にreboot)

## 登録後

```bash
lsmod | grep vm
```

`vmmon`, `vmnet`が表示されたらOK。

=> VMwareのカーネルモジュールが正常にロードされた

## vmnet.koの署名を忘れていた

`sign-file`でvmmon.koを同じように署名。その後:

```bash
sudo depmod -a
sudo modprobe vmnet
```

---

# VMware内でubuntu-server-01を起動

=> 最初なのでインストールが始まった

- Keyboard レイアウト: Japanese
- Network: DHCPv4 (NAT)

## Guided storage configuration

- [x] User an entire disk
  
  [ /dev/sda local disk 20.000G

  - [x] Set up this disk as an LVM group

## Storage Configuration

```bash
/                10.000G  ext4 (LVM)
/boot             1.771G  ext4

/dev/sda 20.000G
├─ partition1 BIOS grub 1MB
├─ partition2 /boot ext4
└─ partition3 LVM PV 18.225G
```

## Profile Configuration

- Your name: ubuntu-john
- Your servers name: ubuntu-server-01
- Pick a username: ubuntu
- password: ubundu-dev1234

```
Your name：人間向けの表示名
Server name：サーバーそのものの名前
Username：ログインに使うアカウント名
```

## SSH Configuration

ここは、`Install OpenSSH server`にチェックを入れる。

## Featured server snaps

=> 自分でとりたいので、すべてスキップ

