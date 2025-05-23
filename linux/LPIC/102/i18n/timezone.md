# タイムゾーン

地域ごとに区分された標準時間帯を`タイムゾーン`という。

国や地域ごとの時差(UTCとのずれ)を定義するもの。

=> 日本はUTCより9時間早い時間帯

=> UTC(Universal Time Coordinated) : 協定世界時

タイムゾーンの情報は`/usr/share/zoneinfo`ディレクトリ以下の`バイナリファイル`に格納されている。

システムで利用するタイムゾーンは、上記ディレクトリ内のファイルを`/etc/localtime`にコピーすることで設定可能。

```
# タイムゾーンを日本(Asia/Tokyo)に設定
cp /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
```

もしくはシンボリックリンクの作成でも設定可能。

```
ln -s /usr/share/zoneinfo/Asia/Tokyo /etc/localtime
```

---

# TZ

タイムゾーンは環境変数`TZ`で設定することも可能。

```
# タイムゾーンを日本に設定
export TZ="Asia/Tokyo"
```

この設定を全ユーザーで利用するには、`/etc/timezone`ファイルに`Asia/Tokyo`と設定をしておく。

- `tzselect` : 対話形式で一覧からタイムゾーンの設定値を確認する
- `tzconfig` : `/etc/localtime`, `/etc/timezone`の値をまとめて変更(古い形式で非推奨) => 現在は`dpkg-reconfigure tzdate`(Debian系)

---

# タイムゾーンの設定方法3種

- 1 : /etc/localtime(システム全体に影響)

  `/usr/share/zoneinfo`ないのバイナリファイルを`/etc/localtime`にコピー、もしくはシンボリックリンクを作成する

- 2 : /etc/timezone(主にDebian系)

 `/etc/timezone`ファイルを直接vimなどで編集しタイムゾーンを設定する(システム全体に影響)

- 3 : 環境変数TZ(一時的・ユーザーごと)

  環境変数`TZ`にタイムゾーンを設定することで、シェルごと(一時的orユーザーごと)にタイムゾーンを設定することが可能

`/etc/timezone`や`環境変数TZ`に指定する値は`tzselect`コマンドで確認することが可能。

