# Laravel

## PHPの役割

PHPはLaravel本体を実行する。LravelはPHPで書かれたフレームワーク。

=> Laravel 12ではPHP 8.2以上が必要

## Composerの役割

Laravel本体や関連ライブラリをインストール・管理するためのツール。

Composerで必要な道具だけを取り寄せてプロジェクトに組み込むイメージ。

## Node.js・Bun

JavaScriptをブラウザの外でも実行できるようにするためのプラットフォーム。

CSSやJavaScriptのビルドにViteというツールを使用するが、このViteを動かすためにNode.jsが必要。

---

# memo

`laravel new プロジェクト名`でカレントディレクトリに`プロジェクト名`のディレクトリができる。

そのディレクトリで、`php artisan serve`を実行するとLaravelの組み込みサーバーが起動する。

デフォルトでは[http://127.0.0.1:8000](http://127.0.0.1:8000)でアクセスできる。

今回は、`Bun`を使用するので、`bun install`でインストール。(初回のみ?)

`bun run dev`でBunを利用したフロントエンドの開発サーバー(Viteを使用)を起動。

- Liveware
- laravel
- no
- Pest
- no

---

# Windows11 WSL2/Ubuntu 環境構築メモ

### 環境構築前

- `php -v` : `PHP 8.1.2-1ubuntu2.22`
- `composer -v` : `Composer 2.2.6`

## php.newのインストール(?)

[https://readouble.com/laravel/12.x/ja/installation.html](https://readouble.com/laravel/12.x/ja/installation.html)

```
# 下記コマンドをUbuntu上で実行。
/bin/bash -c "$(curl -fsSL https://php.new/install/linux/8.4)"
```

実行後。

```
  INFO  Downloading PHP binary…
  INFO  Downloading Composer binary…
  INFO  Downloading Laravel Installer…
  INFO  Downloading cacert.pem…
  INFO  Adding /home/tomo/.config/herd-lite/bin to your PATH...
  INFO  Added /home/tomo/.config/herd-lite/bin to PATH in /home/tomo/.bashrc

 Success!
 php, composer, and laravel have been installed successfully.
 Please restart your terminal or run 'source /home/tomo/.bashrc' to update your PATH.

 💡 Pro tip: While php.new gives you the basics, Laravel Herd provides:

 • One-click PHP version switching and updates (7.4 → 8.5 alpha1)
 • Automatic HTTPS for all sites
 • No more localhost:8000 - access your projects at folder-name.test
 • ...and much more

 Upgrade your workflow → https://herd.laravel.com
```

ターミナルを再起動後、php, composerのバージョン上がってた。

- php : 8.12 => 8.41
- composer : 2.2.6 => 2.8.12

## Bunのインストール

[https://bun.sh/](https://bun.sh/)

```
# 実行
curl -fsSL https://bun.sh/install | bash
```

```
# 実行後
bun was installed successfully to ~/.bun/bin/bun

Added "~/.bun/bin" to $PATH in "~/.bashrc"

To get started, run:

  source /home/tomo/.bashrc
  bun --help
```

こちらも実行後にターミナルの再起動を実施。

