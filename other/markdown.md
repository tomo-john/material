# markdown

マークダウン記述テスト用(GitHub)

---

## トグル

```
<details>
<summary>クリックして展開</summary>

ここにトグルで隠したい内容を記述する。

- じょん1
- じょん2
- じょん3

</details>
```

<details>
<summary>クリックして展開</summary>

ここにトグルで隠したい内容を記述する。

- じょん1
- じょん2
- じょん3

</details>

## チェックボックス

```
- [x] 完了した犬
- [ ] 未完了の犬
```

- [x] 完了した犬
- [ ] 未完了の犬

## リンクと画像

### リンク

```
[リンクテキスト](URL)
```

[じょーんGitHub](https://github.com/tomo-john)

### 画像

```
![代替テキスト](画像URL)
```

![代替テキスト](images/image.jpeg)

## 引用

`>`で引用

> これは引用テキスト
> - 引用リスト
> - 引用リスト2

## 絵文字

`:`で囲むことで絵文字が使える

`:dog:` => :dog:
`:sparkles:` => :sparkles:

superdog :dog::sparkles:

---

# .vimrc

```bash
# ~/.vimrc
let g:markdown_fenced_languages = ['bash=sh', 'html', 'css', 'php', 'javascript', 'sql']
```

## test

```bash
for f in $( ls *.php *.css | grep -v 'Parsedown.php' ); do echo "--- FILE: $f ---"; cat "$f"; echo -e "\n--- END OF $f ---\n"; done > review_code.txt
```

```html
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>たいとる</title>
</head>
<body>
  <h1>Hello🐶</h1>
</body>
</html>
```

```css
@charset 'utf-8';

body { 
  width:100%
}

.class {
  padding: 4px;
  margin: 4px;
}
```

```javascript
const msg = 'Hello';
console.log(msg);
```

```php
<?php
$var = dog;
echo $var;
```

```sql
SELECT * FROM dogs WHERE id = '1';
```

