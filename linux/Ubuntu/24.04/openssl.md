# openssl

> 暗号化や証明書を扱うためのツール・ライブラリ

- 鍵を作る
- 証明書を作る
- デジタル署名する
- 証明書を確認する
- データを暗号化する

などの暗号技術そのものを扱う。

## 鍵作成サンプル

```bash
openssl req -new -x509 -newkey rsa:2048 \
-keyout MOK.priv \
-outform DER \
-out MOK.der \
-nodes \
-days 36500 \
-subj "/CN=VMware Module Signing/"
```

- `req`: 証明書要求(CSR)や自己署名証明書を作るコマンド
- `-new`: 新しく作成
- `X509`: 自分で自分の証明書を発行(自己署名証明書)
- `-newkey rsa:2048`: 鍵の生成(RSA方式2048bit)
- `-keyout MOK.priv`: `MOK.priv`が秘密鍵
- `-outform DER`: 証明書形式。DERはバイナリ形式 => Secure BootではDER形式が必要
- `-out MOK.der`: `MOK.der`が公開鍵
- `-nodes`: 秘密鍵にパスワードを付けない
- `-days 36500`: 100年間有効
- `-subj "/CN=VMware Module Signing/"`: 証明書の名前

