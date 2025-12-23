# setTimeout()

`setTimeout()`は、指定した時間が経過した後に、一度だけ処理を実行するための関数。

```javascript
setTimeout(実行したい関数, 待機する時間(ミリ秒));
```
:dog: 1000ミリ = 1秒 :dog:

シンプルな例:

```javascript
setTimeout( () => {
  console.log("3秒経ったわん🐶");
});
```

## タイマーキャンセル

例えば、3秒後にメッセージを消すというタイマーが動いている間に、別の処理を開始する。

キャンセルをしないと、古いタイマーが勝手にメッセージを消してしまい、新しいメッセージがすぐ消えてしまう。

```javascript
let timerId = null; // タイマーの番号を保持する変数

const startTimer = () => {
  // すでに動いているタイマーがあれば止める
  if (timerId !== null) {
    clearTimeout(timerId);
  }

  // 新しくタイマーをセット
  timerId = setTimeout(() => {
    console.log("メッセージを消す処理");
    timerId = null; // 終わったら空にする
  }, 2000);
};
```

## 非同期処理

`setTimeout()`は、待っている間に他の処理を止めないという性質がある。

```javascript
console.log("1. 準備🐶");

setTimeout(() => {
  console.log("2. おやつ食べる🐶")
}, 1000);

console.log("3. お散歩🐶");
```

出力結果は、1 => 3 => 2(1秒後)の順番。

JavaScriptは、`setTimeout`を見つけると、タイマーを裏側でスタートさせて、自分は次の処理へと進んで行く。

## アロー関数(Arrow Function)

`() => {}`はアロー関数と呼ばれる書き方で、名前を持たない無名関数の一種。

`setTimeout()`のように、その場ですぐに渡して後で1回だけ実行してもらうというような使い方の場合に、わざわざ外側で名前をつけて定義しない。

```javascript
// 名前がある関数を渡す場合
function sayWoof() { console.log("わーん"); }
setTimeout(sayWoof, 1000);

// 無名関数(アロー関数)の場合
setTimeout(() => { console.log("わーん"); }, 1000);
```

## 関数もデータの1つ

JavaScriptでは、数値や文字列を同じように、`関数(処理)`を変数に入れることができる。

```javascript
const startTimer = () => {...処理...};
```

これによって、`startTimer`という名前を呼ぶ(`startTimer()`と書く)だけで、中身の処理をいつでも実行できる

## timerId と clearTimeout

`setTimeout()`を実行すると、ブラウザが「このタイマーは105番として登録したよ」という風に、識別番号(数値)を返してくれる。

`timerId = setTimeout(...);`で`timerId`には「105」のような数字が入る。

`clearTimeout(timerId)`は、その番号を取り消すコマンド。

