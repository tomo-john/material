# Monsters(CRUD)

ただの、CRUD練習用めも。

テーブル作成のためのマイグレーションファイルの作成:

```
php artisan make:migration create_monsters_table
```

作成されたマイグレーションファイル(`database/migrations/..._create_monsters_table.php`)を編集。

マイグレーション実行(テーブル作成される):

```
php artisan migrate
```

モデル作成:

```
php artisan make:model Monster
```

コントローラー作成:

```
php artisan make:controller MonsterController
```

=> 作成したコントローラーに`use App\Models\Monster;`を忘れない


ルーティング:

```

```

=> `use App\Http\Controllers\MonsterController;`を忘れない
