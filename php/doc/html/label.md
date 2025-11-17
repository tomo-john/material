# label

このフォーム部品のための`名札(ラベル)`ですよと、文字とフォーム部品を関連付ける役割。

```
<form aciton="" method="post">
  <label>お名前: </label>
  <input type="text" name="name">
  <input type="submit" value="送信">
</form>
```

上記の例では、`お名前:`という文字をクリック(タップ)しただけで、自動的に入力ボックスにフォーカスされる。

また、スクリーンリーダーでの読み上げも「お名前の入力欄です」と正しく読み上げられる。

## forとid

確実で正しいお作法として、`<label>タグ`の`for属性`と、フォーム部品の`id属性`をペアにする。

```
<!-- for属性とid属性を、同じ「名前」でペアにする -->

<label for="user_name_id">お名前:</label>
<input type="text" id="user_name_id" name="user_name">

<input type="checkbox" id="agree_id" name="agree">
<label for="agree_id">利用規約に同意する</label>
```

