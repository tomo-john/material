// 関数
#include <stdio.h>

// 関数の宣言
int add(int a, int b);

// メイン関数
int main(){
  int result;

  // 関数呼び出し
  result = add(2, 8);
  printf("実行結果は: %d\n", result);

  return 0;
}

// 関数の定義
int add(int a, int b){
  return a + b;
}
