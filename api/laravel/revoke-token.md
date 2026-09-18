# Tokenの失効

「このTokenは、もう認証に使えません」とすること。

## Sanctumではどうする?

`$user->tokens`で取得できる`PersonalAccessToken` = 実際にDBの保存されているTokenのレコード。

シンプルに、特定のTokenを取得し、`$token->delete();`でそのレコード自体を消す。

Tokenを失効させる方法の1つとして、そのPersonal Access Tokenを削除することができる。

### Tinkerで実験

```php
<?php
$user = App\Models\User::find(1);  // 以前作成したテスト用ユーザー

$user->createToken('revoke-test'); // 2つ目のTokenを作成

= Laravel\Sanctum\NewAccessToken {#8717
    +accessToken: Laravel\Sanctum\PersonalAccessToken {#8706
      name: "revoke-test",
      #token: "df4d6f4e3cdd7cdab759da66c49848c8cdf765f535bbd892ad51134067f901eb",
      abilities: "[\"*\"]",
      expires_at: null,
      tokenable_id: 1,
      tokenable_type: "App\\Models\\User",
      updated_at: "2026-09-18 16:24:24",
      created_at: "2026-09-18 16:24:24",
      id: 2,
    },
    +plainTextToken: "2|RsOcXipJCqbUtDE7PfLhQjNX2XOmY4Li19L29fdnc687a0db", // この文字列を後でリクエストヘッダで使用
  }
```

この時点では、curlで200がちゃんと返ってくる。

```bash
curl -i -H "Authorization: Bearer 2|RsOcXipJCqbUtDE7PfLhQjNX2XOmY4Li19L29fdnc687a0db" http://localhost:8000/api/user
```

TinkerでTokenを消してみる。

```php
<?php
$token = Laravel\Sanctum\PersonalAccessToken::find(2);

$token->delete(); // 削除
```

この後、同じ`curl`を叩いても401が返ってきた。

