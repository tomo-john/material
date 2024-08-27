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

