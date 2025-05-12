# メール

電子メールを取り扱うソフトウェアには以下のようなものがある。

- MTA(Message Transfer Agent)
- MDA(Mail Delivery Agent)
- MUA(Mail User Agent)

## メール配送の仕組み

- 1 : メールクライアントソフト(MUA)で作成されたメールは送信用MAT1へ送られる
- 2 : MTA1は、メールアドレスから配送先メールサーバーを調べ、メールをMTA2に配送する
- 3 : MTA2がメールを受け取ると、ローカル配送プログラムであるMDAがメール宛先のユーザーのメールボックスにメールを格納
- 4 : 受取人はPOPサーバー、IMAPサーバーを経由して自分のメールボックスからメールを取り出す

メールの配送に使われるMTAは、SMTPプロトコルでメッセージをやりとりするため、`SMTP`サーバーとも呼ばれる。

=> 代表的なものに`sedmail`, `Postfix`, `exim`などがある

## MTAの起動

システムによって、どのMTAプログラムがインストールされているかは異なる。

=> `25番ポート`を開いているソフトウェアを調べると稼働しているMTAがわかる

- Red Hat Enterprise LinuxやCentOS : `Postfix`が多い
- Debian GNU/LinuxやUbuntu : `exim4`が多い

### SysVinitでのMTA起動

```
/etc/init.d/postfix start
```

### systemdでのMTA起動

```
systemctl start postfix.service
```

---

# mail(コマンド)

コマンドラインでメールを送信したり、受信メールを確認するコマンド。

```
mail [-s 題名] [宛先メールアドレスorユーザー名]
```

メール送信は宛先を指定して`mail`コマンドを実行する。

=> ユーザー名のみを指定すると、ローカルシステムのユーザー宛にメールを送る

=> `-s`はタイトル(Subject)を指定するオプション

```
mail -s dog john
Hello, John!  # ここに本文を入力
.             # 入力終了は . を入力
```

`mail`コマンドを引数なしで実行すると、メールボックスに届いているメールを確認することができる。

