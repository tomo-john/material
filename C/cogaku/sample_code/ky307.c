#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(){
  char *pstr;
  int ni;

  pstr = (char *)malloc(10);
  if(pstr == NULL){
    printf("malloc失敗\n");
    return 1;
  }

  memset(pstr, 0x00, 10);
  sprintf(pstr, "ABCDEFG\n");
  printf("malloc->%s", pstr);
  free(pstr);

  pstr = (char *)calloc(10, 10);
  if(pstr == NULL){
    printf("calloc失敗\n");
    return 1;
  }

  for(ni = 0; ni < 10; ni++){
    sprintf(pstr+10*ni, "%d BLOCK", ni+1);
  }
  for(ni = 0; ni < 10; ni++){
    printf("%d->%s\n", ni+1, pstr+10*ni);
  }
  free(pstr);

  return 0;
}
