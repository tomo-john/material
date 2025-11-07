# テンプレート構文

HTMLとPHPを混ぜるときに見やすくするための構文。

### ふつうの書き方({}を使う)

```
<?php foreach ($errors as $e) { ?>
  <li><?= $e ?></li>
<?php } ?>
```

### テンプレート構文(:とendforeachを使う)

```
<?php foreach ($errors as $e): ?>
  <li><?= $e ?></li>
<?php endforeach; ?>
```

`{`の代わりに`:`を使い、`}`の代わりに`endif:`や`endforeach:`を使用する。

### if文

```
<?php $is_admin = false; ?>

<?php if ($is_admin) : ?>
  <a href="/admin">管理者パネルへ</a>
<?php else : ?>
  <p>一般ユーザーです。</p>
<?php endif; ?>
```

### foreachループ

```
<body>
  <?php $users = ['じょん', 'ぴょんきち', 'もこもか']; ?>

  <ul>
    <?php foreach ($users as $user) : ?>
      <li><?= htmlspecialchars($user) ?></li>
    <?php endforeach; ?>
  </ul>
</body>
```

