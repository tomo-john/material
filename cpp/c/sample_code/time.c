#include <stdio.h>
#include <time.h>

int main() {
	// 現在の時間を取得
	time_t currentTime;
	time(&currentTime);

	// 時間を人間が読める形式に変換
	struct tm *localTime = localtime(&currentTime);

	// 年、月、日、時、分、秒を表示
	printf("現在の日時: %d年%d月%d日 %d時%d分%d秒\n",
	 localTime->tm_year + 1900,  // 年は1900年からの年数なので、+1900
	 localTime->tm_mon + 1,      // 月は0から始まるので、+1
	 localTime->tm_mday,         // 日
	 localTime->tm_hour,         // 時
	 localTime->tm_min,          // 分
	 localTime->tm_sec);         // 秒

	return 0;
}
