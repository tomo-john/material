// fputc
#include <stdio.h>

int main(){
  FILE *fp1;
  FILE *fp2;
  char szfname1[] = "ky106.c";
  char szfname2[] = "ky106.txt";
  int ndata;

  fp1 = fopen(szfname1, "r");
  if(fp1 == NULL){
    printf("ファイル1のオープンに失敗");
    return 1;
  }
  fp2 = fopen(szfname2, "w");
  if(fp2 == NULL){
    printf("ファイル2のオープンに失敗");
    return 1;
  }
  
  while(1){
    ndata = fgetc(fp1);
    if(ndata == EOF){
      break;
    }
    fputc(ndata, fp2);
  }

  fclose(fp1);
  fclose(fp2);
}
