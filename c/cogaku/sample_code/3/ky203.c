// ferror
#include <stdio.h>

int main(){
  FILE *fp1;
  char szfname1[] = "ky203.dat";
  int nrtn;

  fp1 = fopen(szfname1, "r");
  if(fp1 == NULL){
    printf("ファイルオープン失敗\n");
    return 1;
  }

  nrtn = fputc('Z', fp1);
  if(ferror(fp1)){
    printf("エラー\n");
  } else {
    printf("正常\n");
  }

  fclose(fp1);
}
