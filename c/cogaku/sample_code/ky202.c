// feof
#include <stdio.h>

int main(){
  FILE *fp1;
  char szfname1[] = "ky202.c";
  char szdata[90];
  int ni;

  fp1 = fopen(szfname1, "r");
  if(fp1 == NULL){
    printf("ファイルオープン失敗\n");
    return 1;
  }

  ni = 0;
  while(1){
    fgets(szdata, 81, fp1);
    printf("%d: %s", ++ni, szdata);
    if(feof(fp1)){
      printf("\nEOF到達\n");
      break;
    }
  }

  fclose (fp1);
}
