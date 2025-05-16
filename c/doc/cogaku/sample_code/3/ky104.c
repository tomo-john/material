// fscanf
#include <stdio.h>

int main(){
  FILE *fp;
  char szfname[] = "ky104.dat";
  int n1;
  long l1;
  float f1;

  fp = fopen(szfname, "r");
  if(fp == NULL){
    printf("ファイルオープン失敗");
    return 1;
  }

  while(fscanf(fp, "%d, %f, %ld", &n1, &f1, &l1) != EOF)
    printf("<%d><%f><%ld>\n", n1, f1, l1);

  fclose(fp);
}
