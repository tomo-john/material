# SPF

SPF(Sender Policy Framework)は、メールを送信しようとしてきたメールサーバーのIPアドレス情報を検証することで、正規のサーバーからのメール送信であるかを確認できる技術。

受信メールサーバー側がメールの送信元ドメインを管理するDNSサーバーに問合せ、返されたIPアドレスが送信元メールサーバーのIPアドレスがと一致するかを確認。

=> なりすましを検知

```
1: 送信側は、送信側ドメインのDNSサーバーのSPFレコード(またはTXTレコード)に正当なメールサーバーのIPアドレスやホスト名を登録し、公開しておく
2: 送信側から受信側へ、SMTPメールを送信
3: 受信側メールサーバーは、受信側ドメインのDNSサーバーを通じて、MAIL FROMコマンドに記載された送信者メールアドレスのドメインを管理するDNSサーバーに問合せ、SPF情報を取得
4: SPF情報との照合でSMTP接続してきたメールサーバーのIPアドレスの確認に成功すれば、正当なドメインから送信されたと判断
```

