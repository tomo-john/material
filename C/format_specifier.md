# フォーマット指定子
`printf()`や`scanf()`でデータを表示したり取得するときに、

どの型のデータを扱うかを指定するやつ

| 指定子 | 対応する型   | 内容                           |
|--------|--------------|--------------------------------|
| %c     | char         | 1文字                          |
| %s     | char *       | 文字列                         |
| %d     | int, short   | 10進数整数                     |
| %u     | unsigned int | 10進数整数(符号なし)           |
| %o     | int, short   | 8進数整数                      |
| %x     | int, short   | 16進数整数                     |
| %f     | float        | 浮動小数点数, 実数             |
| %lf    | double       | 倍精度浮動小数点数, 倍精度実数 |
| %p     | int?         | ポインタのアドレス             |
| %%     | ?            | 文字の`%`を出力                |

```c
#include <stdio.h>

int main() {
	int a = 42;
	unsigned int b = 300;
	char str[] = "Hello";
	float f = 3.14;
	int hex = 255;

	printf("%%d: %d\n", a);           // %d: 42
	printf("%%u: %u\n", b);           // %u: 300
	printf("%%s: %s\n", str);         // %s: Hello
	printf("%%f: %f\n", f);           // %f: 3.140000
	printf("%%x: %x\n", hex);         // %x: ff
	printf("%%X: %X\n", hex);         // %X: FF

	return 0;
}
```

## 表示桁数の指定
%の後に数字を入れることで指定が可能: `%[桁数]指定子`

表示桁数は<全体の桁数>.<小数点以下の桁数>で指定する

=> どちらか片方の指定でも、まったく指定しなくてもok

=> 小数点以下の桁は文字列の場合は最大文字数の意味になる

```c
#include <stdio.h>

int main(void){
  printf("[%d]\n", 28);              // [28]
  printf("[%5d]\n", 28);             // [   28] => 最小5桁

  printf("[%s]\n", "Hello John!");   // [Hello John!]
  printf("[%15s]\n", "Hello John!"); // [    Hello John!] => 最小15桁
  printf("[%.5s]\n", "Hello John!"); // [Hello] => 最大5桁

  printf("[%f]\n", 123.45678);       // [123.456780]
  printf("[%8.3f]\n", 123.45678);    // [ 123.457]
}
```

## ゼロ詰めの指定
桁数の指定の前に`0`を付ける

例: `printf("%05d", 28);` => 出力: `00028`

## 右詰・左詰の指定
デフォルトでは右詰めなので、左詰めの場合は桁数指定の前に`マイナス`を付ける

例: `printf("[%-5d]", 1);` => 出力: `[1    ]`

