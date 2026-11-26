# cpp-qt5-study / mac 🐶

MacBook Pro（Apple Silicon）で行う **C++ / Qt5 学習**のディレクトリです。

## 位置づけ

| 項目 | 内容 |
|---|---|
| メイン学習 | Windows 11 ノートPC（別のリポジトリ `cpp-qt5-study`） |
| ここ | MacBook Pro での学習。わん先生🐶（Claude Code）がサポート |
| 目的 | メイン学習と重ならない方向で、知識や技術を広げる |

- もともとは、Windows 側のリポジトリの中の `mac-sub/` でした。
- 2026-11-26 に、このリポジトリ（`material`）の `cpp/cpp-qt5-study/mac/` に移設しました。
- Windows 側のファイルは、このリポジトリには入っていません。

## 先生とのルール

詳しくは [CLAUDE.md](CLAUDE.md) にあります（Claude Code が自動で読み込みます）。

- 先生が書き込み（新規作成・更新）してよいのは `mac/` 以下のみ。`mac/` の外のファイルは変更しない
- プロジェクトの作成やコードの編集は、学習のために自分で行う
- 先生は、ヒント・解説・レビューでサポートする
- 作成や編集をお願いしたときだけ、先生が行う → その場合も、実行前に内容を確認してから進める
- 状態を変える Git のコマンド（`pull` / `commit` / `push` など）は、自分で実行する

## ディレクトリ構成

```
mac/
├── README.md          このファイル
├── CLAUDE.md          先生とのルール・環境（Claude Code が読む）
├── docs/
│   ├── ROADMAP.md     学習の計画と進捗
│   ├── setup-mac.md   Mac の環境構築メモ
│   └── lessons/       レッスン資料
└── projects/          Mac で作った Qt / C++ プロジェクト
```

学習の計画と進捗は [docs/ROADMAP.md](docs/ROADMAP.md) を参照。

## Git について

- リポジトリのルートは `~/material`（GitHub の `tomo-john/material`）
- 公開リポジトリなので、パスワードや個人情報などはコミットしない
- `.gitignore` は、1つ上の `cpp-qt5-study/.gitignore` が効いている（`build*/`、`Makefile*` など）
