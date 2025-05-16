// fprintf
#include <stdio.h>

int main(){
  FILE *fp1;
  FILE *fp2;
  char szfname1[] = "ky108.c";
  char szfname2[] = "ky108.txt";
  char szdata[81];
  int ni;

  fp1 = fopen(szfname1, "r");
  if(fp1 == NULL){
    printf("ファイル1オープン失敗");
    return 1;
  }
  fp2 = fopen(szfname2, "w");
  if(fp2 == NULL){
    printf("ファイル2オープン失敗");
    fclose(fp1);
    return 1;
  }

  ni = 1;
  while(fgets(szdata, 81, fp1) != NULL){
    fprintf(fp2, "%02d:%s", ni, szdata);
    ni++;
  }
  fclose(fp1);
  fclose(fp2);
}
