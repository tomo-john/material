### FHS
ファイルシステム階層標準 : Filesystem Hierarchy Standard

ファイルシステム内のレイアウト = /以下にどのようなディレクトリやファイルを配置するか標準化したもの

多くのディストリビューションがFHSに準じているがディストリビューションごとに異なる配置もある

```
# ディレクトリの配置
/bin         : 一般ユーザーでも利用可能なシステム管理に必須のコマンド
/boot        : Linux起動に必要なファイルやLinuxカーネル
/dev         : デバイスファイル
/etc         : システム設定ファイル、サービスの起動スクリプトファイルなど
/home        : ユーザーごとのホームディレクトリ
/lib         : 共有ライブラリファイル、カーネルモジュール(デバイスドライバ)など
/mnt         : マウントポイントとなるディレクトリ
/opt         : ソフトウェアのインストール先
/proc        : カーネル情報にアクセスする為の仮想ファイルシステム
/root        : rootユーザーのホームディレクトリ
/sbin        : システム管理に必須のコマンド
/tmp         : 一時ファイル
/usr         : プログラムやソフトウェア、ライブラリなど
  /usr/bin   : 一般ユーザーコマンド
  /usr/sbin  : 管理者コマンド
  /usr/lib   : 共有ライブラリ
  /usr/local : システムごとにインストールしたプログラムやドキュメント
  /usr/share : システムアーキテクチャに依存しないファイルやドキュメント
  /usr/src   : プログラムのソースコード
/var         : 頻繁に書き換えが発生するファイル
  /var/cache : 一時的なキャッシュファイル
  /var/log   : ログファイル
```
