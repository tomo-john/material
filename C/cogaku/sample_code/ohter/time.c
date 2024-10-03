#include <stdio.h>
#include <time.h>

int main() {
  time_t current_time;

  // 現在時刻の取得
  current_time = time(NULL);

  if(current_time != -1){
    printf("現在の時間(1970年からの経過秒数): %ld\n", current_time);
  }

	return 0;
}
