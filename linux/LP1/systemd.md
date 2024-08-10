# systemd

initプロセスの代わりに`systemdプロセス`が起動し各種サービスを管理

systemd関連の主なデーモンプロセス

|プロセス          |説明                         |
|------------------|-----------------------------|
|systemd           |systemdのメインプロセス      |
|systemd-journald  |ジャーナル(ログ)管理プロセス |
|systemd-logind    |ログイン処理プロセス         |
|systemd-networkd  |ネットワーク管理プロセス     |
|systemd-timesyncd |システムクロック同期プロセス |
|systemd-resolved  |名前解決プロセス             |
|systemd-udevd     |デバイス動的検知プロセス     |

systemdではシステムの起動処理は多数の`Unit`と呼ばれる処理単位に分かれている

Unitの主な種類

|種類    |説明                           |
|--------|-------------------------------|
|service |各種サービスを起動             |
|device  |各種デバイスを表す             |
|mount   |ファイルシステムをマウント     |
|swap    |スワップ領域を有効             |
|target  |複数のUnitをグループ化         |
|timer   |指定した日時や間隔で処理を実行 |

systemdでは必要なサービスのみが起動し、起動も並列的に行われる

=> SysVinitに比べシステムの起動時間は早い

## systemdの起動手順

システムが起動すると `default.targe` といUnit処理がされる

この設定ファイルは `/etc/systemd/system` ディレクトリ以下にある

グラフィカルログイン(従来のランレベル5)をデフォルトの環境とするには

`/lib/systemd/system/graphical.targe`へのシンボリックリンクdefault.targetを作成する

```
ln -s /lib/systemd/system/graphical.target /etc/systemd/system/default.target
```

従来のランレベルとターゲットの対応

|ランレベル |ターゲット        |
|-----------|------------------|
|0          |poweroff.target   |
|1          |rescue.target     |
|2,3,4      |multi-user.target |
|5          |graphical.target  |
|6          |reboot.target     |

graphical.targetにランレベル5で必要であったすべてのサービスが含まれているわけではない

graphocal.targe　<= multi-user.target <= basic.target と紐づけられている

## systemctlによるサービスの管理

systemdでは `systemctl` コマンドでサービス管理を行う

```
systemctl サブコマンド [Unit名] [-t 種類]
```

systemctlコマンドの主なサブコマンド

|サブコマンド      |説明                                                 |
|------------------|-----------------------------------------------------|
|start             |サービス起動                                         |
|stop              |サービス終了                                         |
|restart           |サービス再起動                                       |
|reload            |サービス設定を再読み込み                             |
|status            |サービス稼働状況を表示                               |
|is-active         |サービスが稼働しているかを確認                       |
|enable            |システム起動時にサービスを自動起動                   |
|disable           |システム起動時にサービスを自動起動しない             |
|mask              |指定したUnitをマスクし手動でも起動できないようにする |
|unmask            |指定したUnitのマスクを解除する                       |
|list-dependencies |Unitの依存関係を表示する                             |
|list-units        |起動しているすべてのUnitと状態を表示                 |
|list-unit-files   |すべてのUnitを表示                                   |
|reboot            |システムを再起動                                     |
|poweroff          |システムをシャットダウン                             |

```
# メールサーバーのPostfixサービスを起動
systemctl start postfix.service

# Postfixサービスの稼働状況を表示
systemctl status postfix.service

# Postfixサービスが稼働しているか確認
systemctl is-active postfix.service
=> active # active: 稼働 / inactive: 稼働してない

# Postfixサービスがシステム起動時に自動起動しないように設定
systemctl disable postfix.service
=> rm `/etc/systemd/system ...
```

enable, disableでは/etc/systemd/systemディレクトリ以下のファイルが操作されている

オリジナルの設定ファイルは`/usr/lib/systemd/systemディレクトリ`もしくは

`/lib/systemd/systemディレクトリ`に配置されている

例として、/etc/systemd/system/multi-user.target.wantsディレクトリ以下を見ると、

multi-user.targetに含まれるUnitを確認できる

```
# サービスの一覧を表示
systemctl list-unit-files -t service

# システム起動時に自動起動するサービス一覧を表示
systemctl list-unit-files -t service --state=enabled
```

