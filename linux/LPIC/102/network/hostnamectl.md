# hostnamectl

ホスト名を設定するコマンド。

## サブコマンド

- status : ホスト名と関連情報を表示(デフォルト)
- set hostname : ホスト名を設定する

```
# hostnamectl
 Static hostname: johoooooooon
       Icon name: computer-container
         Chassis: container
      Machine ID: f3872c1aaaa.....
         Boot ID: 05567881611.....
  Virtualization: wsl
Operating System: Ubuntu 22.04.3 LTS
          Kernel: Linux 5.15.167.4-microsoft-standard-WSL2
    Architecture: x86-64
```

```
# ホスト名を変更
hostnamectl set-hostname john2
```

---

# ホスト名(hostname)とは？

ネットワーク上でそのコンピューターを識別するための名前。

- ネットワーク上で他のコンピューターと区別するために必要(IPアドレスよりわかりやすい)
- SSH接続などで使われる

---

# hostnameコマンド

引数なしで実行すると現在のホスト名を表示する。

または引数に指定した名前へホスト名を変更する。

=> これはrootのみ

---

# hostnamectlとhostnname

| 比較項目            | `hostname`                            | `hostnamectl`                                 |
|---------------------|---------------------------------------|-----------------------------------------------|
| 対応                | 古いLinuxでも使える                   | `systemd` 採用ディストリで使用                |
| 設定の永続性        | 一時的（再起動で元に戻る）            | 永続的（再起動後も有効）                      |
| バックエンド        | カーネルの `sethostname()` を直接操作 | `systemd-hostnamed` を使う                    |
| `/etc/hostname`     | 直接書き換えない                      | 書き換える                                    |
| その他の情報も設定  | 不可                                  | ホスト名以外も設定可能（例：アイコン名など）  |

```
sudo hostname dog                 # 再起動で元に戻る
sudo hostnamectl set-hostname dog # 永続的
```

