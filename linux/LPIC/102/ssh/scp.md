# scp

SSHの仕組みを利用しホスト間で安全にファイルをコピーするコマンド。

- ローカルからリモートへコピー : `scp コピー元ファイル [ユーザー名@]コピー先ホスト:[コピー先ファイル名]`
- リモートからローカルへコピー : `scp [ユーザー名@]コピー先ホスト:コピー元ファイル名 コピー先ファイル名`

### オプション

- -p : パーミッション値などを保持したままコピー
- -r : ディレクトリ内を再帰的にコピー
- -P : ポート番号を指定

```
scp /etc/hosts example.jp:/tmp
```

- ローカルの/etc/hostsをexample.jpの/tmpへコピー
- ユーザーを指定していないので、ローカルのユーザー名でコピー

```
scp /etc/hosts john@example.jp:
```

- リモートホスト側のユーザー名指定は`ユーザー名@`をリモートホストの前につける
- この場合example.jpの`john`ユーザーのホームディレクトリにコピーされる

```
scp example.jp:/etc/hosts .
```

- リモートホスト側の/etc/hostsをカレントディレクトリにコピー

