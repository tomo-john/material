// 文字配列を使ったサンプル
#include <stdio.h>

int main(void){
  char sz1[50] = {'H', 'e', 'l', 'l', 'o', '\0'};
  printf("%s\n", sz1);

  printf("名前を入力してください(MAX49バイト): ");
  scanf("%s", sz1 );

  printf("あなたの名前は %s さんですね\n", sz1);
}
