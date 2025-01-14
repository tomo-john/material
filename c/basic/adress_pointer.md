# アドレスとポインタ

## 1.メモリとアドレス
- メモリ
  データを格納するための場所

  メモリはたくさんの箱に分かれており、それぞれの箱にアドレス(ユニークな番号)がついている

- アドレス
  メモリの箱がどこにあるのかを示す番号

  作成された変数はメモリのどこかに格納される、その場所(アドレス)は自動的に割り当てられる

```c
int a = 10;
```
変数`a`はメモリのどこかに格納され、その場所(アドレス)に`10`という値が保存される

## 2.ポインタ
- ポインタ
  ポインタは`アドレスを格納するための変数`

  普通の変数が値を持つのに対して、ポインタはその値がどこにあるかを示すアドレスを持つ

```c
int a = 10;
int *p = &a;
```
=> `a`という変数には`10`という値が格納されている

=> `p`というポインタ変数には`a`のアドレスが格納されている

`*` と `&` の意味
- `*`: ポインタが指しているアドレスの値を取得するために使用(デリファレンス演算子)
- `&`: 変数のアドレスを取得するために使用(アドレス演算子)

## 3.ポインタの使い方
```c
#include <stdio.h>

int main(void) {
	int a = 10;
	int *p = &a;

	printf("a の値: %d\n", a);            // 10: a の値を表示
	printf("a のアドレス: %p\n", &a);     // 0x7ffcf68e0f7c: a のアドレスを表示
	printf("p が指すアドレス: %p\n", p);  // 0x7ffcf68e0f7c: p に格納されているアドレスを表示
	printf("p が指す値: %d\n", *p);       // 10: p が指すアドレスにある値を表示

	return 0;
}
```
`&a`は`a`のアドレスを取得して`p`に格納

`*p`は`p`が指しているアドレス(=`a`)の値を取得している

## 4.ポインタの利点
- 効率的なメモリ操作: 

	=> 大量のデータを操作するとき、値コピーよりポインタでデータの場所を参照する方が効率的

- 関数にデータを渡す:

	=> 関数にポインタを渡すことで、関数内でのデータ変更が関数外にも反映される

---

### sample

```c
#include <stdio.h>

int main(void){
  int a = 10;  // aという変数を作成し、10を代入
  int *p = &a; // ポインタpにaのアドレスを代入

  printf("%d\n", a);  // 10
  printf("%p\n", &a); // 0x7ffeb3a82f5c : aのアドレス
  printf("%p\n", p);  // 0x7ffeb3a82f5c : pに格納されたアドレス(aのアドレス)
  printf("%d\n", *p); // 10 : pが指している値 = aの値
}
```

```c
#include <stdio.h>

int main(void){
  char c1[] = "john";
  char c2[] = {'j', 'o', 'h', 'n', '\0'};

  printf("c1: %s\n", c1); // john
  printf("c2: %s\n", c2); // john

  printf("c2[2] : %c\n", c2[2]);  // h
  printf("&c2[2]: %s\n", &c2[2]); // hn => c2[2]以降が表示される

  char *p1 = &c2[0];
  char *p2 = &c2[2];

  printf("&c2[0] のアドレスの値: %s\n", p1); // john
  printf("&c2[2] のアドレスの値: %s\n", p2); // hn

  printf("&c2 のアドレス       : %p\n", &c2);    // 0x7fffe660ff73
  printf("&c2[0] のアドレス    : %p\n", &c2[0]); // 0x7fffe660ff73
  printf("&c2[2] のアドレス    : %p\n", &c2[2]); // 0x7fffe660ff75
}
```

