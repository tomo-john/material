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

[https://support.broadcom.com/](Broadcom Support Portal)よりダウンロード

=> `VMware-Workstation-Full-17.6.4-xxxxxxxx.x86_64.bundle`


```bash
# 実行権限付与
chmod +x VMware-Workstation-Full-*.bundle
```

```bash
# インストール実行
sudo ./VMware-Workstation-Full-*.bundle
```

