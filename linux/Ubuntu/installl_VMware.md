# Ubuntu 24.04にVMwareをインストール

## 開発ツールとヘッダをインストール

```bash
sudo apt update

# コンパイルツール
sudo apt install build-essential gcc make -y

# 現在のUbuntuカーネルに対応したヘッダ
sudo apt install linux-headers-$(uname -r) -y
```

## セキュアブートが有効か確認

```bash
mokutil --sb-state
```

- SecureBoot enableだった
- 今回のPCでは無効にはできない
- なので有効のままVMware使えるように頑張る(後述)

## VMwareをインストール

