# certbotとは？

Let's EncryptからSSL/TLS証明書を取得して、Webサーバーに設定する作業を自動化してくれるツール。

人間が手作業でやると、

```bash
1. Let's Encryptに証明書を申請
2. 本当にこのドメインを管理している?と確認される
3. 証明書を受け取る
4. Nginxの設定ファイルを編集
5. SSL証明書のパスを設定
6. Nginxを再読み込み
```

みたいな作業が必要になる。

=> Certbotはそれを自動化してくれる

## Let's Encryptは何者？

SSL/TLS証明書を発行する期間。

この`tracenote.work`との通信をHTTPSで暗号化するための証明書を発行する役割。

Certbotは、このLet's Encryptから証明書を取得するためのクライアントソフト。

## コマンドがやってくれたこと

コマンド: `sudo certbot --nginx -d tracenote.work`

```text
certbot起動
    |
Nginx設定を確認
    |
tracenote.workはこのサーバーだな
    |
Let's Encryptに証明書を申請
    |
「本当にこのドメインを管理してる？」
    |
ドメイン所有確認
    |
証明書発行
    |
/etc/letsencrypt/live/tracenote.work/ に証明書を保存
    |
Nginx設定にHTTPSを追加
    |
Nginx reload
    |
https://tracenote.work 完成
```

## Nginxの設定ファイルがどう変わったのか

- 既存のserverブロックをHTTPS対応にした
- HTTP用のserverブロックを追加してHTTPSへ転送するようにした

### 確認コマンドメモ

```bash
grep -v '^[[:space:]]*#' /etc/nginx/sites-available/default
```

### HTTPSの受付

```text
listen [::]:443 ssl ipv6only=on; # managed by Certbot
listen 443 ssl; # managed by Certbot
```

HTTPSなので443番ポートでの通信を受け付ける設定。

### SSL証明書の場所を指定

```text
ssl_certificate /etc/letsencrypt/live/tracenote.work/fullchain.pem;
```

SSL/TLS証明書はここにありますよとNginxに教えている。

今回CertbotがLet's Encryptから取得した証明書が、`/etc/letsencrypt/live/tracenote.work/fullchain.pem`に保存されている。

### 秘密鍵の場所

```text
ssl_certificate_key /etc/letsencrypt/live/tracenote.work/privkey.pem;
```

これは証明書とセットになる秘密鍵。

=> HTTPS = 公開情報 + 秘密鍵 => `fullchain.pem` + `privkey.pem`

### SSL関連の推奨設定

```text
include /etc/letsencrypt/options-ssl-nginx.conf;
```

=> このファイルにHTTPSに関する推奨設定が書かれているので読込む

### HTTP専用server

```text
server {
    if ($host = tracenote.work) {
        return 301 https://$host$request_uri;
    } # managed by Certbot

    listen 80 default_server;
    listen [::]:80 default_server;

    server_name tracenote.work;

    return 404; # managed by Certbot
}
```

- アクセスしてきたホスト名が`tracenote.work`ならHTTPSへリダイレクト(301)
- `tracenote.work`以外のHostで、このHTTPSサーバーに来たアクセスは404

