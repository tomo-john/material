// パラメータ
#include <stdio.h>

// 関数宣言
int main(int argc, char *argv[]);

// メイン関数
int main(int argc, char *argv[]){
  printf("引数の数: %d\n", argc);
  printf("1番目の引数: %s\n", argv[0]);
  printf("2番目の引数: %s\n", argv[1]);
  return 0;
}
