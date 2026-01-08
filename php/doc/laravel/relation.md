# リレーション

モデル同士の間にリレーションを設定することで、データベーステーブルを関連づけられるようになる。

例えば、`Postモデル`と`Userモデル`にリレーションを設定する。

- 1つのPost(投稿)は1人のUser(ユーザー)に紐づく
- 1人のUserは複数のPostを持つ
- これは1対多のリレーションを設定する

## 1対多リレーション

- 1側のモデルを親モデル(例: User)
- 多側のモデルを子モデル(例: Post)

`postsテーブル`の中に、`user_id`カラムを追加する。

=> `user_id`カラムには各postが紐づくuserのidを入れる

=> リレーション用に他のテーブルのid情報を入れるカラムを作る場合、データ型は`foreignId`

### Model側の設定

`Userモデル`:

```php
<?php
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
```

=> `hasMany()`メソッドを使用

`Postモデル`:

```php
<?php
    public function user()
    {
        return $this->belongsTo(User::class);
    }
```

=> `belongsTo()`メソッドを使用

