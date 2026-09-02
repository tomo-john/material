# HTTPS化

- ドメイン取得(ConoHa)
- DNS設定(ConoHa)
- Nginxのserver_name設定
- SSL/TLS証明書(Lets's Encypt)
- NginxにSSL設定
- HTTP -> HTTPSリダイレクト

## ドメイン取得(ConoHa)

ドメイン名: `tracenote.work`(.comは空いてなかった)

=> ConoHaのコンソール画面から契約

## ネームサーバー設定

ConoHaコンソール画面の左側メニューの「ドメイン」から開始。

「tracenote.work」を選択し、ネームサーバー設定。

ConoHa(標準)を選択し、変更。

```bash
ConoHaネームサーバー
a.conoha-dns.com
b.conoha-dns.com
```

## DNS設定(ConoHa)

ConoHaコンソール画面の左側メニューの「DNS」から開始。

「+ドメイン」-> ドメイン名: `tracenote.work` -> 追加。

| タイプ | 名称 | TTL  | 値               |
| ------ | ---- | ---  | ---------------- |
| NS     | @    | 3600 | a.conoha-dns.com |
| NS     | @    | 3600 | b.conoha-dns.com |

ができあがる。(tracenote.workのDNSをConoHa DNSが管理するという設定)

これを編集して、`Aレコード`を追加する。

```bash
タイプ：A
名称：@
TTL：3600
値：VPSのIPv4アドレス
```

最終:

| タイプ  | 名称 | TTL  | 値               |
| ------  | ---- | ---  | ---------------- |
| NS      | @    | 3600 | a.conoha-dns.com |
| NS      | @    | 3600 | b.conoha-dns.com |
| A(通常) | @    | 3600 | 160.251.234.145  |

これで、`http://tracenote.work`で`160.251.234.145`につながる。

```bash
nslookup tracenote.work

Server:         10.255.255.254
Address:        10.255.255.254#53

Non-authoritative answer:
Name:   tracenote.work
Address: 160.251.234.145
```

## Nginxのserver_name設定

`/etc/nginx/sites-available/default`

```bash
server {
    listen 80 default_server;
    listen [::]:80 default_server;

    server_name _;
```

`server_name`はどのドメイン名で来たアクセスを、このserverブロックで処理するかを指定する設定。

`server_name _;`という書き方は特定のドメインを指定せず、実質的にデフォルトとして受け取るための書き方。

今回は、ここを`server_name tracenote.work;`へ変更する。

=> 変更後は`sudo systemctl reload nginx`でリロード


## Cerbot

インストール:

```bash
sudo apt update
sudo apt install certbot python3-certbot-nginx
```

- `certbot`: Let's Encryptから証明書を取得する
- `python3-certbot-nginx`: Nginxの設定をCerbotが扱えるようにする

インストール後:

```bash
sudo certbot --nginx -d tracenote.work
```

=> これで`https://tracenote.work`でブラウザからアクセスできた

参考: [certbot](./certbot.md)

