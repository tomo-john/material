# マイグレーション

マイグレーションファイルの作成:

```bash
php artisan make:migration dogs
```

=> `dogs`テーブル用のマイグレーションファイルが作成される(複数形)

モデルとセットで作成:

```bash
php artisan make:model Dog -m
```

=> `Dog`モデル、`dogs`テーブル用マイグレーションファイルが同時生成

## マイグレーションファイル

`database/migration/yyyy_mm_dd_HHMMSS_xxx.php`ファイル🐶

- `upメソッド`: マイグレーション実行時に行うこと
- `downメソッド`: 処理を取り消す時に行うこと

`upメソッド`には、idカラムとtimestampsカラムの設定が最初から入っている。

テーブルに追加したいカラム情報をidとtimestampsの間に設定していく。

## マイグレーションファイルの編集

追加したいカラムは以下のルールで記述する。

```php
<?php
$table->データ型('カラム名')->カラム修飾子;
```

```php
<?php
$table->string('email')->unique();
```

- カラム名: `email`
- データ型: 文字列
- オプション: 重複禁止

## マイグレーションファイルでのデータ型

| データ型            | 説明                        |
|---------------------|-----------------------------|
| integer             | 整数                        |
| string              | 文字列(255文字程度まで目安) |
| text                | 本文などの文字列            |
| boolean             | 真偽値(true / false)        |
| dataTime            | 日時                        |
| unsignedBigInterger | 他のテーブルのID            |
| foreignId           | 他のテーブルのID            |

## カラム修飾子

| 修飾子              | 説明                           |
|---------------------|--------------------------------|
| nullable()          | NULL値を許可                   |
| constrained()       | 対象カラムに外部キー制約を設定 |
| default('値')       | デフォルトで入れる値を設定     |
| unique()            | 重複禁止                       |

## マイグレーションの反映

```bash
php artisan migrate
```

マイグレーションを実行して初めてDBに設定が反映される。

DB内の`migrations`テーブルにマイグレーションの実行記録が残る。

`migrations`テーブルの`batch`カラムに何回目のマイグレーションコマンドによって処理が行われたかが保存。

間違ってマイグレーションを実行した場合には、`batch`ごとに処理を取り消すことができる。

=> テーブルごとではなく、`batch`ごとになる点に注意🐶

```bash
# マイグレーション取消コマンド
php artisan migrate:rollback
```

## すべてのマイグレーションを取り消す

```bash
php artisan migrate:reset
```

## すべてのマイグレーションを取り消し、再度マイグレーションを実行

```bash
php artisan migrate:refresh
```

