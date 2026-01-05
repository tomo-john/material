# Livewire Componentの命名規則

Livewire Componentの名前は`クラス名 x ディレクトリ構成から自動生成される`

```bash
App\Livewire\Sandbox\Counter

=> <livewire:sandbox.counter />
```

=> 自分で登録しない / ルートも書かない

## 基本ルール

### クラス名 => kebab / dot 形式

```php
<?php
class UserProfile extends Component
```

Bladeでは:

```blade
<livewire:user-profile />
```

または(ディレクトリあり):

```php
<?php
App\Livewire\Settings\UserProfile
```

👇

```blade
<livewire:settiongs.user-profile />
```

## 変換ルールまとめ

| PHPクラス名   | Blade名         |
|---------------|-----------------|
| Counter       | counter         |
| UserProfile   | user-profile    |
| TwoFactorAuth | two-factor-auth |

## Viewファイルの命名ルール

```php
<?php
return view('livewire.sandbox.counter');
```

実体🐶:

```bash
rexources/views/livewire/sandbox/counter.blade.php
```

