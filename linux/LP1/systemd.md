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

