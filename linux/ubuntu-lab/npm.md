# npm

## manifest.jsonって何？

```blade
@vite(['resources/css/app.css', 'resources/js/app.js'])
```

これを読むために`public/build/manifest.json`をいうViteが作る設計図が必要。

## nodeとnpmについて

| PHP              | JavaScript    |
| ---------------- | ------------- |
| PHP              | Node.js       |
| composer         | npm           |
| composer.json    | package.json  |
| composer install | npm install   |
| vendor/          | node_modules/ |

## npm run devって何してた？

`package.json`:

```bash
"scripts": {
   "build": "vite build",
   "dev": "vite"
},
```

なので、`npm run dev`は`vite`を起動しているだけ。

```bash
npm -> Vite -> CSS・JSを監視 -> 保存するたび自動更新
```

=> これがローカル開発環境

## npm run buildは？

こちらは開発用でなく、`resouces/css resouces/js`を`public/build`へ変換して、`manifest.json`も作る。

=> 今回のVPSで足りなかったのはこれ

## VPSですること

### nvmインストール

nvm: Node Version Manager

=> Node.jsのバージョン管理ツール

```bash
curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.40.4/install.sh | bash
```

- `sudo apt`でなく`curl`でインターネットからファイルをダウンロード
- `install.sh`の中身をbashで実行
- `~/.nvm`が作られる
- `.bashrc`が編集される

これで`nvm`コマンドが使用できる(Node.jsはまだインストールされていない)

