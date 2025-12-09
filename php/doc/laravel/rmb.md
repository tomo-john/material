# Route Model Binding

URLの`{id}`に書かれた数字から自動で該当のレコード(モデル)を取得してくれる機能。

ふつうに書くとこうなる:

```
public function edit($id)
{
  $dog = Dog::find($id);
  return view('dogs.edit', compact('dog'));
}
```

- `$id`を受け取る
- `Dog::find($id)`で探す
- `$dog`をビューへ渡す

Route Model Bindingを使うとこうなる

```
public function edit(Dog $dog)
{
  return view('dogs.edit', compact($dog));
}
```

`find()`すら書いてないのに`$dog`がモデルで渡ってくる...!

Laravelが裏で勝手にURLの`/dogs/5/edit`の`5`を読みって、`Dog::find(5)`をしてくれている。

ポイント(?):

```
Route::get('/dogs/{dog}/edit', ...);
```

=> `{dog}`: モデル名の小文字と一致している

=> URLの`{dog}`が`edit(Dog $dog)`の`$dog`と一致するから自動で「Dogモデル」って判断して取っ手きてくれる

