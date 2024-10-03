#include <stdio.h>
#include <time.h>

int main() {
  time_t current_time;
  char* time_str;

  // 現在時刻の取得
  current_time = time(NULL);

  // time_tを文字列に変換
  time_str = ctime(&current_time);

  if(current_time != -1){
    printf("現在の時間(1970年からの経過秒数): %ld\n", current_time);
    printf("現在の時間(文字列形式): %s\n", time_str);
  }

	return 0;
}
