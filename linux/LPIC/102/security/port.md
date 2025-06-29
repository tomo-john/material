# 開いているポートの確認

ポートが開いていると、よからぬ者は外部からそのポートに接続し情報収集や攻撃を試みることがある。

なので開いているポート数はできるだけ少なくしておく方がいい。

不要なポートが開いている(不要なサービスが起動している)ということはそれだけセキュリティのリスクが高まる。

## コマンド

開いているポートを確認する主なコマンド:

- `netstat -atu`
- `ss -atu`
- `lsof -i`
- `nmap`

## lsof

lsofは`List Open Files`の略で、今どのプロセスが、どのファイル(やソケット)を開いているかを調べることができるコマンド。

引数なしで実行すると、現在開かれているすべてのファイルが表示される(めちゃくちゃ多い)。

### オプション

| オプション | 説明                                                                    |
|------------|-------------------------------------------------------------------------|
| -i         | ネットワーク関連(TCP/UDP)で開いているファイル => つまり開いているポート |
| -i:80      | ポート80を使用しているプロセスを表示                                    |

# ポートスキャン

よからぬ者(攻撃者)がネットワーク経由で開いているポートを確認する行為をポートスキャンという。

一般的にポートスキャンは攻撃の予備調査として行われるが、リモートホストで開いているポートを確認するために利用できる。

ポートスキャンは`nmap`コマンドで行うことができる。

## nmap

nmapは`Network MAPper`の略でネットワーク調査やセキュリティ診断のために広く使用されるツールで、ポートスキャンが得意。

`nmap 対象のホスト名 or 対象のホストIP`で開いているポートとサービス名が確認できる。

指定したホストの開いているポートをネットワーク経由で確認(ポートスキャン)することができるコマンド。

=> ホストにログインせず、外部からアクセス可能なポートを調査する

`netstat`や`lsof`コマンドでも空いているポートの確認はできるが、あくまでローカルホストの情報のみ。

`nmap`はリモートホストの情報が確認できる。

=> `nmap localhost`でローカルホストのポートスキャンも可能

## fuser

特定のファイルやポートで使用しているPIDを表示するためのコマンド

`fuser ファイル名`でそのファイルを使っているPIDを表示する。

`-n`オプションを使用することで開いているポートを特定することが可能。

```
fuser -n tcp 8080
```

=> 8080番ポートを開いているPIDが確認できる

=> [fuser](../other/fuser.md)

