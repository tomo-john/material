# SanctumでAPIトークンの発行

SanctumはUserとAPI Tokenを結びつける仕組みを提供してくれる。

[公式ドキュメント](https://laravel.com/framework/docs/13.x/sanctum#issuing-api-tokens)

## HasApiTokens

UserモデルにHasApiTokensを使えるようにしてあげる。

```php
<?php
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
}
```

これで、`createToken()`メソッドなどがUserモデルのインストールで使用できる。

```
Laravel
│
├── Sanctum
│   │
│   ├── config/sanctum.php
│   ├── API関連の仕組み
│   └── Personal Access Tokenの仕組み
│
├── User
│   └── HasApiTokens
│
└── MySQL
    └── personal_access_tokens
```

## TinkerでUserとTokenを作ってみる

User:

```php
<?php
$user = App\Models\User::create(['name' => 'API User', 'email' => 'api@example.com', 'password' => 'password1234']);
```

Token:

```php
<?php
$token = $user->createToken('api-sandbox');
```

- `'api-sandbox'`はTokenの名前
- Sanctumでは1人のUserが複数のTokenを持てる

## $tokenの中身

```php
<?php
> $token

= Laravel\Sanctum\NewAccessToken {#8707
    +accessToken: Laravel\Sanctum\PersonalAccessToken {#8696
      name: "api-sandbox",
      #token: "8684f3fe797457e73eb398f1764542bb2827a75fa7285dbb4154f46be40683b4",
      abilities: "[\"*\"]",
      expires_at: null,
      tokenable_id: 1,
      tokenable_type: "App\\Models\\User",
      updated_at: "2026-09-17 22:09:50",
      created_at: "2026-09-17 22:09:50",
      id: 1,
    },
    +plainTextToken: "1|bcSfSLmkUWv0JwZ70QHnFQc5moeFQF1O73jKtFDl7a4e8d65",
  }
```

まず、作成するとTokenを発行した結果を表す`NewAccessToken`オブジェクトが返ってきている。

全体像:

```
NewAccessToken
  |
  |-- accessToken: PersonalAccessToken
  |
  |-- plainTextToken: 実際にクライアントへ渡すToken
```

- `accessToken`: 発行されたTokenをLaravel/Sanctum側で管理するためのモデル
- `plainTextToken`: APIを利用するクライアント側が実際に使うTokenの文字列(HTTPリクエストヘッダに入れるやつ)

## accessToken

```php
<?php
name: "api-sandbox"
#token: "8684f3fe797457e73eb398f1764542bb2827a75fa7285dbb4154f46be40683b4",
abilities: "[\"*\"]"
expires_at: null
tokenable_id: 1
tokenable_type: "App\\Models\\User"
id: 1
```

`tokenable_id: 1`, `tokenable_type: "App\Models\User"` => このTokenはUser ID = 1のUserに紐づいている。

`#token`はDB側で管理されるTokenの値。

=> このDBに保存される値と`plainTextToken`の値を照合している

Next: [curlで発行したTokenを使ってAPIを叩く](./curl-token.md)

