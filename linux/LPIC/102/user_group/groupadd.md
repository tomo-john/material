# groupadd

グループを作成するコマンド。

グループを指定してユーザーを作成する場合は、あらかじめグループを作成しておく。

```
# dogグループを作成
groupadd dog
```
---

# groupmod

既存グループ情報を変更するコマンド。

- -g GID : GIDを変更
- -n グループ名 : グループ名を変更

```
# dogグループ名をsuperdogsに変更
groupmod -n dog superdogs
```

```
# animalsグループのGIDを700に変更
groupmod -g 700 animals
```

グループIDを変更しても、ファイルやディレクトリの所有権にセットされているGIDは変更されない。

アクセス権を失う可能性があることには注意が必要。

---

# groupdel

グループを削除するコマンド。

削除対象グループをプライマリグループとするユーザーがいる場合は削除できない。

```
# dogsグループを削除
groupdel dogs
```

