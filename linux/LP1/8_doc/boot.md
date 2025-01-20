# Linux ブートプロセス

## 起動プロセスの流れ

- 1: BIOS/UEFI
- 2: ブートローダー
- 3: Linuxカーネルの初期化
- 4: initシステムの実行
- 5: ログインプロンプトの表示

### 1.BIOS/UEFI

電源投入後、BIOS(Basic Input/Output System)またはUEFI(Unified Extensible Firmware Interface)が最初に動作する。

- 動作内容:
  - ハードウェアの初期化(CPU, メモリ, ディスク, キーボードなど)
  - ブートデバイス(HDD, SSD, USBなど)を特定
  - ブートローダー(次のステージ)をロード

### 2.ブートローダー(Boot Loader)

