#include <stdio.h>
#include <stdlib.h>  // rand() や srand() に必要
#include <time.h>    // 時刻を使って乱数を生成するのに必要

int main() {
	int number, guess, tries = 0;
	
	// 乱数生成のために現在の時刻を使う
	srand(time(0));
	
	// 1～100の間でランダムな数を生成
	number = rand() % 100 + 1;

	printf("1から100までの数字を当ててみて！\n");

	// 数が当たるまで繰り返す
	do {
		printf("数字を入力してください: ");
		scanf("%d", &guess);
		tries++;

		if (guess > number) {
				printf("もっと小さい数字だよ！\n");
		} else if (guess < number) {
				printf("もっと大きい数字だよ！\n");
		} else {
				printf("おめでとう！ %d回で当たったよ！\n", tries);
		}
	} while (guess != number);

	return 0;
}
