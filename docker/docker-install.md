# dockerをMacBook Proにインストールするメモ

- PC: MacBook Pro(14インチ) / チップ: Apple M3 / メモリ: 16GB

## 1: インストール

[公式サイト](https://docs.docker.com/desktop/setup/install/mac-install/)からダウンロード。(Appleシリコン搭載用を選択)

ダウンロードした`Docker.dmg`を実行、Docker.appのアイコンをApplicationにドラッグ&ドロップ。

インストーラ(`Docker.dmg`)はもういらないので削除。

## 2: Docker Desktopの起動(初回起動)

アプリケーション一覧から`Docker`を実行。

「開く」 → 「Accept」 → Use recommend ... にチェックが入っている状態で「Finish」 → PCのパスワード入力

→ install → googleアカウントでログイン → (ブラウザの方で)usernameを入力(決める) `tomojohn`

## 動作確認

```
docker --version
```

