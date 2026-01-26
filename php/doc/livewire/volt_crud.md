# VoltでCRUD サンプルコード

```php
<?php

use Livewire\Component;
use App\Models\Dog;

new class extends Component
{
    public $name;
    public $birthday;
    public $is_good_boy;
    public $dogs;
    public ?int $editingDogId = null;

    // mountは最初に起動したとき1回実行される
    public function mount()
    {
        $this->dogs = Dog::latest()->get();
    }

    // 保存処理(新規・更新どちらも対応)
    public function save()
    {
        $validated = $this->validate([
            'name' => 'required|string|max:50',
            'birthday' => 'nullable|date',
            'is_good_boy' => 'nullable|boolean',
        ]);

        $validated['is_good_boy'] ??= false;

        if ($this->editingDogId) {
            // 更新
            $dog = Dog::findOrFail($this->editingDogId);
            $dog->update($validated);

            $this->dogs = $this->dogs->map(
                fn ($d) => $d->id === $dog->id ? $dog : $d
            );

            session()->flash('message', '更新しました');
        } else {
            $dog = Dog::create($validated);
            $this->dogs->prepend($dog);


            session()->flash('message', '保存しました');
        }

        $this->resetForm();
    }

    // 削除処理
    public function delete(int $dogId)
    {
        Dog::where('id', $dogId)->delete();

        $this->dogs = $this->dogs->reject(fn($dog) => $dog->id === $dogId);

        session()->flash('message', '削除しました');
    }

    // 更新処理
    public function update(int $dogId)
    {
        $dog = Dog::findOrFail($dogId);

        $this->editingDogId = $dog->id;
        $this->name = $dog->name;
        $this->birthday = $dog->birthday?->format('Y-m-d');
        $this->is_good_boy = $dog->is_good_boy;
    }

    // フォームリセット
    public function resetForm()
    {
        $this->reset([
            'name',
            'birthday',
            'is_good_boy',
            'editingDogId',
        ]);

        $this->resetValidation();
    }
};
?>
```

```blade
<div>
    <h2 class="text-2xl text-white font-semibold">
        Dog
        <i class="fa-solid fa-dog ml-2"></i>
    </h2>

    <!-- 犬アイコンとフラッシュメッセージ -->
    <div class="flex justify-center mt-6">
        <div class="relative flex items-center">

            <!-- 犬: 幅を固定 -->
            <div class="w-32 flex justify-center">
                <div class="w-32 h-32 flex justify-center items-center rounded-full bg-gray-600">
                    <i class="fa-solid fa-dog text-5xl text-white"></i>
                </div>
            </div>

            <!-- 吹き出し: 犬の横に重ねる -->
            @if (session()->has('message'))
                <div
                    wire:key="{{ session('message') . now() }}"
                    x-data="{ show: true }"
                    x-init="setTimeout(() => show = false, 2000)"
                    x-show="show"
                    x-transition.duration.500ms
                    class="absolute left-32 ml-4"
                >

                    <div class="relative bg-green-900/60 text-green-200 px-4 py-3 rounded-xl max-w-xs whitespace-nowrap flex-items-center">
                        {{ session('message') }}
                    </div>
                </div>
            @endif

        </div>
    </div>

    <!-- 入力フォーム -->
    <div class="max-w-2xl mx-auto space-y-4 border rounded-2xl mt-6 p-6">
        <flux:input label="Dog name" wire:model="name" placeholder="例: じょん" />
        <flux:input label="Birthday" wire:model="birthday" type="date" />
        <flux:checkbox label="Good Boy? 🐶" wire:model="is_good_boy" />
        <flux:button wire:click="save">
            {{ $editingDogId ? '更新' : '保存' }}
        </flux:button>
    </div>

    <!-- Dog 一覧 -->
    <div class="max-w-2xl mx-auto mt-8 space-y-3">
        <h2 class="text-xl font-semibold text-center">INDEX</h2>
        @forelse ($dogs as $dog)
            <div wire:key="dog-{{ $dog->id }}" class="flex items-center gap-3">
                <div class="flex justify-between items-center border rounded-xl p-4 flex-1">
                    <div>
                        <p class="font-semibold">{{ $dog->name }}</p>
                        <p class="text-sm text-gray-400">
                            {{ $dog->birthday?->format('Y-m-d') ?? '誕生日未登録' }}
                        </p>
                    </div>

                    <div>
                        @if ($dog->is_good_boy)
                            <span class="text-green-400">Good Boy <i class="fa-solid fa-dog"></i></span>
                        @else
                            <span class="text-gray-400"><i class="fa-solid fa-dog"></i></span>
                        @endif
                    </div>
                </div>

                <!-- 編集アイコン -->
                <div>
                    <i
                        wire:click="update({{ $dog->id }})"
                        class="fa-solid fa-pen cursor-pointer hover:text-blue-500"
                    ></i>
                </div>

                <!-- 削除アイコン -->
                <div>
                    <i
                        wire:click="delete({{ $dog->id }})"
                        wire:confirm="削除してよろしいですか？"
                        class="fa-solid fa-trash cursor-pointer hover:text-red-500"
                    ></i>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-400">
                まだ犬がいません
                <i class="fa-solid fa-dog"></i>
            </p>
        @endforelse
    </div>
</div>
```

