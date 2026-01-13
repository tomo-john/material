# Seeder

データベースにデータを流し込む仕組み。

- テスト用のダミーデータ作成
- 開発中の動作確認
- 初期データ(管理者ユーザーなど)

Seederは、`database/seeders/DatabaseSeeder.php`に親玉ファイルがいる。

=> `run()`メソッドの中にどのSeederを実行するかを書く。

## Seederファイルの作り方

```bash
php artisan make:seeder PostSeeder
```

- `PostSeeder`には任意のシーダー名
- 上記コマンドであれば、`database/seeders/PostSeeder.php`が生成される

元々ある`database/seeders/DatabaseSeeder.php`にコードを追加してもよいが、今回は別ファイルに処理を入れる。

```php
<?php
// database/seeders/PostSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Post::create([
            'title' => 'シーダーテスト',
            'body' => 'シーダーのテストを実施します。',
            'user_id' => 1,
        ]);
    }
}
```

コードを実行すると、Postモデルのインスタンスを作成することができる。

つまり、postsテーブルにレコードを追加することができる。

レコードのカラムの値は、上記ファイルで指定したとおりになる。

### シーダー作成コマンド

```bash
php artisan db:seed --class=PostSeeder
```

最後に`--class=PostSeeder`をつけることで、`PostSeeder.php`ファイルの情報を元にダミーデータを作成する。

`--class=`の部分を書かなければ、`DatabaseSeeder.php`ファイルに基づきダミーデータを作成。

## DatabaseSeederから呼び出す

```php
<?php
public function run(): void
{
    $this->call(PostSeeder::class);
}
```

=> 実行は`php artisan db:seed`(--classつけない)でOK

もしくは:

```bash
php artisan migrate:fresh --seed
```

=> テーブル作り直し + Seeder実行

