# wire:model

入力フォームとPHPの変数を自動で同期する仕組み。

- 入力する
- PHP側の変数が変わる
- 画面の表示も自動で更新される
- 送信ボタンとかいらない

## 2種類の指定

```blade
wire:model.[更新タイミング].[型変換]
```

```blade
wire:model.live.number="count"
```

- `live` = いつ同期するか
- `number` = どう変換するか

## 更新タイミング系

### .live

```blade
wire:model.live="name"
```

- 入力のたびに即同期
- リアルタイム更新
- カウンター・検索・即反映UI向き

### .lazy

```blade
wire:model.lazy="email"
```

- フォーカスが外れたときに同期
- 入力中は通信しない
- 保存系フォームに最適

### .defer

```blade
wire:model.defer="password"
```

- `save()`などが呼ばれるまで送信しない
- 昔(Livewire2)の主流
- 今は使用頻度低め(?)

### .debounce

```blade
wire:model.debounce.500ms="keyword"
```

- 入力停止後に同期
- 検索フォームの定番
- `.live`の制御板

## 型変換系

### .number

```blade
wire:model.live.number="count"
```

- 数値にキャスト
- `int` / `float`プロパティ必須

### .boolean

```blade
wire:model.boolean="isActive"
```

- true / falseに変換
- checkbox / toggle用

### .trim

```blade
wire:model.trim="name"
```

- 前後の空白を削除
- テキスト入力向け

## サンプル

```blade
<!-- 数値入力 -->
<input type="number" wire:model.live.number="count">

<!-- テキスト入力(即反映) -->
<input type="text" wire:model.live.trim="name">

<!-- フォーム入力(保存型) -->
<input type="email" wire:model.lazy="email">
<input type="password" wire:model.defer="password">

<!-- 検索ボックス -->
<input type="text" wire:model.debounce.300ms="keyword">
```