## 全体像

DogのCRUDを1画面・1コンポーネント・1フォームで管理する構造。

- DBの状態
- Livewireの状態 (=プロパティ)
- UI(Blade)

この3つを役割分担させる。

## プロパティ = 画面の状態そのもの

```php
<?php
public $name;
public $birthday;
public $is_good_boy;
public $dogs;
public ?int $editingDogId = null;
```

- `$name`, `$birthday`, `is_good_boy` : フォーム入力欄の状態
- `$dogs` : 一覧表示用のキャッシュ(DBの写し)
- `$editingDogId` : 今、編集中かどうかのフラグ

Livewireでは画面に必要な状態はすべてプロパティで持つ。

## mount() = 初期状態を作る状態

```php
<?php
public function mount()
{
    $this->dogs = Dog::latest()->get();
}
```

- `mount()`はLivewireで予約されたメソッド
- コンポーネントが最初に表示されるとき1回だけ実行

ここでは、DB => 一覧用プロパティ`$dogs`にコピーにて以降は毎回DBを叩かない設計。

`mount()`はPHPの`__construct`に近いが、Livewireではプロパティに初期値をセットするために`mount`を使うのが決まり。

### latest()

並び替えのショートカットメソッド。

最新のデータ(作成日時が新しいもの)を上に持ってくる。

=> 内部的には、`orderBy('created_at', 'desc')`を実行している。

## save() = 新規 or 更新を判断する司令塔

```php
<?php
if ($this->editingDogId) {
    // 更新
} else {
    // 新規
}
```

- `$editingDogID`が

  - `null` => 新規
  - `idあり` => 更新

という明確な状態スイッチとなっている。


### 新規作成の流れ

```php
<?php
$dog = Dog::create($validated);
$this->dogs->prepend($dog);
```

- DBに保存
- 一覧プロパティも自分で更新

Livewireの鉄則: DB更新したら、画面用のプロパティも更新する。

### 更新の流れ

```php
<?php
$dog->update($validated);

$this->dogs = $this->dogs->map(
    fn ($d) => $d->id === $dog->id ? $dog : $d
);
```
- DBで更新
- `$dog`の中の該当1件だけ差し替え

=> 画面用プロパティ(`$dogs`)を差し替えてあげることでDB再取得せずに画面が変わる

### map()

```php
<?php
$this->dogs = $this->dogs->map(
    // $d には $this->dogs の中から 1匹ずつ犬が入ってくる
    fn ($d) => $d->id === $dog->id ? $dog : $d
);
```

`fn ($d)`の`$d`は`$this->dogs`の中に並んでいる1つ1つの要素。

今回の処理では、コレクションの中身を走査し、特定の1つだけを最新の状態に差し替える処理。

`map()`は元のコレクションをベルトコンベアに乗せるイメージ。

- 1. `$this->dogs`という箱から1つずつ要素(`$d`)を取り出す。
- 2. その`$d`に対して、矢印(`=>`)の右側の処理を行う。
- 3. 処理した結果を新しい箱に入れて、最後にそれを返す。

```php
<?php
fn ($d) => $d->id === $dog->id ? $dog : $d
```

- `$d->id === $dog->id`: 今ベルトコンベアに乗っている🐶(`$d`)のIDが新しく保存した🐶(`$dog`)のIDと同じかをチェックしている。
- `? $dog`: もしIDが一致したら新しい`$dog`に差し替える
- `: $d`: もしIDが違ったらそのまま`$d`を返す。(差し替えない)

結果としてリスト全体をリロード(DBから再取得)せずに、メモリ上のデータだけをバシュっと書き換えている。

## update() = 編集モードに入るスイッチ

```php
<?php
public function update(int $dogId)
{
    $dog = Dog::findOrFail($dogId);

    $this->editingDogId = $dog->id;
    $this->name = $dog->name;
    $this->birthday = $dog->birthday?->format('Y-m-d');
    $this->is_good_boy = $dog->is_good_boy;
}
```

- 編集対象のDogを取得
- フォーム用プロパティに流し込む

=> プロパティを書き換えるだけでフォームが勝手に更新される

## delete() = DB + プロパティの同期

```php
<?php
public function delete(int $dogId)
{
    Dog::where('id', $dogId)->delete();

    $this->dogs = $this->dogs->reject(fn($dog) => $dog->id === $dogId);

    session()->flash('message', '削除しました');
}
```

- DBから削除
- 画面用データからも削除

=> 他の処理と同様にDBと画面(プロパティ)の二重管理

## resetForm() = 状態を初期化するメソッド

```php
<?php
public function resetForm()
{
    $this->reset([
        'name',
        'birthday',
        'is_good_boy',
        'editingDogId',
    ]);

    $this->resetValidation();
}
```

今回は専用メソッドとして使用。

=> 他のメソッドからいつでも呼び出せる

`$this->resetValidation()`はLivewireが提供している標準機能のメソッド。

- `$this->reset(...)`: プロパティ(入力内容)を空にする。
- `$this->resetValidation():` 画面に出ているエラーメッセージを消し、エラー状態を解除する。

