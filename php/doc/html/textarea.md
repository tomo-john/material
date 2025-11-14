# textareaタグ

`<input>`タグと`<textarea>`タグでは値の持ち方が異なる。

`<input>`タグは`value`という属性で初期値を持つ。

```html
<!-- vaue="..."なので、前後に改行や空白を入れてもOK -->
<input type="text"
       name="file_name"
       value="<?php echo $old_input['file_name'] ?? ''; ?>">
```

一方で`<textarea>`には`value`属性がない。

`<textarea>`は、開始タグと終了タグ(`<textarea> ～ </textarea>`)の間に書かれたもの`すべて`をそのまま初期値として表示しようとする。

### 良くない例(失敗)

```html
<textarea name="content" ...>
    <?php echo htmlspecialchars(...); ?> <!-- この行に余分は空白が入っている -->
</textarea>
```

インデントなどがすべて文字(空白)として扱われてしまう。

=> 意図しない空白が初期値として入ってしまう...

### 解決策

`<textarea>`の開始タグと終了タグの間に余分な空白を1文字を入れないこと。

```html
<textarea name="content" ...><?php echo htmlspecialchars(...); ?> <!-- この行に余分は空白が入っている --></textarea>
```

読みにくい場合もあるけど、これが正しいお作法らしい。

