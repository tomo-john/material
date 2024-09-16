// ファイル作成
#include <stdio.h>

int main(){
  FILE *fp;
  char szfname[] = "ky101.dat";

  fp = fopen(szfname, "r");
  if(fp == NULL){
    fp = fopen(szfname, "w");
    if(fp == NULL)
      printf("ファイルの作成に失敗しました\n");
    else
      printf("ファイルを作成しました\n");
  }
  else
    printf("ファイルが存在します\n");
  fclose(fp);
}
