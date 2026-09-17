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

