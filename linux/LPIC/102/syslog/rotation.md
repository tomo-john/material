# ログファイルのローテーション

ログファイルは追記される一方なので、容量が肥大化していく。

ログファイルの`ローテーション`機能を使うと、古くなったログを切り分けて肥大化を防ぐ。

ログファイルのローテーション機能は`logrotateユーティリティ`が提供している。

=> cronを利用し定期的に実行される

設定ファイルは`/etc/logrotate.conf`もしくは`/etc/logrotate.d`ディレクトリ以下のファイル。

