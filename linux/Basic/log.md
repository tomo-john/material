## ログ
コンピュータ上で動作するシステムやプログラムの活動状況の記録

Linuxにはログを集約して管理する`syslog` という仕組みがある

CentOSでは`rsyslog` システムプログラムによってログが収集されログファイルに記録される

ログファイルは `/var/log` ディレクトリ以下に保存される

### 主なログファイル
```
/var/log/messages : 主要ログファイル
/var/log/syslog   : 主要ログファイル(UbuntuやDevian系)
/var/log/maillog  : メール送受信のログファイル
/var/log/secure   : 認証関連のログファイル
```

