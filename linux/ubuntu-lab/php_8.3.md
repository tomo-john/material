# VPS composer install でエラー

```bash
[VPS] john@[pawverse]$ composer install
Installing dependencies from lock file (including require-dev)
Verifying lock file contents can be installed on current platform.
Your lock file does not contain a compatible set of packages. Please run composer update.

  Problem 1
    - symfony/clock is locked to version v8.0.0 and an update of this package was not requested.
    - symfony/clock v8.0.0 requires php >=8.4 -> your php version (8.3.6) does not satisfy that requirement.
  Problem 2
    - symfony/css-selector is locked to version v8.0.0 and an update of this package was not requested.
    - symfony/css-selector v8.0.0 requires php >=8.4 -> your php version (8.3.6) does not satisfy that requirement.
  Problem 3
    - symfony/event-dispatcher is locked to version v8.0.4 and an update of this package was not requested.
    - symfony/event-dispatcher v8.0.4 requires php >=8.4 -> your php version (8.3.6) does not satisfy that requirement.
  Problem 4
    - symfony/string is locked to version v8.0.4 and an update of this package was not requested.
    - symfony/string v8.0.4 requires php >=8.4 -> your php version (8.3.6) does not satisfy that requirement.
  Problem 5
    - symfony/translation is locked to version v8.0.4 and an update of this package was not requested.
    - symfony/translation v8.0.4 requires php >=8.4 -> your php version (8.3.6) does not satisfy that requirement.
  Problem 6
    - symfony/string v8.0.4 requires php >=8.4 -> your php version (8.3.6) does not satisfy that requirement.
    - symfony/console v7.4.4 requires symfony/string ^7.2|^8.0 -> satisfiable by symfony/string[v8.0.4].
    - symfony/console is locked to version v7.4.4 and an update of this package was not requested.
```

## 対応

### 新しいブランチを作る(pawverseプロジェクト)

```bash
git switch -c chore/php83-platform
```

=> 失敗用の保険

### composer.json編集

変更前:
```bash
    "config": {
        "optimize-autoloader": true,
        "preferred-install": "dist",
        "sort-packages": true,
        "allow-plugins": {
            "pestphp/pest-plugin": true,
            "php-http/discovery": true
        }
    },
```


変更後(platform追加):
```bash
    "config": {
        "platform": {
            "php": "8.3.6"
        },
        ...
```

編集後に`composer update`を実行。

### Befor

Mac(PHP8.5):
```bash
Composer -> symfony/clock v8.0.0

requires -> php >=8.3
```

VPS(PHP8.3):
```bash
composer install -> エラー
```

### After

composer.json:
```bash
"platform": {
    "php": "8.3.6"
}
```

MAC(PHP8.5):
```bash
PHP8.3として考える -> symfony/clock v7.4.8

requires -> php >=8.2
```

### git push

git add -> git commit後:

```bash
git push -u origin chore/php83-platform
```


GitHubのリポジトリに`Compare & pull request`ができあがる。

### mergeする前にVPSで検証

VPS側:

```bash
cd /var/www/apps/pawverse

git fetch origin
```

=> GitHubの最新情報さけ取得する(ファイルは変わらない)

=> VPSの`.git`だけ更新される

ブランチ一覧確認:

```bash
git branch -a
```

ブランチ切り替え:

```bash
git switch chore/php83-platform
```

=> `composer install`を実施

