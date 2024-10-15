// fwrit
#include <stdio.h>

int main(){
  FILE *fp1;
  char szfname1[] = "ky109.dat";
  char szdata[50];
  int ni;

  fp1 = fopen(szfname1, "w");
  if(fp1 == NULL){
    printf("ファイル1オープン失敗");
    return 1;
  }

  for(ni = 0; ni < 43; ni++)
    szdata[ni] = '0' + ni;
  szdata[43] = 0x00;

  printf("データ: %s\n", szdata);
  fwrite(szdata, 10, 1, fp1);

  fclose(fp1);
}
