# プルダウン

HTMLのプルダウンは大きく分けて2つのタグの組み合わせでできている。

## 基本構造

- `<select>`タグ: プルダウンの箱。ここに名前をつける。
- `<option>`タグ: 箱の中に入れる選択肢。

```html
<select name="status">
  <option value="1">a</option>
  <option value="2">b</option>
  <option value="3">c</option>
</select>
```

## 大切なポイント

- `name`属性(selectタグにつける)

  Lravelのコントローラで`$request->status`と書いた時の`status`は、この`name="status"`から来ている。

- `value`属性(optionタグに付ける)

  裏側の値 => DBに保存される値

- `<select>`タグに挟まれた文字

  ユーザーが画面で見て選ぶための言葉

上記の例では、aを選べば1が実際に選択された値となる。

## selected

通常、プルダウンは一番上の項目が初期状態として選択されている。

特定の項目を初期値にしたい場合は、`selected`を記述する。

```html
<select name="status">
  <option value="pending">未着手</option>
  <option value="in_progress" selected>着手</option>
  <option value="completed">完了</option>
</select>
```

この場合、最初は`着手`が選択された状態となる。

## Laravelでの動的な作り方

`<option>`を`@foreach`を使って並べてあげる。

```php
<?php
  $animals = [
    'dogs' => 'いぬ',
    'rabbit' => 'うさぎ',
    'bear' => 'くま',
    'fish' => 'さかな'
  ];
?>

<select name="animal">
  @foreach ($animals as $value => $animal)
    <option value="{{ $value }}">{{ $animal }}</option>
  <@endforeach>
</select>
```

### @selected

`@selected(条件)`の条件が`true`のときだけ、HTMLの`selected`属性を出力する。

`old()`メソッドと組わせることで、バリデーションエラー時などに直前に選択した内容をそのまま残すことができる :dog:

簡易taskアプリのcreate画面で使用したサンプル:

```blade
<form action="{{ route('tasks.store')}}" method="post">
  @csrf
  <label for="status">状態:</label>
  <select id="status" name="status">
    @foreach ($statusOptions as $value => $label)
      <option value="{{ $value }}" @selected(old('status') == $value)>
        {{ $label }}
      </option>
    @endforeach
  </select>
  <label for="title">登録するタスク:</label>
  <input id="title" name="title" type="text" placeholder="例: 犬の散歩" value="<?php echo old('title') ?? '' ?>">
  @error('title')
    <p>{{ $message }}</p>
  @enderror
  <button type="submit" class="bg-pink-200 hover:bg-pink-400 text-white font-bold py-2 px-2 rounded">登録する🐾</button>
</form>
```

