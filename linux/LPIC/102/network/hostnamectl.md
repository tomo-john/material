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

