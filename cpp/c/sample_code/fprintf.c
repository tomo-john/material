#include <stdio.h>

int main(){
  FILE *fp;

  fp = fopen("output.txt", "w");

  if(fp == NULL){
    printf("ファイルオープン失敗\n");
    return 1;
  }

  fprintf(fp, "いぬの名前: %s\n", "じょん");
  fprintf(fp, "うさぎの名前: %s\n", "ぴょんきち");
  fprintf(fp, "どうぶつの数: %d\n", 15);

  fclose(fp);

  printf("書き込み完了!\n");

  return 0;
}
