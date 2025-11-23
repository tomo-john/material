# 名前空間(namespace)

同じ名前のクラスがぶつからないようにするためのフォルダみたいな仕組み。

## namespaceはクラスの住所

```
namespace App\Animals;

class Dog {
  public function bark() {
    echo "わんわん🐶";
  }
}
```

この`APP\Animals`が住所(名前空間)。

### 呼び足すときは住所付きでアクセス

```
$dog = new \App\Animals\Dog();
$dog->bark();
```

## useを使うともっと楽

毎回長い住所を書くのは疲れる :dog:

```
use App\Animals\Dog;

$dog = new Dog();
$dog->bark();
```

Laravelでよく見るやつ :dog:

```
use App\Models\User;
use App\Http\Controllers\HomeController;
```

## namespaceを使うと何が嬉しい？

- クラス名の衝突がなくなる

  => 別々の場所え`Dog`クラスが定義されてもOK

- ファイルの整理がしやすい

  => ディレクトリ構造と`namespace`が一致するのが一般的

