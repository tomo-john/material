#include <stdio.h>
#include <time.h>

int main(){
  clock_t start_time, end_time;
  double cpu_time_used;

  // 開始時刻を取得
  start_time = clock();

  // 時間計測する処理
  for(long i = 0; i < 1000000000; i++);

  // 終了時刻を取得
  end_time = clock();

  // 実行時間を計算
  cpu_time_used = ((double)(end_time - start_time)) / CLOCKS_PER_SEC;

  printf("実行時間: %f秒\n", cpu_time_used);

  return 0;
}
