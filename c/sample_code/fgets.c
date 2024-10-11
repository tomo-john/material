#include <stdio.h>

int main(){
  FILE *fp;
  char buffer[100]; // 読み取り用バッファ

  fp = fopen("example.txt", "r");
  if(fp == NULL){
    printf("ファイルオープンエラー");
    return 1;
  }

  // ファイルから1行ずつ読み取り、表示
  while(fgets(buffer, sizeof(buffer), fp) != NULL){
    printf("読み取った行: %s", buffer);
  }

  fclose(fp);
  return 0;
}
