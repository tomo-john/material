# scritp/sign-file

Linuxカーネルモジュール(`.ko`ファイル)に電子署名を付与するためのツール。

## 場所

Ubuntu24.04の例:

```
/usr/src/
      |----- linux-headers-6.17.0-35-generic
              |-- script/
                    |-- sign-file
```

### uname -r

現在実行中のLinuxカーネルのバージョンを表示するコマンド。

---

`sign-file`ツールを使うと、`module.ko`に対して、`module.ko + デジタル署名` を埋め込める。

=> これは信頼できる秘密鍵で署名されたモジュールだ。と判断するとロードを許可する仕組み。

## 使い方

```bash
scripts/sign-file <hash> <private_key> <x509_cert> <module>
```

```bash
scripts/sign-file \
sha256 \
MOK.priv \
MOK.der \
hello.ko
```

| 引数     | 意味                         |
| -------- | ---------------------------- |
| sha256   | ハッシュアルゴリズム         |
| MOK.priv | 秘密鍵                       |
| MOK.der  | 公開証明書                   |
| hello.ko | 署名したいカーネルモジュール |

