#include <stdio.h>
#include <string.h>
#include <stdlib.h>

int main(){
  char *pstr;
  int ni;

  // pstrはポインタ、mallocで10バイト分のメモリを確保
  pstr = (char *)malloc(10);
  
  // 確保したメモリの中身をゼロで初期化している
  memset(pstr, 0x00, 10);

  // pstrに文字列代入
  sprintf(pstr, "john\n");
  printf("malloc: %s", pstr);

  // メモリ解放
  free(pstr);
  
  // 10個の10バイト分(計100バイト)のメモリを確保(すべてゼロで初期化される)
  pstr = (char *)calloc(10, 10);

  for(ni = 0; ni < 10; ni++){
    sprintf(pstr + 10 * ni, "%d BLOCK", ni + 1);
  }

  for(ni = 0; ni < 10; ni++){
    printf("%d: %s\n", ni + 1, pstr + 10 * ni);
  }

  free(pstr);

  return 0;
}

