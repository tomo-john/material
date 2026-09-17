# Laravel Sanctum

Laravelアプリに、APIの認証機能を追加するためのLaravel公式パッケージ。

[Laravel 13 公式ドキュメント](https://laravel.com/framework/docs/13.x/sanctum#main-content)

インストールコマンド:

```bash
php artisan install:api
```

## Sanctumの大きな2つの使い方

- APIトークン: APIトークンの生成や管理
- SPA認証: トークンを使用せずCookieベースのセッション認証サービス

Sanctumではどちらか一方のみの使用みたいなこともできる。

今回の学習では、`API Token認証`からまず学習・検証する。

## Personal Access Token

SanctumではAPI Token認証にPersonal Access Tokenという仕組みを使う。

直訳すると、個人のアクセスのトークンなので、あるユーザーがAPIへアクセスするために発行するToken。

SanctumではUserとTokenが紐づく。

```text
User #123
  |
  |- Token A : PC
  |- Token B : スマホ
  |- Token C : Postman
```

のように、1ユーザーが複数のTokenを持つこともできる。

## Tokenはどこに保存されるのか？

`personal_access_tokens`というテーブルを使用する。

=> Tokenはそのまま平文でなく安全に使用できる形でDBに保存

Tokenを発行したUserと、そのTokenをLaravel側で管理できる。

ちなみにLaravelでは、UserモデルにSanctumの機能を追加する。

`$user->createToken()`のように、Userモデル(オブジェクト)からToken発行のメソッドが使用できたりする。

