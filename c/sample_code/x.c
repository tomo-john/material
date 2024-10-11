
#include <stdio.h>

int main() {
	int arr[] = {1, 2, 3, 4, 5};
	int *p = arr;  // 配列の先頭要素のアドレスをポインタに代入

	for (int i = 0; i < 5; i++) {
		printf("arr[%d] = %d, *(p + %d) = %d\n", i, arr[i], i, *(p + i));
	}

	return 0;
}
