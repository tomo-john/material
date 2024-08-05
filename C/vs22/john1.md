# 最初の1コード

```
#include <stdio.h>

int main() {
    printf("Hello, John!\n");
    return 0;
}
```

`#include <stdio.h>`

プリプロセッサディレクティブ : プログラムがコンパイルされる前に実行される命令

`#include`で他ファイルの内容をこのファイルに挿入

`<stdio.h>`は標準入出力ライブラリヘッダファイル

=> printf関数などの標準入出力操作を行うための関数宣言が含まれている

- `int main(){`

  main関数の定義の始まり(Cはmain関数から実行が開始される)

  intはこの関数が整数型の値を返すことを示す

- `printf("Hello, John!\n");`

  printf関数は標準出力(通常はコンソール)にテキストを出力するための関数

  ("Hello, John!\n")内のHello, John!をコンソールに出力

  \nは改行文字で、これを出力することでカーソルが次の行へ移る

- `return 0`

  main関数の終了を明示(正常終了の0を返している)

