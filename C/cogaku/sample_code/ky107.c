// fputs
#include <stdio.h>

int main(){
  FILE *fp1;
  FILE *fp2;
  char szfname1[] = "ky107.c";
  char szfname2[] = "ky107.txt";
  char szdata1[81];

  fp1 = fopen(szfname1, "r");
  if(fp1 == NULL){
    printf("ファイル1のオープンに失敗");
    return 1;
  }
  fp2 = fopen(szfname2, "w");
  if(fp2 == NULL){
    printf("ファイル1のオープンに失敗");
    fclose(fp1);
    return 1;
  }

  while(fgets (szdata1, 81, fp1) != NULL)
    fputs(szdata1, fp2);

  fclose(fp1);
  fclose(fp2);
}
