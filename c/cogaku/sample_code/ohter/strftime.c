#include <stdio.h>
#include <time.h>

int main(){
  time_t current_time;
  struct tm* local_time;
  char buffer[80];

  // 現在時刻取得
  current_time = time(NULL);

  // ローカル時間に変換
  local_time = localtime(&current_time);

  // 時間を指定の形式でフォーマット
  strftime(buffer, sizeof(buffer), "%Y-%m-%d %H:%M:%S", local_time);

  // 結果表示
  printf("フォーマットされた時間: %s\n", buffer);

  return 0;
}
