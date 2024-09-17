// fread
#include <stdio.h>

int main(){
  FILE *fp1;
  char szfname1[] = "ky105.c";
  char szdata[81];
  int ndata;

  fp1 = fopen(szfname1, "r");
  if(fp1 == NULL){
    printf("ファイル1のオープンに失敗");
    return 1;
  }
  
  ndata = fread(szdata, 40, 1, fp1);
  szdata[40] = '\0';
  if(ndata > 0)
    printf(szdata);

  fclose(fp1);
}
