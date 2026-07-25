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

```bash
1. nvm(管理人) -> 2. Node.js(実際の実行環境) -> 3. npm(Node.jsと一緒に入る)

4. npm install -> 5. npm run build
```

### nvmでNode.jsをインストール

インストールできるNode.js一覧:

```bash
nvm ls-remote
```

LTS版をインストール:

```
nvm install --lts
```

インストール後バージョン確認:

```bash
node -v
# v24.18.0

npm -v
# 11.16.0
```

### npm install

`/var/www/apps/pawverse/`で実行。

```bash
[VPS] john@[pawverse]$ npm install

added 96 packages, and audited 97 packages in 5s

28 packages are looking for funding
  run `npm fund` for details

9 vulnerabilities (1 moderate, 6 high, 2 critical)

To address all issues, run:
  npm audit fix

Run `npm audit` for details.
npm warn allow-scripts 1 package has install scripts not yet covered by allowScripts:
npm warn allow-scripts   esbuild@0.27.2 (postinstall: node install.js)
npm warn allow-scripts
npm warn allow-scripts Run `npm approve-scripts --allow-scripts-pending` to review, or `npm approve-scripts <pkg>` to allow.
npm notice
npm notice New major version of npm available! 11.16.0 -> 12.0.1
npm notice Changelog: https://github.com/npm/cli/releases/tag/v12.0.1
npm notice To update run: npm install -g npm@12.0.1
npm notice
```

`npm install`後に、`npm run build`を実行。

これでブラウザから`http://160.251.234.145/`にアクセスできた。

