# Factory

Factoryは条件を指定して、ダミーデータを大量に作成できる機能。

### ファクトリーファイル作成

```bash
php artisan make:factory PostFactory
```

- PostFactoryは任意のファクトリー名
- `database/factories/PostFactory.php`が生成される

### サンプル

```php
<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'body' => fake()->text(50),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
```

ファクトリーファイルには、テーブルの各カラムにどういった情報をいれるか条件を指定する。

- titleに20文字以内の文字列データをいれる
- bodyに50字以内の文字列データをいれる
- post作成時に新しいuserを作成し、`user_id`にはそのuserのidをいれる

ダミーデータのデータ型は`fake()->`の後に指定する。

### factoryを作る時のデータ型例

| データタイプ                       | 入れるデータ           |
|------------------------------------|------------------------|
| address                            | 住所                   |
| name                               | 名前                   |
| email                              | メールアドレス         |
| randomDigit                        | ランダムな数字         |
| numberBetween($min=100, $max=1000) | 指定した範囲内の数字   |
| text                               | テキスト(日本語非対応) |
| reatText                           | テキスト(日本語対応可) |

ダミーデータの言語設定は、`.env`ファイル内にせて設定可能。

```
APP_FAKER_LOCALE=ja_JP
```

=> textなどのデータ型によっては日本語に対応していないものもある。

### ファクトリーファイル編集後

`database/seeders/DatabaseSeeder.php`を編集する。

デフォルトで入っているコードでは、Userモデルに基づいたタミーデータを作成できる。(今回はコメントアウト)

```php
<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        // ]);

        \App\Models\Post::factory(3)->create();
    }
}
```

今回は、`\App\Models\Post::factory(3)->create();`を追加。

=> `factory(3)`で3個のダミーデータを作成できる

Postモデルでファクトリーを使用するために、`app/Models/Post.php`にuse宣言を追加する。

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // これ

class Post extends Model
{
    use HasFactory; // これも

    protected $fillable = [
    // 略
```

ファイル編集後は下記コマンドでダミーデータを作成。

```bash
php artisan db:seed
```

=> `database/seeders/DatabaseSeeder.php`に基づいてダミーデータを作成してくれる。

