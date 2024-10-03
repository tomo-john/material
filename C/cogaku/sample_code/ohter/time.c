#include <stdio.h>
#include <time.h>

int main() {
  time_t current_time;
  char* time_str;
  struct tm* local_time;

  // 現在時刻の取得
  current_time = time(NULL);

  // time_tを文字列に変換
  time_str = ctime(&current_time);
  
  // time_tをtm構造体に変換
  local_time = localtime(&current_time);

  if(current_time != -1){
    printf("現在の時間(1970年からの経過秒数): %ld\n", current_time);
  }

  if(time_str !=  NULL){
    printf("現在の時間(文字列形式): %s", time_str); // ctimeの文字列には\nが自動で入る
  }

  if(local_time != NULL){
    printf("現在の時間(ローカル時間): %d-%02d-%02d %02d:%02d:%02d\n",
            local_time->tm_year + 1900,  // 年は1900年からの経過年数
            local_time->tm_mon + 1,      // 月は0から始まるため、1を足す
            local_time->tm_mday,         // 日
            local_time->tm_hour,         // 時
            local_time->tm_min,          // 分
            local_time->tm_sec);         // 秒
  }

	return 0;
}
