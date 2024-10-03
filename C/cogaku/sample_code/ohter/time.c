#include <stdio.h>
#include <time.h>

int main() {
	time_t stime;
	char stinp[80];

	// 現在の時刻を取得
	stime = time(NULL);
	if (stime == (time_t)-1) {
			printf("time関数を使用できません\n");
			return 1;
	}

	// 1回目の入力
	printf("1番目の文字を入力してください: ");
	scanf("%s", stinp);  // 文字列を入力
	printf("%sが入力されるまで: %.3fsec\n", stinp, 
				 difftime(time(NULL), stime));  // 経過時間を秒で表示

	// 2回目の入力
	stime = time(NULL);  // 新しい開始時刻を取得
	printf("2番目の文字を入力してください: ");
	scanf("%s", stinp);  // 文字列を入力
	printf("%sが入力されるまで: %.3fsec\n", stinp, 
				 difftime(time(NULL), stime));  // 経過時間を秒で表示

	return 0;
}
