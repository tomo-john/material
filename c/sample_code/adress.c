// アドレスとポインタ
#include <stdio.h>

int main(void) {
	int a = 10;
	int *p = &a;

	printf("a の値: %d\n", a);            // a の値を表示
	printf("a のアドレス: %p\n", &a);     // a のアドレスを表示
	printf("p が指すアドレス: %p\n", p);  // p に格納されているアドレスを表示
	printf("p が指す値: %d\n", *p);       // p が指すアドレスにある値を表示

	return 0;
}
