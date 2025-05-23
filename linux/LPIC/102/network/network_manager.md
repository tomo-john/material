# NetworkManager

RedHat系ではネットワークを管理するサブシステムとして`NetworkManager`が導入されている。

`nmcli`コマンドを使用してネットワークの設定、接続の管理、状態の確認を行う。

## nmcli

```
nmcli オブジェクト [コマンド]
```

### オブジェクト

引数のオブジェクトとは操作対象のカテゴリ。

- `general` : NetworkManagerの状態や操作一般
- `networking` : ネットワーク管理全般
- `radio` : 無線ネットワーク
- `connection` : 接続
- `device` : デバイス

オブジェクト名は`networking => n`のように省略が可能。

変更を伴う操作はrootのみ、一般ユーザーは参照だけならできる。

### オブジェクトとコマンド

- general
  - status : NetworkManagerの状態を表示
  - hostname : ホスト名を表示
  - hostname ホスト名 : 指定したホスト名に変更

- networking
  - on / off : ネットワークの有効/無効
  - connectivity [check] : ネットワークの状態を表示(checkを指定すると再確認)

- radio
  - wifi : Wi-Fiの状態を表示
  - wifi on/off : Wi-Fi接続を有効/無効
  - wwan : モバイルブロードバンドの状態を表示
  - wwan on/off : モバイルブロードバンドを有効/無効
  - all on/off : すべての無線接続を有効/無効

- connection
  - show [--active] : 接続状態を表示(--activeでアクティブな接続のみ)
  - modify インターフェース名 パラメータ : 指定した接続を設定
  - up ID : 接続を有効
  - down ID : 接続を無効

- device
  - status : デバイスの状態を表示
  - show インターフェース名 : 指定したデバイスの情報を表示
  - modify インターフェース名 パラメータ : 指定したデバイスを設定
  - connect インターフェース名 : 指定したデバイスを接続
  - disconnect インターフェース名 : 指定したデバイスを切断
  - delete インターフェース名 : 指定したデバイスを削除
  - monitor インターフェース名 : 指定したデバイスをモニタ
  - wifi list : Wi-Fiアクセスポイントを表示
  - wifi connect SSID : Wi-Fiアクセスポイントに接続
  - wifi hotspot : Wi-Fiホットスポットを作成
  - wifi rescan : Wi-Fiアクセスポイントを再検索

```
# 接続eth1を追加し、DHCPでIP設定
nmcli connection add type ethernet ifnama enp03s con-name eth1
nmcli connection modify eth1 ipv4.method auto
```

`nmcli networking connectivity`で表示されるネットワークの接続状態:

| 状態    | 説明                                                           |
|---------|----------------------------------------------------------------|
| full    | インターネットにアクセス可能なネットワークに接続している       |
| portal  | インターネットにアクセスする前の`captive portal`の状態         |
| limited | ネットワークに接続しているが、インターネットにアクセスできない |
| none    | どのネットワークにも接続していない                             |
| unknown | 接続状態が見つからない                                         |

