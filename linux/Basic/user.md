# user / group

ユーザー関連

### ユーザーID(UID)

root : 0

システム : 1～99(100以上の場合も有)

一般ユーザー : 100以上

=> `id` コマンド、もしくは `/etc/passwd` ファイルで確認可能

### su

Substitute User

一時的にユーザーを切り替える

=> 引数なしでroot


=> `-` オプションをつけないと切り替えたユーザーの環境にならない

### groups

Linuxでは全てのユーザーはいずれかのグループに所属しなければならない

`groups` コマンドで所属グループの確認が可能

=> `id` コマンド、 `/etc/passwd` でも確認可能

### ユーザーとパスワード

rootでのみ実行可能

```
useradd : ユーザー追加
passwd  : パスワード設定
```

`passwd` コマンドは一般ユーザーでは自身のパスワードを変更できる

`useradd` でユーザーを追加すると /home にユーザーディレクトリも作成される

=> 追加後はパスワードの設定も必要

### /etc/passwd

ユーザー情報が格納されているファイル

```
john:x:1001:1002::/home/john:/bin/sh
```

第二項目の`x`は旧パスワード欄(今は全ユーザーx)

=> パスワードは `/etc/shadow` に格納されている

`vipw` コマンドで編集可能

### userdel

ユーザーの削除

=> 削除後は必要に応じて `/home` のユーザーディレクトリも削除する

=> `userdel -r` でホームディレクトリごと削除

### groupadd / groupdel

グループの作成

```
groupadd dog        # dog グループを作成
usermod -G dog john # ユーザー john を dog グループに参加させる
id john             # 結果の確認
```

グル-プの削除

```
groupdel dog
```

=> プライマリグループとするユーザーが存在する場合は削除できない

### /etc/group

グループ情報が格納されたファイル

---

### ユーザー追加

```
# rootで実行
useradd john
passwd john # 設定するパスワード設定を2回入力

/etc/passwd ファイルで追加されたか確認
```

