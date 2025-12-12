# エラーメッセージ

## @errorディレクティブ

`@error('フィールド名') ... @enderror`:

```blade
@error('name')
  <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
@enderror
```

- `@error('name')`: エラーが存在するかをチェック
- エラーが存在する場合は、`<p>`タグの行が表示される

### CSSのクラスでも使える

```blade
<div class="w-full ... @error('name') border-red-500 @enderror"> ... </div>
```

エラーが存在する場合のみ、`@error() ～ @enderror`間に指定したクラスが当たる。

## message

`@error`ディレクティブのブロック中では、特別な変数`$message`が利用可能。

この`$message`には、Laravelが自動生成した該当フィールドのエラーメッセージが格納されている。

